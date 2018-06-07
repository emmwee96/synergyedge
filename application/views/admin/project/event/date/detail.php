<section class="content-header">
	<h1>
		<?= $project_event_date['event']?>'s Date
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Project">
				<i class="fa fa-users"></i> Project</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Project/detail/<?= $project_event_date['project_id'] ?>">
				<?= $project_event_date['project'] ?>
			</a>
        </li>
        <li>
			<a href="<?= base_url() ?>Project_event/detail/<?= $project_event_date['project_event_id'] ?>">
				<?= $project_event_date['event'] ?>
			</a>
		</li>
        <li>
			<a href="<?= base_url() ?>Project_event_date/detail/<?= $project_event_date['project_event_date_id'] ?>">
				<?= $project_event_date['event']?>'s Date
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
					<?= $project_event_date['event'] ?>'s Date
				</h3>
				<a href="<?php echo site_url('project_event_date/edit') . '/' . $project_event_date['project_event_date_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body box-limit">
				<table class="formTable">
					<tr>
						<th>Date From</th>
						<td>:
							<?= date("d-m-Y", strtotime($project_event_date["date_from"])) ?>
						</td>
					</tr>
					<tr>
						<th>Date From</th>
						<td>:
							<?= date("d-m-Y", strtotime($project_event_date["date_to"])) ?>
						</td>
					</tr>
				</table>
				<br/>
				<label>Description</label>
				<p class="pre-wrap"><?= $project_event_date["description"] ?></p>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
