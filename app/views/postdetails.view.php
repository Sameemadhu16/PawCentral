<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Pet Post Details</title>
  <link rel="stylesheet" href="../../assets/css/postdetails.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700&display=swap" rel="stylesheet">

</head>
<body>
<div class="post-container">
  <h1>Pet Details</h1>

  <!-- Pet Images -->
  <div class="post-images">
    <img src="<?= $post->img1 ?>" alt="Image 1">
    <img src="<?= $post->img2 ?>" alt="Image 2">
    <img src="<?= $post->img3 ?>" alt="Image 3">
  </div>

  <!-- Common Details -->
  <div class="section">
    <h2>Basic Info</h2>
    <?php if ($post->tradeType=== 'Importing'): ?>
        <p><strong>Name:</strong> <?= $post->pet_name ?></p>
        <?php elseif($post->tradeType==='Renting') :?>
            <p><strong>Name:</strong> <?= $post->pet_name ?></p>
            <?php else: ?>
                <p><strong>Name:</strong> <?= $post->petName ?></p>
  <?php endif; ?>
    <p><strong>Species:</strong> <?= $post->species ?></p>
    <p><strong>Breed:</strong> <?= $post->breed ?></p>
    <p><strong>Sex:</strong> <?= $post->sex ?></p>
    <p><strong>Age:</strong> <?= $post->age?></p>
    <p><strong>Height:</strong> <?= $post->height ?> cm</p>
    <p><strong>Weight:</strong> <?= $post->weight ?> kg</p>
    <p><strong>Neutered:</strong> <?= $post->neutered ?></p>
    <p><strong>Trained:</strong> <?= $post->trained?></p>
    <p><strong>Pedigree:</strong> <?= $post->pedigree?></p>
    <p><strong>Vaccinated:</strong> <?= $post->vaccinated ?></p>
  </div>

  <!-- Contact Info -->
  <div class="section">
    <h2>Contact Info</h2>
    <p><strong>Name:</strong> <?= $post->contactName ?></p>
    <p><strong>Phone:</strong> <?= $post->contactNumber?></p>
    <p><strong>Email:</strong> <?= $post->email ?></p>
  </div>

  <!-- Sell Details -->
  <?php if ($post->tradeType === 'Selling'): ?>
    <div class="section sell-section">
      <h2>Selling Info</h2>
      <p><strong>Price:</strong> <?= $post->price ?> Rupees</p>
      <p><strong>Fee Negotiable:</strong> <?= $post->fee_negotiable ?></p>
    </div>
  <?php endif; ?>

  <!-- Rent Details -->
  <?php if ($post->tradeType === 'Renting'): ?>
    <div class="section rent-section">
      <h2>Rental Info</h2>
      <p><strong>Rental Fee:</strong> <?= $post->rental_fee ?> Rupees</p>
      <p><strong>Renter Name:</strong> <?= $post->renter_name ?></p>
      <p><strong>Renter Contact:</strong> <?= $post->renter_contact ?></p>
      <p><strong>Renter Address:</strong> <?= $post->renter_address ?></p>
      <p><strong>Rental Duration:</strong> <?= $post->rental_duration?></p>
    </div>
  <?php endif; ?>

  <!-- Import Details -->
  <?php if ($post->tradeType=== 'Importing'): ?>
    <div class="section import-section">
      <h2>Import Info</h2>
      <p><strong>Country:</strong> <?= $post->country ?></p>
      <p><strong>Importing Owner:</strong> <?= $post->importing_owner ?></p>
      <p><strong>Import Fees:</strong> <?= $post->import_fees ?> Rupees</p>
      <p><strong>Transport Method:</strong> <?= $post->transport_method ?></p>
      <p><strong>Importer Mobile:</strong> <?= $post->importer_mobile ?></p>
    </div>
  <?php endif; ?>

  <!-- Footer -->
  <div class="section footer">
    <p><strong>Posted On:</strong> <?= $post->created_at?></p>
   
  </div>
</div>
</body>
</html>