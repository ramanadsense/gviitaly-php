<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name       = trim($_POST['name'] ?? '');
    $company    = trim($_POST['company'] ?? '');
    $mobile     = trim($_POST['mobile'] ?? '');
    $email      = trim($_POST['email'] ?? '');
    $user_type   = trim($_POST['user_type'] ?? '');
    $message    = trim($_POST['message'] ?? '');

    $postData = json_encode([
        'form_type' => 'Sample Kit Request',
        'user_type' => $user_type,
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

        alert('Thank you! Your sample kit request has been submitted successfully. Our team will contact you shortly.');

        window.location.href='sample-kit.php';

    </script>";

    exit;
}
?>