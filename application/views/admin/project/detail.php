<section class="content-header">
	<h1>
		<?= $project['name'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Project">
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
	<div class="row">
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
						<tr>
							<th>Start Date</th>
							<td>:
								<?= $project["start_date"] ?>
							</td>
						</tr>
						<tr>
							<th>End Date</th>
							<td>:
								<?= $project["end_date"] ?>
							</td>
						</tr>
						<tr>
							<th>PIC</th>
							<td>:
								<?= $project["pic"] ?>
							</td>
						</tr>
						<tr>
							<th>Supervisor</th>
							<td>:
								<?= $project["supervisor"] ?>
							</td>
						</tr>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		<div class="col-md-6 col-xs-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">
						Events
					</h3>
					<a href="<?php echo site_url('project_event/add') . '/' . $project['project_id'] ?>" class='btn btn-default pull-right'>
						<i class='fa fa-plus'></i> add</a>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div class="box-body box-limit">
					<table id="data-table" class="table table-bordered table-hover data-table">
						<thead>
							<tr>
								<th>No.</th>
								<th>Name</th>
								<th>PIC</th>
								<th>Created Date</th>
								<th></th>
							</tr>
						</thead>
						<tbody>
							<?php
								$i = 1;
								foreach($events as $row){
									?>
								<tr>
									<td>
										<a href="<?= base_url() ?>project_event/detail/<?= $row['project_event_id']?>">
											<?= $i ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>project_event/detail/<?= $row['project_event_id']?>">
											<?= $row['name'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>project_event/detail/<?= $row['project_event_id']?>">
											<?= $row['pic'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>project_event/detail/<?= $row['project_event_id']?>">
											<?= $row['created_date'] ?>
										</a>
									</td>
									<td>
										<a href="<?= base_url() ?>project_event/delete/<?= $row['project_event_id']?>" class="btn btn-danger delete-button">Delete</a>
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
								<th>Name</th>
								<th>PIC</th>
								<th>Created Date</th>
								<th></th>
							</tr>
						</tfoot>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		<div class="col-md-12 col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">
						<?= $project['name'] ?>'s Locations
					</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div class="box-body box-limit">
					<table class="table table-bordered">
						<tr>
							<th>Location</th>
							<?php
								foreach($checklist as $checklist_row){
									?>
										<th><?= $checklist_row['checklist'] ?></th>
									<?php
								}
							?>
						</tr>
						<?php
							foreach($project_outlet as $row){
								?>
									<tr>
										<td><?= $row['outlet'] ?></td>
										<?php
											foreach($checklist as $checklist_row){
												?>
													<td><?= $row[$checklist_row['checklist']] ?></td>
												<?php
											}
										?>
									</tr>
								<?php
							}
						?>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		<div class="col-md-12 col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">
						<?= $project['name'] ?>'s Location Items
					</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div class="box-body box-limit">
					<table class="table table-bordered">
						<tr>
							<th>Location</th>
							<th>Item</th>
							<th>Stock</th>
						</tr>
						<?php
							foreach($project_outlet_item as $row){
								?>
									<tr>
										<td><?= $row['outlet'] ?></td>
										<td><?= $row['item'] ?></td>
										<td><?= $row['amount'] ?></td>
									</tr>
								<?php
							}
						?>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</section>
