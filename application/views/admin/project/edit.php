<section class="content-header">
	<h1>
		Edit project
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Project">
				<i class="fa fa-users"></i> Project</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Project/edit/<?= $project['project_id'] ?>"> Edit project</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Project</h3>
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
		<form role="form" method="POST" action="<?= base_url() ?>project/edit/<?= $project['project_id']?>">
			<div class="box-body">
				<div class="form-group">
					<label for="projectName">Name</label>
					<input type="text" class="form-control" id="projectName" placeholder="Name" name="name" required value="<?= $project['name'] ?>">
				</div>
				<div class="form-group">
					<label for="projectType">Project Type</label>
					<select class="form-control" name="project_type_id">
						<?php
					foreach ($project_type as $row) {
						?>
						<option value="<?= $row['project_type_id'] ?>" <?php if ($row['project_type_id'] == $project['project_type_id']) echo "selected" ?>><?= $row['project_type'] ?></option>
							<?php

					}
					?>
					</select>
				</div>
				<div class="form-group">
					<label for="projectName">Year</label>
					<input type="text" class="form-control" id="projectYear" placeholder="Year" name="year" required value="<?= $project['year'] ?>">
				</div>
				<div class="form-group">
					<label for="projectDescription">Description</label>
					<textarea class="form-control" id="projectDescription" placeholder="Description" name="description" required rows="5"><?= $project['description'] ?></textarea>
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
