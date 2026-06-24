<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name     = trim($_POST['name'] ?? '');
    $mobile   = trim($_POST['mobile'] ?? '');
    $company  = trim($_POST['company'] ?? '');
    $form_type = trim($_POST['form_type'] ?? '');

    $postData = json_encode([
        'name'     => $name,
        'mobile'   => $mobile,
        'company'  => $company,
        'form_type' => $form_type
    ]);

    $ch = curl_init();

    curl_setopt_array($ch, [

        CURLOPT_URL => 'https://script.google.com/macros/s/AKfycbyQS-X5VcxvfOe4-_CdCFdabjHvELLB7pRrCn8sROViIZEcoRHfW4AygpCNDYpSOBNj/exec',

        CURLOPT_POST => true,

        CURLOPT_POSTFIELDS => $postData,

        CURLOPT_HTTPHEADER => [
            'Content-Type: application/json'
        ],

        CURLOPT_RETURNTRANSFER => true
    ]);

    $response = curl_exec($ch);

    curl_close($ch);

    if ($form_type == "Modular Kitchen Fittings") {

        $pdfFile = "assets/brochure/GVI-Modular-Kitchen-Fittings-Catalog-2024.pdf";
        $downloadName = "GVI-Modular-Kitchen-Fittings-Catalog-2024.pdf";

    } elseif ($form_type == "Modular Wardrobe Fittings") {

        $pdfFile = "assets/brochure/GVI-Modular-Wardrobe-Fittings-Catalog-2024.pdf";
        $downloadName = "GVI-Modular-Wardrobe-Fittings-Catalog-2024.pdf";

    } elseif ($form_type == "Architectural Furniture") {

        $pdfFile = "assets/brochure/GVI-Architectural-Hardware-Catalog-2024.pdf";
        $downloadName = "GVI-Architectural-Hardware-Catalog-2024.pdf";

    } elseif ($form_type == "Drawer locks") {

        $pdfFile = "assets/brochure/Elephant-Drawer-Locks-Catalog-2024.pdf";
        $downloadName = "Elephant-Drawer-Locks-Catalog-2024.pdf";

    } elseif ($form_type == "Aluminium Profiles") {

        $pdfFile = "assets/brochure/GVI-Aluminium-Profiles-Catalog-2024.pdf";
        $downloadName = "GVI-Aluminium-Profiles-Catalog-2024.pdf";

    } else {

        die('Invalid brochure type');
    }

    if (!file_exists($pdfFile)) {
        die('PDF not found');
    }

    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="'.$downloadName.'"');
    header('Content-Length: ' . filesize($pdfFile));

    readfile($pdfFile);
    exit;
}
?>