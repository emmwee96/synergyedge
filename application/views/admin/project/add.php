<section class="content-header">
	<h1>
		Add project
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Project/all">
				<i class="fa fa-users"></i> Project</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Project/add"> Add project</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Project</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="POST" action="<?= base_url()?>project/add">
			<div class="box-body">
				<div class="form-group">
					<label for="projectName">Name</label>
					<input type="text" class="form-control" id="projectName" placeholder="Name" name="name" required>
				</div>
				<div class="form-group">
					<label for="projectDescription">Description</label>
					<textarea class="form-control" id="projectDescription" placeholder="Description" name="description" required rows="5"></textarea>
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
