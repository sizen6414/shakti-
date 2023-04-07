<?php
session_start();
include('header.php');
include 'Invoice2.php';
include('dbcon.php');
$invoice = new Invoice();
$invoice->checkLoggedIn();


if (!empty($_POST['companyName']) && $_POST['companyName']) {

  $invoice->saveInvoice($_POST);
  header("Location:purchase_list.php");
}

?>
<html>

<head>
  <title>Billing System</title>
  <script type="text/javascript" src="js/invoice.js"></script>
  <link href="css/styles.css" rel="stylesheet">
  <style type="text/css">
    html,
    body {
      position: relative;
      height: 100%;

    }

    .banner {
      width: 100%;
      height: 150vh;
      background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(tax.jpg);
      background-size: cover;
      ;
      background-position: center;
      position: absolute;
    }

    .container {
      background-color: white;
      border-radius: 10px;
    }

    .btns {
      font-family: "roboto", sans-serif;
      font-size: 14px;
      background: #5eaaf2;
      width: 100px;
      padding: 10px;
      text-align: center;
      text-decoration: none;
      color: #fff;
      border-radius: 5px;
      cursor: pointer;
      margin: auto;
    }

    .btns:hover,
    .btns:focus,
    .btns:active {
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    }

    .btnss {
      padding: auto;
      padding-left: 910px;
    }
  </style>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body style="font-family: 'Montserrat',sans-serif;">
  <div class="banner">
    <?php include('container.php'); ?>
    <div class="container">
      <div class="cards">
        <div class="card-bodys">
          <form action="" id="invoice-form" method="post" class="invoice-form" role="form" novalidate="">
            <div class="load-animate animated fadeInUp">
              <div class="row">
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                  <h2 class="title mt-5">SHAKTI BILLING SYSTEM</h2><br>
                </div>
              </div>

              <div class="row">

                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                  <h3>From,</h3>
                  <div class="form-group">
                    <input type="text" class="form-control" name="companyName" id="companyName" placeholder="Company Name" autocomplete="off" required>
                  </div>
                  <div class="form-group">
                    <textarea class="form-control" rows="3" name="address" id="address" placeholder="Address" required></textarea>
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
                    $query = mysqli_query($con, "SELECT * FROM `invoice_order_item`");
                    ?>
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="itemRow custom-control-input" id="itemRow_1">
                          <label class="custom-control-label" for="itemRow_1"></label>
                        </div>
                      </td>
                      <td><input type="text" name="productCode[]" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" readonly id="productCode_1" class="form-control" autocomplete="off" value=""></td>
                      <!-- <td><input type="text" name="productName[]" id="productName_1" class="form-control" autocomplete="off"></td> -->
                      <td>
                        <select name="productName[]" id="productName_1" class="form-control">
                          <option selected disabled>Select the Item</option>
                          <?php
                          while ($row = mysqli_fetch_assoc($query)) {
                          ?>
                            <option value="<?php echo $row['item_name']; ?>"><?php echo $row['item_name']; ?></option>
                          <?php
                          }
                          ?>
                          ?>
                        </select>
                      </td>
                      <td><input type="number" name="quantity[]" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" id="quantity_1" class="form-control quantity" autocomplete="off"></td>
                      <td><input type="number" name="price[]" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" id="price_1" readonly class="form-control price" autocomplete="off"></td>
                      <td><input type="number" name="total[]" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" id="total_1" readonly class="form-control total" autocomplete="off"></td>
                    </tr>
                  </table>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12">
                  <div class="btnss">
                    <button class="btns" id="removeRows" type="button">- Delete</button>
                    <button class="btns" id="addRows" type="button">+ Add</button>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                  <div class="form-group mt-3 mb-3 ">
                    <label>Subtotal: &nbsp;</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text currency">Rs.</span>
                      </div>
                      <input value="" type="number" class="form-control" name="subTotal" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" id="subTotal" placeholder="Subtotal">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                  <div class="form-group mt-3 mb-3 ">
                    <label>Tax Rate: &nbsp;</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text currency">%</span>
                      </div>
                      <input value="" type="number" class="form-control" name="taxRate" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" id="taxRate" placeholder="Tax Rate">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                  <div class="form-group mt-3 mb-3 ">
                    <label>Tax Amount: &nbsp;</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text currency">Rs.</span>
                      </div>
                      <input value="" type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" class="form-control" name="taxAmount" id="taxAmount" placeholder="Tax Amount">
                    </div>
                  </div>
                </div>
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                  <div class="form-group mt-3 mb-3 ">
                    <label>Total: &nbsp;</label>
                    <div class="input-group mb-3">
                      <div class="input-group-prepend">
                        <span class="input-group-text currency">Rs.</span>
                      </div>
                      <input value="" type="number" oninput="this.value = !!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null" class="form-control" name="totalAftertax" id="totalAftertax" placeholder="Total">
                    </div>
                  </div>
                </div>

                <br>
                <div class="form-group">
                  <div class="btnss">
                    <input type="hidden" value="<?php echo $_SESSION['userid']; ?>" class="form-control" name="userId">
                    <input data-loading-text="Saving Invoice..." type="submit" name="invoice_btn" value="Create" class="btns">
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $("#productName_1").change(function() {
      var s = $("#productName_1 option:selected").val();
      // alert(s);
      $.ajax({
        url: "value.php",
        method: 'Post',
        data: {
          name: s
        },
        dataType: 'json',
        success: (data) => {
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
          method: 'Post',
          data: {
            name: s
          },
          dataType: 'json',
          success: (data) => {
            $("#productCode_" + count).val(data[1]);
            $("#price_" + count).val(data[0]);

          }
        });
      });
    });
  </script>
</body>

</html>