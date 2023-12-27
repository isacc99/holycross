<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<?php 
	$qry = $conn->query("SELECT * from contacts ");
	while($row = $qry->fetch_assoc()){
		$meta[$row['meta_field']] = $row['meta_value'];
	}
?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<h5 class="card-title">Contact Details</h5>
		</div>
		<div class="card-body">
			<form id="contact">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="" class="control-label">Contact #</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="fa fa-phone"></i></span>
			                    </div>
			                    <input type="text" name="mobile" class="form-control" value="<?php echo isset($meta['mobile']) ? $meta['mobile'] : '' ?>">
		                	</div>
						</div>

						<div class="form-group">
							<label for="" class="control-label">Email</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="fa fa-envelope"></i></span>
			                    </div>
			                    <input type="text" class="form-control" name="email" value="<?php echo isset($meta['email']) ? $meta['email'] : '' ?>">
		                	</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Facebook Page</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="fab fa-facebook"></i></span>
			                    </div>
			                    <input type="text" class="form-control" name="facebook" value="<?php echo isset($meta['facebook']) ? $meta['facebook'] : '' ?>">
		                	</div>
						</div>
						
						<div class="form-group">
							<label for="" class="control-label">Youtube Channel</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="fab fa-youtube"></i></span>
			                    </div>
			                    <input type="text" class="form-control" name="youtube" value="<?php echo isset($meta['youtube']) ? $meta['youtube'] : '' ?>">
		                	</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Google Map Location</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="fa fa-map"></i></span>
			                    </div>
			                    <input type="text" class="form-control" name="gmap" value="<?php echo isset($meta['gmap']) ? $meta['gmap'] : '' ?>">
		                	</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Instagram Page</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="fab fa-instagram"></i></span>
			                    </div>
			                    <input type="text" class="form-control" name="instagram" value="<?php echo isset($meta['instagram']) ? $meta['instagram'] : '' ?>">
		                	</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Year (For Calender)</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="far fa-calendar"></i></span>
			                    </div>
			                    <input type="text" class="form-control" name="year" value="<?php echo isset($meta['year']) ? $meta['year'] : '' ?>">
		                	</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label">Physical Address</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
			                    </div>
			                    <input type="text" class="form-control" id="address" name="address" value="<?php echo isset($meta['address']) ? $meta['address'] : '' ?>">
		                	</div>
						</div>
					</div>
				</div>
				
					
				
				
			</form>
		</div>
		<div class="card-footer">
			<button class="btn btn-primary btn-sm" form="contact">Save</button>
		</div>
	</div>
</div>

<script>

	$(document).ready(function(){
		$('.select')
		$('#contact').submit(function(e){
			e.preventDefault();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Content.php?f=contact",
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
							location.href=_base_url_+"admin/?page=contact";
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