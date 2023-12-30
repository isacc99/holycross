<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_dp" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
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
						<th>Fellowship</th>
						<th>Page Link</th>
						<th>Fellowship Intro</th>
					
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM `dp` order by `title` asc");
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
						<td><?php echo ucwords($row['link_to_page']) ?></td>
						<td><?php echo ucwords($row['intro']) ?></td>
					
						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' class="btn btn-primary btn-flat btn-sm manage_dp">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-sm btn-flat delete_dp" data-id="<?php echo $row['id'] ?>">
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
		$('.new_dp').click(function(){
			location.href = _base_url_+"admin/?page=fellowship_displaypicture/manage";
		})
		$('.manage_dp').click(function(){
			location.href = _base_url_+"admin/?page=fellowship_displaypicture/manage&id="+$(this).attr('data-id')
		})
		$('.delete_dp').click(function(){
		_conf("Are you sure to delete this Flashcard?","delete_dp",[$(this).attr('data-id')])
		})
		$('#list').dataTable()
	})
	function delete_dp($id){
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Content.php?f=dp_delete',
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


<!------------------------------------------------------------------>






<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_leaders" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
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
						<th>Fellowship</th>
						<th>Message</th>
						
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM `leaders` order by `title` asc");
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
						<td><?php echo ucwords($row['title']) ?></td>
						<td><?php echo ucwords($row['fellowship']) ?></td>
						<td><small class="truncate"><?php echo $desc ?></small></td>
						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' class="btn btn-primary btn-flat btn-sm manage_leaders">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-sm btn-flat delete_leaders" data-id="<?php echo $row['id'] ?>">
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
		$('.new_leaders').click(function(){
			location.href = _base_url_+"admin/?page=fellowship_displaypicture/manageld";
		})
		$('.manage_leaders').click(function(){
			location.href = _base_url_+"admin/?page=fellowship_displaypicture/manageld&id="+$(this).attr('data-id')
		})
		$('.delete_leaders').click(function(){
		_conf("Are you sure to delete this Member?","delete_leaders",[$(this).attr('data-id')])
		})
		$('#list').dataTable()
	})
	function delete_leaders($id){
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Content.php?f=leaders_delete',
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