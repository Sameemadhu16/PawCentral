<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Import a Pet</title>
    <link rel="stylesheet" href="../../../assets/css/import.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../app/views/components/header.php'?>
    
    <div class="main-container">
        <!-- Left Side: Form -->
        <div class="form-container">
            <div class="form-header">
                <h1>Import a Pet</h1>
            </div>
            
           <form class="import-form" action="<?=ROOT?>/service/postpet/postpetnext/import/submit" method="POST" onsubmit="return validateImportForm()">
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" id="country" name="country" required>
                </div>
                
                <div class="form-group">
                    <label for="owner">Importing Owner:</label>
                    <input type="text" id="owner" name="owner" required>
                </div>
                
                <div class="form-group">
                    <label for="transport">Transport Method:</label>
                    <div class="select-wrapper">
                        <select id="transport" name="transport">
                            <option value="air">Air</option>
                            <option value="sea">Sea</option>
                            <option value="land">Land</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="mobile">Importer's Mobile:</label>
                    <input type="tel" id="mobile" name="mobile" required>
                </div>
                
                <div class="form-group">
                    <label for="fees">Import Fees:</label>
                    <input type="number" id="fees" name="fees" required min="100" step="0.01">
                </div>
                
                <div class="form-group checkbox-group">
                    <input type="checkbox" id="terms" name="terms" required>
                    <label for="terms">I agree to terms and conditions</label>
                </div>
                
                <div class="form-actions">
                    <a href="terms" class="terms-link">Review Terms</a>
                    <button type="submit" class="submit-btn">Submit</button>
                </div>
            </form>
        </div>
        
        <!-- Right Side: Full Image Only -->
        <div class="image-container">
            <img src="../../../assets/images/pexels-chevanon-1108099.jpg" alt="Pet Import Image">
        </div>
    </div>
    
    <?php include("../app/views/components/footer.php")?>
    <script>
  function validateImportForm() {
    const fee = parseFloat(document.getElementById('fees').value);
    const termsChecked = document.getElementById('terms').checked;

    if (isNaN(fee) || fee < 100) {
      alert("Import fee must be at least Rs. 100.");
      return false;
    }

    if (!termsChecked) {
      alert("You must agree to the terms and conditions.");
      return false;
    }

    return true;
  }
</script>
</body>
</html>