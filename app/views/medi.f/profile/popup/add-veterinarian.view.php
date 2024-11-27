<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="popup-overlay" id="add-popup-overlay">
        <div class="popup-content">
            <div class="title">
                <h2>Add New Veterinarian</h2>
                <span class="close-btn" id="add-close-btn">&times;</span>
            </div>
            <form id="add-vet-form" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="vet-name">Name:</label>
                    <input type="text" id="vet-name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="vet-experience">Experience (years):</label>
                    <input type="number" id="vet-experience" name="experience" required>
                </div>
                <div class="form-group">
                    <label for="vet-availability">Availability:</label>
                    <input type="text" id="vet-availability" name="availability" placeholder="Ex: Mon - Fri 8 to 5">
                </div>
                <div class="form-group">
                    <label for="vet-image">Image URL:</label>
                    <input type="file" id="vet-image" name="image" accept="image/*">
                </div>
                <button type="submit" class="submit-btn" name="add-vet-submit-btn">Add Veterinarian</button>
            </form>
        </div>
    </div>
</body>
