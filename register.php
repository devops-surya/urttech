<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    
    // Set sender name and email
    $from_name = ""; // Change this to the desired sender name
    $from_email = "urttechtechnologies@gmail.com"; // Change this to the desired sender email
    
    // Email to site admin
    $admin_email = "urttechtechnologies@gmail.com"; // Change this to your admin email
    $admin_subject = "New Registration";
    $admin_message = "A new user registered.\n\nName: $name\nEmail: $email\nPhone: $phone";
    // Set additional headers for admin email
    $admin_headers = "From: $from_name <$from_email>" . "\r\n";
    // Send email to admin
    mail($admin_email, $admin_subject, $admin_message, $admin_headers);
    
    // Email to user
    $user_subject = "Welcome to URTTECH Technologies";
    $user_message = "Dear $name,\n\nThank you for registering with URTTECH Technologies. We will get back to you shortly.\n\nBest regards,\nURTTECH TECHNOLOGIES";
    // Set additional headers for user email
    $user_headers = "From: $from_name <$from_email>" . "\r\n";
    // Send email to user
    mail($email, $user_subject, $user_message, $user_headers);
    
    // Redirect to a thank you page
    header("Location: thank_you.html"); // Create a thank_you.html page
    exit;
}
?>

