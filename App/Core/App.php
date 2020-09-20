<?php
// Copyright (c) Artemy Shelep, 2020

class App
{
	public $page = "main";
	public $param = "";
	
	function __construct()
	{
		if (isset($_GET['req'])) {
			$url = explode("/", $_GET['req']);
			$this->page = $url[0];
			
			if (isset($url[1])) $this->param = $url[1];
		}
		include "../App/Controller.php";
		
		$Controller = new Controller();
		
		if (method_exists($Controller, $this->page) and file_exists("../App/Views/".$this->page.".php")) {
			call_user_func_array([$Controller, $this->page], [$this->param]);
		}
		else header("Location: /errors/404");
	}
}