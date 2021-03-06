<title>Siimanto | Pulsa</title>
<div class="container" style="min-height:550px">
<?php
$no = 0;
?>
	<br/>
	<div>
	<h2 class="text-center">Pulsa List </h2>
		<ul class="list-unstyled list-inline">
			<li class="btn-group pull-right">
					<a href="<?php echo base_url().'provider/add' ?>"><button class="btn btn-info glyphicon glyphicon-plus" data-toggle="tooltip" data-placement="bottom" title="Add provider"></button></a>
			</li>
			<li class="btn-group pull-right">
				<a href="<?php echo base_url().'pulsa/add' ?>"><button class="btn btn-success glyphicon glyphicon-plus-sign" data-toggle="tooltip" data-placement="bottom" title="Add produk"></button></a>
			</li>
		</ul>
	</div>

	<br/><br/><br/>
	<!--Body Pulsa-->
	<div class="row">
	<?php foreach ($providers as $provider) { ?>
		<div id="" class="col-xs-11 col-sm-6 col-md-4">
			<div class="thumbnail" data-spy="scroll">
				<div class="caption">
					<div class="text-center form-group">
						<a data-toggle="tooltip" data-placement="top" title="Edit provider" class="pull-right btn" href="<?php echo base_url().'provider/edit/'.$provider->opr_id ?>"><span class="glyphicon glyphicon-cog"></span></a>
						<h4 class=""> <?php echo $provider->opr_nama ?> </h4>
					</div>
				</div>
				<div class="caption thumbnail-content">
					<ul class="list-group">
					<?php
						foreach ($produk_detail[$no] as $produk) {
					?>
						<li class="list-group-item" style="min-height: 30px">
					 			<ul class="list-unstyled list-inline">
					 				<li>
					 					<?php echo $provider->opr_nama.' '.str_replace('000', '', $produk->produk_nom); ?>	
					 				</li>
					 				<li class="pull-right">
					 					<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete-<?php echo $produk->produk_kode ?>" data-backdrop="static" data-keyboard="false">
											<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
										</button>
					 				</li>
					 				<li class="pull-right">
					 					<a data-toggle="tooltip" data-placement="left" title="Edit produk" href="<?php echo base_url().'pulsa/edit/'.$produk->produk_id ?>" class="pull-right btn btn-warning glyphicon glyphicon-pencil"></a>
					 				</li>
					 			<br/>
					 			<br/>
					 			</ul>
					 		</li>
					 		<div class="modal fade" id="modal-delete-<?php echo $produk->produk_kode ?>" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
								<div class="modal-dialog modal-sm">
									<div class="modal-content">
										<div class="modal-body">
											Are you sure delete <?php echo $produk->produk_kode ?>?
										</div>
										<div class="modal-footer">
											<a href="<?php echo base_url().'pulsa/delete/'.$produk->produk_id ?>" class="btn btn-danger">Yes, Delete</a>
											<button class="btn btn-warning" data-dismiss="modal">Cancel</button>
										</div>
									</div>
									<div class="modal-footer">
									</div>
								</div>
							</div>
							<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	<?php $no++; } 
	?>
	</div>
	<?php echo $this->pagination->create_links(); ?>
	<br/><br/><br/>
</div>



<style type="text/css">
	.thumbnail-content{
		max-height : 200px; 
		min-height: 200px; 
		overflow-y:auto
	}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
	})
</script>