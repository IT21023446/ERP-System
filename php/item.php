<?php

require_once 'db_connection.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_item'])) {
    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $item_category = $_POST['item_category'];
    $item_subcategory = $_POST['item_subcategory'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];

    if (empty($item_code) || empty($item_name) || empty($item_category) || empty($item_subcategory) || empty($quantity) || empty($unit_price)) {
        die("Please fill all the required fields.");
    }


    $sql = "INSERT INTO `item` (`item_code`, `item_name`, `item_category`, `item_subcategory`, `quantity`, `unit_price`)
            VALUES ('$item_code', '$item_name', '$item_category', '$item_subcategory', '$quantity', '$unit_price')";
    if ($conn->query($sql) === TRUE) {
        echo "Item added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_item'])) {
    $item_id = $_POST['item_id'];
    $item_code = $_POST['item_code'];
    $item_name = $_POST['item_name'];
    $item_category = $_POST['item_category'];
    $item_subcategory = $_POST['item_subcategory'];
    $quantity = $_POST['quantity'];
    $unit_price = $_POST['unit_price'];

    
    if (empty($item_id) || empty($item_code) || empty($item_name) || empty($item_category) || empty($item_subcategory) || empty($quantity) || empty($unit_price)) {
        die("Please fill all the required fields.");
    }

  
    $sql = "UPDATE `item`
            SET `item_code`='$item_code', `item_name`='$item_name', `item_category`='$item_category', `item_subcategory`='$item_subcategory', `quantity`='$quantity', `unit_price`='$unit_price'
            WHERE `id`='$item_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Item updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete an item
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_item'])) {
    $item_id = $_POST['item_id'];

    // Delete item data from the database
    $sql = "DELETE FROM `item` WHERE `id`='$item_id'";
    if ($conn->query($sql) === TRUE) {
        echo "Item deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}


function getItems() {
    global $conn;
    $sql = "SELECT * FROM `item`";
    $result = $conn->query($sql);
    $items = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $items[] = $row;
        }
    }

    return $items;
}
?>
