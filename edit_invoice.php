<?php 
session_start();
include('header.php');
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
if(!empty($_POST['companyName']) && $_POST['companyName'] && !empty($_POST['invoiceId']) && $_POST['invoiceId']) {	
	$invoice->updateInvoice($_POST);	
	header("Location:invoice_list.php");	
}
if(!empty($_GET['update_id']) && $_GET['update_id']) {
	$invoiceValues = $invoice->getInvoice($_GET['update_id']);		
	$invoiceItems = $invoice->getInvoiceItems($_GET['update_id']);		
}
?>
<title>billing System</title>
<head>
<script src="js/invoice.js"></script>
<link href="css/styles.css" rel="stylesheet">
<style type="text/css">
	.banner{
		width: 100%;
		height: 150vh;
		background-image: linear-gradient(rgba(0, 0, 0,0.75), rgba(0, 0, 0, 0.75)), url(tax.jpg);
		background-size: cover;
		background-repeat: repeat-y;
		background-position: center;
	}
	.container
	{
		background-color: white;
		border-radius: 10px;
	}
	.btns{
		font-family: "roboto" , sans-serif;
		font-size: 14px;
		background: #5eaaf2;
		width: 100px;
		padding:10px ;
		text-align: center;
		text-decoration: none;
		color: #fff;
		border-radius: 5px;
		cursor: pointer;
		margin: auto;
	}

	.btns:hover, .btns:focus, .btns:active{
		box-shadow: 0 0 20px rgba(0,0,0,0.2);
	}
	.btnss{
		padding: auto;
		padding-left: 910px;
	}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<body style="font-family: 'Montserrat',sans-serif;">
	<div class="banner">
		<?php include('container.php');?>
		<div class="container">
			<form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate=""> 
				<div class="">
					<div class="row">
						<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
							<h2 class="title mt-5">SHAKTI BILLING SYSTEM</h2>			
						</div>		    		
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
							<h3>To,</h3>
							<div class="form-group">
								<input value="<?php echo $invoiceValues['order_receiver_name']; ?>" type="text" class="form-control" name="companyName" id="companyName" placeholder="Company Name" autocomplete="off">
							</div>
							<div class="form-group">
								<textarea class="form-control" rows="3" name="address" id="address" placeholder="Your Address"><?php echo
								$invoiceValues['order_receiver_address']; ?></textarea>
							</div>

						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<table class="table table-condensed table-striped" id="invoiceItem">	
								<tr>
									<th width="2%">	
										<div class="custom-control custom-checkbox mb-3">
											<input type="checkbox" class="custom-control-input" id="checkAll" name="checkAll">
											<label class="custom-control-label" for="checkAll"></label>
										</div>
									</th>
									<th width="15%">Item No</th>
									<th width="38%">Item Name</th>
									<th width="15%">Quantity</th>
									<th width="15%">Price</th>								
									<th width="15%">Total</th>
								</tr>
								<?php 
								$count = 0;
								foreach($invoiceItems as $invoiceItem){
									$count++;
									?>								
									<tr>
										<td><div class="custom-control custom-checkbox">
											<input type="checkbox" class="custom-control-input itemRow" id="itemRow">
											<label class="custom-control-label" for="itemRow"></label>
										</div></td>
										<td><input type="text" value="<?php echo $invoiceItem["item_code"]; ?>" name="productCode[]" id="productCode_<?php echo $count; ?>" class="form-control" autocomplete="off"></td>
										<td><input type="text" value="<?php echo $invoiceItem["item_name"]; ?>" name="productName[]" id="productName_<?php echo $count; ?>" class="form-control" autocomplete="off"></td>			
										<td><input type="number" value="<?php echo $invoiceItem["order_item_quantity"]; ?>" name="quantity[]" id="quantity_<?php echo $count; ?>" class="form-control quantity" autocomplete="off"></td>
										<td><input type="number" value="<?php echo $invoiceItem["order_item_price"]; ?>" name="price[]" id="price_<?php echo $count; ?>" class="form-control price" autocomplete="off"></td>
										<td><input type="number" value="<?php echo $invoiceItem["order_item_final_amount"]; ?>" name="total[]" id="total_<?php echo $count; ?>" class="form-control total" autocomplete="off"></td>
						
									</tr>	
								<?php } ?>		
							</table>
						</div>
					</div>
					<div class="row mt-3 mb-3">
						<div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
							<button class="btns" id="removeRows" type="button">- Delete</button>
							<button class="btns" id="addRows" type="button">+ Add </button>
						</div>
					</div>
					<div class="row">	
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<div class="form-group mt-3 mb-3">
								<label>Subtotal: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-prepend currency">
										<span class="input-group-text currency">Rs.</span>
									</div>
									<input value="<?php echo $invoiceValues['order_total_before_tax']; ?>" type="number" class="form-control" name="subTotal" id="subTotal" placeholder="Subtotal">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<div class="form-group">
								<label>Tax Rate: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text">%</span>
									</div>
									<input value="<?php echo $invoiceValues['order_tax_per']; ?>" type="number" class="form-control" name="taxRate" id="taxRate" placeholder="Tax Rate">
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
							<div class="form-group">
								<label>Tax Amount: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-append currency"><span class="input-group-text">Rs.</span></div>
									<input value="<?php echo $invoiceValues['order_total_tax']; ?>" type="number" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
								</div>
							</div>	
						</div>
						<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">						
							<div class="form-group">
								<label>Total: &nbsp;</label>
								<div class="input-group">
									<div class="input-group-append currency"><span class="input-group-text">Rs.</span></div>
									<input value="<?php echo $invoiceValues['order_total_after_tax']; ?>" type="number" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
								</div>
							</div>
						</div>
						<br>
						<div class="form-group">
							<input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
							<input type="hidden" value="<?php echo $invoiceValues['order_id']; ?>" class="form-control" name="invoiceId" id="invoiceId">
							<input data-loading-text="Updating Invoice..." type="submit" name="invoice_btn" value="Create" class="btns">
						</div>

					</div>
				</form>
				<div style="font-size: 25px;">
