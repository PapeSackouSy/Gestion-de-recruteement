<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Offre;
use setasign\Fpdi\Fpdi;
class PDFController extends Controller
{

    public function modifyPDF($id)
    {
        $data = Offre::find($id);
        $filePath = public_path('Auth/Asset2/pdf/avis2.pdf');
        $pdf = new FPDI();
        $pageCount = $pdf->setSourceFile($filePath);

    $pdf->AddPage();

for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
    $templateId = $pdf->importPage($pageNo);
    $pdf->useTemplate($templateId, null, null, 210, 297);
    $pdf->SetFont('Arial', '', 11);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetXY(9, 110);
    $formattedData = [
        ' POSTE ' => utf8_decode($data['libelle']),
        'PROFIL DU POSTE ' => utf8_decode($data['profil_poste']),
        'DIPLOMES REQUIS ' => utf8_decode($data['diplomes_requis']),
        'EXPERIENCE PROFESSIONNELLE ' => utf8_decode($data['experience_professionnelle']),
        'DETAILS ' => utf8_decode($data['details']),
        'DESCRIPTION DU POSTE ' => utf8_decode($data['description']),
        'COMPOSITION DU DOSSIER DE CANDIDATURE ' => utf8_decode($data['profils_competences']),
        'DEPOT DE CANDIDATURE  ' => utf8_decode($data['composition_dossier']),
    ];
    foreach ($formattedData as $key => $value) {
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->MultiCell(0, 20, "$key :", 0, 'C');
        $pdf->SetFont('Arial', '', 10);
        $pdf->MultiCell(0, 10, "$value\n", 0, 'C');

    }
}
        $pdf->Output('output.pdf', 'F');
       return response()->download('output.pdf');
    }

}
