<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $category = trim($_POST['category'] ?? '');
    $name     = trim($_POST['name'] ?? '');
    $company  = trim($_POST['company'] ?? '');
    $mobile   = trim($_POST['mobile'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $message  = trim($_POST['message'] ?? '');
    $form_type = trim($_POST['form_type'] ?? 'Catalog Request');


    // Google Sheet Data
    $postData = json_encode([
        'form_type' => $form_type,
        'category'  => $category,
        'name'      => $name,
        'company'   => $company,
        'mobile'    => $mobile,
        'email'     => $email,
        'message'   => $message
    ]);


    // Google Apps Script URL
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


    // Select Catalog PDF according to category

    if ($category == "Modular Kitchen Fittings") {

        $pdfFile = "assets/brochure/GVI-Modular-Kitchen-Fittings-Catalog-2024.pdf";
        $downloadName = "GVI-Modular-Kitchen-Fittings-Catalog-2024.pdf";

    } elseif ($category == "Modular Wardrobe Fittings") {

        $pdfFile = "assets/brochure/GVI-Modular-Wardrobe-Fittings-Catalog-2024.pdf";
        $downloadName = "GVI-Modular-Wardrobe-Fittings-Catalog-2024.pdf";

    } elseif ($category == "Architectural Furniture") {

        $pdfFile = "assets/brochure/GVI-Architectural-Hardware-Catalog-2024.pdf";
        $downloadName = "GVI-Architectural-Hardware-Catalog-2024.pdf";

    } elseif ($category == "Drawer locks") {

        $pdfFile = "assets/brochure/Elephant-Drawer-Locks-Catalog-2024.pdf";
        $downloadName = "Elephant-Drawer-Locks-Catalog-2024.pdf";

    } elseif ($category == "Aluminium Profiles") {

        $pdfFile = "assets/brochure/GVI-Aluminium-Profiles-Catalog-2024.pdf";
        $downloadName = "GVI-Aluminium-Profiles-Catalog-2024.pdf";

    } else {

        die('Invalid catalog category');

    }


    // Check PDF exists

    if (!file_exists($pdfFile)) {
        die('PDF not found');
    }


    // Download PDF

    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . $downloadName . '"');
    header('Content-Length: ' . filesize($pdfFile));

    readfile($pdfFile);

    exit;
}
?>