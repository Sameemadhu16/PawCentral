<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>PawCentral Dashboard - Medical Registrations</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/medicalRegistration.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script src="<?= ROOT ?>/assets/js/admin/medicalRegistration.js" defer></script>
</head>

<body class="body">


    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php");
    ?>

    <div class="main-container container">
        <div>
            <?php include("../app/views/components/admin/adminSidebar.php");
            // show($data);
            ?>

        </div>

        <div class="med-container">
            <h2>Medical Registrations</h2>
            <div class="content">
                <table class="medical-registration-table">
                    <thead class="mr_table_t">
                        <th>
                            <h5>Service Name</h5>
                        </th>
                        <th>
                            <h5>Vaterinarian's CV</h5>
                        </th>
                        <th>
                            <h5>Status</h5>
                        </th>
                        <th>
                            <h5>Select</h5>
                        </th>
                        <th>
                            <h5>Select</h5>
                        </th>
                    </thead>
                    <tbody>
                        <?php foreach ($data as $provider): ?>
                            <tr class="mr_row">
                                <td>
                                    <?php echo esc($provider->name); ?>
                                </td>
                                <td><a href="<?= ROOT ?>/<?= esc($provider->license_proof) ?>" class="view-btn" download>View Proof</a></td>
                                <td>
                                    <?php if ($provider->verifiedStatus == 'pending'): ?>
                                        <span class="pending">Pending</span>
                                    <?php elseif ($provider->verifiedStatus == 'approved'): ?>
                                        <span class="approved">Approved</span>
                                    <?php elseif ($provider->verifiedStatus == 'rejected'): ?>
                                        <span class="rejected">Rejected</span>
                                    <?php endif ?>
                                </td>

                                <form method="POST">
                                    <input type="hidden" name="med_id" value="<?php echo esc($provider->med_id); ?>">
                                    <td>
                                        <button class="send-btn1" type="submit" name="approve" value="approved">Approve</button>
                                    </td>
                                </form>

                                <form method="POST">
                                    <input type="hidden" name="med_id" value="<?php echo esc($provider->med_id); ?>">
                                    <td>
                                        <button class="send-btn2" type="submit" name="reject">Reject</button>
                                    </td>
                                </form>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>



            </div>


        </div>

    </div>

    <!-- Popup Notification -->
    <div id="popupNotification" class="popup">
        <span id="popupMessage"></span>
    </div>

    <?php include("../app/views/components/footer.php"); ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const popup = document.getElementById('popupNotification');
            const popupMessage = document.getElementById('popupMessage');

            function showPopup(message) {
                popupMessage.textContent = message;
                popup.classList.add('show');
                setTimeout(() => {
                    popup.classList.remove('show');
                }, 3000);
            }

            // Show popup notification based on URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('status')) {
                const status = urlParams.get('status');
                if (status === 'approved') {
                    showPopup('Medical provider approved successfully!');
                } else if (status === 'rejected') {
                    showPopup('Medical provider rejected successfully!');
                }
            }
        });
    </script>

</body>

</html>