<section class="content-header">
	<h1>
		Add item
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Item">
				<i class="fa fa-users"></i> Item</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Item/add"> Add item</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Item</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="POST" action="<?= base_url()?>item/add">
			<div class="box-body">
				<div class="form-group">
					<label for="itemItem">Item</label>
					<input type="text" class="form-control" id="itemItem" placeholder="Item" name="item" required>
				</div>
				<div class="form-group">
					<label for="itemPrice">Price</label>
					<input type="number" class="form-control" id="itemPrice" placeholder="Price" name="price" required>
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
