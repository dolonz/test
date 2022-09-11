<!DOCTYPE html>
<html>
  <head>

    <title>RESERVATION</title>
    <link href="3-theme.css" rel="stylesheet">
    
    
  </head>
    
    
    
  <body>
    
    <?php
    // (A) PROCESS RESERVATION
    if (isset($_POST["date"])) {
      require "2-reserve.php";
      if ($_RSV->save(
        $_POST["date"], $_POST["slot"], $_POST["name"],
        $_POST["email"], $_POST["tel"],  $_POST["pack"],$_POST["guests"],$_POST["notes"])) {
        echo "<div class='ok'>Reservation saved.</div>";
      } else { echo "<div class='err'>".$_RSV->error."</div>"; }
    }
    ?>

    <!-- (B) RESERVATION FORM -->
    
    <form id="resForm" method="post" target="_self">
    <h1>RESERVATION</h1>  
      <label for="res_name">Full Name</label>
      <input type="text" required name="name" />

      <label for="res_email">E-mail</label>
      <input type="email" required name="email" />

      <label for="res_tel">Telephone Number</label>
      <input type="text" required name="tel" />

     

      <?php
      $mindate = date("Y-m-d");
      ?>
      <label>Reservation Date</label>
      <input type="date" required id="res_date" name="date"
             min="<?=$mindate?>">

      <label>Time</label>
      <select name="slot">
        <option value="8:00-10:00">8:00-10:00</option>
        <option value="10:00-12:00">10:00-12:00</option>
        <option value="14:00-16:00">14:00-16:00</option>
        <option value="16:00-18:00">16:00-18:00</option>
        <option value="18:00-20:00">18:00-20:00</option>
      </select>

     
      <label>Select A Pack</label>
      <select name="pack">
        <option value="STARTER">STARTER</option>
        <option value="PREMIUM ">PREMIUM</option>
        <option value="BUSINESS">BUSINESS</option>
       
      </select>
      <label for="res_guests">Number Of Guests</label>
      <input type="number" required name="guests" />
      

      <label for="res_notes">Comment</label>
      <input type="text" name="notes"/>
      
      <input type="submit" value="Submit"/>
    </form>
  </body>
</html>
