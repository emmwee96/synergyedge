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
				<?= $project_outlet['customer_name']. '  '.$project_outlet['outlet']; ?>
			</a>
		</li>
	</ol>
</section>
<br>
<form method="POST" enctype="multipart/form-data">
	<section class="content">
		<div class="row">
			<div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">
							New Report
						</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<div class="box-body box-limit">
						<table class="formTable">
							<tr>
								<th>Report Date</th>
								<td>
									<input type="text" placeholder="Give enter a date for this report" class="datepicker form-control" style="width:30%" name="date"
									required autocomplete="off">
								</td>
							</tr>
							<tr>
								<th>Report Title</th>
								<td>
									<input type="text" placeholder="Give this report a title" class="form-control" name="title" required>
								</td>
							</tr>
							<tr>
								<th>Report</th>
								<td>
									<textarea rows="10" class="form-control" required name="report"></textarea>
								</td>
							</tr>

						</table>
					</div>
					<!-- /.box-body -->
				</div>
			</div>

			<div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">
							Sales
						</h3>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<div class="box-body box-limit">
						<table class="formTable table table-border table-stripe table-hover">
							<tr>
								<th>Item</th>
								<th style="width:10%">12pm - 3pm</th>
								<th style="width:10%">3pm - 5pm </th>
								<th style="width:10%"> 6pm - 9pm </th>
								<th style="width:10%">Total</th>
							</tr>
							<?php foreach($project_outlet_item as $row){ ?>
							<tr>
								<td>
									<?= $row['item']; ?>
								</td>
								<td>
									<input type="number" class="form-control item_input item_<?= $row['item_id']; ?>" value="0" data-id="<?= $row['item_id']; ?>"
									min=0 name="item_<?= $row['item_id']; ?>_12_3">
								</td>
								<td>
									<input type="number" class="form-control item_input item_<?= $row['item_id']; ?>" value="0" data-id="<?= $row['item_id']; ?>"
									min=0 name="item_<?= $row['item_id']; ?>_3_5">
								</td>
								<td>
									<input type="number" class="form-control item_input item_<?= $row['item_id']; ?>" value="0" data-id="<?= $row['item_id']; ?>"
									min=0 name="item_<?= $row['item_id']; ?>_6_9">
								</td>
								<td>
									<input type="number" disabled class="form-control item_<?= $row['item_id']; ?>_total" min=0 name="item_<?= $row['item_id']; ?>_total">
								</td>
							</tr>
							<tr>
								<td colspan="5">
									<textarea class="form-control" placeholder="feedback" name="item_<?= $row['item_id']; ?>_feedback"></textarea>
								</td>
							</tr>
							<?php } ?>
						</table>

					</div>
					<!-- /.box-body -->
				</div>
			</div>

			<div class="col-md-12 col-xs-12">
				<div class="box box-primary">
					<div class="box-header with-border">
						<h3 class="box-title">
							Images
						</h3>
						<p>Add images to support your report!</p>
					</div>
					<!-- /.box-header -->
					<!-- form start -->
					<div class="box-body box-limit">
						<input type='file' class="form-control" id="images" name="report_images[]" multiple>
						<hr>
						<button type="submit" name="status" value="publish" class="btn btn-info pull-right" style="margin-left:10px;">
							Publish Report
						</button>
						&nbsp;&nbsp;
						<button type="submit" class="btn btn-default pull-right" name="status" value="save" value="draft">
							Save Draft
						</button>

					</div>
					<!-- /.box-body -->
				</div>
			</div>
		</div>
		</div>
	</section>
</form>
<script>
	$(document).ready(function () {
		$(".item_input").change(function () {
			var itemId = $(this).data('id');
			var total = 0;
			$(".item_" + itemId).each(function () {
				total += parseInt($(this).val());
			});

			$(".item_" + itemId + "_total").val(total);
		});

	});
</script>