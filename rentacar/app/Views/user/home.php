<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>RentACar | Explore Cars</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Poppins', sans-serif;
      background-color: #000;
      color: #fff;
    }

    .navbar {
      background-color: rgba(0, 0, 0, 0.9);
    }

    .hero {
      position: relative;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      overflow: hidden;
    }

    .hero::before {
      content: "";
      position: absolute;
      inset: 0;
      background: url('https://images.unsplash.com/photo-1503376780353-7e6692767b70') center/cover no-repeat;
      filter: brightness(40%);
      z-index: -1;
    }

    .hero h1 {
      font-size: 3.5rem;
      font-weight: 700;
    }

    .car-section {
      padding: 80px 0;
    }

    .car-card {
      background-color: #111;
      border-radius: 20px;
      overflow: hidden;
      transition: 0.3s;
    }

    .car-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 10px 25px rgba(255,255,255,0.1);
    }

    .car-card img {
      width: 100%;
      height: 230px;
      object-fit: cover;
    }

    .car-info {
      padding: 20px;
    }

    .btn-rent {
      background-color: #fff;
      color: #000;
      font-weight: bold;
      width: 100%;
      transition: 0.3s;
    }

    .btn-rent:hover {
      background-color: #ff0000;
      color: #fff;
    }

    footer {
      background-color: #111;
      text-align: center;
      padding: 20px;
      color: #aaa;
    }
  </style>
</head>

<body>

<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
  <div class="container">
    <a class="navbar-brand fw-bold" href="/">RentACar</a>

    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        <?php if(session()->get('logged_in')): ?>
          <li class="nav-item">
            <span class="nav-link">Hi, <?= session()->get('name') ?></span>
          </li>
          <li class="nav-item">
            <a href="/logout" class="nav-link text-danger">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a href="/login" class="nav-link">Login</a>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<!-- HERO -->
<section class="hero d-flex align-items-center justify-content-center">
  <div>
    <h1>Explore Most Popular Cars</h1>
    <p>Find and rent your dream car easily.</p>
  </div>
</section>

<!-- CARS -->
<section class="car-section">
  <div class="container">
    <h2 class="fw-bold text-center mb-5">Available Cars</h2>

    <div class="row g-4">

      <?php foreach ($cars as $car): ?>
      <div class="col-md-4">

        <div class="car-card">

          <?php if($car['image']): ?>
            <img src="<?= base_url('uploads/'.$car['image']) ?>">
          <?php else: ?>
            <img src="https://via.placeholder.com/400x230">
          <?php endif; ?>

          <div class="car-info">
            <h5><?= esc($car['brand']) ?> <?= esc($car['model']) ?></h5>

            <p>
              <?= esc($car['category_name'] ?? 'Category') ?> • 
              <?= esc($car['year']) ?>
            </p>

            <p>
              <strong>
                Rp <?= number_format($car['price_per_day'],0,',','.') ?> / day
              </strong>
            </p>

            <a href="<?= site_url('cars/'.$car['id']) ?>" class="btn btn-rent">
              Rent Now
            </a>
          </div>

        </div>

      </div>
      <?php endforeach; ?>

    </div>
  </div>
</section>

<footer>
  © <?= date('Y') ?> RentACar
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>