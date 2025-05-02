<!DOCTYPE html>
<html lang="en">

<head>
   
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donation Requests</title>
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/donation.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/user/userprofile.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/form.css">
    <link rel="stylesheet" href="<?= ROOT ?>/assets/css/components/popup.css">
    
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        .cards-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(400px, 1fr));
            /* gap: min(20px, 5vw); */
            padding: 10px;
            margin: 10px auto;
            overflow-y: auto;
            max-height: 350px;
            justify-content: center; 
        }

        .donation-card {
            display: flex;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            border: 1px solid #ddd;
            transition: transform 0.3s ease;
            max-width: 450px;
            max-height: 270px;
            margin: 10px;
        }

        .donation-card:hover {
            transform: translateY(-5px);
        }

        .card-image {
            flex: 1;
            min-width: 150px;
            background-size: cover;
            background-position: center;
        }

        .card-content {
            flex: 2;
            padding: 10px;
        }

        .title {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 10px;
            margin-top: 7px;
        }
        .description {
            font-size: 0.9rem;
            color: #666;
            margin-bottom: 20px;
            min-height: 75px;
            max-height: 75px;
            display: -webkit-box;
            -webkit-line-clamp: 10; /* Limits text to 3 lines */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

 


        .progress-bar-container {
            background: #eee;
            border-radius: 20px;
            overflow: hidden;
            height: 7px;
            margin-bottom: 8px;
        }

        .progress-bar {
            height: 100%;
            /* background: linear-gradient(90deg, #4caf50, #8bc34a); */
            background: linear-gradient(90deg, #6a0dad, #8049fe);
            width: 50%; /* Adjust this dynamically based on progress */
            margin-bottom: 0;
            padding-bottom: 0;
        }

        .amount {
            font-size: 1rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            margin-top: 0;
            padding-top:0;
        }

        .collected {
            font-size: .8rem;
        }

        .don-but{
            margin: 0px 0 5px 10px !important;
        }

        
    </style>
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
</head>

<body class="body">
    <!-- Include the Header and Sidebar components -->
    <?php include("../app/views/components/header.php"); ?>

    <div class="main-container">
        <?php include("../app/views/components/provider/sidebar.php"); ?>

        <div class="user-accounts-section">
            <div class="header-section">
                <h2>Donation requests</h2>
                <button class="quick-action-button fixedsize" onclick="openPopup()">Ask for support</button>
            </div>
            <div class="cards-container">
        <div class="donation-card">
            <div class="card-image" style="background-image: url('<?=ROOT?>/assets/images/pets/merchant/sell21.webp');"></div>
            <div class="card-content">
                <h2 class="title">Feed the Hungry</h2>
                <p class="description">Join us in providing meals to pets in need.Join us in providing meals to pets in need.</p>
                <div class="progress-bar-container">
                    <div class="progress-bar" style="width: 13%;"></div>
                </div>
                <p class="amount">Raised: $1,200 / <span class="collected">$8,000</span></p>
                <button class="don-but" >Edit Info</a><button class="don-but" >Close Request</button>
    </div>
        </div>
    
            </div>
        </div>
    </div>
    <div id="popupForm" class="popup-container">
        <div class="form-container">
            <span class="close-btn" onclick="closePopup()">&times;</span>
            <h2>Add your pet info</h2>
            <form id="petForm" action="<?= ROOT ?>/provider/donations/req" method="POST" enctype="multipart/form-data">
                <label for="title">Title:</label>
                <input type="text" id="title" name="title" required>
                
                <label for="need">Need for Donation:</label>
                    <select id="need" name="need" required>
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
              document.getElementById('donimg').addEventListener('change', function () {
                const maxFiles = 1;
                const fileInput = this;
                
                if (fileInput.files.length > maxFiles) {
                  feedback.style.display = 'block';
                  fileInput.value = ''; // Clear the input
                } else {
                  feedback.style.display = 'none';
                }
              });

              document.getElementById('donimg').addEventListener('change', function () {
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
                        document.querySelector('form').addEventListener('submit', function (event) {
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
</body>

</html>