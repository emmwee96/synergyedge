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
					<a href="<?php echo site_url('project/edit') . '/' . $project['project_id'] ?>" class='btn btn-default pull-right'>
						<i class='fa fa-edit'></i> Edit</a>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div class="box-body box-limit">
					<table class="formTable">
						<tr>
							<th>Name</th>
							<td>:
								<?= $project["name"] ?>
							</td>
						</tr>
						<tr>
							<th>Start Date</th>
							<td>:
								<?= $project["start_date"] ?>
							</td>
						</tr>
						<tr>
							<th>End Date</th>
							<td>:
								<?= $project["end_date"] ?>
							</td>
						</tr>
						<tr>
							<th>PIC</th>
							<td>:
								<?= $project["pic"] ?>
							</td>
						</tr>
						<tr>
							<th>Supervisor</th>
							<td>:
								<?= $project["supervisor"] ?>
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
						<?= $project['name'] ?>'s Locations
					</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div class="box-body box-limit">
					<table class="table table-bordered">
						<tr>
							<th>Location</th>
							<?php
								foreach($checklist as $checklist_row){
									?>
										<th><?= $checklist_row['checklist'] ?></th>
									<?php
								}
							?>
						</tr>
						<?php
							foreach($project_outlet as $row){
								?>
									<tr>
										<td><?= $row['outlet'] ?></td>
										<?php
											foreach($checklist as $checklist_row){
												?>
													<td><?= $row[$checklist_row['checklist']] ?></td>
												<?php
											}
										?>
									</tr>
								<?php
							}
						?>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
		<div class="col-md-12 col-xs-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">
						<?= $project['name'] ?>'s Location Items
					</h3>
				</div>
				<!-- /.box-header -->
				<!-- form start -->
				<div class="box-body box-limit">
					<table class="table table-bordered">
						<tr>
							<th>Location</th>
							<th>Item</th>
							<th>Target</th>
						</tr>
						<?php
                        if(count($project_outlet_item)){
                            $tempCustName = $project_outlet_item[0]['customer_name'] . '  '. $project_outlet_item[0]['outlet'];
                        }else{
                            $tempCustName = '';
                        }
                        $i = 0;
							foreach($project_outlet_item as $row){
                                
								?>
									<tr class="<?= $tempCustName == $row['customer_name'] . '  ' .$row['outlet']&& $i != 0 ? '':'row_highlight';?>">

										<td>
                                            <a href="<?= site_url('project/project_outlet/'.$row['project_id'].'/'.$row['project_outlet_id']); ?>">
                                            <?= $tempCustName == $row['customer_name'] . '  ' .$row['outlet'] && $i != 0 ? '' : $row['customer_name'] . '  ' .$row['outlet']; ?>
                                            </a>
                                        </td>
										<td>    
                                        <a href="<?= site_url('project/project_outlet/'.$row['project_id'].'/'.$row['project_outlet_id']); ?>">
                                        <?= $row['item'] ?>
                                        </a>
                                        </td>
										<td>
                                        <a href="<?= site_url('project/project_outlet/'.$row['project_id'].'/'.$row['project_outlet_id']); ?>">
                                        <?= $row['target'] ?>
                                        </a>
                                        </td>
									</tr>

								<?php
                                $i++;
                                $tempCustName = $row['customer_name'] . '  ' .$row['outlet'];
							}
						?>
					</table>
				</div>
				<!-- /.box-body -->
			</div>
		</div>
	</div>
</section>
