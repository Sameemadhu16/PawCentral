<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Pet</title>
    <link rel="stylesheet" href="styles.css">
    <script>
        function openPopup() {
            document.getElementById("popupForm").style.display = "flex";
        }

        function closePopup() {
            document.getElementById("popupForm").style.display = "none";
        }
    </script>
</head>
<body>
    <button class="open-btn" onclick="openPopup()">Register Your Pet</button>
    <div id="popupForm" class="popup-container">
        <div class="form-container">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <h2>Register Your Pet</h2>
            <form id="petForm" action="#" method="POST" enctype="multipart/form-data">
                <label for="name">Pet Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="petimg">Upload Pet Image:</label>
                <input type="file" id="petimg" name="petimg" accept="image/*" required>

                <label for="species">Species:</label>
                <select id="species" name="species" required>
                    <option value="">Select Species</option>
                    <option value="Dog">Dog</option>
                    <option value="Cat">Cat</option>
                    <option value="Bird">Bird</option>
                    <option value="Other">Other</option>
                </select>

                <label for="breed">Breed:</label>
                <input type="text" id="breed" name="breed" required>

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
</body>
</html>

<style>
    body {
        background: #f3e5f5;
        font-family: Arial, sans-serif;
        text-align: center;
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
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .form-container {
        background: #faf0ff;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        position: relative;
        max-width: 500px;
        width: 90%;
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

    label {
        margin-top: 10px;
        font-weight: bold;
    }

    input, select {
        padding: 8px;
        margin-top: 5px;
        border: 1px solid #ccc;
        border-radius: 5px;
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
</style>
