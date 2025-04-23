<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Requests</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/donation.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/events.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/popup.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <script>
        function openPopup() {
            document.getElementById("popupForm").style.display = "flex";
            document.body.style.overflow = "hidden"; // Disable scrolling
        }

        function closePopup() {
            document.getElementById("popupForm").style.display = "none";
            document.body.style.overflow = "auto"; // Enable scrolling
        }

        function toggleDiv(divId) {
            const pending = document.getElementById("PendingDiv");
            const completed = document.getElementById("CompletedDiv");
            const target = document.getElementById(divId);
            const pendingBtn = document.getElementById("PendingDivButton");
            const completedBtn = document.getElementById("CompletedDivButton");

            // Hide both first
            pending.classList.remove("active");
            completed.classList.remove("active");
            pendingBtn.classList.remove("active-btn");
            completedBtn.classList.remove("active-btn");

            // Toggle the selected one if it wasn’t already active
            if (target !== null && !target.classList.contains("active")) {
                target.classList.add("active");
            }

            if (divId == "PendingDiv") {
                pendingBtn.classList.add("active-btn");
            } else if (divId == "CompletedDiv") {
                completedBtn.classList.add("active-btn");
            }
        }

        function openPendingDiv() {
            toggleDiv("PendingDiv");
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
            overflow: hidden;
            transition: max-height .5s ease;
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
        }

        /* When active */
        .inv-container.active {
            max-height: 280px;
            /* Large enough to show the full content */
            overflow: auto;
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

            <?php if (!empty($requests)) : ?>
                <div class="header-section">
                    <h2>Donation requests</h2>
                    <button class="quick-action-button fixedsize" onclick="openPopup()">Ask for Support</button>
                </div>

                <div class="cards-container">
                    <?php foreach ($requests as $req) : ?>
                        <?php if ($req->status == 0 & $req->approved == 1) : ?>
                            <div class="donation-card">
                                <div class="card-image" style="background-image: url('<?= !empty($req->img) ? $req->img : ROOT . "/assets/images/default-placeholder.png"; ?>');"></div>
                                <div class="card-content">
                                    <h2 class="title"><?= htmlspecialchars($req->title) ?></h2>
                                    <p class="description"><?= htmlspecialchars($req->reason) ?></p>
                                    <div class="progress-bar-container">
                                        <?php
                                        $progress = ($req->collected / $req->amount) * 100;
                                        $progress = min(100, max(0, $progress - 5)); // Ensure between 0-100
                                        ?>
                                        <div class="progress-bar" style="width: <?= $progress ?>%;"></div>
                                    </div>
                                    <div class="overflow-hide">
                                        <p class="amount">Raised: <?= number_format($req->collected, 2) ?> / <span class="collected"><?= number_format($req->amount, 2) ?> Rs.</span></p>

                                    </div>
                                    <!-- <form action="<?= ROOT ?>/userprofile/donations/update?id=<?= htmlspecialchars($req->id) ?>" method="POST" style="display: inline;">
                                    <button class="don-but">Edit Info</button>
                                </form> -->
                                    <button class="don-but close-but"
                                        onclick="showPopup(
                                        <?= htmlspecialchars($req->id) ?>,
                                        '<?= ROOT ?>/userprofile/donations/closeReq?id=<?= htmlspecialchars($req->id) ?>',
                                        'Are you sure want to close this donation request ?<br><br><?= htmlspecialchars(addslashes($req->title)) ?>',
                                        ['Donations found', 'Goal reached', 'No longer needed', 'Change of mind', 'Give up', 'Prefer not to say','Mistaken Entry']
                                    )">
                                        Close Request
                                    </button>
                                    <button class="don-but " onclick="window.location.href='<?= ROOT ?>/userprofile/donations/edit?id=<?= htmlspecialchars($req->id) ?>'">
                                        Edit Request
                                    </button>

                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            <?php else : ?>
                <div style="display: flex; justify-content: center; align-items: center; height: 50vh;">
                    <p style="text-align: center; font-size: 1.2rem; color: #555;">You have made no donations requests yet.<br>
                        <button class="add-event fixedsize" onclick="openPopup()">Ask for Suppport</button>
                    </p><br>
                </div>
            <?php endif; ?>

            <br><br>

            <?php if (!empty($requests)) : ?>
                <button id="PendingDivButton" class="quick-action-button fixedsize" onclick="openPendingDiv()">Pending Approval</button>

                <button id="CompletedDivButton" class="quick-action-button fixedsize" onclick="openCompletedDiv()">Completed</button>

                <div id="PendingDiv" class="cards-container inv-container">
                    <?php
                    $hasPending = false;
                    foreach ($requests as $req) :
                        if ($req->status == 0 && $req->approved == 0) :
                            $hasPending = true;
                    ?>

                            <div class="donation-card">
                                <div class="card-image" style="background-image: url('<?= !empty($req->img) ? $req->img : ROOT . "/assets/images/default-placeholder.png"; ?>');"></div>
                                <div class="card-content">
                                    <h2 class="title"><?= htmlspecialchars($req->title) ?></h2>
                                    <p class="description"><?= htmlspecialchars($req->reason) ?></p>
                                    <div class="progress-bar-container">
                                        <?php
                                        $progress = ($req->collected / $req->amount) * 100;
                                        $progress = min(100, max(0, $progress));
                                        ?>
                                        <div class="progress-bar" style="width: <?= $progress ?>%;"></div>
                                    </div>
                                    <div class="overflow-hide">
                                        <p class="amount">Requested Amount: <?= number_format($req->amount, 2) ?> Rs.</p>
                                    </div>
                                    <button class="don-but">Edit Info</button>
                                    <button class="don-but close-but"
                                        onclick="showPopup(
                                            <?= htmlspecialchars($req->id) ?>,
                                            '<?= ROOT ?>/userprofile/donations/closeReq?id=<?= htmlspecialchars($req->id) ?>',
                                            'Are you sure want to close this donation request ?<br><br><?= htmlspecialchars(addslashes($req->title)) ?>',
                                            ['Donations found', 'No longer needed', 'Change of mind', 'Give up', 'Prefer not to say', 'Mistaken Entry']
                                        )">
                                        Abort Request
                                    </button>
                                    <button class="don-but " onclick="window.location.href='<?= ROOT ?>/userprofile/donations/edit?id=<?= htmlspecialchars($req->id) ?>'">
                                        Edit Request
                                    </button>
                                </div>
                            </div>
                        <?php
                        endif;
                    endforeach;
                    if (!$hasPending) :
                        ?>
                        <div style="text-align: center; padding: 2rem; color: #777;">
                            You have no pending requests at the moment.
                        </div>
                    <?php endif; ?>
                </div>

                <br>

                <div id="CompletedDiv" class="cards-container inv-container">
                    <?php
                    $hasCompleted = false;
                    foreach ($requests as $req) :
                        if ($req->status == 1 && $req->approved == 1) :
                            $hasCompleted = true;
                    ?>
                            <div class="donation-card">
                                <div class="card-image" style="background-image: url('<?= !empty($req->img) ? $req->img : ROOT . "/assets/images/default-placeholder.png"; ?>');"></div>
                                <div class="card-content">
                                    <h2 class="title"><?= htmlspecialchars($req->title) ?></h2>
                                    <p class="description"><?= htmlspecialchars($req->reason) ?></p>
                                    <div class="progress-bar-container">
                                        <?php
                                        $progress = ($req->collected / $req->amount) * 100;
                                        $progress = min(100, max(0, $progress));
                                        ?>
                                        <div class="progress-bar" style="width: <?= $progress ?>%;"></div>
                                    </div>
                                    <div class="overflow-hide">
                                        <p class="amount">Collected: <?= number_format($req->amount, 2) ?> / <span class="collected"><?= number_format($req->amount, 2) ?> Rs.</span> Rs.</p>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endif;
                    endforeach;
                    if (!$hasCompleted) :
                        ?>
                        <div style="text-align: center; padding: 2rem; color: #777;">
                            You have no Completed Donation requests at the moment.
                        </div>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        </div>
    </div>
    <div id="popupForm" class="popup-container">
        <div class="form-container">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <h2>Enter Donation info</h2>
            <form id="petForm" action="<?= ROOT ?>/userprofile/donations/req" method="POST" enctype="multipart/form-data">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>

                <label for="need">Need for Donation:</label>
                <select id="need_category" name="need_category" required>
                    <option value="Other">Other</option>
                    <option value="Bills">Medical Bills</option>
                    <option value="CareSupport">Care Support</option>
                    <option value="Food">Food</option>
                    <option value="Medicine">Medicine</option>
                    <option value="Supplies">Supplies</option>
                </select>
                <label for="reason">Brief intro for the Request:</label>
                <textarea id="reason" name="reason" rows="4" placeholder="Describe the reason briefly." maxlength="100"></textarea>

                <label for="info">Explain the reason for the Donation Request:</label>
                <textarea id="info" name="info" rows="7" placeholder="Describe specifics about the need,
