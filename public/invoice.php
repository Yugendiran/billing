<?php
include "db/conn.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>

    <!-- Google Fonts -->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
    <link href="https://fonts.googleapis.com/css2?family=Livvic:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    

    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <section class="invoice_container">
        <div class="heading">
            Invoice Detials:
        </div>

        <div class="basic_info_container">
            <div class="col">
                <h4>Billing Address:</h4>
                <div class="select-box">
                  <div class="options-container">
                    <?php
$select_bill_cus_query = "SELECT * FROM customers";
$select_bill_cus_result = mysqli_query($connection, $select_bill_cus_query);
while($row = mysqli_fetch_assoc($select_bill_cus_result)){
  $customers_id = $row['customers_id'];
  $customers_name = $row['customers_name'];
  $customers_address = $row['customers_address'];
  $customers_email = $row['customers_email'];
  $customers_phone = $row['customers_phone'];
  $customers_gst = $row['customers_gst'];
  $customers_pan = $row['customers_pan'];
                    ?>
                    <div class="option">
                      <input type="radio" value="<?php echo $customers_id; ?>" class="radio" id="bill<?php echo $customers_id; ?>" name="category"/>
                      <label for="bill<?php echo $customers_id; ?>"><?php echo $customers_name .'<br>'. $customers_address .'<br>'. $customers_email .'<br>'. $customers_phone .'<br>'. $customers_gst .'<br>'. $customers_pan; ?></label>
                    </div>
<?php
}
?>
                  </div>

                  <div class="selected">
                    Select Billing Address
                  </div>

                  <div class="search-box">
                    <input type="text" placeholder="Start Typing..." />
                  </div>
                </div>
                <div class="add_btn" onclick="openCusForm();" style="width: 200px">
                    <i class="fa-solid fa-plus"></i> Add New Customer
                </div>
            </div>
            <div class="col">
                <h4>Shipping Address:</h4>
                <div class="select-box2">
                  <div class="options-container2">
                    
                    <?php

$select_bill_cus_query = "SELECT * FROM customers";
$select_bill_cus_result = mysqli_query($connection, $select_bill_cus_query);
while($row = mysqli_fetch_assoc($select_bill_cus_result)){
  $customers_id = $row['customers_id'];
  $customers_name = $row['customers_name'];
  $customers_address = $row['customers_address'];
  $customers_email = $row['customers_email'];
  $customers_phone = $row['customers_phone'];
  $customers_gst = $row['customers_gst'];
  $customers_pan = $row['customers_pan'];
                    ?>
                    <div class="option2">
                      <input type="radio" value="<?php echo $customers_id; ?>" class="radio" id="ship<?php echo $customers_id; ?>" name="category2" />
                      <label for="bill<?php echo $customers_id; ?>"><?php echo $customers_name .'<br>'. $customers_address .'<br>'. $customers_email .'<br>'. $customers_phone .'<br>'. $customers_gst .'<br>'. $customers_pan; ?></label>
                    </div>
<?php
}
?>
                  </div>

                  <div class="selected2">
                    Select Shipping Address
                  </div>

                  <div class="search-box2">
                    <input type="text" placeholder="Start Typing..." />
                  </div>
                </div>
            </div>
            <div class="col">
                <h4>Invoice Number:</h4>
                <?php
