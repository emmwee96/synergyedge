<section class="content-header">
	<h1>
		<?= $project['name'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Project/all">
				<i class="fa fa-users"></i> Project</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Project/detail/<?= $project['project_id'] ?>">
				<?= $project['name'] ?>
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
					<?= $project['name'] ?>
				</h3>
				<a href="<?php echo site_url('project/edit') . '/' . $project['project_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body box-limit">
				<table class="formTable">
					<tr>
						<th>Name</th>
						<td>:
							<?= $project["name"] ?>
						</td>
					</tr>
				</table>
				<br/>
				<label>Description</label>
				<p class="pre-wrap"><?= $project["description"] ?></p>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
