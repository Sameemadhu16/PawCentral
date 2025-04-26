<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/main/main.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/admin/post_info.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body>
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <div class="post-details-container">
            <div class="back-icon">
                <a href="<?= ROOT ?>/admin/post">
                    <i class="fas fa-arrow-left"></i>
                </a>
            </div>
            <h1>Post Details</h1>

            <div class="post-info">
                <img src="<?= ROOT ?>/assets/images/products_bg.png" alt="Post Image" class="post-image">
                <div class="post-text-content">
                    <h2>Post Title: Pet Adoption Day</h2>
                    <p><strong>Type:</strong> Adoption Post</p>
                    <p><strong>Author:</strong> Jane Doe</p>
                    <p><strong>Date:</strong> 2024/05/16</p>
                    <p><strong>Description:</strong></p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. This post is about adopting a pet and finding a loving home for it. Get involved and help our cause.</p>
                </div>
            </div>

            <div class="post-actions">
                <button class="approve-button" onclick="approvePost()">Approve</button>
                <!-- <button class="edit-button" onclick="editPost()">Edit</button> -->
                <button class="delete-button" onclick="deletePost()">Delete</button>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    function approvePost() {
        if (confirm("Are you sure you want to approve this post?")) {
            alert("Post approved successfully!");
            // Add API call or form submission logic here
        }
    }

    function editPost() {
        // Redirect to the edit page
        window.location.href = "<?= ROOT ?>/admin/edit_post?id=POST_ID";
    }

    function deletePost() {
        if (confirm("Are you sure you want to delete this post?")) {
            alert("Post deleted successfully!");
            // Add API call or form submission logic here
        }
    }
</script>