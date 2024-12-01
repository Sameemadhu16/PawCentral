<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="popup-overlay" id="edit-popup-overlay">
        <div class="popup-content">
            <div class="title">
                <h2>Edit Veterinarian</h2>
                <span class="close-btn">&times;</span>
            </div>
            <form id="edit-vet-form" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="edit_id">
                <div class="form-group">
                    <label for="vet-name">Name:</label>
                    <input type="text" id="vet-name" name="name">
                </div>
                <div class="form-group">
                    <label for="vet-experience">Experience (years):</label>
                    <input type="number" id="vet-experience" name="experience">
                </div>
                <div class="form-group">
                    <label for="vet-availability">Availability:</label>
                    <input type="text" id="vet-availability" name="availability" placeholder="Ex: Mon - Fri 8 to 5">
                </div>
                <div class="form-group">
                    <label for="vet-image">Image:</label>
                    <input type="file" id="vet-image" name="image" accept="image/*">
                </div>
                <button type="submit" class="submit-btn" name="edit-vet-submit-btn">Update Veterinarian</button>
            </form>
        </div>
    </div>
</body>
