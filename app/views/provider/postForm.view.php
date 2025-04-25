<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Product</title>
  <link rel="stylesheet" href="<?=ROOT?>/assets/css/postForm.css">
</head>
<body>
  <div class="container">
    <h2>Add New Product</h2>
    <form id="productForm" action="<?=ROOT?>/postForm/submit" method="POST" enctype="multipart/form-data">
      <div class="form-group">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required>
      </div>

      <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>
      </div>

      <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" required>
      </div>

      <div class="form-group">
        <label for="stock_quantity">Stock Quantity:</label>
        <input type="number" id="stock_quantity" name="stock_quantity" required>
      </div>

      <div class="form-group">
        <label for="img">Product Image:</label>
        <input type="file" id="img" name="img" accept="image/*" required>
      </div>

      <button type="submit" class="submit-btn">Submit Product</button>
    </form>
  </div>
  <script>
  document.getElementById('productForm').addEventListener('submit', function (e) {
    let errors = [];

    const productName = document.getElementById('product_name').value.trim();
    const description = document.getElementById('description').value.trim();
    const price = document.getElementById('price').value.trim();
    const stock = document.getElementById('stock_quantity').value.trim();
    const image = document.getElementById('img').files[0];

    // Product name validation
    if (productName === '' || productName.length > 100) {
      errors.push('Product name is required and must be less than 100 characters.');
    }

    // Description validation
    if (description === '' || description.length > 500) {
      errors.push('Description is required and must be less than 500 characters.');
    }

    // Price validation
    if (price === '' || isNaN(price) || parseFloat(price) <= 0) {
      errors.push('Price must be a positive number.');
    }

    // Stock quantity validation
    if (stock === '' || !Number.isInteger(Number(stock)) || Number(stock) < 0) {
      errors.push('Stock quantity must be a positive integer.');
    }

    // Image validation
    if (!image) {
      errors.push('Product image is required.');
    } else {
      const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
      if (!allowedTypes.includes(image.type)) {
        errors.push('Only JPG, PNG, and GIF files are allowed.');
      }
      if (image.size > 5 * 1024 * 1024) {
        errors.push('Image size must be less than 5MB.');
      }
    }

    if (errors.length > 0) {
      e.preventDefault(); // Prevent form from submitting
      alert(errors.join('\n')); // Show all errors in alert
    }
  });
</script>
</body>
</html>
