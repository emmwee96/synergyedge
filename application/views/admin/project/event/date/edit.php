<section class="content-header">
	<h1>
		Edit project event date
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Project">
				<i class="fa fa-users"></i> Project event</a>
		</li>
		<li>
			<a href="<?= base_url() ?>project/detail/<?= $project_event_date['project_id'] ?>">
				<?= $project_event_date['project'] ?>
			</a>
        </li>
        <li>
			<a href="<?= base_url() ?>project_event/detail/<?= $project_event_date['project_event_id'] ?>">
				<?= $project_event_date['event'] ?>
			</a>
		</li>
		<li>
			<a href="<?= base_url() ?>project_event_date/edit/<?= $project_event_date['project_event_date_id'] ?>"> Edit project event</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Project Event</h3>
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
		<form role="form" method="POST" action="<?= base_url() ?>project_event_date/edit/<?= $project_event_date['project_event_date_id']?>">
			<div class="box-body">
				<div class="form-group">
					<label for="eventDateFrom">Event Date From</label>
					<input type="text" class="form-control datepicker" id="eventDateFrom" placeholder="Event Date From" name="date_from" required value="<?= date("d-m-Y", strtotime($project_event_date['date_from'])) ?>">
                </div>
                <div class="form-group">
					<label for="eventDateTo">Event Date To</label>
					<input type="text" class="form-control datepicker" id="eventDateTo" placeholder="Event Date To" name="date_to" required value="<?= date("d-m-Y", strtotime($project_event_date['date_to'])) ?>">
                </div>
                <div class="form-group">
					<label for="projectDescription">Description</label>
					<textarea class="form-control" id="projectDescription" placeholder="Description" name="description" required rows="5"><?= $project_event_date['description'] ?></textarea>
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
