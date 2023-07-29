<?php

require_once 'db_connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['invoice_report'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

    
    $sql = "SELECT * FROM `invoice`
            WHERE `date` BETWEEN '$start_date' AND '$end_date'";
    $result = $conn->query($sql);
    $invoices = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $invoices[] = $row;
        }
    }


    echo "<h2>Invoice Report</h2>";
    echo "<pre>";
    print_r($invoices);
    echo "</pre>";
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['invoice_item_report'])) {
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'];

 
    $sql = "SELECT * FROM `invoice_master`
            WHERE `invoice_no` IN (
                SELECT `invoice_no` FROM `invoice`
                WHERE `date` BETWEEN '$start_date' AND '$end_date'
            )";
    $result = $conn->query($sql);
    $invoice_items = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $invoice_items[] = $row;
        }
    }


    echo "<h2>Invoice Item Report</h2>";
    echo "<pre>";
    print_r($invoice_items);
    echo "</pre>";
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['item_report'])) {
   
    $sql = "SELECT DISTINCT `item_name`, `item_category`, `item_subcategory`, `quantity` FROM `item`";
    $result = $conn->query($sql);
    $items = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    }

 
    echo "<h2>Item Report</h2>";
    echo "<pre>";
    print_r($items);
    echo "</pre>";
}
?>
