<?php
    require ('steamauth/steamauth.php');
?>
<?php include("top.php"); ?>
		<?php
if(!isset($_SESSION['steamid'])) {
    echo "<div style='margin: 30px auto; text-align: center;'>Velkommen til!<br>";
    loginbutton();
	echo "</div>";
	}  else {
    include ('steamauth/userInfo.php');
	?>

  <?php
  if(!isset($_SESSION['steamid'])) {
  echo "<div style='margin: 30px auto; text-align: center;'>Velkommen til!<br>";

  echo "</div>";
  }  else {
  include ('steamauth/userInfo.php');

  if ($steamprofile['steamid'] === "76561198867773920") {
}
elseif ($steamprofile['steamid'] === "76561198867773920") {
} else {
    echo "Du har ikke adgang.";
    echo "<br>Hvis du mener at du burde have adgang, har du nok ikke rettet lookup.php filen :)";
    die();
  }
  }

  ?>



  <?php
  $id = $_POST['id'];

  $con=mysqli_connect("94.245.90.245","morty","123","vrp");
  // Check connection
  if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  $result = mysqli_query($con,"SELECT * FROM vrp_user_ids WHERE user_id = $id");



  while($row = mysqli_fetch_array($result))

  {

    $steam = $row['identifier'];


    $result = mysqli_query($con,"SELECT * FROM vrp_user_identities WHERE user_id = $id");


    while($row = mysqli_fetch_array($result))

    {
      $firstname = $row['firstname'];
      $lastname  = $row['name'];
      $cpr  = $row['registration'];
      $phone  = $row['phone'];


    }
    $result = mysqli_query($con,"SELECT * FROM vrp_user_moneys WHERE user_id = $id");


    while($row = mysqli_fetch_array($result))

    {
      $wallet = $row['wallet'];
      $bank  = $row['bank'];


    }
    $result = mysqli_query($con,"SELECT * FROM vrp_users WHERE id = $id");


    while($row = mysqli_fetch_array($result))

    {
      $whitelisted = $row['whitelisted'];
      $reason  = $row['reason'];


    }

  }

  mysqli_close($con);
  ?>


  <div class="row">
    <div class="column">
      <h2>Ingame</h2>
      <p><b>Navn:</b> <?php echo ($firstname) ?> <?php echo ($lastname) ?></p>
      <p><b>CPR:</b> <?php echo ($cpr) ?>-<b><?php echo ($id) ?></b></p>
      <p><b>Telefonnummer:</b> <?php echo ($phone) ?></p>
      <p><b>Steam Hex:</b> <?php echo ($steam) ?></p>
    </div>


        <div class="column">
          <h2>Penge</h2>
          <p><b>Bank:</b> <?php echo ($bank) ?> kr</p>
          <p><b>Kontanter:</b> <?php echo ($wallet) ?> kr</p>
        </div>


    <div class="column">
      <h2>Whitelist/ban</h2>
      <p><b>Whitelisted:</b> <?php echo ($whitelisted) ?></p>
      <p><b>Ban grund:</b> <?php echo ($reason) ?></p>
    </div>

    <div class="column">
      <h2>Køretøjer</h2>


      <?php


      // Create connection
      $conn=mysqli_connect("localhost","user","pass","vrpfx");
      // Check connection
      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

      $sql = "SELECT vehicle, vehicle_name FROM vrp_user_vehicles WHERE user_id = 1 AND NOT veh_type = 'default'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          // output data of each row
           while($row = $result->fetch_assoc()) {

             $bil  = $row['vehicle'] . " - " . $row['vehicle_name'] . "<br>";
              echo $bil;
          }
      } else {

          echo "Personen ejer ingen køretøjer.";
      }
      $conn->close();
      ?>


    </div>





  </div>

		<?php
		}
		?>


	</div>

	<!--Version 4.0-->
  </body>
</html>
