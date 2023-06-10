<?php
session_start();
require('fpdf\fpdf.php');
include('config.php');

//Select data from MySQL database
$tracking_no = $_GET['t'];
$select = "SELECT * FROM orders WHERE tracking_no='$tracking_no' ";
$query_run = mysqli_query($conn, $select);
$data = mysqli_fetch_array($query_run);

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 20);
$pdf->Cell(71, 10, '', 0, 0); //end of line
$pdf->Cell(59, 5, 'INVOICE', 0, 0); //end of line
$pdf->Cell(59, 10, '', 0, 1); //end of line
$pdf->line(0, 18, 220, 18);

//Cell(width , height , text , border , end line , [align] )
$pdf->SetFont('Arial', 'B', 15);

$pdf->Cell(130, 5, 'TechAliens', 0, 1);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(130, 5, 'Virar(East)-401305', 0, 0);
$pdf->Cell(59, 5, '', 0, 1); //end of line

$pdf->Cell(130, 5, 'T.Vasai ,Maharashtra', 0, 0);
$pdf->Cell(25, 5, 'Date & Time:', 0, 0);
$pdf->Cell(34, 5, $data['created_at'], 0, 1); //end of line

$pdf->Cell(130, 5, 'Phone: 8605422632', 0, 0);
$pdf->Cell(25, 5, 'Order Id:', 0, 0);
$pdf->Cell(34, 5,  $data['id'], 0, 1); //end of line

$pdf->Cell(130, 5, '', 0, 0);
$pdf->Cell(25, 5, 'Customer ID:', 0, 0);
$pdf->Cell(34, 5, $data['user_id'], 0, 1); //end of line

$pdf->Cell(189, 10, '', 0, 1); //make a dummy empty cell as a vertical spacer

//Shipping address
$pdf->Cell(100, 5, 'Shipping Address: ', 0, 1); //end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, $data['name'], 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, 'Address: ' . $data['address'], 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, 'Email: ' . $data['email'], 0, 1);

$pdf->Cell(10, 5, '', 0, 0);
$pdf->Cell(90, 5, 'Contact No: ' . $data['phone'], 0, 1);
$pdf->Cell(10, 5, '', 0, 0);

$pdf->Cell(189, 10, '', 0, 1); //make a dummy empty cell as a vertical spacer

$pdf->SetFont('Arial', 'B', 12); //invoice contents

// $pdf->Cell(50, 5, 'Product', 1, 0);
$pdf->Cell(140, 5, 'Product Description', 1, 0);
$pdf->Cell(20, 5, 'Qty', 1, 0);
$pdf->Cell(30, 5, 'Price', 1, 1);

$pdf->SetFont('Arial', '', 12);

$userId = $_SESSION['auth_user']['user_id']; //fetching data
$order_query = "SELECT o.id as oid, o.tracking_no,o.user_id,oi.*,oi.qty as orderqty,p.* FROM orders o,order_items oi,
        products p WHERE o.user_id='$userId' AND oi.order_id=o.id AND p.id=oi.prod_id  
        AND o.tracking_no='$tracking_no' ";
$order_query_run = mysqli_query($conn, $order_query);

if (mysqli_num_rows($order_query_run) > 0) {
  foreach ($order_query_run as $item) {
    $pdf->Cell(140, 5, $item['small_description'], 1, 0);
    $pdf->Cell(20, 5, $item['orderqty'], 1, 0, 'R');
    $pdf->Cell(30, 5, $item['price'], 1, 1, 'R');
  }
}

$pdf->Cell(140, 5, '', 0, 0);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(20, 5, 'Total', 1, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(30, 5, 'Rs.' . $data['total_price'], 1, 1, 'R');
$pdf->Cell(140, 5, '', 0, 1);
$pdf->Cell(140, 5, '', 0, 1);
$pdf->Cell(140, 5, 'This is computer generated invoice', 0, 1);
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(140, 5, 'TechAlien', 0, 0);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(10, 5, 'Thanks For Shopping', 0, 0);
$pdf->Output();
