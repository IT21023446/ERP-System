<?php

require_once 'db_connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_customer'])) {
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_no = $_POST['contact_no'];
    $district = $_POST['district'];

   
    if (empty($title) || empty($first_name) || empty($last_name) || empty($contact_no) || empty($district)) {
        die("Please fill all the required fields.");
    }


    $sql = "INSERT INTO `customer` (`title`, `first_name`, `last_name`, `contact_no`, `district`)
            VALUES ('$title', '$first_name', '$last_name', '$contact_no', '$district')";
    if ($conn->query($sql) === TRUE) {
        echo "Customer added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_customer'])) {
    $customer_id = $_POST['customer_id'];
    $title = $_POST['title'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $contact_no = $_POST['contact_no'];
    $district = $_POST['district'];

  
    if (empty($customer_id) || empty($title) || empty($first_name) || empty($last_name) || empty($contact_no) || empty($district)) {
        die("Please fill all the required fields.");
    }

    $sql = "UPDATE `customer`
            SET `title`='$title', `first_name`='$first_name', `last_name`='$last_name', `contact_no`='$contact_no', `district`='$district'
            WHERE `id`='$customer_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Customer updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_customer'])) {
    $customer_id = $_POST['customer_id'];

    $sql = "DELETE FROM `customer` WHERE `id`='$customer_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Customer deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


function getCustomers() {
    global $conn;
    $sql = "SELECT * FROM `customer`";
    $result = $conn->query($sql);
    $customers = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $customers[] = $row;
        }
    }

    return $customers;
}
?>
