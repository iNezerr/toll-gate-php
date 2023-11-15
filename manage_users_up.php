<div class="table-responsive-sm" style="max-height: 870px;">
  <table class="table">
    <thead class="table-primary">
      <tr>
        <th>User ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>vehicle Number</th>
        <th>RFID Card Number</th>
        <th>Date Created</th>
      </tr>
    </thead>
    <tbody class="table-secondary">
      <?php
      //Connect to database
      require 'connectDB.php';

      $sql = "SELECT * FROM rfid_users ORDER BY id DESC";
      $result = mysqli_stmt_init($conn);
      if (!mysqli_stmt_prepare($result, $sql)) {
        echo '<p class="error">SQL Error</p>';
      } else {
        mysqli_stmt_execute($result);
        $resultl = mysqli_stmt_get_result($result);
        if (mysqli_num_rows($resultl) > 0) {
          while ($row = mysqli_fetch_assoc($resultl)) {
            ?>
            <TR>
              <TD>
                <?php
                if (isset($card_uid) && $row['id'] == $card_uid) {
                  echo "<span><i class='glyphicon glyphicon-ok' title='The selected UID'></i></span>";
                }
                $card_uid = $row['id'];
                ?>
                <form>
                  <button type="button" class="select_btn" id="<?php echo $row['id']; ?>" title="select this UID">
                    <?php echo $row['id']; ?>
                  </button>
                </form>
              </TD>
              <TD>
                <?php echo $row['user_name']; ?>
              </TD>
              <TD>
                <?php echo $row['phone_number']; ?>
              </TD>
              <TD>
                <?php echo $row['vehicle_number']; ?>
              </TD>
              <TD>
                <?php echo $row['rfid_card_number']; ?>
              </TD>
              <TD>
                <?php echo $row['date_created']; ?>
              </TD>
            </TR>
            <?php
          }
        }
      }
      ?>
    </tbody>
  </table>
</div>