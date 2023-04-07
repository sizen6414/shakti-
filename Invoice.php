<?php
class Invoice
{
	private $host  = 'localhost';
	private $user  = 'root';
	private $password   = "";
	private $database  = "shaktibilling";
	private $invoiceUserTable = 'invoice_user';
	private $invoiceAdminTable = 'invoice_admin';
	private $invoiceOrderTable = 'invoice_order';
	private $invoiceOrderItemTable = 'invoice_order_item';
	private $invoiceOrderItem = 'invoiceitem_save';
	private $dbConnect = false;
	public function __construct()
	{
		if (!$this->dbConnect) {
			$conn = new mysqli($this->host, $this->user, $this->password, $this->database);
			if ($conn->connect_error) {
				die("Error failed to connect to MySQL: " . $conn->connect_error);
			} else {
				$this->dbConnect = $conn;
			}
		}
	}
	private function getData($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error in query: ' . mysqli_error());
		}
		$data = array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$data[] = $row;
		}
		return $data;
	}
	private function getNumRows($sqlQuery)
	{
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if (!$result) {
			die('Error in query: ' . mysqli_error());
		}
		$numRows = mysqli_num_rows($result);
		return $numRows;
	}
	public function loginUsers($email, $password)
	{
		$sqlQuery = "
		SELECT id, email, first_name, last_name, address, mobile 
		FROM " . $this->invoiceUserTable . " 
		WHERE email='" . $email . "' AND password='" . $password . "'";
		return  $this->getData($sqlQuery);
	}
	public function loginAdmins($email, $password)
	{
		$sqlQuery = "
		SELECT id, email, first_name, last_name, address, contact 
		FROM " . $this->invoiceAdminTable . " 
		WHERE email='" . $email . "' AND password='" . $password . "'";
		return  $this->getData($sqlQuery);
	}
	public function checkLoggedIn()
	{
		if (!$_SESSION['userid']) {
			header("Location:index.php");
		}
	}
	public function saveInvoice($POST)
	{
		$sqlInsert = "INSERT INTO " . $this->invoiceOrderTable . "(user_id, order_receiver_name, order_receiver_address, order_total_before_tax, order_total_tax, order_tax_per, order_total_after_tax) VALUES ('" . $POST['userId'] . "', '" . $POST['companyName'] . "', '" . $POST['address'] . "', '" . $POST['subTotal'] . "', '" . $POST['taxAmount'] . "', '" . $POST['taxRate'] . "', '" . $POST['totalAftertax'] . "')";
		mysqli_query($this->dbConnect, $sqlInsert);
		// $id = mysqli_insert_id($con);
		$InsertId = mysqli_insert_id($this->dbConnect);

		for ($i = 0; $i < sizeof($POST['productCode']); $i++) {

			$update = "UPDATE " . $this->invoiceOrderItemTable . " SET order_item_quantity = order_item_quantity- " . $POST['quantity'][$i] . " WHERE item_code=" . $POST['productCode'][$i];
			// "UPDATE table set order_iem_quantity = order_item_quantity - "
			mysqli_query($this->dbConnect, $update);
		}

		// print_r($InsertId);
		// die();
		for ($i = 0; $i < count($POST['productCode']); $i++) {
			$sqlInsertItem = "INSERT INTO " . $this->invoiceOrderItem . "(order_id, item_code, item_name, order_item_quantity, order_item_price, order_item_final_amount) VALUES ('" . $InsertId . "', '" . $POST['productCode'][$i] . "', '" . $POST['productName'][$i] . "', '" . $POST['quantity'][$i] . "', '" . $POST['price'][$i] . "', '" . $POST['total'][$i] . "')";
			mysqli_query($this->dbConnect, $sqlInsertItem);
		}
	}
	public function updateInvoice($POST)
	{
		if ($POST['invoiceId']) {
			$sqlInsert = "UPDATE " . $this->invoiceOrderTable . " 
			SET order_receiver_name = '" . $POST['companyName'] . "', order_receiver_address= '" . $POST['address'] . "', order_total_before_tax = '" . $POST['subTotal'] . "', order_total_tax = '" . $POST['taxAmount'] . "', order_tax_per = '" . $POST['taxRate'] . "', order_total_after_tax = '" . $POST['totalAftertax'] . "', order_amount_paid = '" . $POST['amountPaid'] . "',,  
			WHERE user_id = '" . $POST['userId'] . "' AND order_id = '" . $POST['invoiceId'] . "'";
			mysqli_query($this->dbConnect, $sqlInsert);
		}
		$this->deleteInvoiceItems($POST['invoiceId']);
		for ($i = 0; $i < count($POST['productCode']); $i++) {
			$sqlInsertItem = "INSERT INTO " . $this->invoiceOrderItemTable . "(order_id, item_code, item_name, order_item_quantity, order_item_price, order_item_final_amount) 
			VALUES ('" . $POST['invoiceId'] . "', '" . $POST['productCode'][$i] . "', '" . $POST['productName'][$i] . "', '" . $POST['quantity'][$i] . "', '" . $POST['price'][$i] . "', '" . $POST['total'][$i] . "')";
			mysqli_query($this->dbConnect, $sqlInsertItem);
		}
	}
	public function getInvoiceList()
	{
		$sqlQuery = "SELECT * FROM " . $this->invoiceOrderTable . " order by order_id desc
		";
		return  $this->getData($sqlQuery);
	}
	public function getInvoice($invoiceId)
	{
		$sqlQuery = "SELECT * FROM " . $this->invoiceOrderTable . " 
		WHERE user_id = '" . $_SESSION['userid'] . "' AND order_id = '$invoiceId'";
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row;
	}
	public function getInvoiceItems($invoiceId)
	{
		$sqlQuery = "SELECT * FROM " . $this->invoiceOrderItem . " 
		WHERE order_id = '$invoiceId'";
		return  $this->getData($sqlQuery);
	}
	public function deleteInvoiceItems($invoiceId)
	{
		$sqlQuery = "DELETE FROM " . $this->invoiceOrderItemTable . " 
		WHERE order_id = '" . $invoiceId . "'";
		mysqli_query($this->dbConnect, $sqlQuery);
	}

	public function updatequantity($POST)
	{
		$sqlInsert = "INSERT INTO " . $this->invoiceUserTable . "(id, password, first_name, last_name, address, mobile) VALUES ('" . $POST['userId'] . "', '" . $POST['password'] . "', '" . $POST['first_name'] . "', '" . $POST['last_name'] . "', '" . $POST['address'] . "', '" . $POST['phone'] . "')";
		mysqli_query($this->dbConnect, $sqlInsert);
	}
}
