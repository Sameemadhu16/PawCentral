<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Lost_And-Found</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/mypets.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/popup.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/events.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script>
        function openPopup() {
            document.getElementById("popupForm").style.display = "flex";
            document.body.style.overflow = "hidden"; // Disable scrolling
        }

        function closePopup() {
            document.getElementById("popupForm").style.display = "none";
            document.body.style.overflow = "auto"; // Enable scrolling
        }

    </script>
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>
    <div class="main-container container">
        <?php include("../app/views/components/user/sidebar.php"); ?>
            
        <div class="user-accounts-section">
            <?php if (!empty($pets)): ?>
                <!-- <div class="topicnbuttons">
                    <button class="action-button fixedsize" style="background-color:#8049fe;" onclick="openPopup()">Register Pet</button>
                </div> -->

                <div class="header-section">
                    <h2>Your Pets</h2> 
                    <button class="add-event fixedsize" onclick="openPopup()">Register Pet</button> <!--style="background-color:#8049fe;" -->
                </div>

                <div class="pets-section">
                    <?php foreach ($pets as $pet): ?>
                        <!-- <div class="pet-container" onclick="selectPet('<?= htmlspecialchars($pet->petid); ?>')"> -->
                            
                        <div class="pet-container" onclick="window.location.href='<?=ROOT?>/userprofile/mypets/Pet?id=<?= htmlspecialchars($pet->pet_id); ?>'">
                            <img src="<?= !empty($pet->petimg) ? htmlspecialchars($pet->petimg) : ROOT . '/assets/images/pets/catfound.jpg'; ?>" alt="<?= htmlspecialchars($pet->name); ?>" alt="pet image" class="pet-image">
                            <div class="pet-name"><?= htmlspecialchars($pet->name); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- Include appointment info -->
                <div class="appointments-section">
                    <h2>Upcoming medical appointments: </h2>
                    <div class="appointment">
                        <div class="appointment-details">
                            <strong>Vet. Indunil Rajapakse</strong><br>
                            <span class="time"> Time: 4.00 pm</span><br>
                            <span class="time">Date:  Sat, 24th August, 2024</span><br>
                            @ Pet Hospital - Panadura
                        </div>
                        <button class="cancel-button" onclick="cancelAppointment()">Cancel appointment</button>
                    </div>
                    <div class="appointment">
                        <div class="appointment-details">
                            <strong>Vet. Indunil Rajapakse</strong><br>
                            
                            <span class="time"> Time: 4.00 pm</span><br>
                            <span class="time">Date:  Sat, 24th August, 2024</span><br>
                            @ Pet Hospital - Panadura
                        </div>
                        <button class="cancel-button" onclick="cancelAppointment()">Cancel appointment</button>
                    </div>
                </div>
                <script>
        function selectPet(petName) {
            alert(`You selected ${petName}`);
        }
        function cancelAppointment() {
            alert('Appointment canceled');
        }
    </script>
            <?php else: ?>
                <div style="display: flex; justify-content: center; align-items: center; height: 50vh;">
                    <p style="text-align: center; font-size: 1.2rem; color: #555;">No pets have been added yet.<br>
                    <button class="add-event fixedsize" onclick="openPopup()">Add your Pet</button></p><br>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <?php include("../app/views/components/footer.php"); ?>
            

    <div id="popupForm" class="popup-container">
        <div class="form-container">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <h2>Add your pet info</h2>
            <form id="petForm" action="<?= ROOT ?>/userprofile/mypets/register_pet" method="POST" enctype="multipart/form-data">
                <label for="name">Pet Name:</label>
                <input type="text" id="petName" name="name" required>

                <label for="petimg">Upload Pet's Photo:</label>
                <input type="file" id="petimg" name="photos[]" accept="image/*" required>
          <div id="imagePreviewContainer"></div>
          <script>
              document.getElementById('petimg').addEventListener('change', function () {
                const maxFiles = 1;
                const fileInput = this;
                
                if (fileInput.files.length > maxFiles) {
                  feedback.style.display = 'block';
                  fileInput.value = ''; // Clear the input
                } else {
                  feedback.style.display = 'none';
                }
              });

              document.getElementById('petimg').addEventListener('change', function () {
                const previewContainer = document.getElementById('imagePreviewContainer');
                previewContainer.innerHTML = ''; // Clear existing previews

                Array.from(this.files).forEach(file => {
                  if (file.type.startsWith('image/')) {
                    const img = document.createElement('img');
                    img.src = URL.createObjectURL(file);
                    // img.style.width = '100px';
                    // img.style.margin = '5px';
                    previewContainer.appendChild(img);
                  }
                });
              });

          </script>
                
                <!-- ANIMAL INFO -->
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
                            { value: "Golden Retriever", text: "Golden Retriever" },
                            { value: "Poodle", text: "Poodle" },
                            { value: "Rottweiler", text: "Rottweiler" },
                            { value: "Dachshund", text: "Dachshund" },
                            { value: "Siberian Husky", text: "Siberian Husky" },
                            { value: "Boxer", text: "Boxer" },
                            { value: "Shih Tzu", text: "Shih Tzu" },
                            { value: "Chihuahua", text: "Chihuahua" },
                            { value: "Doberman", text: "Doberman" },
                            { value: "Great Dane", text: "Great Dane" },
                            { value: "Corgi", text: "Corgi" },
                            { value: "Australian Shepherd", text: "Australian Shepherd" },
                            { value: "Border Collie", text: "Border Collie" },
                            { value: "Pug", text: "Pug" },
                            { value: "French Bulldog", text: "French Bulldog" },
                        ],
                        Cat: [
                            { value: "Persian", text: "Persian" },
                            { value: "Siamese", text: "Siamese" },
                            { value: "Maine Coon", text: "Maine Coon" },
                            { value: "Bengal", text: "Bengal" },
                            { value: "Sphynx", text: "Sphynx" },
                            { value: "Ragdoll", text: "Ragdoll" },
                            { value: "British Shorthair", text: "British Shorthair" },
                            { value: "Scottish Fold", text: "Scottish Fold" },
                            { value: "Russian Blue", text: "Russian Blue" },
                            { value: "American Shorthair", text: "American Shorthair" },
                            { value: "Norwegian Forest", text: "Norwegian Forest" },
                            { value: "Abyssinian", text: "Abyssinian" },
                            { value: "Birman", text: "Birman" },
                            { value: "Oriental Shorthair", text: "Oriental Shorthair" },
                            { value: "Devon Rex", text: "Devon Rex" },
                            { value: "Cornish Rex", text: "Cornish Rex" },
                            { value: "Burmese", text: "Burmese" },
                            { value: "Tonkinese", text: "Tonkinese" },
                            { value: "Savannah", text: "Savannah" },
                        ],
                        Other: [],
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


                <label>Sex:</label>
                <div class="radio-group">
                    <input type="radio" id="male" name="sex" value="Male" required>
                    <label for="male">Male</label>
                    <input type="radio" id="female" name="sex" value="Female" required>
                    <label for="female">Female</label>
                </div>

                 <!-- Pet's Color -->
                 <label for="color">Color:</label>
                    <select id="color" name="color" required>
                        <option value="Other">Other</option>
                        <option value="Black">Black</option>
                        <option value="White">White</option>
                        <option value="Brown">Brown</option>
                        <option value="Black and White">Black and White</option>
                        <option value="Brown and White">Brown and White</option>
                        <option value="Yellow">Yellow</option>
                        <option value="Golden">Golden</option>
                        <option value="Spotted">Spotted</option>
                        <option value="Patched">Patched</option>
                        <option value="Gray">Gray</option>
                        <option value="Cream">Cream</option>
                        <option value="Orange">Orange</option>
                        <option value="Tabby">Tabby</option>
                        <option value="Calico">Calico</option>
                        <option value="Tortoiseshell">Tortoiseshell</option>
                        <option value="Brindle">Brindle</option>
                        <option value="Tan">Tan</option>
                        <option value="Red">Red</option>
                        <option value="Blue">Blue (grayish tone)</option>
                        <option value="Merle">Merle</option>
                        <option value="Sable">Sable</option>
                        <option value="Tricolor">Tricolor</option>
                        <option value="Bicolor">Bicolor</option>
                    </select>

                    <label for="birth_date">Birth Date:</label>
                    <input type="date" id="birth_date" name="birth_date" required>
                    
                    <label for="height">Height (cm):</label>
                    <input type="number" id="height" name="height" min="5" max="100" step="any" required>

                    <label for="weight">Weight (kg):</label>
                    <input type="number" id="weight" name="weight" min="0.02" max="150" step="any" required>
                    
                    <script>
                        document.querySelector('form').addEventListener('submit', function (event) {
                        const age = document.getElementById('birth_date').value;
                        const height = document.getElementById('height').value;
                        const weight = document.getElementById('weight').value;

                        // Validate age
                        const birthDate = new Date(document.getElementById('birth_date').value);
                        const today = new Date();
                        if (birthDate > today) {
                            alert('Birth date cannot be in the future.');
                            event.preventDefault(); // Prevent form submission
                        }

                        // Validate height
                        if (height < 5 || height > 100) {
                            alert('Height must be between 5 and 100 cm.');
                            event.preventDefault(); // Prevent form submission
                            return;
                        }

                        // Validate weight
                        if (weight < 0.02 || weight > 150) {
                            alert('Weight must be between 20g and 150 kg.');
                            event.preventDefault(); // Prevent form submission
                            return;
                        }

                        // If all validations pass, the form will submit
                        });
                    </script>

                <label>Neutered:</label>
                <div class="radio-group">
                    <input type="radio" id="neutered_yes" name="neutered" value="Yes" required>
                    <label for="neutered_yes">Yes</label>
                    <input type="radio" id="neutered_no" name="neutered" value="No" required>
                    <label for="neutered_no">No</label>
                </div>

                <label for="health">Current health status of the pet:</label>
          <textarea id="health" name="health" rows="7" placeholder="Describe specifics about the animal,
regarding their health.
or any other information that the medical professionals should be aware of."></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
<!-- 
    <button class="open-btn" onclick="openPopup()">Register Your Pet</button> -->
    <script>    
        function openPopup() {
            document.getElementById("popupForm").style.display = "flex";
            document.body.style.overflow = "hidden"; // Disable scrolling
        }

        function closePopup() {
            document.getElementById("popupForm").style.display = "none";
            document.body.style.overflow = "auto"; // Enable scrolling
        }

    </script>
    
</body>

</html>