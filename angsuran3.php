<?php
// 20.6 Mencegah akses langsung ke halaman proses
// Halaman ini hanya berjalan jika tombol "hitung" ditekan dari form
if (isset($_POST["hitung"])) {

  // Ambil data form. Radio button tenor tidak akan terkirim jika tidak dipilih,
  // jadi dicek dulu dengan isset()
  $nama       = isset($_POST["nama"])       ? trim($_POST["nama"])       : "";
  $hargamobil = isset($_POST["hargamobil"]) ? trim($_POST["hargamobil"]) : "";
  $dp         = isset($_POST["dp"])         ? trim($_POST["dp"])         : "";
  $tenor      = isset($_POST["tenor"])      ? trim($_POST["tenor"])      : "";

  // 20.7 Function empty() + 20.8 Pesan kesalahan form
  $errors = [];

  if (empty($nama)) {
    $errors[] = "Nama harus diisi";
  }

  if (empty($hargamobil)) {
    $errors[] = "Harga mobil harus diisi";
  }

  if (empty($dp)) {
    $errors[] = "DP harus dipilih";
  }

  if (empty($tenor)) {
    $errors[] = "Tenor harus dipilih";
  }

  // 20.9 Jika ada error, kembali ke form (index) membawa pesan error
  // dan data lama agar form terisi kembali
  if (!empty($errors)) {
    $data = [
      "nama"       => $nama,
      "hargamobil" => $hargamobil,
      "dp"         => $dp,
      "tenor"      => $tenor,
      "error"      => $errors
    ];
    header("Location: angsuran2.php?" . http_build_query($data));
    die();
  }

  // ---------- Jika lolos validasi, lanjut hitung ----------

  // mencari dp harga mobil
$hargadpmobil = ($dp / 100) * $hargamobil;

  // mencari lama angsuran
  $lamaangsuran = 0;
  if ($tenor == 1) {
    $lamaangsuran = $tenor * 12;
  } elseif ($tenor == 2) {
    $lamaangsuran = $tenor * 12;
  } elseif ($tenor == 3) {
    $lamaangsuran = $tenor * 12;
  } elseif ($tenor == 4) {
    $lamaangsuran = $tenor * 12;
  } elseif ($tenor == 5) {
    $lamaangsuran = $tenor * 12;
  }

  // bunga
  $bunga = (20 / 100) * $hargamobil;

  // mencari angsuran per bulan
  $angsuran = (($hargamobil + $bunga) - $dp);
  $total = $angsuran / $lamaangsuran;

  echo "<pre>";
  echo '<div class="p-4  rounded border border-secondary mb-4">';
  echo "Nama               =" . htmlspecialchars($nama) . "<br>";
  echo "Harga Mobil        =" . $hargamobil . "<br>";
  echo "DP                 =" . $dp . " % <br>";
  echo "Tenor              =" . $tenor . " tahun<br>";
  echo "Bunga              =" . $bunga . " rupiah<br>";
  echo "Lama Angsuran      =" . $lamaangsuran . " bulan<br>";
  echo "DP Mobil           =" . $hargadpmobil . " rupiah<br>";
  echo "<b>Jumlah Angsuran =" . ceil($angsuran) . " rupiah/bulan</b><br>";
  echo "</div>";
  echo "</pre>";

} else {
  // 20.6 Akses langsung lewat URL ditolak
  echo "Halaman ini hanya bisa diakses dari form!";
}
?>
