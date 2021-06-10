<?php
require_once("DataAccess.class.php");
class Authentication
{
	public $uname_field,$password_field,$utype_field,$table;
	public $dao,$utype,$status,$error;
	private $encryption;

	public function __construct()
	{
		$this->dao = new DataAccess();
		$this->uname_field="username";
		$this->password_field="password";
		$this->utype_field="usertype";
		$this->encryption=false;
		$this->table="tbl_login";
		$this->error="";
	}
	public function authenticate($uname,$password)
	{
		if($row=$this->dao->getData("*",$this->table,$this->uname_field."='$uname'"))
		{
			if($this->encryption){ $password =md5($password);}
			if($row[0][$this->password_field] == $password)
			{
				$this->utype=$row[0][$this->utype_field];
				return true;
			}
			else
			{
				$this->error="Invalid Username Or Password";
				return false;
			}
			 
		}
		else
		{
			$this->error="Invalid Username Or Password";
			return false;
		}
	}


}