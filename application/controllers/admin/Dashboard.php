<?php
	{
		$id = $_POST["id"];
		$this->db->query("update tbl_theme set header='0' where header='1'");
		$this->db->query("update tbl_theme set header='1' where id='$id'");
		echo "ok";
	}
	
	{
		$id = $_POST["id"];
		$this->db->query("update tbl_theme set footer='0' where footer='1'");
		$this->db->query("update tbl_theme set footer='1' where id='$id'");
		echo "ok";
	}	
	{
		$id = $_POST["id"];
		$this->db->query("update tbl_theme set slider='0' where slider='1'");
		$this->db->query("update tbl_theme set slider='1' where id='$id'");
		echo "ok";
	}
}