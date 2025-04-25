<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Send Inquiry</title>
    <link rel="stylesheet" href="../../public/assets/css/inquire.css">
    <style>
        /* Style for the success popup */
        .success-popup {
            display: none;
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #720eb1;
            color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
        
        .overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }
    </style>
</head>
<body>
    <div class="inquiry-container">
        <h2>Send an Inquiry to the Shop</h2>
        <form method="POST" action="<?= ROOT ?>/services/inquire/submit?id=<?= $shop_id['id'] ?>" onsubmit="return showSuccessMessage()">
            <textarea name="message" placeholder="Type your message here..." required></textarea>
            <button type="submit">Send</button>
        </form>
    </div>
    
    <!-- Success Popup -->
    <div class="overlay" id="overlay"></div>
    <div class="success-popup" id="successPopup">
        Inquiry successfully sent!
    </div>

    <script>
        function showSuccessMessage() {
            // Show the popup and overlay
            document.getElementById('successPopup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
            
            // Hide the popup after 3 seconds
            setTimeout(function() {
                document.getElementById('successPopup').style.display = 'none';
                document.getElementById('overlay').style.display = 'none';
            },500000);
            
            // Allow the form to submit
            return true;
        }
        
        // Alternatively, if you want to show the popup only after successful submission,
        // you would need to check for a success parameter in the URL
        window.onload = function() {
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('success')) {
                showSuccessMessage();
            }
        };
    </script>
</body>
</html>