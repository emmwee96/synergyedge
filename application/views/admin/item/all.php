<section class="content-header">
    <h1>
        Items
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?= base_url() ?>item"><i class="fa fa-users"></i> Item</a></li>
    </ol>
</section>
<br>
<section class="content">
    <div class="box">
        <div class='box-header'>
            <h4 class="whiteTitle" style='display: inline-block;'>Item</h4>

            <a href='<?php echo site_url('item/add'); ?>' class='btn btn-info pull-right'>
                <i class='fa fa-plus' ></i> Add</a>

        </div>
        <div class='box-body no-padding'>

            <div id="refreshBox">
                <table id="data-table" class="table table-bordered table-hover data-table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Item</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                            foreach($item as $row){
                                ?>
                                    <tr>
                                        <td><a href="<?= base_url() ?>item/detail/<?= $row['item_id']?>"><?= $i ?></a></td>
                                        <td><a href="<?= base_url() ?>item/detail/<?= $row['item_id']?>"><?= $row['item'] ?></a></td>
                                        <td><a href="<?= base_url() ?>item/detail/<?= $row['item_id']?>">RM<?= $row['price'] ?></a></td>
                                        <td><a href="<?= base_url() ?>item/delete/<?= $row['item_id']?>" class="btn btn-danger delete-button">Delete</a></td>
                                    </tr>
                                <?php
                                $i++;
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Item</th>
                            <th>Price</th>
                            <th></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>