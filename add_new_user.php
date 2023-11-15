<?php
//Connect to database
require 'connectDB.php';
// print_r($_POST);exit();
//custom add new user
if (isset($_POST['Add'])) {

  $user_id = $_POST['user_id'];
  $Uname = $_POST['name'];
  $PhoneNumber = $_POST['number'];
  $VehicleNumber = $_POST['vehicle_number'];
  $RfidNumber = $_POST['rfid_card_number'];
  // sql to check if the rfid number already exists
  $sql = "SELECT id FROM rfid_users WHERE rfid_card_number='$RfidNumber'";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    echo "RFID number already exists.";
    // Close the connection
    $conn->close();
  } else {


    // $Gender = $_POST['gender'];
    // Insert the variables into the MySQL `rfid_users` table
    $sql = "INSERT INTO rfid_users (user_name, phone_number, vehicle_number, rfid_card_number) VALUES (?, ?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {

      // Bind variables to the prepared statement as parameters
      $stmt->bind_param("ssss", $Uname, $PhoneNumber, $VehicleNumber, $RfidNumber);

      // Execute the prepared statement
      if ($stmt->execute()) {
        echo 1;
      } else {
        echo "Error: " . $stmt->error;
      }

      // Close the prepared statement
      $stmt->close();
    } else {
      echo "Error: " . $conn->error;
    }

    // Close the connection
    $conn->close();

  }
}