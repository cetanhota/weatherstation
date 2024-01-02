<?php
//Filename: IConnectInfo.php
interface IConnectInfo
{
	const HOST ="192.168.1.21";
	const UNAME ="mysqladm";
	const PW ="hawk69";
	const DBNAME = "raspberrypi";
	
	public static function doConnect();
}

?>

