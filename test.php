<?php
// Database connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "your_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to generate OTP
function generateOTP() {
    return str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
}

// Function to insert OTP into database
function storeOTP($otp, $conn) {
    $timestamp = time();
    $sql = "INSERT INTO otp_table (otp, created_at) VALUES ('$otp', '$timestamp')";
    if ($conn->query($sql) === TRUE) {
        echo "OTP stored successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Function to verify OTP
function verifyOTP($otp, $conn) {
    $timestamp = time() - 60; // 1 minute ago
    $sql = "SELECT * FROM otp_table WHERE otp='$otp' AND created_at > $timestamp";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // OTP found and is valid
        return true;
    } else {
        // OTP not found or expired
        return false;
    }
}

// Generate OTP
$otp = generateOTP();

// Store OTP in database
storeOTP($otp, $conn);

// Wait for 1 minute
sleep(60);

// Verify OTP
if (verifyOTP($otp, $conn)) {
    echo "OTP is valid.";
} else {
    echo "OTP is invalid or expired.";
}

// Close database connection
$conn->close();
?>
