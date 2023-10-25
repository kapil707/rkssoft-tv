<div class="row">
    <div class="col-xs-12" style="margin-bottom:5px;">
		<a href="<?= base_url();?>/liveobs/index" onclick="return confirm('Are you sure? Start / Stop Youtube Video or Player')">
            <button type="submit" class="btn btn-info" style="background:Green">
                Youtube (Sky - Dharmik)
            </button>            
        </a>
		<a href="<?= base_url();?>/liveobs/index2" onclick="return confirm('Are you sure? Start / Stop Youtube Video or Player')">
            <button type="submit" class="btn btn-info" style="background:Green">
                Youtube (Sky - Hanumangarh)
            </button>            
        </a>
		<br>
    	<a href="<?= base_url();?>/Liveobs/local_start" onclick="return confirm('Are you sure? Obs Live Start')">
            <button type="submit" class="btn btn-info">
                Obs Live Start
            </button>            
        </a>
		
		<a href="<?= base_url();?>/Liveobs/local_stop" onclick="return confirm('Are you sure? Obs Live Stop')">
            <button type="submit" class="btn btn-info" style="background:blue">
                Obs Live Stop
            </button>            
        </a>
		<br>
		<a href="<?= base_url();?>/Liveobs/restart_pc" onclick="return confirm('Are you sure? Restart Computer')">
            <button type="submit" class="btn btn-info btn-danger">
                Restart Computer
            </button>            
        </a>
		
   	</div>
    <div class="col-xs-12">
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover dataTables-example">
                <thead>
                    <tr>
                    	<th>
                        	Sno.
                        </th>
						<th>
                        	Category Name
                        </th>
                        <th>
                        	Live Start / Stop
                        </th>
						<th>
                        	Action
                        </th>
                    </tr>
                </thead>

                <tbody>
                <?php
				$i=1;
                foreach ($result as $row)
                {
					$ok = $this->Scheme_Model->check_anywhere_live($row->id);
					?>
                    <tr id="row_<?= $row->id; ?>">
                    	<td>
                        	<?= $i++; ?>
                        </td>
 						<td>
                        	<?= base64_decode($row->category) ?>
                        </td>
                        <td>
                        	<button type="submit" class="btn btn-info liveonbtn<?= ($row->id) ?>" name="Submit" onclick="start_stop_my_live('1','<?= ($row->id) ?>')" 
							<?php if($ok=="1") { ?>style="display:none"<?php } ?>>
								<i class="ace-icon fa fa-check bigger-110"></i>
								Start Live (<?= base64_decode($row->category) ?>)
							</button>
							<button type="submit" class="btn btn-info btn-danger liveoffbtn<?= ($row->id) ?>" name="Submit" onclick="start_stop_my_live('0','<?= ($row->id) ?>')" <?php if($ok=="1") { ?><?php } else {?>style="display:none"<?php } ?>>
								<i class="ace-icon fa fa-check bigger-110"></i>
								Stop Live (<?= base64_decode($row->category) ?>)
							</button>
                        </td>
						<td class="text-right">
							<div class="btn-group">
								<a href="<?= base_url()?>admin/manage_category/edit/<?= $row->id; ?>" class="btn-white btn btn-xs">Edit
								</a>
								<a href="<?= base_url()?>admin/manage_category/settime/<?= $row->id; ?>" class="btn-white btn btn-xs">Set Time
								</a>
								<a href="<?= base_url()?>admin/manage_category/livesetting/<?= $row->id; ?>" class="btn-white btn btn-xs">Live Setting
								</a>
								<?php /*if($count==0 && $count1==0) { ?>
								<a href="javascript:void(0)" onclick="delete_rec('<?= $row->id; ?>')" class="btn-white btn btn-xs">Delete</i> </a>
								<?php } */?>
							</div>
                        </td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
var delete_rec1 = 0;
function delete_rec(id)
{
	if (confirm('Are you sure Delete?')) { 
	if(delete_rec1==0)
	{
		delete_rec1 = 1;
		$.ajax({
			type       : "POST",
			data       :  { id : id ,} ,
			url        : "<?= base_url()?>admin/<?= $Page_name; ?>/delete_rec",
			success    : function(data){
					if(data!="")
					{
						java_alert_function("success","Delete Successfully");
						$("#row_"+id).hide("500");
					}					
					else
					{
						java_alert_function("error","Something Wrong")
					}
					delete_rec1 = 0;
				}
			});
		}
	}
}
</script>