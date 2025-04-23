<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PawCentral Dashboard - Overview</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/overview.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

</head>

<body class="body">
    <!-- Include the Header and Sidebar Components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="container main-container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <!-- Content Section -->
        <div class="content">
            <div class="dashboard-header">
                <h1>Dashboard Overview</h1>
                <!-- <div class="date-filter">
                    <select id="timeRange">
                        <option value="today">Today</option>
                        <option value="week" selected>This Week</option>
                        <option value="month">This Month</option>
                        <option value="year">This Year</option>
                    </select>
                </div> -->
            </div>

            <div class="stats-summary">
                <div class="stat-card total-users">
                    <div class="stat-icon"><i class="fas fa-users"></i></div>
                    <div class="stat-info">
                        <h3>Total Users</h3>
                        <p class="stat-value"><?= esc($userCount) ?></p>
                        <p class="stat-trend positive">+5% <span>vs last period</span></p>
                    </div>
                </div>
                <div class="stat-card total-pets">
                    <div class="stat-icon"><i class="fas fa-paw"></i></div>
                    <div class="stat-info">
                        <h3>Registered Pets</h3>
                        <p class="stat-value">243</p>
                        <p class="stat-trend positive">+12% <span>vs last period</span></p>
                    </div>
                </div>
                <div class="stat-card active-users">
                    <div class="stat-icon"><i class="fas fa-chart-line"></i></div>
                    <div class="stat-info">
                        <h3>Active Users</h3>
                        <p class="stat-value">187</p>
                        <p class="stat-trend positive">+8% <span>vs last period</span></p>
                    </div>
                </div>
                <div class="stat-card total-revenue">
                    <div class="stat-icon"><i class="fas fa-dollar-sign"></i></div>
                    <div class="stat-info">
                        <h3>Donation Price</h3>
                        <p class="stat-value">8,245 LKR</p>
                        <p class="stat-trend positive">+15% <span>vs last period</span></p>
                    </div>
                </div>
            </div>

            <div class="dashboard-sections">
                <div class="section activity-section">
                    <h2>Activity Overview</h2>
                    <div class="overview">
                        <div class="card">
                            <div class="card-icon"><i class="fas fa-bullhorn"></i></div>
                            <div class="card-details">
                                <h3>Announcements</h3>
                                <span><?= esc($announcementCount) ?></span>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-icon"><i class="fas fa-clipboard-list"></i></div>
                            <div class="card-details">
                                <h3>Medical Registrations</h3>
                                <span><?= esc($mediRegCount) ?></span>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-icon"><i class="fas fa-calendar-alt"></i></div>
                            <div class="card-details">
                                <h3>Events</h3>
                                <span><?= esc($eventCount) ?></span>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-icon"><i class="fas fa-hand-holding-heart"></i></div>
                            <div class="card-details">
                                <h3>Donations</h3>
                                <span><?= esc($donationCount) ?></span>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-icon"><i class="fas fa-comment-dots"></i></div>
                            <div class="card-details">
                                <h3>Posts</h3>
                                <span>15</span>
                            </div>
                        </div>
                        <div class="card reports-card">
                            <div class="card-icon"><i class="fas fa-file-alt"></i></div>
                            <div class="card-details">
                                <h3>Reports</h3>
                                <button class="generate-button" onclick="generateReport()">Generate Report</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="section recent-section">
                    <h2>Recent Activity</h2>
                    <div class="recent-activities">
                        <div class="activity-item">
                            <div class="activity-icon"><i class="fas fa-user-plus"></i></div>
                            <div class="activity-details">
                                <h4>New User Registration</h4>
                                <p>Jane Cooper has registered a new account</p>
                                <small>2 hours ago</small>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon"><i class="fas fa-calendar-plus"></i></div>
                            <div class="activity-details">
                                <h4>New Event Created</h4>
                                <p>Pet Adoption Day event has been scheduled</p>
                                <small>5 hours ago</small>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon"><i class="fas fa-donate"></i></div>
                            <div class="activity-details">
                                <h4>New Donation Received</h4>
                                <p>$250 donation received from Robert Fox</p>
                                <small>Yesterday</small>
                            </div>
                        </div>
                        <div class="activity-item">
                            <div class="activity-icon"><i class="fas fa-paw"></i></div>
                            <div class="activity-details">
                                <h4>New Pet Registration</h4>
                                <p>Max (Golden Retriever) has been registered</p>
                                <small>Yesterday</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("../app/views/components/footer.php"); ?>

    <script>
        function generateReport() {
            alert("Report generation in progress...");
            // Add logic for generating the report

            const downloadBtn = document.createElement('button');
            downloadBtn.innerText = 'Download Report';
            downloadBtn.className = 'download-button';
            downloadBtn.onclick = function() {
                const element = document.querySelector('.content'); // Ensure the correct element is targeted
                html2pdf().from(element).save('dashboard-report.pdf'); // Specify a filename for the PDF
                this.remove();
            };

            document.querySelector('.reports-card .card-details').appendChild(downloadBtn);
        }

        // Time range selector logic
        const timeRange = document.getElementById('timeRange');
        if (timeRange) {
            timeRange.addEventListener('change', function() {
                alert("Data range changed to: " + this.value);
                // Add logic to refresh data based on selected time range
            });
        }
    </script>
</body>

</html>