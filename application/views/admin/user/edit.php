<section class="content-header">
	<h1>
		Edit user
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>User">
				<i class="fa fa-users"></i> User</a>
		</li>
		<li>
			<a href="<?= base_url() ?>User/edit/<?= $user['user_id'] ?>"> Edit user</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">User</h3>
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
		<form role="form" method="POST" action="<?= base_url() ?>user/edit/<?= $user['user_id']?>">
			<div class="box-body">
				<div class="form-group">
					<label for="userUsername">Username</label>
					<input type="text" class="form-control" id="userUsername" placeholder="Username" name="username" required value="<?= $user['username'] ?>">
				</div>
				<div class="form-group">
					<label for="userName">Name</label>
					<input type="text" class="form-control" id="userName" placeholder="Name" name="name" required value="<?= $user['name'] ?>">
				</div>
				<div class="form-group">
					<label for="userEmail">Email</label>
					<input type="email" class="form-control" id="userEmail" placeholder="Email" name="email" required value="<?= $user['email'] ?>">
				</div>
				<div class="form-group">
					<label for="userContact">Contact Number</label>
					<input type="text" class="form-control" id="userContact" placeholder="Contact Number" name="contact" required value="<?= $user['contact'] ?>">
				</div>
				<div class="form-group">
					<label for="userPassword">Password <small>*leave blank to keep old password</small></label>
					<input type="password" class="form-control" id="userPassword" placeholder="Password" name="password">
				</div>
				<div class="form-group">
					<label for="userPasswordRetype">Confirm Password <small>*leave blank to keep old password</small></label>
					<input type="password" class="form-control" id="userPasswordRetype" placeholder="Confirm Password" name="password2">
				</div>
				<div class="form-group">
					<label>Role</label>
					<select class="form-control" name="role_id">
						<?php
        foreach ($role as $row) {
            ?>
							<option value="<?= $row['role_id'] ?>" <?php if ($row['role_id'] == $user['role_id']) echo 'selected' ?>>
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
