<section class="content-header">
	<h1>
		Add project event
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Project">
				<i class="fa fa-users"></i> Project event</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Project/detail/<?= $project["project_id"]?>"> <?= $project["name"]?></a>
		</li>
		<li>
			<a href="<?= base_url() ?>Project/add"> Add project event</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Project event</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="POST" action="<?= base_url()?>project_event/add/<?= $project["project_id"]?>">
			<div class="box-body">
				<div class="form-group">
					<label for="projectName">Name</label>
					<input type="text" class="form-control" id="projectName" placeholder="Name" name="name" required>
                </div>
                <div class="form-group">
					<label for="projectAddress">Address</label>
					<textarea class="form-control" id="projectAddress" placeholder="Address" name="address" required rows="3"></textarea>
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
