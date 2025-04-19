<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Donation Successful</title>
  
  <!-- Global and page-specific styles -->
  <link rel="stylesheet" href="<?=ROOT?>/assets/css/event-info.css">
  <link rel="stylesheet" href="<?=ROOT?>/assets/css/index.css">
  <link rel="stylesheet" href="<?=ROOT?>/assets/css/main/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
      margin: 0;
      background-color: #f9f7fc;
      color: #4b2c6b;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .content-wrapper {
      flex: 1;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 40px 20px;
      min-height: 65vh;
    }

    .confirmation-container {
      background: white;
      border-radius: 20px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
      padding: 40px;
      text-align: center;
      max-width: 450px;
      width: 100%;
    }

    .confirmation-container h1 {
      font-size: 2.2rem;
      color: var(--button-normal-hover);
      margin-bottom: 20px;
    }

    .confirmation-container p {
      font-size: 1.1rem;
      margin-bottom: 25px;
      /* font-weight: 600; */
      color: #333;
    }

    .paw-icon {
      font-size: 70px;
      color: red !important;
      margin-bottom: 20px;
    }

    .back-home {
      display: inline-block;
      padding: 10px 20px;
      background-color: var(--button-normal);
      color: white;
      border-radius: 10px;
      text-decoration: none;
      transition: background-color 0.3s ease;
    }

    .back-home:hover {
      background-color: var(--button-normal-hover);
    }
  </style>
</head>
<body>

  <!-- HEADER -->
  <?php include("../app/views/components/header.php"); ?>

  <!-- MAIN CONTENT -->
  <div class="content-wrapper">
    <div class="confirmation-container">
      <div class="paw-icon">🐾</div>
      <h1>Thank You for Your Donation!</h1>
      <p>Your support helps us care for more pets and give them the love they deserve.</p>
      <a href="<?=ROOT?>/donationsnsupport" class="back-home">Go Back</a>
    </div>
  </div>

  <!-- FOOTER -->
  <?php include("../app/views/components/footer.php"); ?>
</body>
</html>
