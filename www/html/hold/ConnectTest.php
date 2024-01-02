<?php
ini_set("display_errors","1");
ERROR_REPORTING( E_ALL | E_STRICT );
include_once('UniversalConnect.php');
class ConnectTest
{
	private $test;
	public function __construct()
	{
		try
		{
			$this->test=UniversalConnect::doConnect();
			echo "You're hooked up, Ace!";
		}
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
}
$worker=new ConnectTest();
?>
