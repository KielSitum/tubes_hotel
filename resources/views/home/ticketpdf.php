<?php
// 1. Ambil Data Booking dari Sumber Data Anda (misalnya dari database)

// Misalnya, Anda punya data booking dalam array seperti ini:
$bookingData = array(
    array('Booking ID' => 1, 'Name' => 'John Doe', 'Email' => 'john@example.com', 'Phone' => '123456789', 'Arrival Date' => '2024-06-01', 'End Date' => '2024-06-05'),
    array('Booking ID' => 2, 'Name' => 'Jane Doe', 'Email' => 'jane@example.com', 'Phone' => '987654321', 'Arrival Date' => '2024-06-10', 'End Date' => '2024-06-15'),
    // Add more booking data as needed
);

// 2. Gunakan Library PDF (misalnya TCPDF)
require_once('tcpdf/tcpdf.php');

// 3. Buat PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// 4. Kelola Format dan Layout
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Booking Details');
$pdf->SetSubject('Booking Information');
$pdf->SetKeywords('Booking, Details, PDF');

$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

$pdf->SetFont('helvetica', '', 10);

$pdf->AddPage();

// Tambahkan data booking ke dalam PDF
foreach ($bookingData as $booking) {
    $pdf->Cell(40, 10, $booking['Booking ID'], 1);
    $pdf->Cell(40, 10, $booking['Name'], 1);
    $pdf->Cell(40, 10, $booking['Email'], 1);
    $pdf->Cell(30, 10, $booking['Phone'], 1);
    $pdf->Cell(30, 10, $booking['Arrival Date'], 1);
    $pdf->Cell(30, 10, $booking['End Date'], 1);
    $pdf->Ln();
}

// Close and output PDF document
$pdf->Output('booking_details.pdf', 'D');
?>
