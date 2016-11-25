<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
  <title><?php echo $page_title;?></title>

</head><body style="color: black; background-color: bgcolor=#00ccff; background: ../image/cloud.jpg; ">
<table style="text-align: left; width: 100%; box-shadow: 5px 5px 5px #888888;" bgcolor=#0099ff border="0" cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td style="vertical-align: top;"><img style="width: 100px; height: 100px;" alt="" src="../image/dht-gauge.png"><br>
      </td>
      <td style="vertical-align: middle; text-align: center; text-shadow: 2px 2px #000000;"><font color="white">
      <h1>WeatherPi</h1>
      </font> </td>
      <td style="vertical-align: top; text-align: right; "><img style="width: 100px; height: 100px; " src="../image/bmp-gauge.png"><br>
      </td>
    </tr>
  </tbody>
</table>

<br>

<table style="box-shadow: 5px 5px 5px #888888;" units="relative" align="center" bgcolor=#0099ff border="1" cellpadding="2" cellspacing="6" width="100%">

  <tbody>
    <tr>
      <td align="center" bgcolor="white"><a href="index.php" name="main">Main Menu</a></td>
      <td align="center" bgcolor="white"><a href="current-conditions.php" name="current">Current Conditions</a></td>
      <td align="center" bgcolor="white"><a href="report.php" name="report">Weather Report</a></td>
	<td align="center" bgcolor="white"><a href="http://192.168.1.70:8080/stream_pi.html" name="camera">Video Stream</a></td>
    </tr>
  </tbody>
</table>

<!-- End of header.inc.php -->
</body></html>
