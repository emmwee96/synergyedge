<section class="content-header">
	<h1>
		Edit outlet
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Outlet">
				<i class="fa fa-users"></i> Outlet</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Outlet/edit/<?= $outlet['outlet_id'] ?>"> Edit outlet</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Outlet</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="POST" action="<?= base_url() ?>outlet/edit/<?= $outlet['outlet_id']?>">
			<div class="box-body">
				<div class="form-group">
					<label for="outletOutlet">Outlet</label>
					<input type="text" class="form-control" id="outletOutlet" placeholder="Outlet" name="outlet" required value="<?= $outlet['outlet'] ?>">
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
