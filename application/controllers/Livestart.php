<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Livestart extends CI_Controller {
	var $Page_title = "Home";
	var $Page_name  = "home";
	var $Page_view  = "home";
	var $Page_menu  = "home";
	var $page_controllers = "home";
	var $Page_tbl   = "";
	public function index()
	{
		error_reporting(0);
		$Page_title = $this->Page_title;
		$Page_name 	= $this->Page_name;
		$Page_view 	= $this->Page_view;
		$Page_menu 	= $this->Page_menu;
		$Page_tbl 	= $this->Page_tbl;
		$page_controllers 	= $this->page_controllers;		
		$data['title1'] = $Page_title;
		$data['title2'] = "View";
		$data['Page_name'] = $Page_name;
		$data['Page_menu'] = $Page_menu;
		$this->breadcrumbs->push("<i class='fa fa-home' aria-hidden='true'></i>Home","home");		
		$this->load->view("website/livestart",$data);
	}
	
	public function start_stop_my_live()
	{
		$status = $_POST["status"];
		$myid 	= $_POST["myid"];
		$this->db->query("update tbl_anywhere_live set category_id='$myid',status='$status' where id='1'");
		echo "ok";
	}
}