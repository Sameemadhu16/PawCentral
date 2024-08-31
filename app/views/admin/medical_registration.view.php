<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral Admin Dashboard - Add Announcements</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/medicalRegistration.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
    <?php include("../app/views/components/admin/adminSidebar.php"); ?>

    <div class="container">
        <h1>Medical Registrations</h1>
        <table>
            <thead>
                <tr>
                    <th>Veterinarian Name</th>
                    <th>Veterinarian Degree</th>
                    <th>Veterinarian's CV</th>
                    <th>Status</th>
                    <th>Send Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sameera Mudhuranga</td>
                    <td>DVM</td>
                    <td><button class="btn-view">View</button></td>
                    <td>
                        <select class="status-dropdown">
                            <option class="btn-approve">Approve</option>
                            <option class="btn-reject">Reject</option>
                        </select>
                    </td>
                    <td><button class="btn-email">Accept</button></td>
                </tr>
                <!-- Repeat the above <tr> for more rows -->
            </tbody>
        </table>
    </div>

    </div>
</body>

</html>