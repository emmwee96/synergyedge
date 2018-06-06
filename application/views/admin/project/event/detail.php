<section class="content-header">
	<h1>
		<?= $project_event['name'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Project/all">
				<i class="fa fa-users"></i> Project</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Project/detail/<?= $project_event['project_id'] ?>">
				<?= $project_event['project'] ?>
			</a>
        </li>
        <li>
			<a href="<?= base_url() ?>Project_event/detail/<?= $project_event['project_event_id'] ?>">
				<?= $project_event['name'] ?>
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
					<?= $project_event['name'] ?>
				</h3>
				<a href="<?php echo site_url('project_event/edit') . '/' . $project_event['project_event_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body box-limit">
				<table class="formTable">
					<tr>
						<th>Name</th>
						<td>:
							<?= $project_event["name"] ?>
						</td>
					</tr>
				</table>
				<br/>
				<label>Address</label>
				<p class="pre-wrap"><?= $project_event["address"] ?></p>
				<br/>
				<label>Description</label>
				<p class="pre-wrap"><?= $project_event["description"] ?></p>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
