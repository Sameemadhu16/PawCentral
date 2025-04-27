<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shelter Dashboard-Requests to Adopt</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/shelter/requestToAdopt.css">
</head>

<body class="body">
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container container">
        <?php include("../app/views/components/shelter/sidebar.php");
        // show($data);
        ?>

        <div class="content">
            <div class="requests-container">
                <?php
                $hasRequests = false;
                foreach ($data['adoptionRequests'] as $request):
                    if ($request->status == 0 && $request->approved == 0):
                        $hasRequests = true;
                ?>
                        <div class="request-card">
                            <div class="card-content">
                                <div class="pet-image" style="background-image: url('<?= htmlspecialchars($request->postimg1) ?>'); background-size: cover; background-position: center; background-repeat: no-repeat;"></div>
                                <div class="details">
                                    <h3>Pet Name: <?= esc($request->name) ?></h3>
                                    <hr>
                                    <p><strong>Adopter Name:</strong> <?= esc($request->name) ?></p>
                                    <p><strong>Contact:</strong> <?= esc($request->contact_no) ?></p>
                                    <p><strong>Residence:</strong> <?= esc($request->residence) ?></p>
                                    <p><strong>Garden Area:</strong> <?= esc($request->garden_area) ?><span> Perches</span></p>
                                    <p><strong>Owned Pets:</strong> <?= esc($request->owned_pets) ?></p>
                                    <p><strong>Have Past Pets:</strong> <?= $request->past_pets == 1 ? "Yes" : "No" ?></p>
                                </div>
                            </div>
                            <div class="actions">
                                <form method="POST">
                                    <input type="hidden" name="pet_id" value="<?= esc($request->pet_id) ?>">
                                    <input type="hidden" name="id" value="<?= esc($request->id) ?>">
                                    <input type="hidden" name="user_id" value="<?= esc($request->adoptor_id) ?>">
                                    <input type="hidden" name="pet_name" value="<?= esc($request->name) ?>">
                                    <button class="btn btn-primary" type="submit" name="approve">Approve</button>
                                </form>

                                <form method="POST">
                                    <input type="hidden" name="id" value="<?= esc($request->id) ?>">
                                    <button class="btn btn-danger" type="submit" name="reject">Reject</button>
                                </form>
                            </div>
                        </div>
                <?php
                    endif;
                endforeach;
                ?>

                <?php if (!$hasRequests): ?>
                    <p style="text-align: center; font-size: 1.2rem; color: #555; margin-top: 20px;">
                        No adoption requests available at the moment.
                    </p>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php include("../app/views/components/footer.php"); ?>
</body>

</html>