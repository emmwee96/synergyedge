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
                    <a class="btn btn-info pull-right" href="<?= site_url('project/add_report/'.$project['project_id'].'/'.$project_outlet['project_outlet_id']); ?>">Add Report</a>
                    <table class="table table-hover table-stripe">
                        <thead>
                            <tr>
                                <th style="width:20%">Date</th>
                                <th>Description</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="row_highlight">
                                <td>2018-6-12</td>
                                <td>Report #123</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Belvita milk</td>
                                <td>30</td>
                            </tr>
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
