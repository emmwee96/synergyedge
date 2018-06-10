<section class="content-header">
	<h1>
		<?= $outlet['outlet'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Outlet">
				<i class="fa fa-users"></i> Outlet</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Outlet/detail/<?= $outlet['outlet_id'] ?>">
				<?= $outlet['outlet'] ?>
			</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="col-md-6 col-xs-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">
					<?= $outlet['outlet'] ?>
				</h3>
				<a href="<?php echo site_url('outlet/edit') . '/' . $outlet['outlet_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Outlet</th>
						<td>:
							<?= $outlet["outlet"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
