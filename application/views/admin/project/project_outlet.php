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
		<li>
			<a href="<?= base_url() ?>Project/project_outlet/<?= $project['project_id'] ?>/<?= $project_outlet['outlet_id']; ?>">
				<?= $project_outlet['customer_name'] . '  ' . $project_outlet['outlet']; ?>
			</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="row">
		<div class="col-md-4 col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">
						<?= $project['name'] ?>
					</h3>

				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div class="box-body box-limit">
					<table class="formTable">
						<tr>
							<th>Customer Name</th>
							<td>:
								<?= $project_outlet["customer_name"] ?>
							</td>
						</tr>
						<tr>
							<th>Outlet</th>
							<td>:
								<?= $project_outlet["outlet"] ?>
							</td>
						</tr>
						<tr>
							<th>Address</th>
							<td>:
								<?= $project_outlet["address_1"] ?>
							</td>
						</tr>

					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>

		<div class="col-md-8 col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">
						Reports
					</h3>
					<a class="btn btn-info pull-right" href="<?= site_url('project/add_report/' . $project['project_id'] . '/' . $project_outlet['project_outlet_id']); ?>">Add Report</a>
					<table class="table table-hover table-stripe">
						<thead>
							<tr>
								<th style="width:20%">Date</a>
								</th>
								<th>Description</th>
								<th>12pm - 3pm</th>
								<th>3pm - 5pm</th>
								<th>6pm - 9pm</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
						foreach ($project_report as $row) {
							?>
								<tr class="row_highlight">
									<td>
										<a class="view_report_details" data-id="<?= $row['project_report_id'] ?>">
											<?= date('d/m/Y', strtotime($row['date'])) ?>
										</a>
									</td>
									<td>
										<a class="view_report_details" data-id="<?= $row['project_report_id'] ?>">
											<?= $row['title'] ?>
										</a>
									</td>
									<td>
										<a class="view_report_details" data-id="<?= $row['project_report_id'] ?>">
											<?= $row['time_12_3'] ?>
										</a>
									</td>
									<td>
										<a class="view_report_details" data-id="<?= $row['project_report_id'] ?>">
											<?= $row['time_3_5'] ?>
										</a>
									</td>
									<td>
										<a class="view_report_details" data-id="<?= $row['project_report_id'] ?>">
											<?= $row['time_6_9'] ?>
										</a>
									</td>
									<td>
										<a class="view_report_details" data-id="<?= $row['project_report_id'] ?>">
											<?= $row['total'] ?>
										</a>
									</td>
								</tr>
								<?php
									foreach ($row['items'] as $item_row) {
										?>
									<tr>
										<td></td>
										<td>
											<a class="view_report_details" data-id="<?= $row['project_report_id'] ?>">
												<?= $item_row['item'] ?>
											</a>
										</td>
										<td>
											<a class="view_report_details" data-id="<?= $row['project_report_id'] ?>">
												<?= $item_row['time_12_3'] ?>
											</a>
										</td>
										<td>
											<a class="view_report_details" data-id="<?= $row['project_report_id'] ?>">
												<?= $item_row['time_3_5'] ?>
											</a>
										</td>
										<td>
											<a class="view_report_details" data-id="<?= $row['project_report_id'] ?>">
												<?= $item_row['time_6_9'] ?>
											</a>
										</td>
										<td>
											<a class="view_report_details" data-id="<?= $row['project_report_id'] ?>">
												<?= $item_row['total'] ?>
											</a>
										</td>
									</tr>
									<?php

										}
										?>
									<?php

							}
							?>
						</tbody>
					</table>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div class="box-body box-limit">
					<table class="table table-bordered">

					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>

	</div>
</section>
<!-- Modal -->
<div class="modal fade" id="project_report_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Project Report</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" id="refresh_content">
				...
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).on('click', '.view_report_details', function(e){
		var project_report_id = $(this).data('id');

		postParam = {
			project_report_id: project_report_id
		};

		$.post("<?= base_url() ?>ajax/loadProjectReportContent", postParam, function( data ) {
  			$("#refresh_content").html(data);
			$('#project_report_modal').modal('show')
		});
	});
</script>