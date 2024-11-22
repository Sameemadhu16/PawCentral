<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/report-found.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/index.css">
</head>
<body>
    
    <?php include("../app/views/components/header.php"); ?>

    <div class="content"><div class="report-found-form">
        <h2 class="heading">Report a Found Pet</h2>
        <form action="upload-found-dog.php" method="POST" enctype="multipart/form-data">
          
          <!-- Pet's Name (optional) -->
          <label for="petName">Pet's Name (if known):</label>
          <input type="text" id="petName" name="petName" placeholder="enter the pet's name" />
          
          <!-- Pet's Breed -->
          <label for="breed">Breed:</label>
          <select id="breed" name="breed" required>
            <option value="other">other</option>
            <option value="Pomeranian">Pomeranian</option>
            <option value="German Shepherd">German Shepherd</option>
            <option value="Labrador">Labrador</option>
            <option value="Bulldog">Bulldog</option>
            <option value="Beagle">Beagle</option>
          </select>
          
          <!-- Pet's Color -->
          <label for="color">Color:</label>
          <select id="color" name="color" required>
            <option value="Black">Black</option>
            <option value="White">White</option>
            <option value="Brown">Brown</option>
            <option value="Golden">Golden</option>
            <option value="Spotted">Spotted</option>
            <option value="Other">Other</option>
          </select>
          
          <!-- Photo Upload -->
          <label for="photo">Upload Pet's Photo:</label>
          <input type="file" id="photo" name="photo" accept="image/*" required />
          
          <!-- Found location -->
          <label for="address">Found at:</label>
          <input type="text" id="location" name="address" placeholder="area location where the pet was found" required />
          
          <!-- retrieve address -->
          <label for="address">Address:</label>
          <input type="text" id="address" name="address" placeholder="address where the pet is kept" required />

          <!-- Contact Information -->
          <label for="contact">Contact Information:</label>
          <small style="margin-left: 20px;">(enter in the 0********* format.)</small>
          <input type="tel" id="contact" name="contact" pattern="[0-9]{10}" placeholder="enter your contact details (phone number)" required />
          

          <!-- Description -->
          <label for="description">Description:</label>
          <textarea id="description" name="description" rows="7" placeholder="describe specifics about the animal,
how it was found,
or any other information that the interested party should be aware of." required></textarea>
          
          <!-- Submit Button -->
          <button type="submit" class="submit-report">Submit Report</button>
        </form>
      </div></div>
      
      
</body>
</html>