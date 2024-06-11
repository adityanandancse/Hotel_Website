<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $checkin = filter_var($_POST['checkin'], FILTER_SANITIZE_STRING);
    $checkout = filter_var($_POST['checkout'], FILTER_SANITIZE_STRING);
    $adults = filter_var($_POST['adults'], FILTER_SANITIZE_NUMBER_INT);
    $children = filter_var($_POST['children'], FILTER_SANITIZE_NUMBER_INT);

    if ($checkin && $checkout && $adults && $children) {
        $to = 'kkghosh0099@gmail.com'; //FIXME
        $subject = 'New Booking Submission';
        $message = "New booking details:\n\nCheck-in: $checkin\nCheck-out: $checkout\nAdults: $adults\nChildren: $children";
        $headers = 'From: no-reply@example.com' . "\r\n" .
                   'Reply-To: no-reply@example.com' . "\r\n" .
                   'X-Mailer: PHP/' . phpversion();

        if (mail($to, $subject, $message, $headers)) {
            http_response_code(200);
            echo 'Booking submission successful!';
        } else {
            http_response_code(500);
            echo 'Failed to send email.';
        }
    } else {
        http_response_code(400);
        echo 'Invalid booking details.';
    }
} else {
    http_response_code(405);
    echo 'Method not allowed';
}
?>
