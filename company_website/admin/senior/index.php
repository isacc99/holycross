<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_senior" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
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
						<th>Picture</th>
						<th>Name</th>
						<th>Designation</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM `senior` order by `title` asc");
					while($row= $qry->fetch_assoc()):
						$desc = html_entity_decode($row['description']);
						$dest = strip_tags($desc);
						$dest =stripslashes($desc);
					?>
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
						<td class='text-center'>
							<img src="<?php echo validate_image($row['file_path']) ?>" alt="<?php echo ucwords($row['title']) ?> Image" width="150px" height="150px" style="object-fit:scale-down;object-position:center center" class="img-thumbnail">
						</td>
						<td><b><?php echo ucwords($row['title']) ?></b></td>
						<td><small class="truncate"><?php echo $desc ?></small></td>
						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' class="btn btn-primary btn-flat btn-sm manage_senior">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-sm btn-flat delete_senior" data-id="<?php echo $row['id'] ?>">
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
		$('.new_senior').click(function(){
			location.href = _base_url_+"admin/?page=senior/manage";
		})
		$('.manage_senior').click(function(){
			location.href = _base_url_+"admin/?page=senior/manage&id="+$(this).attr('data-id')
		})
		$('.delete_senior').click(function(){
		_conf("Are you sure to delete this Member?","delete_senior",[$(this).attr('data-id')])
		})
		$('#list').dataTable()
	})
	function delete_senior($id){
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Content.php?f=senior_delete',
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


<!-------------------------------------------------------->