$select_archive_query = "SELECT * FROM archive";
$select_archive_result = mysqli_query($connection, $select_archive_query);
$archive_count = mysqli_num_rows($select_archive_result);

                ?>
                <div class="form_input">
                    <input type="text" id="invNum" value="SHC<?php echo $archive_count + 1; ?>" disabled>
                </div>
                <h4>Invoice Date:</h4>
                <div class="form_input">
                    <input type="date" id="invDate" disabled value="<?php echo date("Y-m-d", strtotime($current_date)); ?>">
                </div>
                <h4>Due Date:</h4>
                <div class="form_input">
                    <input type="date" id="invDue" disabled value="<?php echo date('Y-m-d', strtotime($current_date. ' + 1 months')); ?>">
                </div>
            </div>
        </div>

        <div class="add_field_container">
            <div class="item large">
                <h5>Product</h5>
                <div class="input_container">
                    <input type="text" id="productName">
                </div>
            </div>
            <div class="item large">
                <h5>Description</h5>
                <div class="input_container">
                    <input type="text" id="productDescription">
                </div>
            </div>
            <div class="item small">
                <h5>Quantity</h5>
                <div class="input_container">
                    <input type="number" value="1" id="productQty" min="1" onkeyup="calcTotal();">
                </div>
            </div>
            <div class="item small">
                <h5>HSN</h5>
                <div class="input_container">
                    <input type="number" id="productHsn">
                </div>
            </div>
            <div class="item small">
                <h5>Unit Price</h5>
                <div class="input_container">
                    <input type="number" id="productUnitPrice" onkeyup="calcTotal();">
                </div>
            </div>
            <div class="item small">
                <h5>Total</h5>
                <div class="input_container">
                    <input type="number" id="productTotal" disabled>
                </div>
            </div>
        </div>
        <div class="add_btn" onclick="addList();">
            <i class="fa-solid fa-plus"></i> Add Item
        </div>

        <hr>

        <h3>Products:</h3>
        <div class="table_container">
            <table id="tableItems">
                <tr class="table_heading">
                    <td>Sno</td>
                    <td>Item(Description)</td>
                    <td>Qty</td>
                    <td>HSN</td>
                    <td>Unit Price</td>
                    <td>Total</td>
                    <td>Delete</td>
                </tr>

                <!-- <tr class="table_content">
                    <td>1</td><td>Cable (HDMI)</td><td>3</td><td>88878</td><td>289</td><td>542</td>
                </tr>
                <tr class="table_content">
                    <td>1</td><td>Cable (HDMI)</td><td>3</td><td>88878</td><td>289</td><td>542</td>
                </tr>
                <tr class="table_content">
                    <td>1</td><td>Cable (HDMI)</td><td>3</td><td>88878</td><td>289</td><td>542</td>
                </tr> -->
            </table>
        </div>

        <br><hr>

        <div class="calc_container">
            <input type="radio" value="cs" name="gst" onchange="gstSwitch('one');" checked> CGST/SGST 
            <input type="radio" value="i" name="gst" onchange="gstSwitch('two');"> IGST 
            <table>
                <tr>
                    <td>Subtotal</td>
                    <td id="subTotal">0</td>
                </tr>
                <tr class="gstOne1 open">
                    <td>CGST(9%)</td>
                    <td id="cgstPer">0</td>
                </tr>
                <tr class="gstOne2 open">
                    <td>SGST(9%)</td>
                    <td id="sgstPer">0</td>
                </tr>
                <tr class="gstTwo">
                    <td>IGST(18%)</td>
                    <td id="igstPer">0</td>
                </tr>
                <tr class="total">
                    <td>Total</td>
                    <td id="listTotal">0</td>
                </tr>
            </table>
        </div>
    </section>

    <div class="checkout" onclick="billInvoice();">
        Proceed
    </div>
 
    <?php

if(isset($_POST['addCus'])){
  $name = $_POST['fname'] . ' ' . $_POST['lname'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $gst = $_POST['gst'];
  $pan = $_POST['pan'];
  $address = $_POST['address'];

  $insert_cus_query = "INSERT INTO customers(customers_name, customers_address, customers_email, customers_phone, customers_gst, customers_pan) VALUES('$name', '$address', '$email', '$phone', '$gst', '$pan')";
  $insert_cus_result = mysqli_query($connection, $insert_cus_query);

  if(!$insert_cus_result){
    alertBox("Can't add the Customer. Try again");
  }else{
    header('location: invoice.php');
  }
}

?>

    <div class="popupContainer">
      <div class="popupHolder">
        <div class="banner">
            <h1>Let’s get you set up</h1>
            <p>Add New Customer</p>
        </div>
        <div class="form">
            <h1>Enter Customer Details:</h1>
            <hr>
            <form action="invoice.php" method="post">
            <div class="form_container">
                <div class="row">
                    <div class="split">
                        <h4>First Name</h4>
                        <input type="text" class="form-input" name="fname" required>
                    </div>
                    <div class="split">
                        <h4>Last Name</h4>
                        <input type="text" class="form-input" name="lname" required>
                    </div>
                </div>
                <div class="row">
                    <div class="split">
                        <h4>Email</h4>
                        <input type="email" class="form-input" name="email" required>
                    </div>
                    <div class="split">
                        <h4>Phone</h4>
                        <input id="phone" type="tel" name="phone" class="form-input" required>
                    </div>
                </div>
                <div class="row">
                    <div class="split">
                        <h4>GST</h4>
                        <input type="text" class="form-input" name="gst" required>
                    </div>
                    <div class="split">
                        <h4>PAN</h4>
                        <input type="text" class="form-input" name="pan" required>
                    </div>
                </div>               
                <div class="big-row">
                    <h4>Address</h4>
                    <textarea name="address"></textarea>
                </div>
                <button type="submit" name="addCus" class="btn btn__primary btn__centered">Submit</button>
            </div>
            </form>
            <br>
        </div>
      </div>
    </div>

    <!-- Javascript -->
    <script src="js/script.js"></script>
</body>
</html>