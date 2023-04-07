<?php
session_start();
include 'Invoice2.php';
include 'dbcon.php';
$invoice = new Invoice();
$invoice->checkLoggedIn();
if(!empty($_GET['invoice_id']) && $_GET['invoice_id']) {
	echo $_GET['invoice_id'];
	$invoiceValues = $invoice->getInvoice($_GET['invoice_id']);		
	$invoiceItems = $invoice->getInvoiceItems($_GET['invoice_id']);		
}

$invoiceDate = date("d/M/Y", strtotime($invoiceValues['order_date']));
$output = '';
$output .= '<table width="100%" border="1" cellpadding="5" cellspacing="0">
	<tr>
	<td colspan="2" align="center" style="font-size:18px"><b>SHAKTI GROUP</b></td>
	</tr>
	<tr>
	<td colspan="2">
	<table width="100%" cellpadding="5">
	<tr>
	<td width="35%">         
	Invoice No. : '.$invoiceValues['order_id'].'<br />
	Invoice Date : '.$invoiceDate.'<br />
	</td>
	</tr>
	<tr>
	  
            </tr
            <tr>
            
	<td width="65%">
	From,<br />
	<b></b><br />
	Name : '.$invoiceValues['order_reciever_name'].'<br /> 
	Billing Address : '.$invoiceValues['order_reciever_address'].'<br />
	</td>
	
	</tr>
	</table>
	<br />
	<hr>
	<table width="100%" border="0" cellpadding="5" cellspacing="0">
	<tr>
	<th align="left">SNo.</th>
	<th align="left">Item Code</th>
	<th align="left">Item Name</th>
	<th align="left">Quantity</th>
	<th align="left">Price</th>
	<th align="left">Actual Amt.</th> 
	</tr>
	</table>';
$count = 0;
$c = 1;
while ($row = mysqli_fetch_assoc($q)) {
	$output .= '
<table width="100%" border="0" cellpadding="5" cellspacing="0">
	<tr>
	<td align="left"> ' . $c . '</td>
	<td align="left">' . $row['item_code'] . ' </td>
	<td align="left">' . $row['item_name'] . ' </td>
	<td align="left">' . $row['order_item_quantity'] . ' </td>
	<td align="left">' . $row['order_item_price'] . ' </td>
	<td align="left">' . $row['order_item_final_amount'] . ' </td>
	</tr>
	</table>';
	$c++;


}
$output .= '
	<tr>
	<td colspan="5"></td>
	</tr>
	<tr>
	<td align="left" colspan="1"><b>Sub Total</b></td>
	<td align="left"><b>'.$invoiceValues['order_total_before_tax'].'</b></td>
	<td align="left" colspan="1"><b>Tax Rate:</b></td>
	<td align="left">'.$invoiceValues['order_tax_per'].'</td>
	</tr>
	<tr>
	<td align="left" colspan="1"> <b> Tax Amount:</b> </td>
	<td align="left">'.$invoiceValues['order_total_tax'].'</td>
	<td align="left" colspan="1"><b>Total:</b> </td>
	<td align="left">'.$invoiceValues['order_total_after_tax'].'</td>
	</tr>';
$output .= '
	</table>
	</td>
	</tr>
	</table>';
// creating pdf of invoice	
$invoiceFileName = 'AstroInvoice_'.$invoiceValues['order_id'].'.pdf';
require_once 'dompdf/Autoload.inc.php';

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$dompdf->loadHtml(html_entity_decode($output));
$dompdf->setPaper('A4', 'landscape');
$dompdf->render();
$dompdf->stream($invoiceFileName, array("Attachment" => false));
?>  
 