<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/index.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/donation_req.css">
</head>
<body>
    
    <?php include("../app/views/components/header.php"); ?>

    <h1 class="heading">Donation Requests</h1>
    <div class="cards-container">
    <?php if (!empty($requests)) : ?>
        <?php foreach ($requests as $request) : ?>
            <?php 
                // Calculate progress percentage
                $amount = (float) $request->amount;
                $collected = (float) $request->collected;
                $progress = $amount > 0 ? min(100, ($collected / $amount) * 100) : 0;
                $imagePath = htmlspecialchars($request->img);
            ?>
            <div class="donation-card">
                <div class="card-image" style="background-image: url('<?= $imagePath ?>');"></div>
                <div class="card-content">
                    <h2 class="title"><?= htmlspecialchars($request->title) ?></h2>
                    <p class="description"><?= htmlspecialchars($request->reason) ?></p>
                    <div class="progress-bar-container">
                        <div class="progress-bar" style="width: <?= $progress ?>%;"></div>
                    </div>
                    <div class="overflow-hide">
                        <p class="amount">
                            <span class="collected">Raised: $<?= number_format($collected, 2) ?> / </span>
                            $<?= number_format($amount, 2) ?>
                        </p>
                    </div>
                    <a href="<?= ROOT ?>/donationsnsupport/req?id=<?= $request->id ?>" class="donate-button">Donate Now</a>
                </div>
            </div>
        <?php endforeach; ?>
    <?php else : ?>
        <p>No donation requests found.</p>
    <?php endif; ?>
</div>
  

    <?php include("../app/views/components/footer.php"); ?>
</body>
</html>
