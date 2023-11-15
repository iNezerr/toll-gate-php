<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <title>Add Users</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="image/png" href="images/favicon.png">
  <link rel="stylesheet" type="text/css" href="css/manageusers.css">

  <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
    crossorigin="anonymous">
    </script>
  <script type="text/javascript" src="js/bootbox.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
  <script src="js/manage_users.js"></script>
  <script>
    $(window).on("load resize ", function () {
      var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
      $('.tbl-header').css({ 'padding-right': scrollWidth });
    }).resize();
  </script>
  <script>
    $(document).ready(function () {
      $.ajax({
        url: "manage_users_up.php"
      }).done(function (data) {
        $('#manage_users').html(data);
      });
      setInterval(function () {
        $.ajax({
          url: "manage_users_up.php"
        }).done(function (data) {
          $('#manage_users').html(data);
        });
      }, 5000);
    });
  </script>
</head>

<body>
  <?php include'header.php';?>
  <main>
    <h1 class="slideInDown animated">Add a new User information</h1>
    <div class="form-style-5 slideInDown animated">
      <form enctype="multipart/form-data">
        <div class="alert_user"></div>
        <fieldset>
          <!-- <legend><span class="number">1</span> User Info</legend> -->
          <input type="hidden" name="user_id" id="user_id">
          <input type="text" name="name" id="name" placeholder="User Name...">
          <input type="text" name="phone_number" id="phone_number" placeholder="Phone Number...">
          <input type="text" name="vehicle_number" id="vehicle_number" placeholder="Vehicle Number...">
          <input type="text" name="rfid_card_number" id="rfid_card_number" placeholder="RFID Card Number...">
          <!-- <input type="email" name="email" id="email" placeholder="User Email..."> -->
        </fieldset>

        <button type="button" name="user_add" class="custom_user_add">Add User</button>
      </form>
    </div>

    <!--User table-->
    <div class="section">

      <div class="slideInRight animated">
        <div id="manage_users"></div>
      </div>
    </div>
  </main>
</body>

</html>