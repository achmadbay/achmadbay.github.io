<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>VapeStore</title>
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="contacts.css" />
  </head>
  <body>
    <div class="container">
      <!-- Nav bar -->
      <nav>
    <div class="left_nav">
        <img src="images/logo.png" alt="VapeStore Logo" class="logo" />
        <ul class="nav_menu" id="navMenu">
            <li><a href="#">HOME</a></li>
            <li><a href="#">POD</a></li>
            <li><a href="#">MOD</a></li>
            <li><a href="#">LIQUID</a></li>
            <li><a href="about.html">ABOUT ME</a></li>
            <li><a href="#" id="contactUsBtn">CONTACT US</a></li>
            <li><a href="view_contacts.php">VIEW CONTACTS</a></li>
            <?php if (isset($_SESSION['user_id'])): ?>
                <li><a href="logout.php">LOGOUT</a></li>
            <?php else: ?>
                <li><a href="login.php">LOGIN</a></li>
            <?php endif; ?>
        </ul>

            <!-- Tombol View Contacts -->
          </ul>
        </div>
        <div class="right_nav">
          <div class="cart_icon">
            <i class="bx bx-cart"></i>
          </div>
          <div class="dark_mode_toggle" id="darkModeToggle">
            <i class="bx bx-sun"></i>
          </div>
          <div class="hamburger" id="hamburger" aria-label="Toggle menu">
            <i class="bx bx-menu"></i>
          </div>
        </div>
      </nav>

    <!-- Form Pencarian -->
    <form method="GET" action="search.php" class="search_form">
    <input type="text" name="query" placeholder="Cari produk..." required />
    </form>

      <!-- Main Section -->
      <div class="main_section">
        <div class="main_left">
          <h1>OXVA XLIM SQ PRO POD KIT - NIKA WHITE</h1>
          <p class="deskripsi">OXVA XLIM SQ PRO TREASURE HUNT SERIES POD KIT</p>
          <button class="add_to_cart">Add To Cart</button>
          <span class="price">Rp330.000</span>
        </div>
        <div class="main_right">
          <img
            src="images/1.png"
            alt="OXVA XLIM SQ PRO POD KIT - NIKA WHITE"
            class="featured_img"
          />
        </div>
      </div>

      
      <!-- Cart Section -->
      <div class="product_carts">
        <div class="cart">
          <img
            src="images/2.png"
            alt="LOSTVAPE Thelema Elite 40 SAKURA Lavender"
          />
          <div class="product_info">
            <h3>LOSTVAPE Thelema Elite 40 SAKURA Lavender</h3>
            <span class="price">Rp290.000</span>
            <div class="add_to_cart">
              <i class="bx bx-cart"></i>
            </div>
          </div>
        </div>
        <div class="cart">
          <img
            src="images/3.png"
            alt="AMERICAN FRUITY Banana Smothies Pods Friendly"
          />
          <div class="product_info">
            <h3>AMERICAN FRUITY Banana Smothies Pods Friendly</h3>
            <span class="price">Rp100.000</span>
            <div class="add_to_cart">
              <i class="bx bx-cart"></i>
            </div>
          </div>
        </div>
      </div>

      <div id="agePop" class="pop">
        <div class="pop-box">
          <p>Apakah Anda berusia lebih dari 18 tahun?</p>
          <button id="yesBtn">Yes</button>
          <button id="noBtn">No</button>
        </div>
      </div>

      <!-- Modal untuk Contact Us -->
      <div id="contactModal" class="pop">
        <div class="pop-box">
          <h2>Contact Us</h2>
          <form
            id="contactForm"
            method="POST"
            action="contact_us.php"
            enctype="multipart/form-data"
          >
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required />
            <br />
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required />
            <br />
            <label for="phone">Phone Number:</label>
            <input
              type="text"
              id="phone"
              name="phone"
              pattern="[0-9]*"
              inputmode="numeric"
              required
            />
            <br />
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" required></textarea>
            <br />
            <label for="file">Upload File:</label>
            <input
              type="file"
              id="file"
              name="file"
              accept=".jpg,.jpeg,.png,.pdf"
              required
            />
            <br />
            <button type="submit">Submit</button>
            <button type="button" id="closeModal">Close</button>
          </form>
        </div>
      </div>

      <!-- Footer -->
      <footer>
        <div class="footer_info">
          <p>© 2024 Byhaqi. All Rights Reserved.</p>
        </div>
      </footer>
    </div>
    <script src="script.js"></script>
  </body>
</html>


