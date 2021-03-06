<?php
include "db/conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Google Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link href="https://fonts.googleapis.com/css2?family=Livvic:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Navbar starts -->
    <!-- <nav class="navbar">

    </nav> -->
    <!-- Navbar ends -->

    <!-- Summary Starts -->
    <div class="summary">
        <ul>
            <li>Unpaid Invoice: <span>50</span></li>
            <li>Overdue Quotation: <span>50</span></li>
            <li>Unpaid Bills: <span>50</span></li>
            <li>Stock: <span>50</span></li>
        </ul>
    </div>
    <!-- Summary Ends -->

    <!-- Home Fields Starts -->
    <div class="container">
        <div class="col">
            <a href="invoice.php"><div class="home_btn"><i class="fa-solid fa-file-invoice"></i>New Invoice</div></a>
            <div class="small_btn_container">
                <a href="gen.php"><div class="home_small_btn"><div class="icon"><i class="fa-solid fa-plus"></i></div>Quotation</div></a>
                <a href="#"><div class="home_small_btn"><div class="icon"><i class="fa-solid fa-plus"></i></div>Proforma Invoice</div></a>
                <a href="#"><div class="home_small_btn"><div class="icon"><i class="fa-solid fa-plus"></i></div>Tax Invoice</div></a>
                <a href="#"><div class="home_small_btn"><div class="icon"><i class="fa-solid fa-plus"></i></div>Retail Invoice</div></a>
                <a href="#"><div class="home_small_btn"><div class="icon"><i class="fa-solid fa-plus"></i></div>Excise Invoice</div></a>
                <a href="#"><div class="home_small_btn"><div class="icon"><i class="fa-solid fa-plus"></i></div>Delivery Note/ Challan</div></a>
                <a href="#"><div class="home_small_btn"><div class="icon"><i class="fa-solid fa-plus"></i></div>Purchase Order</div></a>
                <a href="#"><div class="home_small_btn"><div class="icon"><i class="fa-solid fa-plus"></i></div>Bill</div></a>
                <a href="#"><div class="home_small_btn"><div class="icon"><i class="fa-solid fa-plus"></i></div>Credit Note</div></a>
                <a href="#"><div class="home_small_btn"><div class="icon"><i class="fa-solid fa-plus"></i></div>Debit Note</div></a>
            </div>
        </div>
        <div class="col">
            <div class="block">
                <div class="heading">
                    <div class="icon">
                        <i class="fa-solid fa-folder-minus"></i>
                    </div>
                    <div class="content">
                        Sales Reports:
                    </div>
                </div>
                <div class="items_container">
                    <ul>
                        <a href="#"><li>Invoices</li></a>
                        <a href="#"><li>Quotations, Proformas & Challan</li></a>
                        <a href="#"><li>Credit Notes</li></a>
                        <a href="#"><li>Debit Notes</li></a>
                        <a href="#"><li>Payment Documents</li></a>
                        <a href="#"><li>Clients</li></a>
                        <a href="#"><li>Product/Services</li></a>
                    </ul>
                </div>
            </div>
            
            <div class="block">
                <div class="heading">
                    <div class="icon">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </div>
                    <div class="content">
                        Purchase Reports:
                    </div>
                </div>
                <div class="items_container">
                    <ul>
                        <a href="#"><li>Vendors</li></a>
                        <a href="#"><li>Bills</li></a>
                        <a href="#"><li>Purchase Orders</li></a>
                        <a href="#"><li>Expenses</li></a>
                    </ul>
                </div>
            </div>
            
            <div class="block">
                <div class="heading">
                    <div class="icon">
                        <i class="fa-solid fa-screwdriver-wrench"></i>
                    </div>
                    <div class="content">
                        Tools:
                    </div>
                </div>
                <div class="items_container">
                    <ul>
                        <a href="#"><li>Backup Data:</li></a>
                        <a href="#"><li>Restore Data:</li></a>
                    </ul>
                </div>
            </div>
            
            <div class="block">
                <div class="heading">
                    <div class="icon">
                        <i class="fa-solid fa-gear"></i>
                    </div>
                    <div class="content">
                        Settings:
                    </div>
                </div>
                <div class="items_container">
                    <ul>
                        <a href="#"><li>Company Details</li></a>
                        <a href="#"><li>Taxes</li></a>
                        <a href="#"><li>Email</li></a>
                        <a href="#"><li>Preferences</li></a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Home Fields Ends -->
</body>
</html>