#!/home/wayne/weather-lab/bin/python3
# -*- coding:utf-8 -*- 
import time 
import sys
import smbus
import lgpio as sbc
import json
import mysql.connector 
from mysql.connector import Error

if len(sys.argv) > 1 :
    DEBUG = 1
else:
    DEBUG = 0

# Opening JSON file
f = open('/home/wayne/bin/.my.json')

# returns JSON object as a dictionary
data = json.load(f)

hostname = str( data['hostname'] )
username = str( data['username'] )
password = str( data['password'] )
database = str( data['database'] )

# Closing file
f.close()

db = mysql.connector.connect(host=hostname,    # your host, usually localhost
                            user=username,         # your username
                            passwd=password,  # your password
                            db=database)        # name of the database

#i2c address 
LPS22HB_I2C_ADDRESS     = 0x5C
SHTC3_I2C_ADDRESS       = 0x70

#Register 
LPS_ID                  =  0xB1 
LPS_INT_CFG             =  0x0B        #Interrupt register 
LPS_THS_P_L             =  0x0C        #Pressure threshold registers  
LPS_THS_P_H             =  0x0D         
LPS_WHO_AM_I            =  0x0F        #Who am I         
LPS_CTRL_REG1           =  0x10        #Control registers 
LPS_CTRL_REG2           =  0x11 
LPS_CTRL_REG3           =  0x12 
LPS_FIFO_CTRL           =  0x14        #FIFO configuration register  
LPS_REF_P_XL            =  0x15        #Reference pressure registers 
LPS_REF_P_L             =  0x16 
LPS_REF_P_H             =  0x17 
LPS_RPDS_L              =  0x18        #Pressure offset registers 
LPS_RPDS_H              =  0x19         
LPS_RES_CONF            =  0x1A        #Resolution register 
LPS_INT_SOURCE          =  0x25        #Interrupt register 
LPS_FIFO_STATUS         =  0x26        #FIFO status register 
LPS_STATUS              =  0x27        #Status register 
LPS_PRESS_OUT_XL        =  0x28        #Pressure output registers 
LPS_PRESS_OUT_L         =  0x29 
LPS_PRESS_OUT_H         =  0x2A 
LPS_RES                 =  0x33        #Filter reset register
SHTC3_ID                = 0xEFC8
CRC_POLYNOMIAL          = 0x0131
SHTC3_WakeUp            = 0x3517
SHTC3_Sleep             = 0xB098
SHTC3_Software_RES      = 0x805D
SHTC3_NM_CD_ReadTH      = 0x7866
SHTC3_NM_CD_ReadRH      = 0x58E0
 
class LPS22HB(object): 
    def __init__(self,address=LPS22HB_I2C_ADDRESS): 
        self._address = address 
        self._bus = smbus.SMBus(1) 
        self.LPS22HB_RESET()                         #Wait for reset to complete 
        self._write_byte(LPS_CTRL_REG1 ,0x02)        #Low-pass filter disabled , output registers not updated until MSB and LSB have been read , Enable Block Data Update , Set Output Data Rate to 0  
    def LPS22HB_RESET(self): 
        Buf=self._read_u16(LPS_CTRL_REG2) 
        Buf|=0x04                                          
        self._write_byte(LPS_CTRL_REG2,Buf)               #SWRESET Set 1 
        while Buf:
            Buf=self._read_u16(LPS_CTRL_REG2) 
            Buf&=0x04 
    def LPS22HB_START_ONESHOT(self): 
        Buf=self._read_u16(LPS_CTRL_REG2) 
        Buf|=0x01                                         #ONE_SHOT Set 1 
        self._write_byte(LPS_CTRL_REG2,Buf) 
    def _read_byte(self,cmd): 
        return self._bus.read_byte_data(self._address,cmd) 
    def _read_u16(self,cmd): 
        LSB = self._bus.read_byte_data(self._address,cmd) 
        MSB = self._bus.read_byte_data(self._address,cmd+1) 
        return (MSB     << 8) + LSB 
    def _write_byte(self,cmd,val): 
        self._bus.write_byte_data(self._address,cmd,val)

