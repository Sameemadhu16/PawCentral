<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Lost_And-Found</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/lostFound.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        

        .pets-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(100px, 1fr));
            gap: 10px;
            padding: 10px;
            max-width: 100vw;
        }

        .pet-container {
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            text-align: center;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            max-width: 300px;
        }

        .pet-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 10px rgba(0, 0, 0, 0.15);
        }

        .pet-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .pet-name {
            font-size: 1.2rem;
            color: #fff;
            padding: 10px 0;
            background: #8049fe;
        }
        .appointments-section {
            margin-top: 20px;
            width: 100%;
            max-width: 800px;
            padding: 20px;
            /* background: #eef2ff; */
            border-radius: 10px;
            /* box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); */
        }

        .appointment {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #dbe4ff;
            padding: 15px;
            border-radius: 8px;
            margin-top: 10px;
            box-shadow: 2px 3px 10px rgba(0, 0, 0, 0.1);
        }

        .appointment-details {
            font-size: .9rem;
            color: #111;
        }
        .appointment-details strong{
            font-size: 20px;
            margin-bottom: 10px;
        }
        .time {
            margin-top: 10px;
            color: black;
            font-size: 16px !important;
        }

        .cancel-button {
            background: #D91656;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .cancel-button:hover {
            background: #820e34;
        }







    .open-btn {
        background: #8049fe;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .open-btn:hover {
        background: #673ab7;
    }

    .popup-container {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100vw;
        height: 100vh;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
        z-index: 800;
    }

    .form-container {
        /* background: #ffffff; */
        background-color: rgb(255, 255, 255,0.85);
        /* background: white; */
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        position: relative;
        max-width: 500px;
        width: 90%;
        max-height: 90vh; /* Limits height to 80% of the viewport */
        overflow-y: auto; /* Enables scrolling inside the popup */
        scrollbar-color:rgb(128, 73, 254,.4) #ffffff;
    }

    .form-container [type="text"], .form-container input[type="file"], .form-container input[type="number"], .form-container select, .form-container input[type="tel"], .form-container textarea{
        background-color: rgb(255, 255, 255,0.35);
        color: #333;
    }

    .form-container input[type="text"]:focus, .form-container input[type="number"]:focus, .form-container textarea:focus, .form-container input[type="tel"]:focus, .form-container select:focus {
        border-color: #7202bf; /* Focus color */
        outline: none;
    }
    .close-btn {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 20px;
        cursor: pointer;
    }

    h2 {
        color: #673ab7;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    .form-container label {
        font-weight: bold;
        /* display: block; */
        margin-top: 10px;
    }

    input, select {
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    input[type="radio"]{
        accent-color: #8049fe;
    }
    input[type="radio"]:hover{
        accent-color: #8049fe;
    }
    .radio-group {
        display: flex;
        gap: 10px;
        align-items: center;
        margin-top: 5px;
    }

    button {
        margin-top: 15px;
        padding: 10px;
        background: #8049fe;
        color: white;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background: #673ab7;
    }

    @media (max-width: 600px) {
        .form-container {
            width: 90%;
            padding: 15px;
        }

        input, select, button {
            width: 100%;
        }

        .radio-group {
            flex-wrap: wrap;
        }
    }

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
    <div class="main-container">
        <?php include("../app/views/components/user/sidebar.php"); ?>
            
        <div class="user-accounts-section">
            <?php if (!empty($pets)): ?>
                <div class="topicnbuttons">
                    <button class="action-button fixedsize" style="background-color:#8049fe;" onclick="openPopup()">Register Pet</button>
                </div>

                <div class="topicnbuttons">
                    <h2>Your Pets</h2> 
                </div>

                <div class="pets-section">
                    <?php foreach ($pets as $pet): ?>
                        <div class="pet-container" onclick="selectPet('<?= htmlspecialchars($pet->pet_id); ?>')">
                            <img src="<?= !empty($pet->petimg) ? ROOT . '/assets/images/pets/' . htmlspecialchars($pet->petimg) : ROOT . '/assets/images/pets/catfound.jpg'; ?>" alt="<?= htmlspecialchars($pet->name); ?>" alt="pet image" class="pet-image">
                            <div class="pet-name"><?= htmlspecialchars($pet->name); ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
                
                <!-- Include appointment info -->
                <div class="appointments-section">
                    <h2>Upcoming medical appointments:</h2>
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
                    <button class="action-button fixedsize" style="background-color:#8049fe;" onclick="window.location.href='<?=ROOT?>/userprofile/mypets/registerpet';">Add your Pet</button></p><br>
                </div>
            <?php endif; ?>
        </div>
    </div>
    
    <?php include("../app/views/components/footer.php"); ?>
            

    <div id="popupForm" class="popup-container">
        <div class="form-container">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <h2>Add your pet info</h2>
            <form id="petForm" action="#" method="POST" enctype="multipart/form-data">
                <label for="name">Pet Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="petimg">Upload Pet's Photo:</label>
                <input type="file" id="petimg" name="petimg" accept="image/*" required>
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
                        ],
                        Cat: [
                        { value: "Persian", text: "Persian" },
                        { value: "Siamese", text: "Siamese" },
                        { value: "Maine Coon", text: "Maine Coon" },
                        { value: "Bengal", text: "Bengal" },
                        { value: "Sphynx", text: "Sphynx" },
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

                <label for="age">Age (in years):</label>
                <input type="number" id="age" name="age" min="0" required>

                <label for="height">Height (cm):</label>
                <input type="number" id="height" name="height" min="0" required>

                <label for="weight">Weight (kg):</label>
                <input type="number" id="weight" name="weight" min="0" required>
                

                <label>Neutered:</label>
                <div class="radio-group">
                    <input type="radio" id="neutered_yes" name="neutered" value="Yes" required>
                    <label for="neutered_yes">Yes</label>
                    <input type="radio" id="neutered_no" name="neutered" value="No" required>
                    <label for="neutered_no">No</label>
                </div>

                <button type="submit">Register Pet</button>
            </form>
        </div>
    </div>
<!-- 
    <button class="open-btn" onclick="openPopup()">Register Your Pet</button> -->
    
</body>

</html>