regarding situation.
or any other information that the donators should made aware of to donate to your request."></textarea>

                <label for="donimg">Upload a Photo:</label>
                <input type="file" id="donimg" name="photos[]" accept="image/*" required>
                <div id="imagePreviewContainer"></div>
                <script>
                    document.getElementById('donimg').addEventListener('change', function() {
                        const maxFiles = 1;
                        const fileInput = this;

                        if (fileInput.files.length > maxFiles) {
                            feedback.style.display = 'block';
                            fileInput.value = ''; // Clear the input
                        } else {
                            feedback.style.display = 'none';
                        }
                    });

                    document.getElementById('donimg').addEventListener('change', function() {
                        const previewContainer = document.getElementById('imagePreviewContainer');
                        previewContainer.innerHTML = ''; // Clear existing previews

                        Array.from(this.files).forEach(file => {
                            if (file.type.startsWith('image/')) {
                                const img = document.createElement('img');
                                img.src = URL.createObjectURL(file);
                                // img.style.width = '100px';
                                // img.style.margin = '5px';
                                previewContainer.appendChild(img);
                            }
                        });
                    });
                </script>
                <label for="amount">Required Amount:</label>
                <input type="number" id="amount" name="amount" min="0" max="100000" step="any" required>

                <label for="before_date">Before when do you need the support:</label>
                <input type="date" id="before_date" name="before_date" required>

                <script>
                    document.querySelector('form').addEventListener('submit', function(event) {
                        const amount = document.getElementById('amount').value;

                        // Validate expire date of the req
                        const before_date = new Date(document.getElementById('before_date').value);
                        const today = new Date();
                        if (before_date < today) {
                            alert('request deadline date cannot be in the past.');
                            event.preventDefault(); // Prevent form submission
                        }

                        // Validate height
                        if (amount < 0 || amount > 100000) {
                            alert('Height must be between 0 and 100 000 Rs.');
                            event.preventDefault(); // Prevent form submission
                            return;
                        }

                        // If all validations pass, the form will submit
                    });
                </script>

                <!-- Bank Details -->
                <fieldset>
                    <legend>Bank Details</legend>
                    <label for="bankName">Bank Name:</label>
                    <input type="text" id="bankName" name="bankName">
                    <br>
                    <label for="accountHolder">Account Holder Name:</label>
                    <input type="text" id="accountHolder" name="accountHolder">
                    <br>
                    <label for="accountNumber">Account Number:</label>
                    <input type="text" id="accountNumber" name="accountNumber">
                    <br>
                    <label for="swiftCode">SWIFT Code / IBAN (if applicable):</label>
                    <input type="text" id="swiftCode" name="swiftCode">
                </fieldset>

                <!-- Agreement -->
                <label>
                    <input type="checkbox" id="agreeTerms" required>
                    I agree to the terms and conditions for receiving and requesting for donations.
                </label>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
    <!-- hide pop up containers -->
    <script>
        function openPopup() {
            document.getElementById("popupForm").style.display = "flex";
            document.body.style.overflow = "hidden"; // Disable scrolling
        }

        function closePopup() {
            document.getElementById("popupForm").style.display = "none";
            document.body.style.overflow = "auto"; // Enable scrolling
        }
    </script>

    <?php include("../app/views/components/footer.php"); ?>
    <script src="<?= ROOT ?>/assets/js/popupform.js"></script>

</body>

</html>