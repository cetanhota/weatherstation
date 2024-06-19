<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html><head>
  <title><?php echo $page_title;?></title>
<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: green;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover {
    background-color: #00cc00;
}
.f_button {
    background-color: green;
    border: 1px solid black;
    color: white;
    padding: 10px 30px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    border-radius: 2px;
}

.f_button:hover {
    background-color: #00cc00;
}

</style>
</head>
<body bgcolor="#000000" text="green">
<table  units="relative" width="100%" align="center" bgcolor=green border="0" cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td align="left" style="vertical-align: top;"><img style="width: 75px; height: 75px;" alt="" src="../image/pi-logo.png"><br>
      </td>
      <td style="vertical-align: middle; text-align: center; text-shadow: 2px 2px #000000;"><font color="white">
      <h1>Pi Server Status</h1>
      </font> </td>
      <td style="vertical-align: top; text-align: right; "><img style="width: 75px; height: 75px; " src="../image/linux_logo.png"><br>
      </td>
    </tr>
  </tbody>
</table>
<br>
<ul>
  <li><a class="active" href="../system-status.php">Home</a></li>
  <li><a href="../diskusage.php">Disk Usage</a></li>
  <li><a href="../top.php">Top</a></li>
  <li><a href="../freememory.php">Free Memory</a></li>
</ul>
<br>

<!-- End of header.inc.php -->
