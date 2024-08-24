<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>PawCentral Dashboard - Announcements</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/announcement.css">
</head>

<body>
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <!-- Content Section -->
        <div class="content">
            <div class="container">
                <h2>Announcements</h2>
                <button class="add-announcement" onclick="window.location.href='../app/views/components/admin/addAnnouncement.php'">Add Announcement</button>
            </div>
            
            <div class="card">
                <div class="card-content">
                    Announcement 1
                    <p>
                        this is a announcemnet of PawCentral
                    </p>
                </div>

                <div class="card-actions">
                    <i class="edit-icon">✏️</i>
                    <i class="delete-icon">🗑️</i>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                     Announcement 2
                     <p>
                        this is a announcemnet of PawCentral
                    </p>
                </div>

                <div class="card-actions">
                    <i class="edit-icon">✏️</i>
                    <i class="delete-icon">🗑️</i>
                </div>
            </div>

            <div class="card">
                <div class="card-content">
                     Announcement 3
                     <p>
                        this is a announcemnet of PawCentral
                    </p>
                </div>
                
                <div class="card-actions">
                    <i class="edit-icon">✏️</i>
                    <i class="delete-icon">🗑️</i>
                </div>
            </div>

         </div>
        
       
    </div>
</body>

</html>