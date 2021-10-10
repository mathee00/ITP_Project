<?php
include('database.php');
$database = new Database();
// $result = $database->runQuery("SELECT name,author FROM books");
$result = $database->runQuery("SELECT u2.fname As from_name, 
                                u1.fname As to_name, messages.msg, messages.dateupdated
                                FROM messages
                                INNER JOIN USERS as U1 ON messages.incoming_msg_id = U1.unique_id
                                INNER JOIN USERS as U2 ON messages.outgoing_msg_id = U2.unique_id");



// $header = $database->runQuery("SELECT UCASE(`COLUMN_NAME`) 
// FROM `INFORMATION_SCHEMA`.`COLUMNS` 
// WHERE `TABLE_SCHEMA`='crud' 
// AND `TABLE_NAME`='books'
// and `COLUMN_NAME` in ('name','author')");

$header = array("FROM","TO","MESSAGE","DATE");



require('fpdf.php');
$pdf = new FPDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

foreach($header as $heading) {
	//foreach($heading as $column_heading)
		$pdf->Cell(75,12,$heading,1);
}
foreach($result as $row) {
	$pdf->Ln();
	foreach($row as $column)
		$pdf->Cell(75,12,$column,1);
}
$pdf->Output();
?>