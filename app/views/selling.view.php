<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../../../assets/css/selling.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
  <?php include '../app/views/components/header.php'?>

  <div class="container">
    <!-- Left Side: Form -->
    <div class="left-container">
      <div class="form-content">
        <div class="title">
          <h2>Selling</h2>
          <hr />
        </div>

        <form class="form1" action="<?=ROOT?>/service/postpet/postpetnext/selling/submit" method="POST">
          <label class="pricel">Price:</label>
          <input type="text" name="price" placeholder="0.00" class="price"><br><br><br>

          <label class="fee">Fee is negotiable</label>
          <input class="feebox" name="fee_negotiable" type="checkbox"><br>

          <h3 class="location">Location Details:</h3>
          <label class="cityl">City:</label>
          <input type="text" name="City" class="city"><br><br>

          <label class="addressl">Exact<br>Address:</label>
          <input type="text" name="Exact_address" class="address"><br><br><br>

          <label class="terms">I agree to terms and conditions</label>
          <input class="terms" name="agreed_terms" type="checkbox"><br>

          <a href="terms">Review Terms</a>
          <button class="submit">Submit</button><br>
        </form>

        <p class="text">Confirm that all information is accurate and ready for submission</p>
        <div class="conclusion"></div>
      </div>
    </div>

    <!-- Right Side: Image -->
    <div class="right-container">
      <img src="../../../assets/images/pexels-chevanon-1108099.jpg" alt="Pet Image">
    </div>
  </div>
  <?php include("../app/views/components/footer.php")?>
</body>
</html>
