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

        <form class="form1" action="<?=ROOT?>/service/postpet/postpetnext/selling/submit" method="POST" onsubmit="return validateForm()">
  <label class="pricel">Price:</label>
  <input type="number" name="price" placeholder="0.00" class="price" id="price" min="0" max="100000" step="0.01" required><br><br><br>
  <label class="fee">Fee is negotiable</label>
  <input class="feebox" name="fee_negotiable" type="checkbox"><br>

  <h3 class="location">Location Details:</h3>
<label class="cityl">City:</label>
<select name="City" class="city" required>
    <option value="" disabled selected>Select your city</option>
    <option value="Ampara">Ampara</option>
    <option value="Anuradhapura">Anuradhapura</option>
    <option value="Badulla">Badulla</option>
    <option value="Batticaloa">Batticaloa</option>
    <option value="Colombo">Colombo</option>
    <option value="Galle">Galle</option>
    <option value="Gampaha">Gampaha</option>
    <option value="Hambantota">Hambantota</option>
    <option value="Jaffna">Jaffna</option>
    <option value="Kalutara">Kalutara</option>
    <option value="Kandy">Kandy</option>
    <option value="Kegalle">Kegalle</option>
    <option value="Kilinochchi">Kilinochchi</option>
    <option value="Kurunegala">Kurunegala</option>
    <option value="Mannar">Mannar</option>
    <option value="Matale">Matale</option>
    <option value="Matara">Matara</option>
    <option value="Monaragala">Monaragala</option>
    <option value="Mullaitivu">Mullaitivu</option>
    <option value="Nuwara Eliya">Nuwara Eliya</option>
    <option value="Polonnaruwa">Polonnaruwa</option>
    <option value="Puttalam">Puttalam</option>
    <option value="Ratnapura">Ratnapura</option>
    <option value="Trincomalee">Trincomalee</option>
    <option value="Vavuniya">Vavuniya</option>
</select>
<br><br>


  <label class="addressl">Exact<br>Address:</label>
  <input type="text" name="Exact_address" class="address" required><br><br><br>

  <label class="terms">I agree to terms and conditions</label>
  <input class="terms" name="agreed_terms" type="checkbox" id="termsCheckbox"><br>

  <a href="terms">Review Terms</a>
  <button class="submit" type="submit">Submit</button><br>
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
  <script>
  function validateForm() {
    const termsCheckbox = document.getElementById("termsCheckbox");
    const priceInput = document.getElementById("price");
    const price = parseFloat(priceInput.value);

    if (!termsCheckbox.checked) {
      alert("You must agree to the terms and conditions.");
      return false;
    }

    if (isNaN(price) || price < 0) {
      alert("Price cannot be negative.");
      return false;
    }

    if (price < 100) {
      alert("Price must be at least 100.");
      return false;
    }

    return true;
  }
</script>
</body>
</html>
