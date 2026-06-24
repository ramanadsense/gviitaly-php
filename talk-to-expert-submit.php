<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name       = trim($_POST['name'] ?? '');
    $company    = trim($_POST['company'] ?? '');
    $mobile     = trim($_POST['mobile'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $category   = trim($_POST['category'] ?? '');
    $message    = trim($_POST['message'] ?? '');

    $postData = json_encode([
        'form_type' => 'Talk To Expert',
        'category'  => $category,
        'name'      => $name,
        'company'   => $company,
        'mobile'    => $mobile,
        'email'     => $email,
        'message'   => $message
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

    echo "<script>

        alert('Thank you! Our expert team will contact you shortly.');

        window.location.href='talk-to-expert.php';

    </script>";

    exit;
}
?>