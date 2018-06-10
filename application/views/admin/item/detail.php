<section class="content-header">
	<h1>
		<?= $item['item'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Item">
				<i class="fa fa-users"></i> Item</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Item/detail/<?= $item['item_id'] ?>">
				<?= $item['item'] ?>
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
					<?= $item['item'] ?>
				</h3>
				<a href="<?php echo site_url('item/edit') . '/' . $item['item_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Item</th>
						<td>:
							<?= $item["item"] ?>
						</td>
					</tr>
					<tr>
						<th>Price</th>
						<td>:
							RM<?= $item["price"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
