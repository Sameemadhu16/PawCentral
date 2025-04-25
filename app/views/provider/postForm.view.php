<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="<?=ROOT?>/assets/css/postForm.css">
  <title>Add Product</title>
</head>
<body>
  <div class="container">
    <h2>Add New Product</h2>
    <form id="productForm" action="<?=ROOT?>/postForm/submit" method="POST" enctype="multipart/form-data">
      
      <div class="form-group">
        <label for="product_name">Product Name:</label>
        <input type="text" id="product_name" name="product_name" required />
        <span class="error" id="error_product_name"></span>
      </div>

      <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" rows="4" required></textarea>
        <span class="error" id="error_description"></span>
      </div>

      <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" id="price" name="price" step="0.01" min="1" max="100000" required />
        <span class="error" id="error_price"></span>
      </div>

      <div class="form-group">
        <label for="stock_quantity">Stock Quantity:</label>
        <input type="number" id="stock_quantity" name="stock_quantity" min="1" max="10000" required />
        <span class="error" id="error_stock"></span>
      </div>

      <div class="form-group">
        <label for="img">Product Image:</label>
        <input type="file" id="img" name="img" accept="image/*" required />
        <span class="error" id="error_img"></span>
      </div>

      <button type="submit" class="submit-btn">Submit Product</button>
    </form>
  </div>

  <script>
    const productName = document.getElementById('product_name');
    const description = document.getElementById('description');
    const price = document.getElementById('price');
    const stock = document.getElementById('stock_quantity');
    const image = document.getElementById('img');

    const showError = (id, message) => {
      document.getElementById(id).innerText = message;
    };

    const clearError = (id) => {
      document.getElementById(id).innerText = '';
    };

    productName.addEventListener('input', () => {
      const value = productName.value.trim();
      if (value === '' || value.length > 100) {
        showError('error_product_name', 'Product name must be under 100 characters.');
      } else {
        clearError('error_product_name');
      }
    });

    description.addEventListener('input', () => {
      const value = description.value.trim();
      if (value === '' || value.length > 500) {
        showError('error_description', 'Description must be under 500 characters.');
      } else {
        clearError('error_description');
      }
    });

    price.addEventListener('input', () => {
      const value = price.value.trim();
      if (value === '' || isNaN(value) || parseFloat(value) <= 0) {
        showError('error_price', 'Price must be a positive number.');
      } else if (parseFloat(value) < price.min || parseFloat(value) > price.max) {
        showError('error_price', `Price must be between ${price.min} and ${price.max}.`);
      } else {
        clearError('error_price');
      }
    });

    stock.addEventListener('input', () => {
      const value = stock.value.trim();
      if (value === '' || !Number.isInteger(Number(value)) || Number(value) < 0) {
        showError('error_stock', 'Stock must be a positive whole number.');
      } else if (Number(value) < stock.min || Number(value) > stock.max) {
        showError('error_stock', `Stock must be between ${stock.min} and ${stock.max}.`);
      } else {
        clearError('error_stock');
      }
    });

    image.addEventListener('change', () => {
      const file = image.files[0];
      const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
      if (!file) {
        showError('error_img', 'Product image is required.');
      } else if (!allowedTypes.includes(file.type)) {
        showError('error_img', 'Only JPG, PNG, and GIF files are allowed.');
      } else if (file.size > 5 * 1024 * 1024) {
        showError('error_img', 'Image must be under 5MB.');
      } else {
        clearError('error_img');
      }
    });

    document.getElementById('productForm').addEventListener('submit', function (e) {
      let errors = [];

      productName.dispatchEvent(new Event('input'));
      description.dispatchEvent(new Event('input'));
      price.dispatchEvent(new Event('input'));
      stock.dispatchEvent(new Event('input'));
      image.dispatchEvent(new Event('change'));

      const errorSpans = document.querySelectorAll('.error');
      errorSpans.forEach(span => {
        if (span.innerText !== '') errors.push(span.innerText);
      });

      if (errors.length > 0) {
        e.preventDefault();
        alert('Please fix the errors before submitting.');
      }
    });
  </script>
</body>
</html>
