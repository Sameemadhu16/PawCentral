<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device=width, initial-scale=1.0">
    <title>PawCentral Dashboard - AdminPosts</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/post.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <?php include("../app/views/components/admin/adminSidebar.php"); ?>

        <div class="content">

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
            </div>

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
                    
                    <div class="interactive-card">
                        <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Pet Products">
                        <div class="card-display">
                            <h3>Pet Products & Services</h3>
                        </div>
                        <div class="card-overlay">
                            <h4>Pet Products & Services</h4>
                            <p>Shop for high-quality pet products and services.</p>
                        </div>
                    </div>

                    <div class="interactive-card">
                        <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Pet Products">
                        <div class="card-display">
                            <h3>Pet Products & Services</h3>
                        </div>
                        <div class="card-overlay">
                            <h4>Pet Products & Services</h4>
                            <p>Shop for high-quality pet products and services.</p>
                        </div>
                    </div>

                    <div class="interactive-card">
                        <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Pet Products">
                        <div class="card-display">
                            <h3>Pet Products & Services</h3>
                        </div>
                        <div class="card-overlay">
                            <h4>Pet Products & Services</h4>
                            <p>Shop for high-quality pet products and services.</p>
                        </div>
                    </div>
                    <div class="interactive-card">
                        <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Pet Products">
                        <div class="card-display">
                            <h3>Pet Products & Services</h3>
                        </div>
                        <div class="card-overlay">
                            <h4>Pet Products & Services</h4>
                            <p>Shop for high-quality pet products and services.</p>
                        </div>
                    </div>
                    <div class="interactive-card">
                        <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Pet Products">
                        <div class="card-display">
                            <h3>Pet Products & Services</h3>
                        </div>
                        <div class="card-overlay">
                            <h4>Pet Products & Services</h4>
                            <p>Shop for high-quality pet products and services.</p>
                        </div>
                    </div>

                    <div class="interactive-card">
                        <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Pet Products">
                        <div class="card-display">
                            <h3>Pet Products & Services</h3>
                        </div>
                        <div class="card-overlay">
                            <h4>Pet Products & Services</h4>
                            <p>Shop for high-quality pet products and services.</p>
                        </div>
                    </div>
                    <div class="interactive-card">
                        <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Pet Products">
                        <div class="card-display">
                            <h3>Pet Products & Services</h3>
                        </div>
                        <div class="card-overlay">
                            <h4>Pet Products & Services</h4>
                            <p>Shop for high-quality pet products and services.</p>
                        </div>
                    </div>
                    <div class="interactive-card">
                        <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Pet Products">
                        <div class="card-display">
                            <h3>Pet Products & Services</h3>
                        </div>
                        <div class="card-overlay">
                            <h4>Pet Products & Services</h4>
                            <p>Shop for high-quality pet products and services.</p>
                        </div>
                    </div>
                    <div class="interactive-card">
                        <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Pet Products">
                        <div class="card-display">
                            <h3>Pet Products & Services</h3>
                        </div>
                        <div class="card-overlay">
                            <h4>Pet Products & Services</h4>
                            <p>Shop for high-quality pet products and services.</p>
                        </div>
                    </div>
                    <div class="interactive-card">
                        <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Pet Products">
                        <div class="card-display">
                            <h3>Pet Products & Services</h3>
                        </div>
                        <div class="card-overlay">
                            <h4>Pet Products & Services</h4>
                            <p>Shop for high-quality pet products and services.</p>
                        </div>
                    </div>
                    <div class="interactive-card">
                        <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Pet Products">
                        <div class="card-display">
                            <h3>Pet Products & Services</h3>
                        </div>
                        <div class="card-overlay">
                            <h4>Pet Products & Services</h4>
                            <p>Shop for high-quality pet products and services.</p>
                        </div>
                    </div>
                    <!-- Add more interactive-card divs as needed -->
                </section>
            </div>





        </div>
    </div>
</body>