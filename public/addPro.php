<?php
include "db/conn.php";

if(isset($_POST['item']) && isset($_POST['code']) && isset($_POST['qty']) && isset($_POST['hsn']) && isset($_POST['price'])){
    $item = $_POST['item'];
    $code = $_POST['code'];
    $qty = $_POST['qty'];
    $hsn = $_POST['hsn'];
    $price = $_POST['price'];

    $insert_query = "INSERT INTO invoice(invoice_item, invoice_code, invoice_qty, invoice_hsn, invoice_price, invoice_date) VALUES('$item', '$code', '$qty', '$hsn', '$price', '$current_dt')";
    $insert_result = mysqli_query($connection, $insert_query);
}

if(isset($_POST['archive']) && isset($_POST['tax']) && isset($_POST['billAdd']) && isset($_POST['shipAdd'])){
    $archive_code = $_POST['archive'];
    $tax = $_POST['tax'];
    $billAdd = $_POST['billAdd'];
    $shipAdd = $_POST['shipAdd'];

    $insert_archive_query = "INSERT INTO archive(archive_code, archive_tax, archive_date, archive_bill, archive_ship) VALUES('$archive_code', '$tax', '$current_dt', '$billAdd', '$shipAdd')";
    $insert_archive_result = mysqli_query($connection, $insert_archive_query);
}
?>