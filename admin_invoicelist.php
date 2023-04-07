<?php
session_start();
include 'header.php';
include 'Invoice.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
?>
<title>shakti billing</title>
<script src="js/invoice.js"></script>
<link href="styles.css" rel="stylesheet">
<style type="text/css">
    .banner {
        width: 100%;
        height: 200vh;
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

        <?php include('navbar.php'); ?><br>

        <div class="container"> <br>
            <button onclick="history.back()" class="btns" style="border-radius: 0px; font-size: 20px;">Go Back</button>

            <h2 class="title mt-5" style="text-align:center ;">SHAKTI BILLING SYSTEM</h2><br>
            <div style="overflow-x:auto;">
                <table id="datatablesSimple" class="table table-condensed table-hover table-striped table-reponsive-sm">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Invoice No.</th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th>Created Date</th>
                            <th>Total</th>
                            <th>Print</th>

                            <th>Delete</th>
                        </tr>
                    </thead>
                    <?php
                    $invoiceList = $invoice->getInvoiceList();
                    foreach ($invoiceList as $invoiceDetails) {
                        $invoiceDate = date("d/M/Y", strtotime($invoiceDetails["order_date"]));
                        echo '
              <tr>
              <td>' . $invoiceDetails["user_id"] . '</td>
                <td>' . $invoiceDetails["order_id"] . '</td>
                <td>' . $invoiceDetails["order_receiver_name"] . '</td>
                <td>' . $invoiceDetails["order_receiver_address"] . '</td>
                <td>' . $invoiceDate . '</td>
                <td>Rs.' . $invoiceDetails["order_total_after_tax"] . '</td>
                <td><a href="print_invoice.php?invoice_id=' . $invoiceDetails["order_id"] . '" title="Print Invoice"><button class="btns"><i class="fa fa-print"></i></button></a></td>
      
                <td><a href="delete-invoice2.php?order_id=' . $invoiceDetails['order_id'] . '" title="Delete Invoice"><button class="btns"><i class="fa fa-trash"></i></button></a></td>
              </tr>
            ';
                    }
                    ?>
                </table>
            </div>
        </div> <br>
        <?php include('footer.php'); ?>
    </div>
</body>