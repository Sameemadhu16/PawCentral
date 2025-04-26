<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Lost_And-Found</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/lostFound.css">
    
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/donation.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/events.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/popup.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script>
        function toggleDiv(divId) {
            const completed = document.getElementById("CompletedDiv");
            const target = document.getElementById(divId);
            const completedBtn = document.getElementById("CompletedDivButton");

            // Hide both first
            completed.classList.remove("active");
            completedBtn.classList.remove("active-btn");

            // Toggle the selected one if it wasn’t already active
            if (target !== null && !target.classList.contains("active")) {
                target.classList.add("active");
            }
            
            if (divId=="CompletedDiv") {
                completedBtn.classList.add("active-btn");
            }
        }

        function openCompletedDiv() {
            toggleDiv("CompletedDiv");
        }
    </script>
    <style>
        /* #PendingDiv, #CompletedDiv {
            display: none;
        } */
        .inv-container {
            max-height: 0;
            overflow: auto;
            transition: max-height .5s ease;
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        /* When active */
        .inv-container.active {
            max-height: 1000px; /* Large enough to show the full content */
        }

        .active-btn {
            background-color: var(--button-normal-hover) !important;
        }
        
    </style>
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>
    <div class="main-container container">
        <?php include("../app/views/components/user/sidebar.php"); ?>
            
    <div class="user-accounts-section">

    <?php if (!empty($pets)): ?>
        <div class="header-section">
            <h2>Your lost and found posts</h2>
            <button class="quick-action-button fixedsize" onclick="window.location.href='<?=ROOT?>/lostandfound/report-animal';">Report Pet</button>
        </div>
        
        <div class="cards-container">
            <!-- <div style="block"></div> -->
            <?php $hasPending = false;?>            
        <?php foreach ($pets as $pet): ?>
            <?php if ($pet->postStatus == 0): ?>
                <?php $hasPending = true;?>
            <div class="pet-card" id=<?= htmlspecialchars($pet->petid); ?>>
                <div class="card-info">
                <img src=<?=htmlspecialchars($pet->img1)?> alt="your pet" class="pet-photo">
                <a class="pet-details" href="<?=ROOT?>/lostandfound/postdetails?id=<?= $pet->petid ?>">
                    <div class="details">
                        <h3><?= htmlspecialchars($pet->petName); ?> - <?= htmlspecialchars($pet->breed); ?></h3>
                        <p><?= htmlspecialchars($pet->status); ?></p>
                        <p><?= htmlspecialchars($pet->address); ?> - <?= htmlspecialchars($pet->location); ?></p>
                        <p class="date">Reported on: <?= htmlspecialchars($pet->publishedOn); ?></p>
                    </div>
                </a>
                </div>
                <div class="buttons">
                    <form action="<?= ROOT ?>/lostandfound/edit?id=<?= htmlspecialchars($pet->petid) ?>" method="POST" style="display: inline;">
                        <!-- <button class="action-button">Update info</button> -->
                        <button class="don-but">Update Info</button>
                    </form>
                    
                    <button class="don-but close-but" 
                                    onclick="showPopup(
                                        <?= htmlspecialchars($pet->petid) ?>,
                                        '<?= ROOT ?>/lostandfound/marklostnfound?id=<?= htmlspecialchars($pet->petid) ?>',
                                        'Are you sure want to close this post?<br><br><?= htmlspecialchars(addslashes($pet->petName != NULL ? $pet->petName : $pet->breed)) ?> - <?= htmlspecialchars(addslashes($pet->type)) ?>',
                                        ['Found the Owner', 'Give up', 'Found my Pet', 'Decided to Adopt', 'Passed away', 'Prefer not to say','Mistaken Entry']
                                    )">
                                    Close Post
                                </button>
                    <!-- <button class="action-button">Mark complete</button> -->
                </div>
            </div>
        <?php endif;?>
        <?php endforeach; ?>
        <?php if (!$hasPending) : ?>
            <div style="text-align: center; padding: 2rem; color: #777;">
                You have no reported pets at the moment.
            </div>
        <?php endif; ?>
        </div>
        <br><br>
        <?php if (!empty($pets)):?>
            <button id="CompletedDivButton" class="quick-action-button fixedsize" onclick="openCompletedDiv()">Closed Posts</button>
            <div id="CompletedDiv" class="event-list inv-container">
                <?php $hasCompleted = false;?>
                <?php foreach ($pets as $pet): ?>
                    <?php if ($pet->postStatus == 1 && $pet->closing_reason != 'mistaken-entry'): ?>
                        <?php $hasCompleted = true;?>
                        <div class="pet-card" id=<?= htmlspecialchars($pet->petid); ?>>
                <div class="card-info">
                <img src=<?=htmlspecialchars($pet->img1)?> alt="nikkhy" class="pet-photo">
                <a class="pet-details" href="<?=ROOT?>/lostandfound/postdetails?id=<?= $pet->petid ?>">
                    <div class="details">
                        <h3><?= htmlspecialchars($pet->petName); ?> - <?= htmlspecialchars($pet->breed); ?></h3>
                        <p><?= htmlspecialchars($pet->status); ?></p>
                        <p><?= htmlspecialchars($pet->address); ?> - <?= htmlspecialchars($pet->location); ?></p>
                        <p class="date">Reported on: <?= htmlspecialchars($pet->publishedOn); ?></p>
                    </div>
                </a>
                </div>
                <div class="buttons">
                    <p style="font-size: 0.7rem; font-weight: bold; color: #555; margin:10px; padding:5px;">Closing Reason: <?= htmlspecialchars($pet->closing_reason) ?></p>
                                    
                </div>
            </div>
                    <?php endif;?>
                <?php endforeach;
                if (!$hasCompleted) : ?>
                    <div style="text-align: center; padding: 2rem; color: #777;">
                        You have no closed posts at the moment.
                    </div>
                <?php endif; ?>
                </div>

        <?php endif;?>
    <?php else: ?>
        <div style="display: flex; justify-content: center; align-items: center; height: 50vh;">
                        <p style="text-align: center; font-size: 1.2rem; color: #555;">You have not reported any pets yet.<br>
                        <button class="add-event fixedsize"  onclick="window.location.href='<?=ROOT?>/lostandfound/report-animal';">Report a Pet</button></p><br>
                    </div>
    <?php endif; ?>
</div>


    </div>
    
    <?php include("../app/views/components/footer.php"); ?>
    
    <script src="<?= ROOT ?>/assets/js/popupform.js"></script>
</body>

</html>