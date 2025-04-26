<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div class="popup-overlay" id="add-popup-overlay">
        <div class="popup-content">
            <div class="title">
                <h2>Add Services</h2>
                <span class="close-btn" id="add-close-btn">&times;</span>
            </div>
            <form id="add-service-form" method="POST" enctype="multipart/form-data">
            <?php 
                if(!empty($all_services)) {
                    foreach($all_services as $service) {
                        echo "
                        <div class='service-select-card card' data-service-id='{$service->service_id}'>
                            <div class='service-title'>
                                <input type='checkbox' name='services[]' value='{$service->service_id}' id='service-{$service->service_id}' class='hidden-checkbox'>
                                <h4>{$service->service_name}</h4>
                            </div>
                        </div>";
                    }
                } else {
                    echo "<p>No services found.</p>";
                }
            ?>
                
                <button type="submit" class="submit-btn" name="add-services-submit-btn">Submit</button>
            </form>
        </div>
    </div>
</body>
