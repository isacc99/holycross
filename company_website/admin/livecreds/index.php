<?php if($_settings->chk_flashdata('success')): ?>
<script>
	alert_toast("<?php echo $_settings->flashdata('success') ?>",'success')
</script>
<?php endif;?>
<?php 
	$qry = $conn->query("SELECT * from livecreds ");
	while($row = $qry->fetch_assoc()){
		$meta[$row['meta_field']] = $row['meta_value'];
	}
?>
<div class="col-lg-12">
	<div class="card card-outline card-primary">
		<div class="card-header">
			<h5 class="card-title">Youtube Live Cred</h5>
		</div>
		<div class="card-body">
			<form id="livecreds">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label for="" class="control-label">Heading</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="fa fa-flag"></i></span>
			                    </div>
			                    <input type="text" name="heading" class="form-control" value="<?php echo isset($meta['heading']) ? $meta['heading'] : '' ?>">
		                	</div>
						</div>
						<div class="form-group">
							<label for="" class="control-label">YouTube Link</label>
							<div class="input-group">
			                    <div class="input-group-prepend">
			                      <span class="input-group-text"><i class="fab fa-youtube"></i></span>
			                    </div>
			                    <input type="text" name="youtube" class="form-control" value="<?php echo isset($meta['youtube']) ? $meta['youtube'] : '' ?>">
		                	</div>
						</div>

						
					</div>
				</div>
				
			</form>
		</div>
		<div class="card-footer">
			<button class="btn btn-primary btn-sm" form="livecreds">Save</button>
		</div>
	</div>
</div>

<script>

	$(document).ready(function(){
		$('.select')
		$('#livecreds').submit(function(e){
			e.preventDefault();
			start_loader();
			$.ajax({
				url:_base_url_+"classes/Content.php?f=livecreds",
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
							location.href=_base_url_+"admin/?page=livecreds";
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