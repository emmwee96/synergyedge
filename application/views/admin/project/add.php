<section class="content-header">
	<h1>
		Add project
	</h1>
	<ol class="breadcrumb">
		<li>
			<a href="<?= base_url() ?>Project">
				<i class="fa fa-users"></i> Project</a>
		</li>
		<li>
			<a href="<?= base_url() ?>Project/add"> Add project</a>
		</li>
	</ol>
</section>
<br>
<section class="content">
	<div class="box box-primary">
		<div class="box-header with-border">
			<h3 class="box-title">Project</h3>
            <p>Add a new project</p>
		</div>
		<!-- /.box-header -->
		<!-- form start -->
		<form role="form" method="POST" action="<?= base_url() ?>project/add">
			<div class="box-body ">
            <div class="progress">
            <div class="progress-bar progress-bar-striped" id="progressBar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <button type="button" class="btn btn-primary navBtns" id="prev" disabled>Back</button>
                <button type="button" class="btn btn-primary navBtns" id="next">Next</button> 
                <button type="submit" class="btn btn-success successBtn" style="display:none">Complete</button>

        <div class="overflow_hidden full_width">
            <!-- form slides 1 -->
            <div id="slides1">
				<div class="form-group">
                    <h3>Create a new project</h3>
                    <label for="projectName">Give a name to this project</label>
                    <input type="text" class="form-control" id="projectName" placeholder="Name" name="name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="projectYear">Project start date</label>
                        <input type="text" class="form-control datepicker" id="date" placeholder="Date" name="startDate" required>
                    </div>
                    <div class="form-group">
                        <label for="projectYear">Project end date</label>
                        <input type="text" class="form-control datepicker" id="date" placeholder="Date" name="endDate" required>
                    </div>
           
			    </div>
            </div>
            <div id="slides2" style="display:none;">
				<div class="form-group">
                    <h3>Select locations</h3>
                    <label for="projectName">Select the locations for this event</label>
                    <br>
                    <button class="btn btn-info" type="button" onclick="showLocationModal()">Add Locations </button>
                    <table class="table table-hover table-stripe">
                        <thead>
                            <tr>
                                <th style="width:50%">Outlet</th>
                                <?php foreach($checklist as $row){ ?>
                                <th style="text-align:center"><?= $row['checklist']; ?></th>
                                <?php } ?>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="locations_body"></tbody>
                    </table>
			    </div>
            </div>
            <div id="slides3" style="display:none;">
				<div class="form-group">
                    <h3>Select Your Products</h3>
                    <label for="projectName">Select products for event</label>
                    <br>
                    <button class="btn btn-info" type="button" onclick="showAddProductsModal()">Add Products </button>
                    <table class="table table-hover table-stripe">
                        <thead>
                            <tr>
                                <th style="width:40%">Item</th>
                                <th style="width:40%">Category</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="products_body"></tbody>
                    </table>
             
			    </div>
            </div>
        </div>
            <!-- end form slides 1 -->
			<!-- /.box-body -->

		</form>
	</div>
</section>

<script>
    var currentSlide = 1;
    var addedOutletRows = [];
    var addedProductsRows = [];

    $(document).ready(function(){

        $("#location_search").on("keyup",function(){
            console.log($("#location_search").val());
        }); 
        $("#next").click(function(){
            changeSlides(currentSlide + 1);
            
            
        });
        $("#back").click(function(){
            changeSlides(currentSlide - 1);

        });

        $("#location_selector").on("select2:selecting",function(){
            var data = $("#location_selector").find(":selected");
            console.log($(data));
        });
    });

    function changeSlides(target){
        if (target > currentSlide){
            $("#slides"+ currentSlide).hide('slide',{
                direction: 'left'
            });
            $("#slides" + target).show("slide",{
                direction: 'right'
            });
            currentSlide++;
        }else{
            $("#slides"+ currentSlide).hide('slide',{
                direction: 'right'
            });
            $("#slides" + target).show("slide",{
                direction: 'left'
            });
            currentSlide--;
        }

        if (currentSlide == 1){
            $("#prev").prop('disabled',true);
        }        

        if (currentSlide >= 3){ 
            $(".navBtns").hide();
            $(".successBtn").show();
        }

        var width = (currentSlide-1) * 33;

        $("#progressBar").css("width",width+"%");
    }
    function validateStep1(){
        return true;
    }

    function validateStep2(){
        return true;
    }

    function validateStep3(){
        return true;
    }

    function showLocationModal(){
        locationModalReset();
        $("#location_modal").modal("show");
    }
    function createLocationRow(outlet){
        for(var i = 0; i < addedOutletRows.length; i++){
            if (addedOutletRows[i].outlet_id == outlet.outlet_id){
                return;
            }
        }

        addedOutletRows.push(outlet);
        
        var row = "<tr id='outlet_row_"+ outlet.outlet_id + "'>";
        row += "<td>[" + outlet.customer_code + "] " + outlet.customer_name + " ( "+ outlet.outlet +" )";
        row += "<input type='hidden' name='outlets[]' value='" + outlet.outlet_id + "'>";
        row += "</td>";
        <?php foreach($checklist as $check){ ?>
        row += "<td class='text-align:center'><input type='checkbox' name='checklist_<?= $check['checklist_id']; ?>_"+ outlet.outlet_id+"'></td>";
        <?php } ?>
        row += "<td><button class='btn btn-danger' onclick='removeLocationRow(" + outlet.outlet_id + ")'>Remove</button></td>";
        row += "</tr>";

        $("#locations_body").append(row);
    }

    function removeLocationRow(outlet_id){
        for(var i = 0; i < addedOutletRows.length; i++){
            if (addedOutletRows[i].outlet_id == outlet_id){
                $("#outlet_row_" + outlet_id).remove();
                addedOutletRows.splice(i,1);
                break;
            }
        }
    }


     function showAddProductsModal(){
        addProductsModalReset();
        $("#add_products_modal").modal("show");
    }

    function createAddProductsRow(item){
        for(var i = 0; i < addedProductsRows.length; i++){
            if (addedProductsRows[i].item_id == item.item_id){
                return;
            }
        }

        addedProductsRows.push(item);

        var row = "<tr id='products_row_"+ item.item_id + "'>";
        row += "<td>"+ item.item + "<input type='hidden' value='"+ item.item_id +"' name='items[]'>";
        row += "</td>";
        row += "<td>"+ item.name + "</td>";
        row += "<td><button class='btn btn-danger' onclick='removeProductsRow(" + item.item_id + ")'>Remove</button></td>";
        row += "</tr>";

        $("#products_body").append(row);

    }

    function removeProductsRow(item_id){
        for(var i = 0; i < addedProductsRow.length; i++){
            if (addedProductsRow[i].item_id == item_id){
                $("#added_products_row_" + item_id).remove();
                addedProductsRow.splice(i,1);
                break;
            }
        }
    }
</script>