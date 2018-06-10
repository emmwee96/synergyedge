<section class="content-header">
	<h1>
		Edit project event
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Project">
				<i class="fa fa-users"></i> Project event</a>
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
		<li>
			<a href="<?= base_url() ?>Project/edit/<?= $project_event['project_id'] ?>"> Edit project event</a>
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
		<form role="form" method="POST" action="<?= base_url() ?>project_event/edit/<?= $project_event['project_event_id']?>">
			<div class="box-body">
				<div class="form-group">
					<label for="projectName">Name</label>
					<input type="text" class="form-control" id="projectName" placeholder="Name" name="name" required value="<?= $project_event['name'] ?>">
                </div>
                <div class="form-group">
					<label for="projectAddress">Outlet</label>
					<select class="form-control" name="outlet_id">
						<?php
					foreach ($outlet as $row) {
						?>
									<option value="<?= $row['outlet_id'] ?>" <?php if ($row['outlet_id'] == $project_event['outlet_id']) echo "selected";?>><?= $row["outlet"] ?></option>
								<?php

						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="projectDescription">Description</label>
					<textarea class="form-control" id="projectDescription" placeholder="Description" name="description" required rows="5"><?= $project_event['description'] ?></textarea>
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
