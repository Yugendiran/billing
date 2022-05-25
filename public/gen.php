<?php

require('vendor/autoload.php');

$mpdf=new \Mpdf\Mpdf();

$data = "";

$data .= "
<table style='width: 100%;'>
    <tr style='width: 50%;'>
        <td style='border: 1px solid #000; padding: 0;'>
        No: 42, Kalaingar Street CABPS5478K<br>
        Cholambedu, Thirumullaivoyal, <br>
        Chennai-600062<br>
        Ph:-+91 9360456706<br>
        -Email: srihariserviceamb@gmail.com<br>
        </td>
        <td style='padding: 0;'>
        <table style='width: 100%;'>
        <tr>
        <td style='border: 1px solid #000;'>PAN</td>
        <td style='border: 1px solid #000;'>asdasd</td>
        </tr>
        <tr>
        <td style='border: 1px solid #000;'>PAN</td>
        <td style='border: 1px solid #000;'>asdasd</td>
        </tr>
        <tr>
        <td style='border: 1px solid #000;'>PAN</td>
        <td style='border: 1px solid #000;'>asdasd</td>
        </tr>
        <tr>
        <td style='border: 1px solid #000;'>PAN</td>
        <td style='border: 1px solid #000;'>asdasd</td>
        </tr>
        <tr>
        <td style='border: 1px solid #000;'>PAN</td>
        <td style='border: 1px solid #000;'>asdasd</td>
        </tr>
        </table>
        </td>
    </tr>
    
    <tr style='width: 50%;'>
        <td style='border: 1px solid #000;'>
            <h3>Bill To</h3><br>
            The Principal,<br>
            Murugappa Polytechnic College, Sathyamurthy Nagar,<br>
            Chennai - 600062<br>
            914426385713<br>
            PAN:-AAATA0509N<br>
            GST:-33AAATA0509N2Z0
        </td>
        <td style='border: 1px solid #000;'>
            <h3>Ship To</h3><br>
            The Principal,<br>
            Murugappa Polytechnic College, Sathyamurthy Nagar,<br>
            Chennai - 600062<br>
            914426385713<br>
            PAN:-AAATA0509N<br>
            GST:-33AAATA0509N2Z0
        </td>
    </tr><br>
</table>
<h4 style='margin: 0; padding: 0;'>Products:</h4>
<table style='width: 100%;'>
    <tr>
        <td style='border: 1px solid #000;'>S.No</td>
        <td style='border: 1px solid #000;'>Item (Description)</td>
        <td style='border: 1px solid #000;'>Qty</td>
        <td style='border: 1px solid #000;'>HSN</td>
        <td style='border: 1px solid #000;'>Unit Price</td>
        <td style='border: 1px solid #000;'>Line Total</td>
    </tr>
    <tr>
        <td style='border: 1px solid #000;'>1</td>
        <td style='border: 1px solid #000;'>HP Toner Refilling with blade replacement(Tool & Die Dept.)</td>
        <td style='border: 1px solid #000;'>1</td>
        <td style='border: 1px solid #000;'>544575</td>
        <td style='border: 1px solid #000;'>1000</td>
        <td style='border: 1px solid #000;'>1000</td>
    </tr>
    <tr>
        <td style='border: 1px solid #000;'>2</td>
        <td style='border: 1px solid #000;'></td>
        <td style='border: 1px solid #000;'></td>
        <td style='border: 1px solid #000;'></td>
        <td style='border: 1px solid #000;'></td>
        <td style='border: 1px solid #000;'></td>
    </tr>
    <tr>
        <td style='border: 1px solid #000;'>3</td>
        <td style='border: 1px solid #000;'></td>
        <td style='border: 1px solid #000;'></td>
        <td style='border: 1px solid #000;'></td>
        <td style='border: 1px solid #000;'></td>
        <td style='border: 1px solid #000;'></td>
    </tr>
    <tr>
        <td style='border: 1px solid #000;'>4</td>
        <td style='border: 1px solid #000;'></td>
        <td style='border: 1px solid #000;'></td>
        <td style='border: 1px solid #000;'></td>
        <td style='border: 1px solid #000;'></td>
        <td style='border: 1px solid #000;'></td>
    </tr>
    <tr>
        <td style='border: 1px solid #000;'>5</td>
        <td style='border: 1px solid #000;'></td>
        <td style='border: 1px solid #000;'></td>
        <td style='border: 1px solid #000;'></td>
        <td style='border: 1px solid #000;'></td>
        <td style='border: 1px solid #000;'></td>
    </tr>
</table>
<table style='width: 100%;'>
    <tr>
        <td style='width: 70%'>
            Tax Amount
        </td>
        <td>
            Base Value
        </td>
        <td style='text-align: right;'>
            210.00
        </td>
    </tr>
    <tr>
        <td style='width: 70%'>
            Rs. Thirty-Seven and Paise Eighty Only
        </td>
        <td>
            CGST
        </td>
        <td style='text-align: right;'>
            18.90
        </td>
    </tr>
    <tr>
        <td style='width: 70%'>
            
        </td>
        <td>
            SGST
        </td>
        <td style='text-align: right;'>
            18.90
        </td>
    </tr>
</table>
<table style='width: 100%;'>
    <tr>
        <td style='width: 70%'>
            Invoice Value
        </td>
        <td>
            Tax Total
        </td>
        <td style='text-align: right;'>
            210.00
        </td>
    </tr>
    <tr>
        <td style='width: 70%'>
            Rs. Thirty-Seven and Paise Eighty Only
        </td>
        <td>
            Invoice Total
        </td>
        <td style='text-align: right;'>
            ₹ 247.80
        </td>
    </tr>
</table>
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

$mpdf -> Output("invoice/myfile1.pdf", "F");

header("location: index.html");

?>