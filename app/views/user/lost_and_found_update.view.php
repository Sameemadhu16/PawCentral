<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/report-found.css">
    <link rel="stylesheet" href="<?=ROOT?>/assets/css/index.css">
    <style>
  /* Container for image previews */
  #imagePreviewContainer {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    align-items: center;
    gap: 10px;
    margin-top: 10px;
    padding: 15px;
    border: 2px dashed #ccc; /* Dashed border for simplicity */
    border-radius: 8px;
    background-color: transparent; /* Light background for contrast */
  }

  /* Individual image styling */
  #imagePreviewContainer img {
    width: 120px;
    height: 120px;
    object-fit: cover; /* Ensure the image fills the space without distortion */
    border: 2px solid #ddd; /* Subtle border for each image */
    border-radius: 6px;
    transition: transform 0.3s, box-shadow 0.3s; /* Smooth animations */
  }

  /* Hover effect on images */
  #imagePreviewContainer img:hover {
    transform: scale(1.05); /* Slightly enlarge the image */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Add a shadow for a pop-out effect */
  }
</style>

</head>
<body>
    
    <?php include("../app/views/components/header.php"); ?>

    <div class="content"><div class="report-found-form">
        <h2 class="heading">Report Lost / Found Pet</h2>
        <form action="<?= ROOT ?>/lostandfound/update?id=<?=htmlspecialchars($post->petid)?>" method="POST" enctype="multipart/form-data">
          
          <!-- Pet's Name (optional) -->
          <label for="petName">Pet's Name (if known):</label>
          <input type="text" id="petName" name="petName"  value="<?= htmlspecialchars($post->petName) ?>"/>
          
          <!-- Pet's Animal Type -->
          <label for="type">Animal Type:</label>
          <select id="type" name="type" onchange="updateBreedOptions()" required>
            <option value="Other">Other</option>
            <option value="Dog">Dog</option>
            <option value="Cat">Cat</option>
          </select>

          <!-- Pet's Breed -->
          <label for="breed">Breed:</label>
          <select id="breed" name="breed" required>
            <option value="Other">Other</option>
            <option value="Pomenarian">Pomenarian</option>
            <option value="German Shapherd">German Shapherd</option>
            <option value="Labrador">Labrador</option>
            <option value="Bulldog">Bulldog</option>
            <option value="Beagle">Beagle</option>
          </select>

<script>
  // Define breed options for each animal type
  const breedOptions = {
    Dog: [
      { value: "Pomeranian", text: "Pomeranian" },
      { value: "German Shepherd", text: "German Shepherd" },
      { value: "Labrador", text: "Labrador" },
      { value: "Bulldog", text: "Bulldog" },
      { value: "Beagle", text: "Beagle" },
    ],
    Cat: [
      { value: "Persian", text: "Persian" },
      { value: "Siamese", text: "Siamese" },
      { value: "Maine Coon", text: "Maine Coon" },
      { value: "Bengal", text: "Bengal" },
      { value: "Sphynx", text: "Sphynx" },
    ],
    Other: [{ value: "Other", text: "Other" }],
  };

  function updateBreedOptions() {
    const typeSelect = document.getElementById("type");
    const breedSelect = document.getElementById("breed");

    // Clear existing breed options
    breedSelect.innerHTML = '<option value="Other">Other</option>';

    // Get the selected animal type
    const selectedType = typeSelect.value;

    // Populate breed options based on the selected animal type
    if (breedOptions[selectedType]) {
      breedOptions[selectedType].forEach((breed) => {
        const option = document.createElement("option");
        option.value = breed.value;
        option.textContent = breed.text;
        breedSelect.appendChild(option);
      });
    }
  }
</script>

          
          <!-- Pet's Color -->
          <label for="color">Color:</label>
          <select id="color" name="color" required>
            <option value="Other">Other</option>
            <option value="Black">Black</option>
            <option value="White">White</option>
            <option value="Brown">Brown</option>
            <option value="Yellow">Yellow</option>
            <option value="Golden">Golden</option>
            <option value="Spotted">Spotted</option>
            <option value="Spotted">Patched</option>
          </select>

          <label for="sex">Sex:</label>
          <select name="sex" id="sex">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>

          <label for="age">Age:</label>
          <input type="text" id="age" name="age" placeholder="Enter approximate age in months (e.g., 12)">

          
          <label for="height">Height:</label>
          <input type="text" id="height" name="height" placeholder="Enter approximate height in feet (e.g., 1.5)">
          
          <!-- Photo Upload -->
          <label for="photo">Upload Pet's Photos (max 3):</label>
          <div class="image-slot" data-slot="img1">
          <div id="imagePreviewContainer"></div>
    <img src="<?= $post->img1 ? 'data:image/jpeg;base64,' . base64_encode($post->img1) : 'placeholder.png'; ?>" 
         alt="Image 1" 
         style="width: 100px; height: auto; margin-right: 5px;" />
    <input type="file" name="img1" accept="image/*" />
    <input type="hidden" name="old_img1" value="<?= $post->img1 ? base64_encode($post->img1) : ''; ?>" />
