<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rkslive_1_2 extends CI_Controller {
	public function home($android_id="")
	{ 
		$this->insert_info($android_id);
		$data["android_id"] = $android_id;
		$this->load->view("website/rkslive_1_2/menu",$data);
		$this->load->view("website/rkslive_1_2/slider",$data);
		if($android_id!="")
		{
			$row = $this->db->query("select * from tbl_android_info where android_id='$android_id' and status='0'")->row();
			if ($row->id!="")
			{
				$this->load->view("website/rkslive_1_2/home",$data);
			}
			else
			{
				$this->load->view("website/rkslive_1_2/demo",$data);
			}
		}
		else
		{
			$this->load->view("website/rkslive_1_2/demo",$data);
		}
	}
	public function insert_info($android_id="")
	{ 
		$row = $this->db->query("select * from tbl_android_info where android_id='$android_id'")->row();
		if ($row->id=="")
		{
			$this->db->query("insert into tbl_android_info set android_id='$android_id'");
		}
	}
	
	public function livetv($id="")
	{ 
		$this->load->view("website/rkslive_1_2/menu",$data);
		$this->load->view("website/rkslive_1_2/slider",$data);
		$this->load->view("website/rkslive_1_2/livetv",$data);
	}
	
	public function movies($id="")
	{ 
		$this->load->view("website/rkslive_1_2/menu",$data);
		$this->load->view("website/rkslive_1_2/slider",$data);
		$this->load->view("website/rkslive_1_2/movies",$data);
	}
	
	public function webseries($id="")
	{ 
	?>
	<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container" style="margin-top:20px;">
	<div class="row">
		<?php
		$query = $this->db->query("select * from tbl_category")->result();
		//for($i=0;$i<$countx;$i++)
		foreach($query as $row)
		{
			?>
			<div class="col-sm-2 col-3 p-2 text-center">
				<a href="<?=($row->url)?>">
				<img src="<?= base_url(); ?>uploads/manage_category/photo/<?=$row->image?>" class="img-fluid img-thumbnail">
				<?=$row->name?>
				</a>
			</div>
			<?php
		}
		?>
	</div>
</div>
	<?php
	}
	
	public function other($id="")
	{ 
	?>
	<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container" style="margin-top:20px;">
	<div class="row">
		<?php
		$query = $this->db->query("select * from tbl_category")->result();
		//for($i=0;$i<$countx;$i++)
		foreach($query as $row)
		{
			?>
			<div class="col-sm-2 col-3 p-2 text-center">
				<a href="<?=($row->url)?>">
				<img src="<?= base_url(); ?>uploads/manage_category/photo/<?=$row->image?>" class="img-fluid img-thumbnail">
				<?=$row->name?>
				</a>
			</div>
			<?php
		}
		?>
	</div>
</div>
	<?php
	}
	
    public function videoplay($id="")
	{ 
	?>
	<html>
<head>
<title>STREAMSAW LIVE STREAMING</title>
<script type="text/javascript" src="https://ajax.cloudflare.com/cdn-cgi/scripts/b7ef205d/cloudflare-static/rocket.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/hls.js@latest"></script>
<script src="https://cdn.plyr.io/2.0.18/plyr.js"></script>
<link rel="stylesheet" href="https://cdn.plyr.io/2.0.18/plyr.css">
</head>
<body>
<?= base64_decode($id); ?>
<div id="player">
<video id="video" style="width:100%;height:97%;object-fit: fill;"></video>
</div>
<script>
var url="<?= base64_decode($id); ?>";

plyr.setup(video);

 if(Hls.isSupported()) {
    var video = document.getElementById('video');
    var hls = new Hls();
    hls.loadSource(url);
    hls.attachMedia(video);
    hls.on(Hls.Events.MANIFEST_PARSED,function() {
      video.play();
  });
 }
  else if (video.canPlayType('application/vnd.apple.mpegurl')) {
    video.src = url;
    video.addEventListener('canplay',function() {
      video.play();
    });

  }
</script>
<input type="button" value="Say hello" onClick="showAndroidToast('<?= $_GET["id"]; ?>')" />

<script type="text/javascript">
    function showAndroidToast(toast) {
        if(typeof android !== "undefined" && android !== null) {
            android.showToast(toast);
        } else {
            alert("Not viewing in webview");
        }
    }
</script>
</body>
</html>
	<?php
	}
}