<section class="content-header">
	<h1>
		Edit client
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Client/all">
				<i class="fa fa-users"></i> Client</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Client/edit/<?= $client['client_id'] ?>"> Edit client</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Client</h3>
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
		<form role="form" method="POST" action="<?= base_url() ?>client/edit/<?= $client['client_id']?>">
			<div class="box-body">
				<div class="form-group">
					<label for="clientUsername">Username</label>
					<input type="text" class="form-control" id="clientUsername" placeholder="Username" name="username" required value="<?= $client['username'] ?>">
				</div>
				<div class="form-group">
					<label for="clientName">Name</label>
					<input type="text" class="form-control" id="clientName" placeholder="Name" name="name" required value="<?= $client['name'] ?>">
				</div>
				<div class="form-group">
					<label for="clientEmail">Email</label>
					<input type="email" class="form-control" id="clientEmail" placeholder="Email" name="email" required value="<?= $client['email'] ?>">
				</div>
				<div class="form-group">
					<label for="clientContact">Contact Number</label>
					<input type="text" class="form-control" id="clientContact" placeholder="Contact Number" name="contact" required value="<?= $client['contact'] ?>">
				</div>
				<div class="form-group">
					<label for="clientPassword">Password <small>*leave blank to keep old password</small></label>
					<input type="password" class="form-control" id="clientPassword" placeholder="Password" name="password">
				</div>
				<div class="form-group">
					<label for="clientPasswordRetype">Confirm Password <small>*leave blank to keep old password</small></label>
					<input type="password" class="form-control" id="clientPasswordRetype" placeholder="Confirm Password" name="password2">
				</div>
				<div class="form-group">
					<label>Role</label>
					<select class="form-control" name="role_id">
						<?php
        foreach ($role as $row) {
            ?>
							<option value="<?= $row['role_id'] ?>" <?php if ($row['role_id'] == $client['role_id']) echo 'selected' ?>>
								<?= $row['role'] ?>
							</option>
							<?php

    }
    ?>
					</select>
				</div>
			</div>
			<!-- /.box-body -->

			<div class="box-footer">
				<button type="submit" class="btn btn-primary">Submit</button>
			</div>
		</form>
	</div>
</section>
