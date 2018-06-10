<section class="content-header">
	<h1>
		Add project event date
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Project">
				<i class="fa fa-users"></i> Project event</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Project/detail/<?= $project_event["project_id"] ?>"> <?= $project_event["project"] ?></a>
		</li>
		<li>
			<a href="<?= base_url() ?>Project_event/detail/<?= $project_event["project_event_id"] ?>"> <?= $project_event["name"] ?></a>
		</li>
		<li>
			<a href="<?= base_url() ?>Project_event_date/add/<?= $project_event["project_event_id"] ?>"> Add project event date</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Project event date</h3>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<?php
			if(!empty($error)){
				?>
					<br/>
					<div class='alert alert-danger alert-dismissable' style="margin-left:10%;margin-right:10%;">
                        <?= $error; ?>
                    </div>
				<?php
			}
		?>
		<form role="form" method="POST" action="<?= base_url() ?>project_event_date/add/<?= $project_event["project_event_id"] ?>">
			<div class="box-body">
				<div class="form-group">
					<label for="projectDateFrom">Event Date From</label>
					<input type="text" class="form-control datepicker" id="projectDateFrom" placeholder="Event Date From" name="date_from" required>
                </div>
                <div class="form-group">
					<label for="projectDateTo">Event Date To</label>
					<input type="text" class="form-control datepicker" id="projectDateTo" placeholder="Event Date To" name="date_to" required>
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
