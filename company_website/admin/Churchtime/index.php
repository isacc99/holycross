<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<?php 
	$qry = $conn->query("SELECT * from churchtime ");
	while($row = $qry->fetch_assoc()){
		$meta[$row['meta_field']] = $row['meta_value'];
	}
?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<h5 class="card-title">Church Service Schedule</h5>
		</div>
		<div class="card-body">
			<form id="churchtime">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="" class="control-label">heading</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="fa fa-flag"></i></span>
			                    </div>
			                    <input type="text" name="heading" class="form-control" value="<?php echo isset($meta['heading']) ? $meta['heading'] : '' ?>">
		                	</div>
						</div>

						<div class="form-group">
							<label for="" class="control-label">message_line_1</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="fa fa-envelope"></i></span>
			                    </div>
			                    <input type="text" class="form-control" name="message_line_1" value="<?php echo isset($meta['message_line_1']) ? $meta['message_line_1'] : '' ?>">
		                	</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label">message_line_2</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="fa fa-envelope"></i></span>
			                    </div>
			                    <input type="text" class="form-control" name="message_line_2" value="<?php echo isset($meta['message_line_2']) ? $meta['message_line_2'] : '' ?>">
		                	</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label">message_line_3</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="fa fa-envelope"></i></span>
			                    </div>
			                    <input type="text" class="form-control" name="message_line_3" value="<?php echo isset($meta['message_line_3']) ? $meta['message_line_3'] : '' ?>">
		                	</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Sunday_Service</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="fa fa-clock"></i></span>
			                    </div>
			                    <input type="text" class="form-control" name="Sunday_Service" value="<?php echo isset($meta['Sunday_Service']) ? $meta['Sunday_Service'] : '' ?>">
		                	</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Sunday_School</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="fa fa-clock"></i></span>
			                    </div>
			                    <input type="text" class="form-control" name="Sunday_School" value="<?php echo isset($meta['Sunday_School']) ? $meta['Sunday_School'] : '' ?>">
		                	</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Communion</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="fa fa-clock"></i></span>
			                    </div>
			                    <input type="text" class="form-control" name="Communion" value="<?php echo isset($meta['Communion']) ? $meta['Communion'] : '' ?>">
		                	</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Praise_&_worship</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="fa fa-clock"></i></span>
			                    </div>
			                    <input type="text" class="form-control" name="Praise_&_worship" value="<?php echo isset($meta['Praise_&_worship']) ? $meta['Praise_&_worship'] : '' ?>">
		                	</div>
						</div>
					</div>
				</div>
				
			</form>
		</div>
		<div class="card-footer">
			<button class="btn btn-primary btn-sm" form="churchtime">Save</button>
		</div>
	</div>
</div>

<script>

	$(document).ready(function(){
		$('.select')
		$('#churchtime').submit(function(e){
			e.preventDefault();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Content.php?f=churchtime",
				method:"POST",
				data:$(this).serialize(),
				error: err=>{
					alert_toast("An error occured",'error')
					console.log(err);
				},
				success:function(resp){
					if(resp != undefined){
						resp = JSON.parse(resp)
						if(resp.status == 'success'){
							location.href=_base_url_+"admin/?page=churchtime";
						}else{
							alert_toast("An error occured",'error')
							console.log(resp);
							end_loader();
						}
					}
				}
			})
		})
		$('.summernote').summernote({
		        height: 200,
		        toolbar: [
		            [ 'style', [ 'style' ] ],
		            [ 'font', [ 'bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear'] ],
		            [ 'fontname', [ 'fontname' ] ],
		            [ 'fontsize', [ 'fontsize' ] ],
		            [ 'color', [ 'color' ] ],
		            [ 'para', [ 'ol', 'ul', 'paragraph', 'height' ] ],
		            [ 'table', [ 'table' ] ],
		            [ 'view', [ 'undo', 'redo', 'fullscreen', 'codeview', 'help' ] ]
		        ]
		    })
	})
	
</script>