<?php

namespace App;

use setasign\Fpdi\Fpdi;

class CustomPDF extends FPDI {
    // Pied de page
    function Footer() {
        // Positionnement à 1,5 cm du bas
        $this->SetY(-40);
        // Police Arial italique 8
        $this->SetFont('Arial', 'I', 8);
        // Texte du pied de page
        $this->MultiCell(0, 10,
            "Université Alioune Diop de Bambey\n" .
            "Tél. : (221) 33 973 30 86\n" .
            "Fax : (221) 33 973 30 93\n" .
            "B.P. : 30 – Bambey (République du Sénégal)\n" .
            "Internet : www.uadb.edu.sn\n" .
            "Courriel : rectorat@uadb.edu.sn",
            0, 'C');
    }
}
