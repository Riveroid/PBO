<?php
declare(strict_types=1);

class Buku {
    public function __construct(
        public string $judul,
        public string $penulis,
        public int $tahun
    ) {
        echo "Objek Buku '{$this->judul}' berhasil dibuat.<br>";
    }

    public function tampilInfo(): string {
        return "Buku: $this->judul oleh $this->penulis (Terbit: $this->tahun)<br>";
    }

    // Menambahkan destructor untuk demonstrasi
    public function __destruct() {
        echo "<span style='color: red;'>Destructor berjalan: Objek Buku '{$this->judul}' dihapus dari memori.</span><br>";
    }
}

echo "<b>--- Memulai Program ---</b><br><br>";

// Membuat objek baru menggunakan datamu sebelumnya
$buku1 = new Buku('Belajar PHP 9', 'Dzakwan', 2024);

// Membuat alias (referensi) dari object $buku1
$aliasBuku = $buku1;
echo "Alias untuk buku '{$buku1->judul}' telah dibuat.<br><br>";

echo "<b>--- Menguji unset() pada referensi pertama ---</b><br>";
echo "Menjalankan: <code>unset(\$buku1)</code><br>";
unset($buku1);
echo "<i>(Perhatikan di atas: Destructor belum dipanggil karena variabel \$aliasBuku masih merujuk ke objek yang sama)</i><br><br>";

echo "<b>--- Menguji unset() pada referensi kedua (alias) ---</b><br>";
echo "Menjalankan: <code>unset(\$aliasBuku)</code><br>";
unset($aliasBuku);
echo "<i>(Karena semua referensi sudah dihapus, destructor akan otomatis berjalan sebelum baris ini atau di akhir skrip)</i><br><br>";

echo "<b>--- Program Selesai ---</b><br>";
?>