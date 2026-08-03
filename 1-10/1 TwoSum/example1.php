<!-- Mencari Dua Harga Barang yang Sesuai dengan Budget (Two Sum) -->

<?php

function cariBarang($daftarHarga, $budget)
{
  // Menyimpan harga yang sudah diperiksa beserta indeksnya
  $hargaTersimpan = [];

  // Periksa setiap harga dalam daftar
  foreach ($daftarHarga as $index => $harga) {

    // Hitung harga pasangan yang dibutuhkan
    $hargaPasangan = $budget - $harga;

    // Jika harga pasangan sudah pernah ditemukan
    if (isset($hargaTersimpan[$hargaPasangan])) {

      // Kembalikan indeks kedua barang
      return [
        "status" => true,
        "index1" => $hargaTersimpan[$hargaPasangan],
        "index2" => $index,
        "harga1" => $hargaPasangan,
        "harga2" => $harga,
        "total" => $hargaPasangan + $harga
      ];
    }

    // Simpan harga sekarang beserta indeksnya
    $hargaTersimpan[$harga] = $index;
  }

  // Jika tidak ada pasangan yang sesuai
  return [];
}

// ===============================
// Fungsi Menampilkan Hasil
// ===============================
function tampilkanHasil($daftarHarga, $budget)
{
  echo "=====================================\n";
  echo "      PENCARIAN PASANGAN BARANG\n";
  echo "=====================================\n\n";

  echo "Daftar Harga Barang\n";

  foreach ($daftarHarga as $index => $harga) {
    echo "Index $index : Rp " . number_format($harga, 0, ',', '.') . "\n";
  }

  echo "\nBudget : Rp " . number_format($budget, 0, ',', '.') . "\n\n";

  $hasil = cariBarang($daftarHarga, $budget);

  if ($hasil["status"]) {

    echo "HASIL\n";
    echo "-------------------------------------\n";
    echo "Barang Pertama\n";
    echo "- Index : {$hasil['index1']}\n";
    echo "- Harga : Rp " . number_format($hasil['harga1'], 0, ',', '.') . "\n\n";

    echo "Barang Kedua\n";
    echo "- Index : {$hasil['index2']}\n";
    echo "- Harga : Rp " . number_format($hasil['harga2'], 0, ',', '.') . "\n\n";

    echo "Total Harga : Rp " . number_format($hasil['total'], 0, ',', '.') . "\n";
    echo "Status      : Budget Tercapai\n";

  } else {

    echo "Tidak ditemukan dua barang yang total harganya sama dengan budget.\n";

  }

  echo "\n=====================================\n";
}


// ===============================
// Program Utama
// ===============================

$daftarHarga = [35000, 45000, 55000, 65000, 20000];
$budget = 100000;

tampilkanHasil($daftarHarga, $budget);

?>