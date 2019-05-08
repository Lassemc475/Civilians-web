<?php
    require ('steamauth/steamauth.php');
?>
<?php include("top.php"); ?>
		<?php
if(!isset($_SESSION['steamid'])) {
    echo "<div style='margin-bottom: 15px; color: white; padding: 15px 15px 15px 15px; margin-left: auto; margin-right: auto; margin-top: 100px; text-align: center;'>Login her<br>";
    loginbutton();
	echo "</div>";
	}  else {
    include ('steamauth/userInfo.php');
	?>


<section class="register">
    <form action="lookup.php" method="post">

      <div class="col-sm-3">
      <input type="text" name="id" placeholder="Indtast id'et du vil søge efter"><br>



        <input class="button" type="submit" name="Submit" value="Søg">
      </div>

  </form>
</section>
		<?php
		}
		?>


	</div>

	<!--Version 4.0-->
  </body>
</html>
