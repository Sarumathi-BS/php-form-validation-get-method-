<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    // Collect form data
    $name            = trim($_GET['name'] ?? '');
    $email           = trim($_GET['email'] ?? '');
    $mobile          = trim($_GET['mobile'] ?? '');
    $college         = trim($_GET['college'] ?? '');
    $password        = trim($_GET['password'] ?? '');
    $confirmPassword = trim($_GET['confirmPassword'] ?? '');

    // Basic validation
    if (empty($name) || empty($email) || empty($mobile) || empty($college) || empty($password) || empty($confirmPassword)) {
        echo "All fields are required."; exit;
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format."; exit;
    }

    if (!preg_match("/^[6-9]\d{9}$/", $mobile)) {
        echo "Invalid mobile number."; exit;
    }

    if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@#$%^&+=!]).{8,}$/", $password)) {
        echo "Weak password. Password must have at least 8 characters, 1 uppercase, 1 lowercase, 1 number, and 1 special character."; exit;
    }

    if ($password !== $confirmPassword) {
        echo "Passwords do not match."; exit;
    }

    // If all validations pass
    echo "Registration successful!";
}
?>
