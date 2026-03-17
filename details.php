<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Minzo Website</title>
  <!-- Bootstrap CSS link -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css"
    integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <!-- Font Awesome link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- CSS file -->
  <link rel="stylesheet" href="style.css">
</head>

<body>
  <!-- Navbar -->
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-info">
      <img src="./images/logo.jpg" alt="Logo" class="logo">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="product.html">Products <span class="sr-only">(current)</span> </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="aboutus.html">About us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fa-solid fa-cart-shopping"></i><sup>1</sup></a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa-regular fa-user"></i></a>
            </li>
          </ul>
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>

  </header>
  <br>
  <br>




  <!-- Details Section -->
  <main>
    <div class="container mt-5">

      <div class="row">
        <div class="col-md-4">
          <img id="dressImage" class="img-fluid w-100" src="" alt="Dress Image">
        </div>
        <div class="col-md-6 col-lg-6 col-12">
          <h6 id="dressNameText">HUF & DEE Women's V Neck Casual Dress</h6>
          <p><strong id="dressPrice">LKR 4,450</strong></p>

          <select class="my-3 form-select">
            <option>Select Size</option>
            <option>XXL</option>
            <option>XL</option>
            <option>L</option>
            <option>M</option>
            <option>S</option>
          </select>

          <p><strong>Availability:</strong> In stock</p>

          <div class="d-flex align-items-center my-3">
            <input type="number" value="1" min="1" class="form-control text-center mx-2" style="width: 60px;">
          </div>

          <div class="d-flex gap-6">
            <button class="btn btn-primary" onclick="addToCart()">Add To Cart</button>

            <script>
              function addToCart() {
                const dressId = new URLSearchParams(window.location.search).get('dressId');
                const dressName = document.getElementById('dressNameText').textContent;
                const dressPrice = document.getElementById('dressPrice').textContent;
                const dressImage = document.getElementById('dressImage').src;

                // Retrieve existing cart from localStorage, or create a new array if not present
                let cart = JSON.parse(localStorage.getItem('cart')) || [];

                // Add the current item to the cart array
                cart.push({ id: dressId, name: dressName, price: dressPrice, image: dressImage });

                // Save updated cart back to localStorage
                localStorage.setItem('cart', JSON.stringify(cart));

                alert('Item added to cart!');

                // Redirect to cart page
                window.location.href = 'carts.php';
              }
            </script>



          </div>





          <!-- Collapsible Sections for Additional Information -->
          <div class="mt-4">
            <!-- Product Information -->
            <a class="d-flex align-items-center text-primary" data-bs-toggle="collapse" href="#productInfo"
              role="button" aria-expanded="false" aria-controls="productInfo">
              Product Information <i class="bi bi-chevron-down ms-1"></i>
            </a>
            <div class="collapse mt-2" id="productInfo">
              <p>Light, breezy, and perfect for warm weather. Characterized by their loose fit, they are often made from
                light fabrics like cotton and feature bright colors or floral patterns.</p>
            </div>

            <!-- Size Guide -->
            <a class="d-flex align-items-center text-primary mt-3" data-bs-toggle="collapse" href="#sizeGuide"
              role="button" aria-expanded="false" aria-controls="sizeGuide">
              Size Guide <i class="bi bi-chevron-down ms-1"></i>
            </a>
            <div class="collapse mt-2" id="sizeGuide">
              <!-- Size Table Image -->
              <img src="./images/guide.jpg" alt="Size Table" class="img-fluid mt-2">
            </div>

            <!-- Delivery Information -->
            <a class="d-flex align-items-center text-primary mt-3" data-bs-toggle="collapse" href="#deliveryInfo"
              role="button" aria-expanded="false" aria-controls="deliveryInfo">
              Delivery Information <i class="bi bi-chevron-down ms-1"></i>
            </a>
            <div class="collapse mt-2" id="deliveryInfo">
              <p>Orders will be shipped within 1 to 3 business days from the date of order</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>



  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="footer-links">
        <a href="index.html">Home</a>
        <a href="product.html">Shop</a>
        <a href="aboutus.html">About Us</a>
      </div>
      <p>Follow Us:</p>
      <div class="social-links">
        <a href="#"><i class="fa-brands fa-whatsapp"></i></a>
        <a href="#"><i class="fa-brands fa-instagram"></i></a>
        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
      </div>
      <p>© 2024 Minzo. All Rights Reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS links -->
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
    integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"></script>
