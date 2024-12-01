<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Selection</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        .pets-section {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            max-width: 800px;
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
            color: #333;
            padding: 10px 0;
            background: #f4f4f4;
        }

        .appointments-section {
            margin-top: 20px;
            width: 100%;
            max-width: 800px;
            padding: 20px;
            background: #eef2ff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .appointment {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: #dbe4ff;
            padding: 15px;
            border-radius: 8px;
            margin-top: 10px;
            border: 1px solid #c4d1ff;
        }

        .appointment-details {
            font-size: 1rem;
            color: #333;
        }

        .cancel-button {
            background: #89c2ff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        .cancel-button:hover {
            background: #68aeea;
        }

        .pet-detail-card {
            display: flex;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            width: 90%;
            max-width: 800px;
        }

        .pet-detail-card img {
            width: 150px;
            height: 150px;
            object-fit: cover;
            margin: 15px;
            border-radius: 10px;
        }

        .pet-detail-content {
            flex: 1;
            padding: 15px;
        }

        .pet-detail-content h3 {
            margin: 0 0 10px;
            font-size: 1.5rem;
            color: #333;
        }

        .pet-detail-content p {
            margin: 5px 0;
            font-size: 0.9rem;
            color: #555;
        }

        .action-button {
            background: #89c2ff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: background 0.3s ease;
            margin-top: 10px;
        }

        .action-button:hover {
            background: #68aeea;
        }
    </style>
</head>
<body>
    <div class="pets-section">
        <!-- Pet 1 -->
        <div class="pet-container" onclick="selectPet('Pet 1')">
            <img src="https://via.placeholder.com/200" alt="Pet 1" class="pet-image">
            <div class="pet-name">Pet 1</div>
        </div>

        <!-- Pet 2 -->
        <div class="pet-container" onclick="selectPet('Pet 2')">
            <img src="https://via.placeholder.com/200" alt="Pet 2" class="pet-image">
            <div class="pet-name">Pet 2</div>
        </div>

        <!-- Additional pets can be added here -->
    </div>

    <div class="appointments-section">
        <h2>Upcoming medical appointments:</h2>
        <div class="appointment">
            <div class="appointment-details">
                <strong>Vet. Indunil Rajapakse</strong><br>
                @ Pet Hospital - Panadura<br>
                Time: 4.00 pm<br>
                Date: Sat, 24th August, 2024
            </div>
            <button class="cancel-button" onclick="cancelAppointment()">Cancel appointment</button>
        </div>
    </div>

    <div class="pet-detail-card">
        <img src="https://via.placeholder.com/150" alt="Pet">
        <div class="pet-detail-content">
            <h3>Tiny Baka</h3>
            <p><strong>Breed:</strong> German Shepherd</p>
            <p><strong>Age:</strong> 3 Months</p>
            <p><strong>Pedigree:</strong> Available</p>
            <p><strong>Health Complications:</strong> None</p>
            <button class="action-button">Medical history</button>
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
</body>
</html>
