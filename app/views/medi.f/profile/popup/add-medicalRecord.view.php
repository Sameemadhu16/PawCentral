<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body>
    <div id="add_record-popup-overlay">
        <div class="add_record-popup-content">
            <div class="title">
                <h2>Add Medical Record</h2>
                <span class="close-btn" id="add-record-close-btn">&times;</span>
            </div>

            <!-- Form for adding medical records -->
            <form id="add-medical-record-form" class="add_record-form">
                <!-- Hidden fields to store IDs -->
                <input type="hidden" id="record-appointment-id" name="appointment_id">
                <input type="hidden" id="record-pet-id" name="pet_id">
                <input type="hidden" id="record-vet-name" name="vet_name">
                <input type="hidden" id="record-owner-id" name="owner_id">
                <input type="hidden" id="record-med-id" name="med_id">

                <div>
                    <label for="diagnosis">Diagnosis:</label>
                    <input type="text" id="diagnosis" name="diagnosis" required></textarea>
                </div>

                <div>
                    <label for="treatment">Treatment:</label>
                    <input type="text" id="treatment" name="treatment" required></textarea>
                </div>

                <div>
                    <label for="vet_notes">Notes:</label>
                    <textarea id="vet_notes" name="vet_notes"></textarea>
                </div>

                <div id="form-message" style="margin-top: 10px;"></div> <!-- For success/error messages -->

                <button type="submit">Add Record</button>
            </form>
        </div>
    </div>
</body>