</body>

</html>


<!-- Bootstrap JS link -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- JavaScript for fetching dress details -->
<script>
  const params = new URLSearchParams(window.location.search);
  const dressId = params.get('dressId');

  // Example data for dresses; ideally this would come from a server or database
  if (dressId === 'Dress1') {
    document.getElementById('dressNameText').textContent = 'HUF & DEE Women\'s V Neck Casual Dress';
    document.getElementById('dressPrice').textContent = 'LKR 4,450';
    document.getElementById('dressImage').src = './images/Dress1.png';
  } else if (dressId === 'Dress2') {
    document.getElementById('dressNameText').textContent = 'HUF & DEE Women\'s V Neck Casual Dress';
    document.getElementById('dressPrice').textContent = 'LKR 4,990';
    document.getElementById('dressImage').src = './images/Dress2.png';
  } else if (dressId === 'Dress3') {
    document.getElementById('dressNameText').textContent = 'HUF & DEE Women\'s V Neck Casual Dress';
    document.getElementById('dressPrice').textContent = 'LKR 3,200';
    document.getElementById('dressImage').src = './images/Dress3.png';
  } else if (dressId === 'Dress4') {
    document.getElementById('dressNameText').textContent = 'HUF & DEE Women\'s V Neck Casual Dress';
    document.getElementById('dressPrice').textContent = 'LKR 4,470';
    document.getElementById('dressImage').src = './images/Dress04.png';
  } else if (dressId === 'Dress5') {
    document.getElementById('dressNameText').textContent = 'Minzo Women casual dress';
    document.getElementById('dressPrice').textContent = 'LKR 4,000';
    document.getElementById('dressImage').src = './images/Dress05.png';
  } else if (dressId === 'Dress6') {
    document.getElementById('dressNameText').textContent = 'Minzo Women casual dress';
    document.getElementById('dressPrice').textContent = 'LKR 4,500';
    document.getElementById('dressImage').src = './images/Dress06.png';
  } else if (dressId === 'Dress7') {
    document.getElementById('dressNameText').textContent = 'Minzo Women casual dress';
    document.getElementById('dressPrice').textContent = 'LKR 2,990';
    document.getElementById('dressImage').src = './images/Dress07.png';
  } else if (dressId === 'Dress8') {
    document.getElementById('dressNameText').textContent = 'HUF & DEE Womens Casual Dress';
    document.getElementById('dressPrice').textContent = 'LKR 4,470';
    document.getElementById('dressImage').src = './images/Dress08.png';
  } else if (dressId === 'Dress9') {
    document.getElementById('dressNameText').textContent = 'HUF & DEE Womens Casual Dress';
    document.getElementById('dressPrice').textContent = 'LKR 2,290';
    document.getElementById('dressImage').src = './images/Dress09.png';
  } else if (dressId === 'Dress10') {
    document.getElementById('dressNameText').textContent = 'HUF & DEE Womens Printed Casual Dress';
    document.getElementById('dressPrice').textContent = 'LKR 4,100';
    document.getElementById('dressImage').src = './images/Dress 10.png';
  } else if (dressId === 'Dress11') {
    document.getElementById('dressNameText').textContent = 'HUF & DEE Womens Printed Casual Dress';
    document.getElementById('dressPrice').textContent = 'LKR 3,490';
    document.getElementById('dressImage').src = './images/Dress 11.png';
  }
</script>
</body>

</html>