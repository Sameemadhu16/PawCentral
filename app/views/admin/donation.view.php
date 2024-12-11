<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral Dashboard - Donations</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/donation.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <div class="content">
            <h2>Donations</h2>
            <section class="donations-section">

                <!-- Donation Card Example -->
                <div class="donation-card">
                    <div class="donation-info">
                        <h2>Max</h2>
                        <p><strong>Reason:</strong> Emergency Surgery</p>
                        <p><strong>Donation Amount:</strong> 20,000 LKR</p>
                        <p><strong>Description :</strong> Max requires urgent surgery to treat a broken leg. With your support, we can save his life and give him a chance to walk again.</p>
                    </div>
                    <div class="donation-actions">
                        <button class="approve-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/approve?id=2'">Approve</button>
                        <button class="reject-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/reject?id=2'">Reject</button>
                    </div>
                </div>

                <div class="donation-card">
                    <div class="donation-info">
                        <h2>Buddy</h2>
                        <p><strong>Reason:</strong> Food Supplies</p>
                        <p><strong>Donation Amount:</strong> 5,000 LKR</p>
                        <p><strong>Description :</strong> Buddy is a senior dog who needs daily special dietary food. Your donation will ensure he receives the care he deserves.</p>
                    </div>
                    <div class="donation-actions">
                        <button class="approve-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/approve?id=3'">Approve</button>
                        <button class="reject-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/reject?id=3'">Reject</button>
                    </div>
                </div>

                <div class="donation-card">
                    <div class="donation-info">
                        <h2>Luna</h2>
                        <p><strong>Reason:</strong> Vaccination</p>
                        <p><strong>Donation Amount:</strong> 8,000 LKR</p>
                        <p><strong>Description :</strong> Luna is a stray cat that needs vaccinations to protect her from diseases. Help us keep her safe and healthy.</p>
                    </div>
                    <div class="donation-actions">
                        <button class="approve-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/approve?id=4'">Approve</button>
                        <button class="reject-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/reject?id=4'">Reject</button>
                    </div>
                </div>

                <div class="donation-card">
                    <div class="donation-info">
                        <h2>Rocky</h2>
                        <p><strong>Reason:</strong> Shelter Renovation</p>
                        <p><strong>Donation Amount:</strong> 15,000 LKR</p>
                        <p><strong>Description :</strong> Rocky and other animals are living in an old shelter that needs repairs. Your donation will help create a safe environment for them.</p>
                    </div>
                    <div class="donation-actions">
                        <button class="approve-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/approve?id=5'">Approve</button>
                        <button class="reject-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/reject?id=5'">Reject</button>
                    </div>
                </div>

                <div class="donation-card">
                    <div class="donation-info">
                        <h2>Bella</h2>
                        <p><strong>Reason:</strong> Medical Treatment</p>
                        <p><strong>Donation Amount:</strong> 12,000 LKR</p>
                        <p><strong>Description :</strong> Bella was diagnosed with a respiratory infection. Your kind donation will ensure she receives proper treatment and recovers quickly.</p>
                    </div>
                    <div class="donation-actions">
                        <button class="approve-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/approve?id=6'">Approve</button>
                        <button class="reject-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/reject?id=6'">Reject</button>
                    </div>
                </div>

                <div class="donation-card">
                    <div class="donation-info">
                        <h2>Charlie</h2>
                        <p><strong>Reason:</strong> Adoption Preparation</p>
                        <p><strong>Donation Amount:</strong> 6,000 LKR</p>
                        <p><strong>Description :</strong> Charlie needs grooming and basic supplies before he can be adopted. Your donation will make his transition to a loving home smoother.</p>
                    </div>
                    <div class="donation-actions">
                        <button class="approve-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/approve?id=7'">Approve</button>
                        <button class="reject-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/reject?id=7'">Reject</button>
                    </div>
                </div>

                <div class="donation-card">
                    <div class="donation-info">
                        <h2>Milo</h2>
                        <p><strong>Reason:</strong> Emergency Care</p>
                        <p><strong>Donation Amount:</strong> 18,000 LKR</p>
                        <p><strong>Description :</strong> Milo was rescued after an accident and requires immediate care. Your help will ensure he gets the medical attention he needs.</p>
                    </div>
                    <div class="donation-actions">
                        <button class="approve-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/approve?id=8'">Approve</button>
                        <button class="reject-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/reject?id=8'">Reject</button>
                    </div>
                </div>

                <div class="donation-card">
                    <div class="donation-info">
                        <h2>Daisy</h2>
                        <p><strong>Reason:</strong> Spaying</p>
                        <p><strong>Donation Amount:</strong> 7,000 LKR</p>
                        <p><strong>Description :</strong> Daisy needs to be spayed to prevent unwanted litters. Your donation will help cover the cost of this important procedure.</p>
                    </div>
                    <div class="donation-actions">
                        <button class="approve-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/approve?id=9'">Approve</button>
                        <button class="reject-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/reject?id=9'">Reject</button>
                    </div>
                </div>

                <div class="donation-card">
                    <div class="donation-info">
                        <h2>Oscar</h2>
                        <p><strong>Reason:</strong> Transport to New Home</p>
                        <p><strong>Donation Amount:</strong> 9,000 LKR</p>
                        <p><strong>Description :</strong> Oscar has been adopted, but funds are needed to transport him to his new home. Your support can make this happen.</p>
                    </div>
                    <div class="donation-actions">
                        <button class="approve-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/approve?id=10'">Approve</button>
                        <button class="reject-button" onclick="window.location.href='<?= ROOT ?>/admin/donation/reject?id=10'">Reject</button>
                    </div>
                </div>

                <!-- Add more donation cards as needed -->
            </section>
        </div>
    </div>
    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>