<?php include 'footer.php' ;?>
</div>	
			</div>
		</div>		
	</div>
</div>	
</form>
</div>
</div>
<script>
    $("#productName_1").change(function() {
      var s = $("#productName_1 option:selected").val();
      // alert(s);
      $.ajax({
        url: "value.php",
        method:'Post',
        data : {
           name : s
        },
        dataType: 'json',
        success:(data)=>{
          $("#productCode_1").val(data[1]);
          $("#price_1").val(data[0]);

        }
      });
    });


    var count = $(".itemRow").length;
    $(document).on('click', '#addRows', function() {
      count++;
      var htmlRows = '';
      htmlRows += '<tr>';
      htmlRows += '<td><div class="custom-control custom-checkbox"> <input type="checkbox" class="custom-control-input itemRow" id="itemRow_' + count + '"> <label class="custom-control-label" for="itemRow_' + count + '"></label> </div></td>';
      htmlRows += '<td><input type="text" name="productCode[]" readonly id="productCode_' + count + '" class="form-control" autocomplete="off"></td>';
      htmlRows += '<td><select name="productName[]" id="productName_' + count + '" class="form-control" autocomplete="off"><option selected disabled>Select the Item</option>';
      htmlRows += '<?php $query = mysqli_query($con, "SELECT * FROM `invoice_order_item`");
                    while ($row = mysqli_fetch_assoc($query)) { ?> <option value="<?php echo $row["item_name"]; ?>"> <?php echo $row["item_name"]; ?> </option> <?php } ?>';
      htmlRows += '</select></td>';
      htmlRows += '<td><input type="number" name="quantity[]" id="quantity_' + count + '" class="form-control quantity" autocomplete="off"></td>';
      htmlRows += '<td><input type="number" name="price[]" readonly id="price_' + count + '" class="form-control price" autocomplete="off"></td>';
      htmlRows += '<td><input type="number" name="total[]" readonly id="total_' + count + '" class="form-control total" autocomplete="off"></td>';
      htmlRows += '</tr>';

      $('#invoiceItem').append(htmlRows);
      $("#productName_" + count).change(function() {
        var s = $("#productName_" + count + " option:selected").val();
        // alert(s);

        $.ajax({
        url: "value.php",
        method:'Post',
        data : {
           name : s
        },
        dataType: 'json',
        success:(data)=>{
          $("#productCode_"+count).val(data[1]);
          $("#price_"+count).val(data[0]);

        }
      });
      });
    });
  </script></body>