class SHTC3():
    def __init__(self,sbc,bus,address,flags = 0):
        self._sbc = sbc
        self._fd = self._sbc.i2c_open(bus, address, flags)
        self.SHTC_SOFT_RESET()

    def SHTC3_CheckCrc(self,data,len,checksum):
        crc = 0xFF 
        for byteCtr in range(0,len):
            crc = crc ^ data[byteCtr]
            for bit in range(0,8):
                if crc & 0x80: 
                    crc = (crc << 1) ^ CRC_POLYNOMIAL 
                else: 
                    crc = crc << 1 
        if crc == checksum: 
            return True 
        else: 
            return False 
     
    def SHTC3_WriteCommand(self,cmd): 
        self._sbc.i2c_write_byte_data(self._fd,cmd >> 8,cmd & 0xFF) 
     
    def SHTC3_WAKEUP(self): 
        self.SHTC3_WriteCommand(SHTC3_WakeUp) # write wake_up command 
        time.sleep(0.01) # Prevent the system from crashing  
     
    def SHTC3_SLEEP(self): 
        self.SHTC3_WriteCommand(SHTC3_Sleep) # Write sleep command 
        time.sleep(0.01) 
     
    def SHTC_SOFT_RESET(self): 
        self.SHTC3_WriteCommand(SHTC3_Software_RES) # Write reset command 
        time.sleep(0.01) 
     
    def SHTC3_Read_TH(self): # Read temperature  
        self.SHTC3_WAKEUP() 
        self.SHTC3_WriteCommand(SHTC3_NM_CD_ReadTH) 
        time.sleep(0.02) 
        (count,buf) = self._sbc.i2c_read_device(self._fd,3) 
        if self.SHTC3_CheckCrc(buf,2,buf[2]): 
            return (buf[0]<<8|buf[1]) * 175 / 65536 - 45.0 # Calculate temperature value 
        else: 
            return 0 # Error

    def SHTC3_Read_RH(self): # Read humidity
        self.SHTC3_WAKEUP()
        self.SHTC3_WriteCommand(SHTC3_NM_CD_ReadRH)
        time.sleep(0.02)
        (count,buf) = self._sbc.i2c_read_device(self._fd,3)
        if self.SHTC3_CheckCrc(buf,2,buf[2]) :
            return 100 * (buf[0]<<8|buf[1]) / 65536 # Calculate humidity value
        else:
            return 0  # Error

if __name__ == '__main__':
    shtc3 = SHTC3(sbc, 1, SHTC3_I2C_ADDRESS)
    u8Buf=[0,0,0] 
    lps22hb=LPS22HB() 
    time.sleep(0.1) 
    u8Buf[0]=lps22hb._read_byte(LPS_PRESS_OUT_XL) 
    u8Buf[1]=lps22hb._read_byte(LPS_PRESS_OUT_L) 
    u8Buf[2]=lps22hb._read_byte(LPS_PRESS_OUT_H) 
    
    temperature=round((shtc3.SHTC3_Read_TH()* 9/5.0 + 32 - 15),2)
    humidity=round((shtc3.SHTC3_Read_RH()),2)
    dewpoint=round(temperature - ((100-humidity)/5.0),2)
    prs=round(((u8Buf[2]<<16)+(u8Buf[1]<<8)+u8Buf[0])/4096.0*0.02953, 2)

if DEBUG == 1:  
    print("\nSensor debug output...\n")
    print(f"Temperature: {temperature}°F")
    print(f"Humidity: {humidity}%")
    print(f"Dewpoint: {dewpoint}°F")
    print(f"Pressure: {prs} inHg")
    sys.exit(0)

# you must create a Cursor object. It will let you execute all the queries you need.
cur = db.cursor()

#prepare SQL query for INSERT
sql = "insert into weatherv2 (tmp,hum,dew,prs) values('%s','%s','%s','%s')" %((temperature),(humidity),(dewpoint),(prs))

try:
        # execute the sql command
        cur.execute(sql)
        db.commit()
except:
        # rollback if error
        db.rollback()

#close cursor
cur.close()

#close connection
db.close()

sys.exit(0)

