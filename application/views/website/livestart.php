<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="msapplication-tap-highlight" content="no" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Live Start Off Software</title>
    <!-- Stylesheets -->
	<meta name="theme-color" content="#1084a1">
	<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head><body>
<?php
$category_id = $_GET["category_id"];
$this->db->query("update tbl_anywhere_live set category_id='$category_id' where id='1'");
$row = $this->db->query("select * from tbl_anywhere_live")->row();
$row1 = $this->db->query("select * from tbl_category where id='$category_id'")->row();
$cat_name = base64_decode($row1->category);
if($row->status==0)
{
	$message = "<span style='color:red;font-size:20px;'>($cat_name) Live Is Offline.</span>";
	$display0 = "display:none";
}
if($row->status==1)
{
	$message = "<span style='color:green;font-size:20px;'>($cat_name) Live Is Online.</span>";
	$display1 = "display:none";
}
?>
<div style="margin-top:70px;margin-left:70px;">
<span class="message"><?php echo $message?></span><br><br><br><br>
<button type="submit" class="btn btn-info minimalize-styl-2 btn-danger liveonbtn<?php echo $category_id; ?>" name="Submit" onclick="start_stop_my_live('1','<?php echo $category_id; ?>')" style="<?=$display1;?>"><?= $cat_name; ?> Start Live</button>
<button type="submit" class="btn btn-info minimalize-styl-2 liveoffbtn<?php echo $category_id; ?>" name="Submit" onclick="start_stop_my_live('0','<?php echo $category_id; ?>')" style="<?=$display0;?>"><?= $cat_name; ?> End Live</button>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
function start_stop_my_live(status,myid)
{
	//$(".livediv").html("Loading....");
	$.ajax({
		type       : "POST",
		data       :  { status : status,myid:myid} ,
		url        : "<?= base_url(); ?>livestart/start_stop_my_live",
		error: function(){
			alert("error")
		},
		success    : function(data){
			if(data=="ok")
			{
				if(status=="1")
				{
					//java_alert_function("success","Start Live");
					$(".liveonbtn"+myid).hide();
					$(".liveoffbtn"+myid).show();
					//location.reload();
					$(".message").html("<span style='color:green;font-size:20px;'>(<?=$cat_name;?>) Live Is Online.</span>");
				}
				if(status=="0")
				{
					//java_alert_function("success","Stop Live");
					$(".liveonbtn"+myid).show();
					$(".liveoffbtn"+myid).hide();
					//location.reload();
					$(".message").html("<span style='color:red;font-size:20px;'>(<?=$cat_name;?>) Live Is Offline.</span>");
				}
			}
		},
		timeout: 10000
	});
}
</script>