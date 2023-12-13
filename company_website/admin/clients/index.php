<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<style>
	.banner-img{
		width: 75px;
		object-fit:contain;
	}
</style>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_calender" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
			</div>
		</div>
		<div class="card-body">
			<table class="table tabe-hover table-bordered table-compact" id="list">
				<colgroup>
					<col width="10%">
					<col width="20%">
					<col width="25%">
					<col width="25%">
					<col width="15%">
				</colgroup>
				<thead>
					<tr>
						<th class="text-center">Sl_no</th>
						<th>Date</th>
						<th>Event Name</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM `calender` order by date asc ");
					while($row= $qry->fetch_assoc()):
						$row['event_name'] = strip_tags(stripcslashes(html_entity_decode($row['event_name'])));
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td>
						<b class=""><?php echo ucwords($row['date']) ?></b></td>
						</td>
						<td><b class=""><?php echo ucwords($row['event_name']) ?></b></td>
						<td><small class="truncate"><?php echo $row['weekday'] ?></small></td>
						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="javascript:void(0)" data-id='<?php echo $row['Sl_no'] ?>' class="btn btn-primary btn-flat btn-sm manage_client">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-sm btn-flat delete_client" data-id="<?php echo $row['Sl_no'] ?>">
		                          <i class="fas fa-trash"></i>
		                        </button>
	                      </div>
						</td>
					</tr>	
				<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
<script>

	$(document).ready(function(){
		$('.new_calender').click(function(){
			location.href = _base_url_+"admin/?page=calender/manage";
		})
		$('.manage_calender').click(function(){
			location.href = _base_url_+"admin/?page=calender/manage&id="+$(this).attr('data-id')
		})
		$('.delete_calender').click(function(){
		_conf("Are you sure to delete this Event detail?","delete_calander",[$(this).attr('data-id')])
		})
		$('#list').dataTable()
	})
	function delete_client($id){
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Content.php?f=calender_delete',
			method:'POST',
			data:{id:$id},
			dataType:'json',
			success:function(resp){
				if(resp.status == 'success'){
					location.reload()
				}else{
					alert_toast(resp.err_msg,'error')
				}
				end_loader();
			}
		})
	}
</script>