<section class="content-header">
    <h1>
        Projects
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>project"><i class="fa fa-users"></i> Project</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="box">
        <div class='box-header'>
            <h4 class="whiteTitle" style='display: inline-block;'>Project</h4>

            <a href='<?php echo site_url('project/add'); ?>' class='btn btn-info pull-right'>
                <i class='fa fa-plus' ></i> Add</a>

        </div>
        <div class='box-body no-padding'>

            <div id="refreshBox">
                <table id="data-table" class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>PIC</th>
                            <th>Type</th>
                            <th>Created Date</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($project as $row){
                                ?>
                                    <tr>
                                        <td><a href="<?= base_url() ?>project/detail/<?= $row['project_id']?>"><?= $i ?></a></td>
                                        <td><a href="<?= base_url() ?>project/detail/<?= $row['project_id']?>"><?= $row['name'] ?></a></td>
                                        <td><a href="<?= base_url() ?>project/detail/<?= $row['project_id']?>"><?= $row['pic'] ?></a></td>
                                        <td><a href="<?= base_url() ?>project/detail/<?= $row['project_id']?>"><?= $row['project_type'] ?></a></td>
                                        <td><a href="<?= base_url() ?>project/detail/<?= $row['project_id']?>"><?= $row['created_date'] ?></a></td>
                                        <td><a href="<?= base_url() ?>project/delete/<?= $row['project_id']?>" class="btn btn-danger delete-button">Delete</a></td>
                                    </tr>
                                <?php
                                $i++;
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>PIC</th>
                            <th>Type</th>
                            <th>Created Date</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>