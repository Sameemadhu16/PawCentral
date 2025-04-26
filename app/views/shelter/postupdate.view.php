<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Adoption Post</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/donation.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/events.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/popup.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container container">
        <?php include("../app/views/components/shelter/sidebar.php"); ?>

        <div class="user-accounts-section">
            <div class="form-container">
                <h2>Edit Adoption Post Information</h2>
                <form id="petForm" action="<?= ROOT ?>/shelter/postupdate" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
                    <input type="hidden" name="id" value="<?= esc($post->pet_id) ?>">

                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?= esc($post->name) ?>" required minlength="2" maxlength="50">

                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" value="<?= esc($post->age) ?>" min="0" max="50" required>

                    <label for="height">Height (cm):</label>
                    <input type="number" id="height" name="height" value="<?= esc($post->height) ?>" min="5" max="100" required>

                    <label for="weight">Weight (kg):</label>
                    <input type="number" id="weight" name="weight" value="<?= esc($post->weight) ?>" min="0.02" max="150" required>

                    <label for="sex">Sex:</label>
                    <select id="sex" name="sex" required>
                        <option value="Male" <?= $post->sex == 'Male' ? 'selected' : '' ?>>Male</option>
                        <option value="Female" <?= $post->sex == 'Female' ? 'selected' : '' ?>>Female</option>
                    </select>

                    <label for="pedigree">Pedigree:</label>
                    <select id="pedigree" name="pedigree" required>
                        <option value="1" <?= $post->pedigree == 1 ? 'selected' : '' ?>>Yes</option>
                        <option value="0" <?= $post->pedigree == 0 ? 'selected' : '' ?>>No</option>
                    </select>

                    <label for="neutered">Neutered:</label>
                    <select id="neutered" name="neutered" required>
                        <option value="1" <?= $post->neutered == 1 ? 'selected' : '' ?>>Yes</option>
                        <option value="0" <?= $post->neutered == 0 ? 'selected' : '' ?>>No</option>
                    </select>

                    <label for="trained">Trained:</label>
                    <select id="trained" name="trained" required>
                        <option value="1" <?= $post->trained == 1 ? 'selected' : '' ?>>Yes</option>
                        <option value="0" <?= $post->trained == 0 ? 'selected' : '' ?>>No</option>
                    </select>

                    <label for="vaccinated">Vaccinated:</label>
                    <select id="vaccinated" name="vaccinated" required>
                        <option value="1" <?= $post->vaccinated == 1 ? 'selected' : '' ?>>Yes</option>
                        <option value="0" <?= $post->vaccinated == 0 ? 'selected' : '' ?>>No</option>
                    </select>

                    <label for="description">Description:</label>
                    <textarea id="description" name="postdesc" rows="5" required minlength="10" maxlength="500"><?= esc($post->description) ?></textarea>

                    

                    <button type="submit" name="update">Update</button>
                </form>
            </div>
        </div>
    </div>

    <?php include("../app/views/components/footer.php"); ?>
    <script>
        function validateForm() {
            const age = document.getElementById('age').value;
            const height = document.getElementById('height').value;
            const weight = document.getElementById('weight').value;

            if (age < 0 || age > 50) {
                alert("Age must be between 0 and 50.");
                return false;
            }

            if (height < 5 || height > 100) {
                alert("Height must be between 5 and 100 cm.");
                return false;
            }

            if (weight < 0.02 || weight > 150) {
                alert("Weight must be between 20g and 150 kg.");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>