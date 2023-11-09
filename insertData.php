<?php
    require 'connectDB.php';

    // The data to be inserted into the "admin" table
    $admin_name = "eben";
    $admin_email = "eben@admin.com";
    $admin_pwds = "Admin";
    $admin_pwd = password_hash($admin_pwds, PASSWORD_DEFAULT); // Hashing the password

    // Insert the data into the "admin" table
    $sql = "INSERT INTO admin (admin_name, admin_email, admin_pwd)
    VALUES ('$admin_name', '$admin_email', '$admin_pwd')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
?>