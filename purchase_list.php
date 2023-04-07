<?php
session_start();
include('header.php');
include 'Invoice2.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
?>
<title>shakti billing</title>
<script src="js/invoice.js"></script>
<link href="styles.css" rel="stylesheet">
<style type="text/css">
  .banner {
    width: 100%;
    height: 150vh;
    background-image: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url(tax.jpg);
    background-size: cover;
    background-position: center;
  }

  .container {
    background-color: white;
    padding-top: ;
    border-radius: 10px;
  }

  th {
    background: #4287f5;
    color: white;
  }
</style>
<link rel="stylesheet" href="css/datatables-sytle.css">
<script src="js/datatables-simple-demo.js"></script>
<script src="js/simple-datatables@latest"></script>

<body>
  <div class="banner">
    <?php include('container.php'); ?>
    <div class="container"> <br>
      <h2 class="title mt-5">SHAKTI BILLING SYSTEM</h2><br>
      <div class="table-responsive">
      <table id="datatablesSimple"  class="table">
        <thead>
          <tr>
            <th>Invoice No.</th>
            <th>Customer Name</th>
            <th>Created Date</th>
            <th>Total</th>
          
            <th>Delete</th>
              <th>Print</th>
            
          </tr>
        </thead>
        <?php
        $invoiceList = $invoice->getInvoiceList();
        foreach ($invoiceList as $invoiceDetails) {
          $invoiceDate = date("d/M/Y", strtotime($invoiceDetails["order_date"]));
          echo '
              <tr>
                <td>' . $invoiceDetails["order_id"] . '</td>
                <td>' . $invoiceDetails["order_reciever_name"] . '</td>
                <td>' . $invoiceDate . '</td>
                <td>Rs.' . $invoiceDetails["order_total_after_tax"] . '</td>
                <td><a href="delete-invoice.php?order_id=' . $invoiceDetails['order_id'] . '" title="Delete Invoice"><button class="btns"><i class="fa fa-trash"></i></button></a></td>
                <td><a href="print_invoice2.php?invoice_id=' . $invoiceDetails["order_id"] . '" title="Print Invoice"><button class="btns"><i class="fa fa-print"></i></button></a></td>
                
                
              </tr>
            ';
        }
        ?>
      </table>
    </div>
    </div>
  </div>
</body>