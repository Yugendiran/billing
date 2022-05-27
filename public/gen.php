<?php

require('vendor/autoload.php');

$mpdf=new \Mpdf\Mpdf();

include "db/conn.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    // echo "<script>alert('$id');</script>";
}else{
    header("location: index.php");
}

function numberTowords(float $amount)
{
   $amount_after_decimal = round($amount - ($num = floor($amount)), 2) * 100;
   // Check if there is any number after decimal
   $amt_hundred = null;
   $count_length = strlen($num);
   $x = 0;
   $string = array();
   $change_words = array(0 => '', 1 => 'One', 2 => 'Two',
     3 => 'Three', 4 => 'Four', 5 => 'Five', 6 => 'Six',
     7 => 'Seven', 8 => 'Eight', 9 => 'Nine',
     10 => 'Ten', 11 => 'Eleven', 12 => 'Twelve',
     13 => 'Thirteen', 14 => 'Fourteen', 15 => 'Fifteen',
     16 => 'Sixteen', 17 => 'Seventeen', 18 => 'Eighteen',
     19 => 'Nineteen', 20 => 'Twenty', 30 => 'Thirty',
     40 => 'Forty', 50 => 'Fifty', 60 => 'Sixty',
     70 => 'Seventy', 80 => 'Eighty', 90 => 'Ninety');
  $here_digits = array('', 'Hundred','Thousand','Lakh', 'Crore');
  while( $x < $count_length ) {
       $get_divider = ($x == 2) ? 10 : 100;
       $amount = floor($num % $get_divider);
       $num = floor($num / $get_divider);
       $x += $get_divider == 10 ? 1 : 2;
       if ($amount) {
         $add_plural = (($counter = count($string)) && $amount > 9) ? 's' : null;
         $amt_hundred = ($counter == 1 && $string[0]) ? ' and ' : null;
         $string [] = ($amount < 21) ? $change_words[$amount].' '. $here_digits[$counter]. $add_plural.' 
         '.$amt_hundred:$change_words[floor($amount / 10) * 10].' '.$change_words[$amount % 10]. ' 
         '.$here_digits[$counter].$add_plural.' '.$amt_hundred;
         }else $string[] = null;
       }
   $implode_to_Rupees = implode('', array_reverse($string));
   $get_paise = ($amount_after_decimal > 0) ? "And " . ($change_words[$amount_after_decimal / 10] . " 
   " . $change_words[$amount_after_decimal % 10]) . ' Paise' : '';
   return ($implode_to_Rupees ? $implode_to_Rupees . 'Rupees ' : '') . $get_paise;
}

$select_archive_query = "SELECT * FROM archive WHERE archive_code = '$id'";
$select_archive_result = mysqli_query($connection, $select_archive_query);
$count_archive = mysqli_num_rows($select_archive_result);

if($count_archive >= 1){
    while($row = mysqli_fetch_assoc($select_archive_result)){
        $archive_id = $row['archive_id'];
        $archive_code = $row['archive_code'];
        $archive_tax = $row['archive_tax'];
        $archive_date = $row['archive_date'];
        $archive_bill = $row['archive_bill'];
        $archive_ship = $row['archive_ship'];
    }

    $select_bill_cus_query = "SELECT * FROM customers WHERE customers_id = $archive_bill";
    $select_bill_cus_result = mysqli_query($connection, $select_bill_cus_query);
    while($row = mysqli_fetch_assoc($select_bill_cus_result)){
        $bill_customers_id = $row['customers_id'];
        $bill_customers_name = $row['customers_name'];
        $bill_customers_address = $row['customers_address'];
        $bill_customers_email = $row['customers_email'];
        $bill_customers_phone = $row['customers_phone'];
        $bill_customers_gst = $row['customers_gst'];
        $bill_customers_pan = $row['customers_pan'];
    }

    $select_ship_cus_query = "SELECT * FROM customers WHERE customers_id = $archive_ship";
    $select_ship_cus_result = mysqli_query($connection, $select_ship_cus_query);
    while($row = mysqli_fetch_assoc($select_ship_cus_result)){
        $ship_customers_id = $row['customers_id'];
        $ship_customers_name = $row['customers_name'];
        $ship_customers_address = $row['customers_address'];
        $ship_customers_email = $row['customers_email'];
        $ship_customers_phone = $row['customers_phone'];
        $ship_customers_gst = $row['customers_gst'];
        $ship_customers_pan = $row['customers_pan'];
    }
}else{
    header("location: index.php");
}

$data = "";

$data .= "
<img src='img/1.jpg' width='100%'>
<table style='width: 100%;'>
    <tr style='width: 100%;'>
        <td style='border: 1px solid #000; padding: 0 20px; font-size: 12px;'>
        No: 42, Kalaingar Street CABPS5478K<br>
        Cholambedu, Thirumullaivoyal, <br>
        Chennai-600062<br>
        Ph:-+91 9360456706<br>
        -Email: srihariserviceamb@gmail.com<br>
        </td>
        <td style='padding: 0;'>
        <table style='width: 100%;'>
        <tr>
        <td style='border: 1px solid #000; font-size: 10px;'><b>PAN</b></td>
        <td style='border: 1px solid #000; font-size: 10px;'>CABPS5478K</td>
        </tr>
        <tr>
        <td style='border: 1px solid #000; font-size: 10px;'><b>GST</b></td>
        <td style='border: 1px solid #000; font-size: 10px;'>33CABPS5478K1Z8</td>
        </tr>
        <tr>
        <td style='border: 1px solid #000; font-size: 10px;'><b>Invoice Number</b></td>
        <td style='border: 1px solid #000; font-size: 10px;'>$archive_code</td>
        </tr>
        <tr>
        <td style='border: 1px solid #000; font-size: 10px;'><b>Invoice Date</b></td>
        <td style='border: 1px solid #000; font-size: 10px;'>$archive_date</td>
        </tr>
        <tr>
        <td style='border: 1px solid #000; font-size: 10px;'><b>Purchase Order</b></td>
        <td style='border: 1px solid #000; font-size: 10px;'></td>
        </tr>
        </table>
        </td>
    </tr>   
    <tr style='width: 100%;'>
        <td style='width: 50%; border: 1px solid #000; padding: 10px;'>
            <h3 style='margin: 0; font-size: 13px; color: #2b6987;'>Bill To</h3><br>
            <p style='font-size: 12px; margin: 0; color: #2b6987;'>$bill_customers_name<br>
            $bill_customers_address<br>
            Phone: $bill_customers_phone<br>
            Email: $bill_customers_email<br>
            PAN: $bill_customers_pan<br>
            GST: $bill_customers_gst</p>
        </td>

        <td style='width: 50%; border: 1px solid #000; padding: 10px;'>
            <h3 style='margin: 0; font-size: 13px; color: #2b6987;'>Ship To</h3><br>
            <p style='font-size: 12px; margin: 0; color: #2b6987;'>$ship_customers_name<br>
            $ship_customers_address<br>
            Phone: $ship_customers_phone<br>
            Email: $ship_customers_email<br>
            PAN: $ship_customers_pan<br>
            GST: $ship_customers_gst</p>
        </td>
    </tr><br>
</table>
<h4 style='margin: 0; padding: 0;'>Products:</h4>
<table style='width: 100%;'>
    <tr>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>S.No</b></td>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>Item (Description)</b></td>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>Qty</b></td>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>HSN</b></td>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>Unit Price</b></td>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>Line Total</b></td>
    </tr>";
$sno = 1;
$bill_total = 0;
$select_list_products_query = "SELECT * FROM invoice WHERE invoice_code = '$archive_code'";
$select_list_products_result = mysqli_query($connection, $select_list_products_query);
while($row = mysqli_fetch_assoc($select_list_products_result)){
    $invoice_item = $row['invoice_item'];
    $invoice_qty = $row['invoice_qty'];
    $invoice_hsn = $row['invoice_hsn'];
    $invoice_price = $row['invoice_price'];
    $invoice_price_total = round(($invoice_qty * $invoice_price), 2);
    $bill_total += round($invoice_price_total, 2);

    $data .= "
        <tr>
            <td style='border: 1px solid #000; padding: 3px; color: #222222; text-align: center;'>$sno</td>
            <td style='border: 1px solid #000; padding: 3px; color: #222222;'>$invoice_item</td>
            <td style='border: 1px solid #000; padding: 3px; color: #222222; text-align: center;'>$invoice_qty</td>
            <td style='border: 1px solid #000; padding: 3px; color: #222222; text-align: center;'>$invoice_hsn</td>
            <td style='border: 1px solid #000; padding: 3px; color: #222222; text-align: right;'>₹ $invoice_price</td>
            <td style='border: 1px solid #000; padding: 3px; color: #222222; text-align: right;'>₹ $invoice_price_total</td>
        </tr>
    ";
    $sno++;
}
$data .="
</table>
<table style='width: 100%;'>
    <tr>
        <td style='width: 70%;'>
            <b style='color: #2b6987;'>Tax Amount</b>
        </td>
        <td>
            Base Value
        </td>
        <td style='text-align: right;'>
            ₹ $bill_total
        </td>
    </tr>
    ";

if($archive_tax == 'cs'){
    $tax_nine = round((($bill_total /100) * 9), 2);
    $tax_total = $tax_nine * 2;
    $tax_words = numberTowords($tax_total);
    $data .= "
        <tr>
            <td style='width: 70%'>
                Rs: $tax_words
            </td>
            <td>
                CGST (9%)
            </td>
            <td style='text-align: right;'>
                ₹ $tax_nine
            </td>
        </tr>
        <tr>
            <td style='width: 70%'>
                
            </td>
            <td>
                SGST (9%)
            </td>
            <td style='text-align: right;'>
                ₹ $tax_nine
            </td>
        </tr>
    ";
}elseif($archive_tax == 'i'){
    $tax_eighteen = round((($bill_total /100) * 18), 2);
    $tax_total = $tax_eighteen;
    $tax_words = numberTowords($tax_eighteen);
    $data .= "
        <tr>
            <td style='width: 70%'>
                Rs: $tax_words
            </td>
            <td>
                IGST (18%)
            </td>
            <td style='text-align: right;'>
                ₹ $tax_eighteen
            </td>
        </tr>
    ";
}
$inv_Total = $tax_total + $bill_total;
$invTotal_words = numberTowords($inv_Total);
$data .= "
</table>
<table style='width: 100%;'>
    <tr>
        <td style='width: 70%; color: #222222;'>
            <b style='color: #2b6987;'>Invoice Value</b>
        </td>
        <td>
            Tax Total
        </td>
        <td style='text-align: right;'>
            ₹ $tax_total
        </td>
    </tr>
    <tr>
        <td style='width: 70%'>
            Rs: $invTotal_words
        </td>
        <td>
            <b>Invoice Total</b>
        </td>
        <td style='text-align: right;'>
            <b>₹ $inv_Total</b>
        </td>
    </tr>
</table>
<hr>
<div style='height: 200px; width: 100%;'>
    <div style='height: 200px; width: 250px; float: right; text-align: center;'>
        <p>For SRI HARI COMPUTERS</p><br><br><br><br>
        <p>Authorised Signature</p>
    </div>
</div>
<table style='width: 100%; background: linear-gradient(45deg, #61adf5, #0e5585); padding: 10px 0;'>
    <tr>
        <td>THANK YOU FOR YOUR BUSINESS!</td>
        <td style='width: 150px;'>E & OE.</td>
    </tr>
</table>
";

$mpdf -> WriteHTML($data);

$mpdf -> AddPage();

$data2 = "";

$data2 .= "
<img src='img/2.jpg' width='100%'>
<table style='width: 100%;'>
    <tr style='width: 100%;'>
        <td style='border: 1px solid #000; padding: 0 20px; font-size: 12px;'>
        No: 42, Kalaingar Street CABPS5478K<br>
        Cholambedu, Thirumullaivoyal, <br>
        Chennai-600062<br>
        Ph:-+91 9360456706<br>
        -Email: srihariserviceamb@gmail.com<br>
        </td>
        <td style='padding: 0;'>
        <table style='width: 100%;'>
        <tr>
        <td style='border: 1px solid #000; font-size: 10px;'><b>PAN</b></td>
        <td style='border: 1px solid #000; font-size: 10px;'>CABPS5478K</td>
        </tr>
        <tr>
        <td style='border: 1px solid #000; font-size: 10px;'><b>GST</b></td>
        <td style='border: 1px solid #000; font-size: 10px;'>33CABPS5478K1Z8</td>
        </tr>
        <tr>
        <td style='border: 1px solid #000; font-size: 10px;'><b>Invoice Number</b></td>
        <td style='border: 1px solid #000; font-size: 10px;'>$archive_code</td>
        </tr>
        <tr>
        <td style='border: 1px solid #000; font-size: 10px;'><b>Invoice Date</b></td>
        <td style='border: 1px solid #000; font-size: 10px;'>$archive_date</td>
        </tr>
        <tr>
        <td style='border: 1px solid #000; font-size: 10px;'><b>Purchase Order</b></td>
        <td style='border: 1px solid #000; font-size: 10px;'></td>
        </tr>
        </table>
        </td>
    </tr>   
    <tr style='width: 100%;'>
        <td style='width: 50%; border: 1px solid #000; padding: 10px;'>
            <h3 style='margin: 0; font-size: 13px; color: #2b6987;'>Bill To</h3><br>
            <p style='font-size: 12px; margin: 0; color: #2b6987;'>$bill_customers_name<br>
            $bill_customers_address<br>
            Phone: $bill_customers_phone<br>
            Email: $bill_customers_email<br>
            PAN: $bill_customers_pan<br>
            GST: $bill_customers_gst</p>
        </td>

        <td style='width: 50%; border: 1px solid #000; padding: 10px;'>
            <h3 style='margin: 0; font-size: 13px; color: #2b6987;'>Ship To</h3><br>
            <p style='font-size: 12px; margin: 0; color: #2b6987;'>$ship_customers_name<br>
            $ship_customers_address<br>
            Phone: $ship_customers_phone<br>
            Email: $ship_customers_email<br>
            PAN: $ship_customers_pan<br>
            GST: $ship_customers_gst</p>
        </td>
    </tr><br>
</table>
<h4 style='margin: 0; padding: 0;'>Products:</h4>
<table style='width: 100%;'>
    <tr>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>S.No</b></td>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>Item (Description)</b></td>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>Qty</b></td>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>HSN</b></td>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>Unit Price</b></td>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>Line Total</b></td>
    </tr>";
$sno = 1;
$bill_total = 0;
$select_list_products_query = "SELECT * FROM invoice WHERE invoice_code = '$archive_code'";
$select_list_products_result = mysqli_query($connection, $select_list_products_query);
while($row = mysqli_fetch_assoc($select_list_products_result)){
    $invoice_item = $row['invoice_item'];
    $invoice_qty = $row['invoice_qty'];
    $invoice_hsn = $row['invoice_hsn'];
    $invoice_price = $row['invoice_price'];
    $invoice_price_total = round(($invoice_qty * $invoice_price), 2);
    $bill_total += round($invoice_price_total, 2);

    $data2 .= "
        <tr>
            <td style='border: 1px solid #000; padding: 3px; color: #222222; text-align: center;'>$sno</td>
            <td style='border: 1px solid #000; padding: 3px; color: #222222;'>$invoice_item</td>
            <td style='border: 1px solid #000; padding: 3px; color: #222222; text-align: center;'>$invoice_qty</td>
            <td style='border: 1px solid #000; padding: 3px; color: #222222; text-align: center;'>$invoice_hsn</td>
            <td style='border: 1px solid #000; padding: 3px; color: #222222; text-align: right;'>₹ $invoice_price</td>
            <td style='border: 1px solid #000; padding: 3px; color: #222222; text-align: right;'>₹ $invoice_price_total</td>
        </tr>
    ";
    $sno++;
}
$data2 .="
</table>
<table style='width: 100%;'>
    <tr>
        <td style='width: 70%'>
            <b style='color: #2b6987;'>Tax Amount</b>
        </td>
        <td>
            Base Value
        </td>
        <td style='text-align: right;'>
            ₹ $bill_total
        </td>
    </tr>
    ";

if($archive_tax == 'cs'){
    $tax_nine = round((($bill_total /100) * 9), 2);
    $tax_total = $tax_nine * 2;
    $tax_words = numberTowords($tax_total);
    $data2 .= "
        <tr>
            <td style='width: 70%'>
                Rs: $tax_words
            </td>
            <td>
                CGST (9%)
            </td>
            <td style='text-align: right;'>
                ₹ $tax_nine
            </td>
        </tr>
        <tr>
            <td style='width: 70%'>
                
            </td>
            <td>
                SGST (9%)
            </td>
            <td style='text-align: right;'>
                ₹ $tax_nine
            </td>
        </tr>
    ";
}elseif($archive_tax == 'i'){
    $tax_eighteen = round((($bill_total /100) * 18), 2);
    $tax_total = $tax_eighteen;
    $tax_words = numberTowords($tax_eighteen);
    $data2 .= "
        <tr>
            <td style='width: 70%'>
                Rs: $tax_words
            </td>
            <td>
                IGST (18%)
            </td>
            <td style='text-align: right;'>
                ₹ $tax_eighteen
            </td>
        </tr>
    ";
}
$inv_Total = $tax_total + $bill_total;
$invTotal_words = numberTowords($inv_Total);
$data2 .= "
</table>
<table style='width: 100%;'>
    <tr>
        <td style='width: 70%'>
            <b style='color: #2b6987;'>Invoice Value</b>
        </td>
        <td>
            Tax Total
        </td>
        <td style='text-align: right;'>
            ₹ $tax_total
        </td>
    </tr>
    <tr>
        <td style='width: 70%'>
            Rs: $invTotal_words
        </td>
        <td>
            <b>Invoice Total</b>
        </td>
        <td style='text-align: right;'>
            <b>₹ $inv_Total</b>
        </td>
    </tr>
</table>
<hr>
<div style='height: 200px; width: 100%;'>
    <div style='height: 200px; width: 250px; float: right; text-align: center;'>
        <p>For SRI HARI COMPUTERS</p><br><br><br><br>
        <p>Authorised Signature</p>
    </div>
</div>
<table style='width: 100%; background: linear-gradient(45deg, #61adf5, #0e5585); padding: 10px 0;'>
    <tr>
        <td>THANK YOU FOR YOUR BUSINESS!</td>
        <td style='width: 150px;'>E & OE.</td>
    </tr>
</table>
";

$mpdf -> WriteHTML($data2);

$mpdf -> AddPage();

$data3 = "";

$data3 .= "
<img src='img/3.jpg' width='100%'>
<table style='width: 100%;'>
    <tr style='width: 100%;'>
        <td style='border: 1px solid #000; padding: 0 20px; font-size: 12px;'>
        No: 42, Kalaingar Street CABPS5478K<br>
        Cholambedu, Thirumullaivoyal, <br>
        Chennai-600062<br>
        Ph:-+91 9360456706<br>
        -Email: srihariserviceamb@gmail.com<br>
        </td>
        <td style='padding: 0;'>
        <table style='width: 100%;'>
        <tr>
        <td style='border: 1px solid #000; font-size: 10px;'><b>PAN</b></td>
        <td style='border: 1px solid #000; font-size: 10px;'>CABPS5478K</td>
        </tr>
        <tr>
        <td style='border: 1px solid #000; font-size: 10px;'><b>GST</b></td>
        <td style='border: 1px solid #000; font-size: 10px;'>33CABPS5478K1Z8</td>
        </tr>
        <tr>
        <td style='border: 1px solid #000; font-size: 10px;'><b>Invoice Number</b></td>
        <td style='border: 1px solid #000; font-size: 10px;'>$archive_code</td>
        </tr>
        <tr>
        <td style='border: 1px solid #000; font-size: 10px;'><b>Invoice Date</b></td>
        <td style='border: 1px solid #000; font-size: 10px;'>$archive_date</td>
        </tr>
        <tr>
        <td style='border: 1px solid #000; font-size: 10px;'><b>Purchase Order</b></td>
        <td style='border: 1px solid #000; font-size: 10px;'></td>
        </tr>
        </table>
        </td>
    </tr>   
    <tr style='width: 100%;'>
        <td style='width: 50%; border: 1px solid #000; padding: 10px;'>
            <h3 style='margin: 0; font-size: 13px; color: #2b6987;'>Bill To</h3><br>
            <p style='font-size: 12px; margin: 0; color: #2b6987;'>$bill_customers_name<br>
            $bill_customers_address<br>
            Phone: $bill_customers_phone<br>
            Email: $bill_customers_email<br>
            PAN: $bill_customers_pan<br>
            GST: $bill_customers_gst</p>
        </td>

        <td style='width: 50%; border: 1px solid #000; padding: 10px;'>
            <h3 style='margin: 0; font-size: 13px; color: #2b6987;'>Ship To</h3><br>
            <p style='font-size: 12px; margin: 0; color: #2b6987;'>$ship_customers_name<br>
            $ship_customers_address<br>
            Phone: $ship_customers_phone<br>
            Email: $ship_customers_email<br>
            PAN: $ship_customers_pan<br>
            GST: $ship_customers_gst</p>
        </td>
    </tr><br>
</table>
<h4 style='margin: 0; padding: 0;'>Products:</h4>
<table style='width: 100%;'>
    <tr>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>S.No</b></td>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>Item (Description)</b></td>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>Qty</b></td>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>HSN</b></td>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>Unit Price</b></td>
        <td style='border: 1px solid #000; color: #2b6987; text-align: center; background: #cfd3d4; padding: 5px;'><b>Line Total</b></td>
    </tr>";
$sno = 1;
$bill_total = 0;
$select_list_products_query = "SELECT * FROM invoice WHERE invoice_code = '$archive_code'";
$select_list_products_result = mysqli_query($connection, $select_list_products_query);
while($row = mysqli_fetch_assoc($select_list_products_result)){
    $invoice_item = $row['invoice_item'];
    $invoice_qty = $row['invoice_qty'];
    $invoice_hsn = $row['invoice_hsn'];
    $invoice_price = $row['invoice_price'];
    $invoice_price_total = round(($invoice_qty * $invoice_price), 2);
    $bill_total += round($invoice_price_total, 2);

    $data3 .= "
        <tr>
            <td style='border: 1px solid #000; padding: 3px; color: #222222; text-align: center;'>$sno</td>
            <td style='border: 1px solid #000; padding: 3px; color: #222222;'>$invoice_item</td>
            <td style='border: 1px solid #000; padding: 3px; color: #222222; text-align: center;'>$invoice_qty</td>
            <td style='border: 1px solid #000; padding: 3px; color: #222222; text-align: center;'>$invoice_hsn</td>
            <td style='border: 1px solid #000; padding: 3px; color: #222222; text-align: right;'>₹ $invoice_price</td>
            <td style='border: 1px solid #000; padding: 3px; color: #222222; text-align: right;'>₹ $invoice_price_total</td>
        </tr>
    ";
    $sno++;
}
$data3 .="
</table>
<table style='width: 100%;'>
    <tr>
        <td style='width: 70%'>
            <b style='color: #2b6987;'>Tax Amount</b>
        </td>
        <td>
            Base Value
        </td>
        <td style='text-align: right;'>
            ₹ $bill_total
        </td>
    </tr>
    ";

if($archive_tax == 'cs'){
    $tax_nine = round((($bill_total /100) * 9), 2);
    $tax_total = $tax_nine * 2;
    $tax_words = numberTowords($tax_total);
    $data3 .= "
        <tr>
            <td style='width: 70%'>
                Rs: $tax_words
            </td>
            <td>
                CGST (9%)
            </td>
            <td style='text-align: right;'>
                ₹ $tax_nine
            </td>
        </tr>
        <tr>
            <td style='width: 70%'>
                
            </td>
            <td>
                SGST (9%)
            </td>
            <td style='text-align: right;'>
                ₹ $tax_nine
            </td>
        </tr>
    ";
}elseif($archive_tax == 'i'){
    $tax_eighteen = round((($bill_total /100) * 18), 2);
    $tax_total = $tax_eighteen;
    $tax_words = numberTowords($tax_eighteen);
    $data3 .= "
        <tr>
            <td style='width: 70%'>
                Rs: $tax_words
            </td>
            <td>
                IGST (18%)
            </td>
            <td style='text-align: right;'>
                ₹ $tax_eighteen
            </td>
        </tr>
    ";
}
$inv_Total = $tax_total + $bill_total;
$invTotal_words = numberTowords($inv_Total);
$data3 .= "
</table>
<table style='width: 100%;'>
    <tr>
        <td style='width: 70%'>
            <b style='color: #2b6987;'>Invoice Value</b>
        </td>
        <td>
            Tax Total
        </td>
        <td style='text-align: right;'>
            ₹ $tax_total
        </td>
    </tr>
    <tr>
        <td style='width: 70%'>
            Rs: $invTotal_words
        </td>
        <td>
            <b>Invoice Total</b>
        </td>
        <td style='text-align: right;'>
            <b>₹ $inv_Total</b>
        </td>
    </tr>
</table>
<hr>
<div style='height: 200px; width: 100%;'>
    <div style='height: 200px; width: 250px; float: right; text-align: center;'>
        <p>For SRI HARI COMPUTERS</p><br><br><br><br>
        <p>Authorised Signature</p>
    </div>
</div>
<table style='width: 100%; background: linear-gradient(45deg, #61adf5, #0e5585); padding: 10px 0;'>
    <tr>
        <td>THANK YOU FOR YOUR BUSINESS!</td>
        <td style='width: 150px;'>E & OE.</td>
    </tr>
</table>
";

$mpdf -> WriteHTML($data3);

$mpdf -> Output("invoice/o/$archive_code.pdf", "F");

header("location: invoice/o/$archive_code.pdf");

?>