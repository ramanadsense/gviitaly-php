<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name        = trim($_POST['name'] ?? '');
    $mobile      = trim($_POST['mobile'] ?? '');
    $email       = trim($_POST['email'] ?? '');
    $applied_for = trim($_POST['applied_for'] ?? '');
    $location    = trim($_POST['location'] ?? '');

    // Resume Upload

    $resumePath = '';

    if (isset($_FILES['resume']) && $_FILES['resume']['error'] == 0) {

        $uploadDir = 'assets/uploads/resume/';

        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $fileExt = strtolower(pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION));

        if ($fileExt != 'pdf') {

            echo "<script>
                alert('Only PDF files are allowed.');
                history.back();
            </script>";
            exit;
        }

        $fileName = time() . '_' . preg_replace('/[^A-Za-z0-9\-]/', '_', $_FILES['resume']['name']);

        $resumePath = $uploadDir . $fileName;

        move_uploaded_file($_FILES['resume']['tmp_name'], $resumePath);
    }

    $baseUrl = (isset($_SERVER['HTTPS']) ? 'https://' : 'http://')
          . $_SERVER['HTTP_HOST']
          . dirname($_SERVER['PHP_SELF']) . '/';

    $resumeUrl = $baseUrl . $resumePath;

    // Send to Google Sheet

    $postData = json_encode([
        'form_type'    => 'Career',
        'name'         => $name,
        'mobile'       => $mobile,
        'email'        => $email,
        'applied_for'  => $applied_for,
        'location'     => $location,
        'resume'       => $resumeUrl
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

        alert('Thank you! Your application has been submitted successfully.');

        window.location.href='career.php';

    </script>";

    exit;
}
?>