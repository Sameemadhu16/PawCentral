<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>PawCentral Dashboard - AdminPosts</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/post.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <div class="content">
<!-- 
            <h2>Posts</h2>
            <div class="cards-container">
                <div class="card">
                    <div class="card-number">100.1k</div>
                    <div class="card-title">Adoption Posts</div>
                    <div class="card-subtitle"><i class="fas fa-clock"></i> from last month</div>
                </div>
                <div class="card">
                    <div class="card-number">100.1k</div>
                    <div class="card-title">Selling Post</div>
                    <div class="card-subtitle"><i class="fas fa-clock"></i> from last month</div>
                </div>
                <div class="card">
                    <div class="card-number">100.1k</div>
                    <div class="card-title">Service Post</div>
                    <div class="card-subtitle"><i class="fas fa-clock"></i> from last month</div>
                </div>
            </div> -->

            <div class="post-container">
                <h2>Recent Posts</h2>
                <div class="post-actions">
                    <input type="text" class="search-bar" placeholder="Search Post" />
                    <div class="filter-dropdown">
                        <i class="fas fa-filter"></i>
                        <select>
                            <option>All Posts</option>
                            <option>Adoption Posts</option>
                            <option>Selling Posts</option>
                            <option>Service Posts</option>
                            <!-- Add more filter options here -->
                        </select>
                    </div>
                </div>
            </div>

            <div class="post-section">
                <section class="interactive-sections">

                    <div class="interactive-card" onclick="window.location.href='<?= ROOT ?>/admin/post_info'">
                    <img src="<?= ROOT ?>/assets/images/pets/2.jpg" alt="Post Image">
                        <div class="card-content">
                            <h3>Pet Adoption Day</h3>
                            <p>Type: Adoption Post</p>
                            <p>Author: Jane Doe</p>
                        </div>
                    </div>

                    <div class="interactive-card" onclick="window.location.href='<?= ROOT ?>/admin/post_info'">
                    <img src="<?= ROOT ?>/assets/images/pets/3.jpg" alt="Post Image">
                        <div class="card-content">
                            <h3>Volunteer Recruitment</h3>
                            <p>Type: Announcement</p>
                            <p>Author: John Smith</p>
                        </div>
                    </div>

                    <div class="interactive-card" onclick="window.location.href='<?= ROOT ?>/admin/post_info'">
                        <img src="<?= ROOT ?>/assets/images/pets/1.jpg" alt="Post Image">
                        <div class="card-content">
                            <h3>New Shelter Opening</h3>
                            <p>Type: News</p>
                            <p>Author: Sarah Johnson</p>
                        </div>
                    </div>

                    <div class="interactive-card" onclick="window.location.href='<?= ROOT ?>/admin/post_info'">
                    <img src="<?= ROOT ?>/assets/images/pets/6.jpg" alt="Post Image">
                        <div class="card-content">
                            <h3>Lost Pet Found</h3>
                            <p>Type: Alert</p>
                            <p>Author: Michael Brown</p>
                        </div>
                    </div>

                    <div class="interactive-card" onclick="window.location.href='<?= ROOT ?>/admin/post_info'">
                    <img src="<?= ROOT ?>/assets/images/pets/5.jpg" alt="Post Image">
                        <div class="card-content">
                            <h3>Adoption Success Story</h3>
                            <p>Type: Story</p>
                            <p>Author: Emma Davis</p>
                        </div>
                    </div>

                    <div class="interactive-card" onclick="window.location.href='<?= ROOT ?>/admin/post_info'">
                        <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Post Image">
                        <div class="card-content">
                            <h3>Fundraising Event</h3>
                            <p>Type: Event</p>
                            <p>Author: Olivia Martinez</p>
                        </div>
                    </div>

                    <!-- <div class="interactive-card" onclick="window.location.href='<?= ROOT ?>/admin/post_info'">
                        <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Post Image">
                        <div class="card-content">
                            <h3>Pet Care Tips</h3>
                            <p>Type: Blog Post</p>
                            <p>Author: Lucas Anderson</p>
                        </div>
                    </div>

                    <div class="interactive-card" onclick="window.location.href='<?= ROOT ?>/admin/post_info'">
                        <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Post Image">
                        <div class="card-content">
                            <h3>Urgent Adoption Needed</h3>
                            <p>Type: Emergency</p>
                            <p>Author: Mia Thompson</p>
                        </div>
                    </div> -->

                    <!-- <div class="interactive-card" onclick="window.location.href='<?= ROOT ?>/admin/post_info'">
                        <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Post Image">
                        <div class="card-content">
                            <h3>Free Vaccination Drive</h3>
                            <p>Type: Announcement</p>
                            <p>Author: Ethan White</p>
                        </div>
                    </div>

                    <div class="interactive-card" onclick="window.location.href='<?= ROOT ?>/admin/post_info'">
                        <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Post Image">
                        <div class="card-content">
                            <h3>Meet Our New Arrivals</h3>
                            <p>Type: Adoption Post</p>
                            <p>Author: Ava Garcia</p>
                        </div>
                    </div> -->

                    <!-- Add more interactive-card divs as needed -->
                </section>
            </div>





        </div>
    </div>
    <?php include("../app/views/components/footer.php"); ?>
</body>