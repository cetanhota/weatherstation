<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
  <title><?php echo $page_title;?></title>
<style>
body {
    color: black;
    background-color: #00ccff;
    background-image: url("image/cloud.jpg");
    background-attachment: fixed;
}
.f_button {
    background-color: #00ccff;
    border: 1px solid black;
    color: black;
    padding: 10px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    border-radius: 25px;
}

.f_button:hover {
    background-color: white;
}
div.graphshadow {
    width: 480px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); 
    border: 1px solid;
    text-align: center;
}

h2 {
    #color: #af2f02; 
    color: #005266;
    vertical-align: middle;
    text-align: center;
    text-shadow: 1px 1px 1px #b8b894;
}
</style>
</head>
<body>
<table background="../image/winter.jpg" style="text-align: left; width: 100%; box-shadow: 5px 5px 5px #888888;" bgcolor=#0099ff border="0" cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td style="vertical-align: top;"><img style="width: 100px; height: 100px;" alt="" src="../image/dht-gauge.png"><br>
      </td>
      <td style="vertical-align: middle; text-align: center; text-shadow: 1px 1px #000000;"><font color="white">
      <h1>Weather Lab</h1>
      </font> </td>
      <td style="vertical-align: top; text-align: right; "><img style="width: 100px; height: 100px; " src="../image/bmp-gauge.png"><br>
      </td>
    </tr>
  </tbody>
</table>

<br>

<table background="../image/winter.jpg" style="box-shadow: 5px 5px 5px #888888;" units="relative" align="center" bgcolor=#0099ff border="1" cellpadding="2" cellspacing="6" width="100%">

  <tbody>
    <tr>
      <td align="center" bgcolor="white"><a href="index.php" name="main">Main Menu</a></td>
      <td align="center" bgcolor="white"><a href="current-conditions.php" name="current">Current Conditions</a></td>
      <td align="center" bgcolor="white"><a href="shop.php" name="shop">Shop Conditions</a></td>
      <td align="center" bgcolor="white"><a href="basement.php" name="basement">Basement Conditions</a></td>
      <td align="center" bgcolor="white"><a href="report.php" name="Almanac">Weather Almanac</a></td>
      <td align="center" bgcolor="white"><a href="http://192.168.1.70:8080/stream_pi.html" name="camera">Video Stream</a></td>
      <td align="center" bgcolor="white"><a href="system-status.php" name="status">Server Status</a></td>
    </tr>
  </tbody>
</table>

<!-- End of header.inc.php -->
