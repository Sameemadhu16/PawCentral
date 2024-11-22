<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/petposts.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">
</head>
<body>
    
    <?php include("../app/views/components/header.php"); ?>

    <h1 class="heading">Find a Pet</h1>

  <div class="containers">
      <!-- Search Container -->
      <div class="search-container">
        <div class="searchbox">
            <label for="">Location</label>
        <select>
            <option>location</option>
            <option>wadduwa</option>
        </select>
        </div>
        
        <div class="searchbox">
            <label for="">Pet type</label>
        <select>
            <option>animal type</option>
        </select>
        </div>
        <div class="searchbox">
            <label for="">Looking to</label>
            <select>
                <option>any</option>
            </select>
        </div>
        <button>Search</button>
    </div>

        
    <!-- Results Container (Cards) -->
    <div class="results-container">
        <a href="<?=ROOT?>/findapet/post_id" class="card">
            
            <span class="corner-label sell">Sell</span>
                <img src="<?= ROOT ?>/assets/images/pets/merchant/sell1.webp" alt="Cat">            
            <p class="name">Cat - Lusi</p>
            <p> Panadura</p>
            <span class="price">Rs. 2500</span>
</a>
        <a href="<?=ROOT?>/findapet/post_id" class="card">            
            <span class="corner-label rent">Rent</span>
            <img src="<?= ROOT ?>/assets/images/pets/merchant/nopic.jpg" alt="Puppy">
            <p class="name">Tiny - Puppy</p>
            <p>Kalutara</p>
            <span class="price">Rs. 2500</span>
</a>
        <div class="card">
            
            <span class="corner-label sell">Sell</span>
            <img src="<?= ROOT ?>/assets/images/pets/merchant/sell21.webp" alt="Dog">
            <p>Trinkey - Dog</p>
            <p> Nalluruwa</p>
            <span class="price">Rs. 2500</span>
        </div>
        <div class="card">
            <span class="corner-label rent">Rent</span>
            <img src="<?= ROOT ?>/assets/images/pets/merchant/nopicd.jpg" alt="Cat">
            <p>Cat - Lusi </p>
            <p>Panadura</p>
            <span class="price">Rs. 2500</span>
        </div>
        <div class="card">
            <span class="corner-label rent">Rent</span>
            <img src="<?= ROOT ?>/assets/images/pets/pet1.jpg" alt="Cat">
            <p>Cat - Lusi </p>
            <p>Panadura</p>
            <span class="price">Rs. 2500</span>
        </div>
        <div class="card">
            <span class="corner-label export">Export</span>
            <img src="<?= ROOT ?>/assets/images/pets/lost_1.png" alt="Cat">
            <p>Cat - Lusi </p>
            <p>Panadura</p>
            <span class="price">Rs. 2500</span>
        </div>
        <div class="card">
            <span class="corner-label rent">Rent</span>
            <img src="<?= ROOT ?>/assets/images/pets/found_1.png" alt="Puppy">
            <p>Tiny - Puppy </p>
            <p>Kalutara</p>
            <span class="price">Rs. 2500</span>
        </div>
        <div class="card">
            <span class="corner-label export">Export</span>
            <img src="<?= ROOT ?>/assets/images/pets/merchant/sell1.webp" alt="Dog">
            <p>Trinkey - Dog </p>
            <p>Nalluruwa</p>
            <span class="price">Rs. 2500<span> 
        </div>
        <div class="card">
            <span class="corner-label sell">Sell</span>
            <img src="<?= ROOT ?>/assets/images/pets/petres1.jpg" alt="Cat">
            <p>Cat - Lusi </p>
            <p>Panadura</p>
            <span class="price">Rs. 2500</span>
        </div>
    </div>

  </div>
    <!-- Pagination -->
    <div class="pagination">
        <a href="#">&lt;</a>
        <a href="#" class="active">1</a>
        <a href="#">2</a>
        <a href="#">3</a>
        <a href="#">4</a>
        <a href="#">&gt;</a>
    </div>

</body>
</html>
