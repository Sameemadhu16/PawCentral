<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medical Records</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/mypets.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/profile.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>
    
    <div class="main-container container">
        <?php include("../app/views/components/user/sidebar.php"); ?>
        
        <div class="user-accounts-section">
            <button type="button" class="download_pdf" onclick="downloadPDF()">Download Medical History</button>

            <div class="profile-section" id="medical-records-section">
                <h1>Medical Records - <?= strtoupper(htmlspecialchars($pet->name)) ?></h1>
                
                <?php if (!empty($medical_records)): ?>
                    <?php foreach ($medical_records as $record): ?>
                        <div class="med-record">
                            <h2>
                                <?= htmlspecialchars($record->reason) ?>
                                <span class="record-date">
                                    <i class="far fa-calendar-alt"></i>
                                    <!-- <?= date('M d, Y h:i A', strtotime($record->app_date)) ?> -->
                                    <?= date('M d Y', strtotime($record->app_date)) ?><br>
                                    <?= date('h:i A', strtotime($record->app_date)) ?>
                                </span>
                            </h2>
                            
                            <div class="record-details">
                                <div class="record-item">
                                    <span class="record-label">Veterinarian</span>
                                    <span class="record-value"><?= htmlspecialchars($record->vet_name) ?></span>
                                </div>
                                
                                <div class="record-item">
                                    <span class="record-label">Veterinarian</span>
                                    <span class="record-value"><?= htmlspecialchars($record->vet_name) ?></span>
                                </div>
                                
                                <div class="record-item">
                                    <span class="record-label">Diagnosis</span>
                                    <span class="record-value"><?= htmlspecialchars($record->diagnosis) ?></span>
                                </div>
                                
                                <div class="record-item">
                                    <span class="record-label">Treatment</span>
                                    <span class="record-value"><?= htmlspecialchars($record->treatment) ?></span>
                                </div>
                                
                                <div class="record-notes">
                                    <span class="record-label">Notes</span>
                                    <span class="record-value"><?= htmlspecialchars($record->vet_notes) ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="med-record">
                        <h2>No Medical Records Found</h2>
                        <div class="record-details">
                            <p>No medical records have been added for this pet yet.</p>
                        </div>
                    </div>
                <?php endif; ?>
                
            </div>
        </div>
    </div>

    <?php include("../app/views/components/footer.php"); ?>
</body>
<script>
    function downloadPDF() {
        const element = document.getElementById("medical-records-section");
        const records = document.querySelectorAll(".med-record");

        // ➕ Add temporary borders to each record
        records.forEach(record => {
            record.style.border = "2px solid rgb(128, 73, 254, .4)";
            record.style.padding = "10px";
            record.style.marginBottom = "15px";
        });

        const opt = {
            margin:       0.5,
            filename:     'medical_records.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 },
            jsPDF:        { unit: 'in', format: 'a4', orientation: 'portrait' },
            pagebreak:    { mode: ['avoid-all', 'css', 'legacy'] }
        };

        html2pdf().set(opt).from(element).save().then(() => {
            // ❌ Remove the borders after saving
            records.forEach(record => {
                record.style.border = "";
                record.style.padding = "";
                record.style.marginBottom = "";
            });
        });
    }
</script>



</html>