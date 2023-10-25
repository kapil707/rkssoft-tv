<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rksliveoo extends CI_Controller {
	public function index()
	{ 
		header("Content-type: application/json; charset=utf-8");
		error_reporting(0);
		$items = "";
		$Search_text = $_POST["Search_text"];
		if($Search_text=="")
		{
			$query1 = $this->db->query("select * from tbl_category order by name asc")->result();
		}
		else
		{
			$query1 = $this->db->query("select * from tbl_category where name like '$Search_text%'")->result();
		}
		foreach ($query1 as $row1)
		{
			$name= $row1->name;
			$image= base_url()."/uploads/manage_category/photo/".$row1->image;
			$description= $row1->description;
			$url= $row1->url;
			$id= $row1->id;
$items .= <<<EOD
{"id":"{$id}","name":"{$name}","image":"{$image}","description":"{$description}","url":"{$url}"},
EOD;
		}
if ($items != '') {
$items = substr($items, 0, -1);
}header('Content-type: application/json');
?>[<?= $items;?>]
<?php
	}
	public function index1()
	{ 
		header("Content-type: application/json; charset=utf-8");
		error_reporting(0);
		$items = "";
		$Search_text = $_POST["Search_text"];
		if($Search_text=="")
		{
			$query1 = $this->db->query("select * from tbl_category order by name asc")->result();
		}
		else
		{
			$query1 = $this->db->query("select * from tbl_category where name like '$Search_text%'")->result();
		}
		foreach ($query1 as $row1)
		{
			$name= $row1->name;
			$image= base_url()."/uploads/manage_category/photo/".$row1->image;
			$description= $row1->description;
			$url= $row1->url;
			$id= $row1->id;
$items .= <<<EOD
{"id":"{$id}","name":"{$name}","image":"{$image}","description":"{$description}","url":"{$url}"},
EOD;
		}
if ($items != '') {
$items = substr($items, 0, -1);
}header('Content-type: application/json');
?>{"items":[<?= $items;?>]}
<?php
	}
	
	public function livetv($id="")
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
		$query = $this->db->query("select * from tbl_livetv where id='1'or id='2' order by name asc")->result();
		//for($i=0;$i<$countx;$i++)
		foreach($query as $row)
		{
			?>
			<div class="col-sm-2 col-3 p-2 text-center">
			    <?php $url = $row->url?>
				<a href="javascript:showAndroidToast('<?= $url; ?>')">
				<img src="<?= base_url(); ?>uploads/manage_livetv/photo/<?=$row->image?>" class="img-fluid img-thumbnail">
				<?=$row->name?>
				</a>
			</div>
			<?php
		}
		?>
	</div>
</div>
<script type="text/javascript">
    function showAndroidToast(toast) {
        if(typeof android !== "undefined" && android !== null) {
            android.showToast(toast);
        } else {
            alert("Not viewing in webview");
        }
    }
</script>
	<?php
	}
	
	public function movies($id="")
	{ 
	
	}
	
	public function webseries($id="")
	{ 
	
	}
	
	public function other($id="")
	{ 
	
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