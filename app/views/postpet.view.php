<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Pet</title>
    <link rel="stylesheet" href="../assets/css/postpet.css">
    <script src="../assets/js/postpet/postpet.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../app/views/components/header.php' ?>

    <div class="title">
        <h2>Post Pet</h2>
        <hr/>
    </div>

    <div class="form">
        <form id="postpetform" method="POST" action="<?=ROOT?>/service/postpet/submit" onsubmit="validateForm(event)">
            
            <!-- Hidden Fields -->
            <input type="hidden" name="pet_id">
            <input type="hidden" name="merchant_id">
            <input type="hidden" name="merchant_ref_id">

            <!-- Trade Type -->
            <h3>Trade Type</h3>
            <select name="tradeType" required>
                <option value="">Select</option>
                <option value="Selling">Selling</option>
                <option value="Renting">Renting</option>
                <option value="Importing">Importing</option>
            </select>

            <!-- Pet Name -->
            <h3>Pet's Name</h3>
            <input type="text" name="petName" placeholder="Enter the pet's name" required>

            
            <h3>Species</h3>
<select name="species" id="species" required>
  <option value="" disabled selected>Select species</option>
  <option value="Dog">Dog</option>
  <option value="Cat">Cat</option>
  <option value="Other">Other</option>
</select>

<!-- Breed -->
<h3>Breed</h3>
<div id="breed-container">
  <select name="breed" id="breed" required>
    <option value="" disabled selected>Select breed</option>
  </select>
</div>
            <!-- Sex -->
            <h3>Sex</h3>
            <select name="sex" required>
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>

            <h3>Age (in years)</h3>
<input type="number" name="age" placeholder="Enter age" min="0" max="25" step="1" required>

<h3>Height (cm)</h3>
<input type="number" name="height" placeholder="Enter height in cm" min="10" max="300" required>

<h3>Weight (kg)</h3>
<input type="number" name="weight" placeholder="Enter weight in kg" min="0.5" max="200" step="0.1" required>

            <!-- Health Information -->
            <h3>Neutered/Spayed?</h3>
            <select name="neutered" required>
                <option value="">Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>

            <h3>Trained?</h3>
            <select name="trained" required>
                <option value="">Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>

            <h3>Pedigree?</h3>
            <select name="pedigree" required>
                <option value="">Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>

            <h3>Vaccinated?</h3>
            <select name="vaccinated" required>
                <option value="">Select</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>

            <!-- Contact Information -->
            <h3>Contact Name</h3>
            <input type="text" name="contactName" placeholder="Enter your name" required>

            <h3>Contact Number</h3>
<input type="text" name="contactNumber" placeholder="ex: 07734353XX" pattern="^0\d{2}\s?\d{6,7}$" required>
<small>Format: 077 1234567 or 0771234567</small>

            <h3>Description</h3>
            <input type="text" name="description" placeholder="ex:medications" required>
            <h3>Email</h3>
            <input type="email" name="email" placeholder="Enter your email" required>

            <!-- Submit Button -->
            <button type="submit" class="button">NEXT</button>
        </form>
    </div>
</body>
<script>
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
    Other: []
  };

  const speciesSelect = document.getElementById('species');
  const breedContainer = document.getElementById('breed-container');

  speciesSelect.addEventListener('change', function () {
    const selectedSpecies = this.value;

    // Clear breed container
    breedContainer.innerHTML = '';

    if (selectedSpecies === 'Other') {
      // Show a text input if species is Other
      const input = document.createElement('input');
      input.type = 'text';
      input.name = 'breed';
      input.placeholder = 'Other';
      input.required = true;
      breedContainer.appendChild(input);
    } else {
      // Show dropdown for Dog or Cat
      const select = document.createElement('select');
      select.name = 'breed';
      select.id = 'breed';
      select.required = true;

      const defaultOption = document.createElement('option');
      defaultOption.value = '';
      defaultOption.text = 'Select breed';
      defaultOption.disabled = true;
      defaultOption.selected = true;
      select.appendChild(defaultOption);

      breedOptions[selectedSpecies].forEach(breed => {
        const option = document.createElement('option');
        option.value = breed.value;
        option.text = breed.text;
        select.appendChild(option);
      });

      breedContainer.appendChild(select);
    }
  });
</script>
</html>