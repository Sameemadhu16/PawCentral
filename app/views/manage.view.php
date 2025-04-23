<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Posts</title>
    <link rel="stylesheet" href="../assets/css/manage.css">
    <link rel="stylesheet" href="./assets/css/main/main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
</head>
<body>
    <?php include '../app/views/components/header.php' ?>
    <div class="main-container">
    <?php include("../app/views/components/merchant/sidebar.php"); ?>
    <div class="contents">
    <div class="managepost">
        <h1>Manage Posts</h1>
        <p class="managepost-title">Review, edit, or delete your active posts here.</p>
    </div>
     
    <div class="post-container">
        
        <?php if(!empty($sell_posts)): ?>
            <?php foreach($sell_posts as $posts): ?>
                <?php if($posts->delete_status!=1): ?>
                <div class="card">
                    <span class="corner-label sell">Sell</span>
                    <div class="image-slider">
                        <?php if(!empty($posts->img1)): ?>
                        <div class="slide active">
                         <a href="<?=ROOT?>/service/manage/details?id=<?=htmlspecialchars($posts->pet_id)?>&tradeType=<?=htmlspecialchars($posts->tradeType)?>" >  <img src="<?=htmlspecialchars($posts->img1)?>" alt="Pet Image 1"> </a>
                        </div>
                        <?php endif; ?>
                        
                        <?php if(!empty($posts->img2)): ?>
                        <div class="slide">
                        <a href="<?=ROOT?>/service/manage/details?id=<?=htmlspecialchars($posts->pet_id)?>&tradeType=<?=htmlspecialchars($posts->tradeType)?>" >  <img src="<?=htmlspecialchars($posts->img2)?>" alt="Pet Image 1"> </a>
                        </div>
                        <?php endif; ?>
                        
                        <?php if(!empty($posts->img3)): ?>
                        <div class="slide">
                        <a href="<?=ROOT?>/service/manage/details?id=<?=htmlspecialchars($posts->pet_id)?>&tradeType=<?=htmlspecialchars($posts->tradeType)?>" >  <img src="<?=htmlspecialchars($posts->img3)?>" alt="Pet Image 1"> </a>
                        </div>
                        <?php endif; ?>
                        
                        <button class="slider-arrow prev-arrow">&#10094;</button>
                        <button class="slider-arrow next-arrow">&#10095;</button>
                    </div>
                    
                    <div class="card-content">
                        <strong>Sex: <?=htmlspecialchars($posts->sex)?></strong>
                        <strong>Price: <?=htmlspecialchars($posts->price)?></strong>
                        <strong>City: <?=htmlspecialchars($posts->City)?></strong>
                        <strong>Species: <?=htmlspecialchars($posts->species)?></strong>
                        <strong>Age: <?=htmlspecialchars($posts->age)?></strong>
                    </div>
                    
                    <div class="post-actions">
                    <a href="<?=ROOT?>/service/manage/edit?id=<?=htmlspecialchars($posts->pet_id)?>&type=<?=htmlspecialchars($posts->tradeType)?>" class="btn edit-btn">Edit</a>

                        <a href="<?=ROOT?>/service/manage/delete?id=<?=htmlspecialchars($posts->pet_id)?>&tradeType=<?=htmlspecialchars($posts->tradeType)?>" class="btn delete-btn">Delete</a>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- <p>No sell posts available</p> -->
        <?php endif; ?>

        <?php if(!empty($rent_posts)): ?>
            <?php foreach($rent_posts as $posts): ?>
                <?php if($posts->delete_status!=1): ?>
                <div class="card">
                    <span class="corner-label rent">Rent</span>
                    <div class="image-slider">
                        <?php if(!empty($posts->img1)): ?>
                        <div class="slide active">
                        <a href="<?=ROOT?>/service/manage/details?id=<?=htmlspecialchars($posts->pet_id)?>&tradeType=<?=htmlspecialchars($posts->tradeType)?>" >  <img src="<?=htmlspecialchars($posts->img1)?>" alt="Pet Image 1"> </a>
                        </div>
                        <?php endif; ?>
                        
                        <?php if(!empty($posts->img2)): ?>
                        <div class="slide">
                        <a href="<?=ROOT?>/service/manage/details?id=<?=htmlspecialchars($posts->pet_id)?>&tradeType=<?=htmlspecialchars($posts->tradeType)?>" >  <img src="<?=htmlspecialchars($posts->img2)?>" alt="Pet Image 1"> </a>
                        </div>
                        <?php endif; ?>
                        
                        <?php if(!empty($posts->img3)): ?>
                        <div class="slide">
                        <a href="<?=ROOT?>/service/manage/details?id=<?=htmlspecialchars($posts->pet_id)?>&tradeType=<?=htmlspecialchars($posts->tradeType)?>" >  <img src="<?=htmlspecialchars($posts->img3)?>" alt="Pet Image 1"> </a>
                        </div>
                        <?php endif; ?>
                        
                        <button class="slider-arrow prev-arrow">&#10094;</button>
                        <button class="slider-arrow next-arrow">&#10095;</button>
                    </div>
                    
                    <div class="card-content">
                        <strong>Sex: <?=htmlspecialchars($posts->sex)?></strong>
                        <strong>Rental fee: <?=htmlspecialchars($posts->rental_fee)?></strong>
                        <strong>Species: <?=htmlspecialchars($posts->species)?></strong>
                        <strong>Age: <?=htmlspecialchars($posts->age)?></strong>
                    </div>
                    
                    <div class="post-actions">
                    <a href="<?=ROOT?>/service/manage/edit?id=<?=htmlspecialchars($posts->pet_id)?>&type=<?=htmlspecialchars($posts->tradeType)?>" class="btn edit-btn">Edit</a>

                    <a href="<?=ROOT?>/service/manage/delete?id=<?=htmlspecialchars($posts->pet_id)?>&tradeType=<?=htmlspecialchars($posts->tradeType)?>" class="btn delete-btn">Delete</a>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- <p>No rent posts available</p> -->
        <?php endif; ?>

        <?php if(!empty($import_posts)): ?>
            <?php foreach($import_posts as $posts): ?>
                <?php if($posts->delete_status!=1): ?>
                <div class="card">
                    <span class="corner-label import">Import</span>
                    <div class="image-slider">
                        <?php if(!empty($posts->img1)): ?>
                        <div class="slide active">
                        <a href="<?=ROOT?>/service/manage/details?id=<?=htmlspecialchars($posts->pet_id)?>&tradeType=<?=htmlspecialchars($posts->tradeType)?>" >  <img src="<?=htmlspecialchars($posts->img1)?>" alt="Pet Image 1"> </a>
                        </div>
                        <?php endif; ?>
                        
                        <?php if(!empty($posts->img2)): ?>
                        <div class="slide">
                        <a href="<?=ROOT?>/service/manage/details?id=<?=htmlspecialchars($posts->pet_id)?>&tradeType=<?=htmlspecialchars($posts->tradeType)?>" >  <img src="<?=htmlspecialchars($posts->img2)?>" alt="Pet Image 1"> </a>
                        </div>
                        <?php endif; ?>
                        
                        <?php if(!empty($posts->img3)): ?>
                        <div class="slide">
                        <a href="<?=ROOT?>/service/manage/details?id=<?=htmlspecialchars($posts->pet_id)?>&tradeType=<?=htmlspecialchars($posts->tradeType)?>" >  <img src="<?=htmlspecialchars($posts->img3)?>" alt="Pet Image 1"> </a>
                        </div>
                        <?php endif; ?>
                        
                        <button class="slider-arrow prev-arrow">&#10094;</button>
                        <button class="slider-arrow next-arrow">&#10095;</button>
                    </div>
                    
                    <div class="card-content">
                        <strong>Sex: <?=htmlspecialchars($posts->sex)?></strong>
                        <strong>Import fees: <?=htmlspecialchars($posts->import_fees)?></strong>
                        <strong>Species: <?=htmlspecialchars($posts->species)?></strong>
                        <strong>Age: <?=htmlspecialchars($posts->age)?></strong>
                    </div>
                    
                    <div class="post-actions">
                    <a href="<?=ROOT?>/service/manage/edit?id=<?=htmlspecialchars($posts->pet_id)?>&type=<?=htmlspecialchars($posts->tradeType)?>" class="btn edit-btn">Edit</a>
                    <a href="<?=ROOT?>/service/manage/delete?id=<?=htmlspecialchars($posts->pet_id)?>&tradeType=<?=htmlspecialchars($posts->tradeType)?>" class="btn delete-btn">Delete</a>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <!-- <p>No import posts available</p> -->
        <?php endif; ?>
        <div id="customConfirm" class="confirm-modal">
            <div class="confirm-content">
                <p>Are you sure you want to delete this post?</p>
                    <div class="confirm-buttons">
                        <button id="confirmYes">Yes</button>
                        <button id="confirmNo">No</button>
                    </div>

            </div>

        </div>
    </div>
        </div>
 </div>
 <?php include("../app/views/components/footer.php")?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Initialize all sliders
        document.querySelectorAll('.image-slider').forEach(slider => {
            const slides = slider.querySelectorAll('.slide');
            const prevArrow = slider.querySelector('.prev-arrow');
            const nextArrow = slider.querySelector('.next-arrow');
            let currentIndex = 0;
            
            // Only show arrows if there are multiple slides
            if (slides.length <= 1) {
                if (prevArrow) prevArrow.style.display = 'none';
                if (nextArrow) nextArrow.style.display = 'none';
            }
            
            // Show first slide
            if (slides.length > 0) {
                slides[0].classList.add('active');
            }
            
            // Navigation functions
            function showSlide(index) {
                slides.forEach(slide => slide.classList.remove('active'));
                slides[index].classList.add('active');
                currentIndex = index;
            }
            
            function nextSlide() {
                let newIndex = (currentIndex + 1) % slides.length;
                showSlide(newIndex);
            }
            
            function prevSlide() {
                let newIndex = (currentIndex - 1 + slides.length) % slides.length;
                showSlide(newIndex);
            }
            
            // Event listeners
            if (nextArrow) nextArrow.addEventListener('click', nextSlide);
            if (prevArrow) prevArrow.addEventListener('click', prevSlide);
            
            // Optional: Auto-advance slides every 5 seconds
          
            
            // Pause on hover
            slider.addEventListener('mouseenter', () => clearInterval(slideInterval));
           
        });
    });
    document.querySelectorAll('.delete-btn').forEach(link=>{
        link.addEventListener('click',function(e){
            e.preventDefault();
            const deleteUrl=this.href;
            const modal=document.getElementById('customConfirm');
            modal.style.display='flex';
            document.getElementById('confirmYes').onclick=function(){
                modal.style.display='none';
                window.location.href=deleteUrl;
            };

            document.getElementById('confirmNo').onclick=function(){
                modal.style.display='none';
            };
        });
    });
    
    // function showCustomConfirm(actionUrlId){
    //     const modal=document.getElementById('customConfirm');
    //     modal.style.display='none';
    //     window.location.href=actionUrl;
    // };
    // document.getElementById('confirmNo').onclick=function(){
    //     modal.style.display='none';
    // };
    </script>
    
</body>
</html>