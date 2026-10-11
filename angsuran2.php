


<?php
// 20.8 Menampilkan pesan kesalahan form
// 20.9 Mengisi kembali form (form re-populate)
// Data dikirim balik dari angsuran3.php lewat URL (method GET)

// Pesan kesalahan (berupa array)
$errors = [];
if (isset($_GET["error"]) && is_array($_GET["error"])) {
  $errors = $_GET["error"];
}

// Nilai lama form. Jika belum ada, diisi nilai default
$nama       = isset($_GET["nama"])       ? $_GET["nama"]       : "";
$hargamobil = isset($_GET["hargamobil"]) ? $_GET["hargamobil"] : "";
$dp         = isset($_GET["dp"])         ? $_GET["dp"]         : "";
$tenor      = isset($_GET["tenor"])      ? $_GET["tenor"]      : "";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>

<body>
  <header class="bg-dark text-white p-3 border rounded-top">
    <div class="row align-items-center w-100 m-0">

      <div class="col-3 p-0">
        <img src="img/Modern_abstract_letter_v_logo___Premium_Vector-removebg-preview.png"
          style="height: 50px; width: auto;"
          class="d-block">
      </div>

      <div class="col-9  text-center text-md-start">
        <h2 class="m-0 fs-3 fw-bold text-uppercase tracking-wider">Velox styer</h2>
      </div>

    </div>
  </header>


  <nav class="navbar navbar-expand-lg bg-dark navbar-dark border-start border-end border-bottom">
    <div class="container-fluid">
      <button class="navbar-toggler mx-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav gap-4">
          <li class="nav-item"><a class="nav-link active" href="#">beranda</a></li>
          <li class="nav-item"><a class="nav-link" href="#tentang">tentang perusahaan</a></li>
          <li class="nav-item"><a class="nav-link" href="#kontak">kontak</a></li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container my-4">


    <div class="col-md-9 mx-auto">
      <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="img/1.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/Otomotiv Dünyasını Yakından İlgilendiren Açıklama !Sıfır araçlarda 6 ay 6 bin kilometre Km Sınırl___.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="img/3.jpg" class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#heroSlider" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#heroSlider" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>

    </div>

    <!-- tntanh -->
    <div class="row g-4">

      <div class="col-md-6" id="tentang">
        <div class="p-4 border h-100">
          <h3>Tentang Perusahaan</h3>
          <p>Velox styer adalah sebuah perusahaan yang bergerak di bidang angsuran mobil yang tidak hanya di indonesia saja tetapi bergerak di seluruh dunia</p>
        </div>
      </div>

      <div>
        <div class="flex item-center justify-center">
          <img src="img/Slow Down in Automobile Sector.jpg" class="w-50" alt="">
        </div>
      </div>
    </div>

    <!-- form -->

    <div class="card p-4 border-secondary">
      <hr>

      <!-- 20.8 Menampilkan pesan kesalahan form -->
      <?php if (!empty($errors)) { ?>
        <div class="alert alert-danger">
          <ul class="mb-0">
            <?php foreach ($errors as $pesan) { ?>
              <li><?= htmlspecialchars($pesan) ?></li>
            <?php } ?>
          </ul>
        </div>
      <?php } ?>

      <form action="angsuran3.php" method="post">
        <label for="">Masukan Nama Anda</label><br>
        <input type="text" name="nama" value="<?= htmlspecialchars($nama) ?>"> <br>

        <label for="">Harga Mobil </label><br>
        <input type="number" name="hargamobil" value="<?= htmlspecialchars($hargamobil) ?>"> <br><br>

        <label for="">DP</label>
        <select name="dp" id="">
          <option value="">-- Pilih DP --</option>
          <?php
          // 20.9 Mengisi kembali pilihan DP
          for ($i = 10; $i <= 60; $i += 10) {
            $selected = ($dp == $i) ? "selected" : "";
            echo "<option value=\"$i\" $selected>$i</option>";
          }
          ?>
        </select> %<br>

        <!-- tenor  -->
        <p>tenor</p>
        <input type="radio" name="tenor" value="1" <?= ($tenor == 1) ? "checked" : "" ?>>
        <label>1 tahun</label>
        <input type="radio" name="tenor" value="2" <?= ($tenor == 2) ? "checked" : "" ?>>
        <label>2 tahun</label>
        <input type="radio" name="tenor" value="3" <?= ($tenor == 3) ? "checked" : "" ?>>
        <label>3 tahun</label><br>
        <input type="radio" name="tenor" value="4" <?= ($tenor == 4) ? "checked" : "" ?>>
        <label>4 tahun</label>
        <input type="radio" name="tenor" value="5" <?= ($tenor == 5) ? "checked" : "" ?>>
        <label>5 tahun</label><br>

        <div class="d-flex justify-content-center">
          <input type="submit" name="hitung" value="hitung total" class="bg-dark text-white">
        </div>
      </form>

      <hr>


    </div>

    
    <footer class="bg-dark text-white pt-4 pb-3">
      <div class="container" id="kontak">
        <div class="row">

          <div class="col-md-5 mb-3">
            <h5>Velox Styer</h5>
            <p class="text-muted small">Simulasi &amp; pengajuan kredit mobil online cepat dan aman.</p>
          </div>

          <div class="col-md-3 mb-3">
            <h6>Menu</h6>
            <ul class="list-unstyled small">
              <li><a href="#" class="text-white-50">Simulasi Kredit</a></li>
              <li><a href="#" class="text-white-50">Pengajuan</a></li>
              <li><a href="#" class="text-white-50">Syarat &amp; Ketentuan</a></li>
            </ul>
          </div>

          <div class="col-md-4 mb-3">
            <h6>Kontak</h6>
            <p class="text-white-50 small mb-1">WA: 0812-3456-7890</p>
            <p class="text-white-50 small">Email: support@veloxsteer.com</p>
          </div>

        </div>

        <hr class="border-secondary my-2">

        <div class="d-flex justify-content-between text-muted">
          <span>&copy; <?= date('Y'); ?> Velox Steer</span>
          <span>Diawasi oleh OJK</span>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>