<section class="content-header">
	<h1>
		<?= $project_event['name'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Project">
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
					<tr>
						<th>Outlet</th>
						<td>:
							<?= $project_event["outlet"] ?>
						</td>
					</tr>
				</table>
				<br/>
				<label>Description</label>
				<p class="pre-wrap"><?= $project_event["description"] ?></p>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
	<div class="col-md-6 col-xs-12">
		<div class="box box-info">
			<div class="box-header with-border">
				<h3 class="box-title">
					Event Dates
				</h3>
				<a href="<?php echo site_url('project_event_date/add') . '/' . $project_event['project_event_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-plus'></i> add</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body box-limit">
				<table id="data-table" class="table table-bordered table-hover data-table">
					<thead>
						<tr>
							<th>No.</th>
							<th>Date Start</th>
							<th>Date End</th>
							<th>Created Date</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
					$i = 1;
					foreach ($dates as $row) {
						?>
							<tr>
								<td>
									<a href="<?= base_url() ?>project_event_date/detail/<?= $row['project_event_date_id'] ?>">
										<?= $i ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>project_event_date/detail/<?= $row['project_event_date_id'] ?>">
										<?= date("d-m-Y", strtotime($row['date_from'])) ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>project_event_date/detail/<?= $row['project_event_date_id'] ?>">
									<?= date("d-m-Y", strtotime($row['date_to'])) ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>project_event_date/detail/<?= $row['project_event_date_id'] ?>">
										<?= $row['created_date'] ?>
									</a>
								</td>
								<td>
									<a href="<?= base_url() ?>project_event_date/delete/<?= $row['project_event_date_id'] ?>" class="btn btn-danger delete-button">Delete</a>
								</td>
							</tr>
							<?php
						$i++;
					}
					?>
					</tbody>
					<tfoot>
						<tr>
							<th>No.</th>
							<th>Date Start</th>
							<th>Date End</th>
							<th>Created Date</th>
							<th></th>
						</tr>
					</tfoot>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
