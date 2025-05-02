<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div id="popup-overlay">
    <div class="popup-content">
        <div class="title">
            <h2>Medical Records - <span class="pet-name">Pet Name</span></h2> <!-- Placeholder name -->
            <span class="close-btn" id="add-close-btn" class="add-close-btn">&times;</span>
        </div>
        
        <!-- Container for dynamically loaded records -->
        <div id="medical-records-list">
            <!-- Records will be inserted here by JavaScript -->
        </div>

        <!-- Template for "No Records Found" message (initially hidden) -->
        <div id="no-records-message" class="med-record" style="display: none;">
            <h2>No Medical Records Found</h2>
            <div class="record-details">
                <p>No medical records have been added for this pet yet.</p>
            </div>
        </div>
        
    </div>
    </div>
</body>
