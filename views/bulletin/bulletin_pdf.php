<?php
// bulletin_pdf.php
global $pdo;
require '../../config/db.php';
require('../../config/PDF/fpdf.php');

$employe_id = $_GET['id'];
$sql = "SELECT * FROM employes WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $employe_id]);
$employe = $stmt->fetch();

// Récupérer le dernier bulletin de paie
$sql = "SELECT * FROM bulletins_paie WHERE employe_id = :id ORDER BY date_paie DESC LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->execute([':id' => $employe_id]);
$bulletin = $stmt->fetch();

$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);

$pdf->Cell(40, 10, 'Bulletin de Salaire');
$pdf->Ln(10);
$pdf->SetFont('Arial', '', 12);
$pdf->Cell(40, 10, 'Nom : ' . $employe['nom']);
$pdf->Ln(5);
$pdf->Cell(40, 10, 'Prenom : ' . $employe['prenom']);
$pdf->Ln(5);
$pdf->Cell(40, 10, 'Poste : ' . $employe['poste']);
$pdf->Cell(40, 10, 'Departement : ' . $employe['departement']);
$pdf->Ln(5);
$pdf->Cell(40, 10, 'Salaire Brut : ' . $bulletin['salaire_brut'] . ' EUR');
$pdf->Ln(5);
$pdf->Cell(40, 10, 'Cotisations : ' . $bulletin['cotisations'] . '%');
$pdf->Ln(5);
$pdf->Cell(40, 10, 'Salaire Net : ' . $bulletin['salaire_net'] . ' EUR');

$pdf->Output('bulletin_salaire.pdf', 'D');
?>
