<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Product Details</title>
  <link rel="stylesheet" href="<?=ROOT?>/assets/css/postForm.css">
</head>
<body>
  <div class="container">
    <h2>Edit Product Details</h2>
    <form id="productForm" action="<?=ROOT?>/editPostForm/update" method="POST">
      <div class="form-group">
        <label for="product_name">Product Name:</label>
        <input type="hidden" name="id" value="<?=htmlspecialchars($post->product_id)?>">
        <input type="text" id="product_name" name="product_name" value="<?=htmlspecialchars($post->product_name)?>" required>
      </div>

      <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" rows="4" name="description" required><?=htmlspecialchars($post->description)?></textarea>
      </div>

      <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required value="<?=htmlspecialchars($post->price)?>" >
      </div>

      <div class="form-group">
        <label for="stock_quantity">Stock Quantity:</label>
        <input type="number" id="stock_quantity" name="stock_quantity" required value="<?=htmlspecialchars($post->stock_quantity)?>">
      </div>

      <button type="submit" class="submit-btn">Submit Product</button>
    </form>
  </div>

  <script>
    document.getElementById('productForm').addEventListener('submit', function(e) {
      e.preventDefault(); // Prevent immediate submission
      
      // Get form values
      const productName = document.getElementById('product_name').value;
      const description = document.getElementById('description').value;
      const price = document.getElementById('price').value;
      const stock = document.getElementById('stock_quantity').value;
      
      
      // Create confirmation message
      let message = `Are you sure about these details?\n\n`;
      message += `Product Name: ${productName}\n`;
      message += `Description: ${description.substring(0, 50)}${description.length > 50 ? '...' : ''}\n`;
      message += `Price: $${parseFloat(price).toFixed(2)}\n`;
      message += `Stock Quantity: ${stock}\n`;
      
      
      
      // Show confirmation dialog
      if (confirm(message)) {
        // If user confirms, submit the form
        this.submit();
      }
      // If user cancels, do nothing (form won't submit)
    });
  </script>
</body>
</html>