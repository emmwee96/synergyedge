<section class="content-header">
    <h1>
        Outlets
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>outlet"><i class="fa fa-users"></i> Outlet</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="box">
        <div class='box-header'>
            <h4 class="whiteTitle" style='display: inline-block;'>Outlet</h4>

            <a href='<?php echo site_url('outlet/add'); ?>' class='btn btn-info pull-right'>
                <i class='fa fa-plus' ></i> Add</a>

        </div>
        <div class='box-body no-padding'>

            <div id="refreshBox">
                <table id="data-table" class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Outlet</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($outlet as $row){
                                ?>
                                    <tr>
                                        <td><a href="<?= base_url() ?>outlet/detail/<?= $row['outlet_id']?>"><?= $i ?></a></td>
                                        <td><a href="<?= base_url() ?>outlet/detail/<?= $row['outlet_id']?>"><?= $row['outlet'] ?></a></td>
                                        <td><a href="<?= base_url() ?>outlet/delete/<?= $row['outlet_id']?>" class="btn btn-danger delete-button">Delete</a></td>
                                    </tr>
                                <?php
                                $i++;
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Outlet</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>