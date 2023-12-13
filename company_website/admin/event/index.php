<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_event" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
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
						<th class="text-center">#</th>
						<th>Event</th>
						<th>Date</th>
						<th>Time</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM `calender` order by `date` asc");
					while($row= $qry->fetch_assoc()):
						$desc = html_entity_decode($row['event_name']);
						$dest = strip_tags($desc);
						$dest =stripslashes($desc);
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td><b><?php echo ucwords($row['event_name']) ?></b></td>
						<td><b><?php echo ucwords($row['date']) ?></b></td>
						<td><b><?php echo ucwords($row['time']) ?></b></td>
						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' class="btn btn-primary btn-flat btn-sm manage_event">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-sm btn-flat delete_event" data-id="<?php echo $row['id'] ?>">
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
		$('.new_event').click(function(){
			location.href = _base_url_+"admin/?page=event/manage";
		})
		$('.manage_event').click(function(){
			location.href = _base_url_+"admin/?page=event/manage&id="+$(this).attr('data-id')
		})
		$('.delete_event').click(function(){
		_conf("Are you sure to delete this event?","delete_event",[$(this).attr('data-id')])
		})
		$('#list').dataTable()
	})
	function delete_event($id){
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Content.php?f=event_delete',
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