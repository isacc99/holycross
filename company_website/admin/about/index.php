<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
		<h2> Pastors in the past</h2>
			<div class="card-tools">
				
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_pp" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
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
						<th>Year</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM pastpastors ORDER BY year ASC");
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
						<td><b><?php echo ucwords($row['year']) ?></b></td>
						<td><small class="truncate"><?php echo $desc ?></small></td>

						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' class="btn btn-primary btn-flat btn-sm manage_pp">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-sm btn-flat delete_pp" data-id="<?php echo $row['id'] ?>">
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
		$('.new_pp').click(function(){
			location.href = _base_url_+"admin/?page=about/managepp";
		})
		$('.manage_pp').click(function(){
			location.href = _base_url_+"admin/?page=about/managepp&id="+$(this).attr('data-id')
		})
		$('.delete_pp').click(function(){
		_conf("Are you sure to delete this Member?","delete_pastpastors",[$(this).attr('data-id')])
		})
		$('#list').dataTable()
	})
	function delete_pastpastors($id){
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Content.php?f=pp_delete',
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
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
		<h2> History Write-up</h2>
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_about" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
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
						<th>Title</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM `about` order by `title` asc");
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
		                        <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' class="btn btn-primary btn-flat btn-sm manage_about">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-sm btn-flat delete_about" data-id="<?php echo $row['id'] ?>">
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
		$('.new_about').click(function(){
			location.href = _base_url_+"admin/?page=about/manage";
		})
		$('.manage_about').click(function(){
			location.href = _base_url_+"admin/?page=about/manage&id="+$(this).attr('data-id')
		})
		$('.delete_about').click(function(){
		_conf("Are you sure to delete this Member?","delete_about",[$(this).attr('data-id')])
		})
		$('#list').dataTable()
	})
	function delete_about($id){
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Content.php?f=about_delete',
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

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
		<h2> Golden Dates</h2>
			<div class="card-tools">
				
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_gdates" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
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
					
						<th>Title</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM `goldendates` order by `title` asc");
					while($row= $qry->fetch_assoc()):
						$desc = html_entity_decode($row['description']);
						$dest = strip_tags($desc);
						$dest =stripslashes($desc);
						
					?>
				
					<tr>
						<th class="text-center"><?php echo $i++ ?></th>
					<!--	<td class='text-center'>
							<img src="<?php echo validate_image($row['file_path']) ?>" alt="<?php echo ucwords($row['title']) ?> Image" width="150px" height="150px" style="object-fit:scale-down;object-position:center center" class="img-thumbnail">
						</td> -->
						<td><b><?php echo ucwords($row['title']) ?></b></td>
						<td><small class="truncate"><?php echo $desc ?></small></td>

						<td class="text-center">
		                    <div class="btn-group">
		                        <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' class="btn btn-primary btn-flat btn-sm manage_gdates">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-sm btn-flat delete_gdates" data-id="<?php echo $row['id'] ?>">
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
		$('.new_gdates').click(function(){
			location.href = _base_url_+"admin/?page=about/managegd";
		})
		$('.manage_gdates').click(function(){
			location.href = _base_url_+"admin/?page=about/managegd&id="+$(this).attr('data-id')
		})
		$('.delete_gdates').click(function(){
		_conf("Are you sure to delete this Member?","delete_gdates",[$(this).attr('data-id')])
		})
		$('#list').dataTable()
	})
	function delete_gdates($id){
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Content.php?f=gdates_delete',
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

<!---------------------------------------------------------------------->

<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
		<h2> Tribute to Founders</h2>
			<div class="card-tools">
				<a class="btn btn-block btn-sm btn-default btn-flat border-primary new_tribute" href="javascript:void(0)"><i class="fa fa-plus"></i> Add New</a>
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
						<th>Title</th>
						<th>Description</th>
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$i = 1;
					$qry = $conn->query("SELECT * FROM `tribute` order by `title` asc");
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
		                        <a href="javascript:void(0)" data-id='<?php echo $row['id'] ?>' class="btn btn-primary btn-flat btn-sm manage_tribute">
		                          <i class="fas fa-edit"></i>
		                        </a>
		                        <button type="button" class="btn btn-danger btn-sm btn-flat delete_tribute" data-id="<?php echo $row['id'] ?>">
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
		$('.new_tribute').click(function(){
			location.href = _base_url_+"admin/?page=about/managetf";
		})
		$('.manage_tribute').click(function(){
			location.href = _base_url_+"admin/?page=about/managetf&id="+$(this).attr('data-id')
		})
		$('.delete_tribute').click(function(){
		_conf("Are you sure to delete this Member?","delete_tribute",[$(this).attr('data-id')])
		})
		$('#list').dataTable()
	})
	function delete_tribute($id){
		start_loader()
		$.ajax({
			url:_base_url_+'classes/Content.php?f=tribute_delete',
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
