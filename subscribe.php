<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if ($email) {
        $to = 'kkghosh0099@gmail.com'; // FIXME
        $subject = 'New Newsletter Subscription';
        $message = 'New subscription from: ' . $email;
        $headers = 'From: no-reply@example.com' . "\r\n" .
                   'Reply-To: no-reply@example.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            http_response_code(200);
            echo 'Subscription successful!';
        } else {
            http_response_code(500);
            echo 'Failed to send email.';
        }
    } else {
        http_response_code(400);
        echo 'Invalid email address.';
    }
} else {
    http_response_code(405);
    echo 'Method not allowed';
}
?>
