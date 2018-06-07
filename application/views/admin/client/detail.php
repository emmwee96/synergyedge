<section class="content-header">
	<h1>
		<?= $client['username'] ?>
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Client">
				<i class="fa fa-users"></i> Client</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Client/detail/<?= $client['client_id'] ?>">
				<?= $client['username'] ?>
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
					<?= $client['username'] ?>
				</h3>
				<a href="<?php echo site_url('client/edit') . '/' . $client['client_id'] ?>" class='btn btn-default pull-right'>
					<i class='fa fa-edit'></i> Edit</a>
			</div>
			<!-- /.box-header -->
			<!-- form start -->
			<div class="box-body">
				<table class="formTable">
					<tr>
						<th>Username</th>
						<td>:
							<?= $client["username"] ?>
						</td>
					</tr>
					<tr>
						<th>Name</th>
						<td>:
							<?= $client["name"] ?>
						</td>
					</tr>
					<tr>
						<th>Email</th>
						<td>:
							<?= $client["email"] ?>
						</td>
					</tr>
					<tr>
						<th>Contact Number</th>
						<td>:
							<?= $client["contact"] ?>
						</td>
					</tr>
					<tr>
						<th>Role</th>
						<td>:
							<?= $client["role"] ?>
						</td>
					</tr>
				</table>
			</div>
			<!-- /.box-body -->
		</div>
	</div>
</section>
