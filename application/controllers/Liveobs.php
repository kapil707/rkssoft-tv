<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Liveobs extends CI_Controller {
	var $Page_title = "Home";
	var $Page_name  = "home";
	var $Page_view  = "home";
	var $Page_menu  = "home";
	var $page_controllers = "home";
	var $Page_tbl   = "";
	public function index()
	{
		$row = $this->db->query("select * from tbl_setting where function_type='new_live_start_stop'")->row();
		if($row->fun==0){
			echo "<h1 style='color:red'>Stop Live</h1>";
			?>
			<a href="<?php echo base_url(); ?>liveobs/youtube_firefox_start">Click To Start Now</a>
			<?php
		}
		if($row->fun==1){
			echo "<h1 style='color:green'>Start Live</h1>";
			?>
			<a href="<?php echo base_url(); ?>liveobs/youtube_firefox_stop">Click To Stop Now</a>
			<?php
		}
	}
	
	public function index2()
	{
		$row = $this->db->query("select * from tbl_setting where function_type='new_live_start_stop'")->row();
		if($row->fun==0){
			echo "<h1 style='color:red'>Stop Live</h1>";
			?>
			<a href="<?php echo base_url(); ?>liveobs/youtube_firefox_start2">Click To Start Now</a>
			<?php
		}
		if($row->fun==1){
			echo "<h1 style='color:green'>Start Live</h1>";
			?>
			<a href="<?php echo base_url(); ?>liveobs/youtube_firefox_stop2">Click To Stop Now</a>
			<?php
		}
	}
	
	public function local_start()
	{
		system("local_start.bat");
	}
	
	public function local_stop()
	{
		system("local_stop.bat");
	}
	
	public function youtube_start()
	{
		system("youtube_start.bat");
	}
	
	public function youtube_stop()
	{
		system("youtube_stop.bat");
	}
	
	public function restart_pc()
	{
		system("restart_pc.bat");
	}
	
	public function youtube_firefox_start()
	{
		$this->db->query("update tbl_setting set fun=1 where function_type='new_live_start_stop'");
		system("youtube_firefox_start.bat");
		redirect(base_url()."liveobs/index");
	}
	
	public function youtube_firefox_stop()
	{
		$this->db->query("update tbl_setting set fun=0 where function_type='new_live_start_stop'");
		system("youtube_firefox_stop.bat");
		sleep(1);
		system("rks_start.bat");
		redirect(base_url()."liveobs/index");
	}
	
	public function youtube_firefox_start2()
	{
		$this->db->query("update tbl_setting set fun=1 where function_type='new_live_start_stop'");
		system("youtube_firefox_start2.bat");
		redirect(base_url()."liveobs/index2");
	}
	
	public function youtube_firefox_stop2()
	{
		$this->db->query("update tbl_setting set fun=0 where function_type='new_live_start_stop'");
		system("youtube_firefox_stop2.bat");
		sleep(1);
		system("rks_start.bat");
		redirect(base_url()."liveobs/index2");
	}
}