</div>
<div class="image-slot" data-slot="img2">
    <img src="<?= $post->img2 ? 'data:image/jpeg;base64,' . base64_encode($post->img2) : 'placeholder.png'; ?>" 
         alt="Image 2" 
         style="width: 100px; height: auto; margin-right: 5px;" />
    <input type="file" name="img2" accept="image/*" />
    <input type="hidden" name="old_img2" value="<?= $post->img2 ? base64_encode($post->img2) : ''; ?>" />
</div>
<div class="image-slot" data-slot="img3">
    <img src="<?= $post->img3 ? 'data:image/jpeg;base64,' . base64_encode($post->img3) : 'placeholder.png'; ?>" 
         alt="Image 3" 
         style="width: 100px; height: auto; margin-right: 5px;" />
    <input type="file" name="img3" accept="image/*" />
    <input type="hidden" name="old_img3" value="<?= $post->img3 ? base64_encode($post->img3) : ''; ?>" />
</div>

          <script>
              document.querySelectorAll('.image-slot input[type="file"]').forEach(input => {
    input.addEventListener('change', function () {
        const file = this.files[0]; // Get the selected file
        const previewImage = this.previousElementSibling; // Reference the associated <img> tag

        if (file && file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = function (e) {
                // Update the image preview
                previewImage.src = e.target.result;

                // Clear the corresponding hidden field since a new file is chosen
                const hiddenField = input.nextElementSibling; // The hidden input field
                if (hiddenField && hiddenField.type === 'hidden') {
                    hiddenField.value = ''; // Clear old image value
                }
            };
            reader.readAsDataURL(file); // Read the selected file
        }
    });
});


          </script>


          <!-- LOST/FOUND status -->
          <label for="status">Lost/Found Status:</label>
          <select id="status" name="status" required>
            <option value="Lost">Lost</option>
            <option value="Found">Found</option>
          </select>

          <!-- Found location -->
          <label for="address">Lost or Found area:</label>
          <input type="text" id="location" name="location" placeholder="City or Town" required />
          
          <!-- retrieve address -->
          <label for="address">Address:</label>
          <input type="text" id="address" name="address" placeholder="Address where the pet is kept at"/>

          <!-- Contact Information -->
          <label for="contact">
            <span id="contactCheck" style="color: green; display: none;">✅</span>
            <span id="cross" style="color: green; display: none;">❌</span>
            Contact Information:</label>
          <input 
              type="tel" 
              id="contact" 
              name="contact" 
              pattern="0[0-9]{9}" 
              title="Contact number must start with '0' followed by 9 digits." 
              placeholder="Enter your contact details (phone number)" 
              required 
          />
              <script>
                const contactInput = document.getElementById('contact');
                const contactCheck = document.getElementById('contactCheck');
                const contactCross = document.getElementById('cross');

                contactInput.addEventListener('input', function () {
                  const isValid = contactInput.checkValidity();
                  contactCross.style.display = isValid ? "none" : 'inline';
                  contactCheck.style.display = isValid ? 'inline' : 'none';
                  if (contactInput.value.trim() === "") {
                    contactCross.style.display = "none";
                    contactCheck.style.display = "none";
                  }
                });
              </script>
          
          <label for="health">Health Condition:</label>
          <select id="health" name="health" required>
            <option value="Healthy">Healthy</option>
            <option value="Sick">Sick</option>
            <option value="Injured">Injured</option>
          </select>
          <!-- Description -->
          <label for="description">Description:</label>
          <textarea id="description" name="description" rows="7" placeholder="Describe specifics about the animal,
How it was found,
or any other information that the interested party should be aware of." required></textarea>
          
          <!-- Submit Button -->
          <button type="submit" class="submit-report">Update Info</button>
        </form>
      </div></div>
      
      
</body>
</html>