<?php
declare(strict_types=1);

class Buku {
    // Constructor untuk menginisialisasi judul, penulis, dan tahun
    public function __construct(
        public string $judul,
        public string $penulis,
        public int $tahun
    ) {}

    // Method untuk menampilkan informasi buku
    public function tampilInfo(): string {
        return "Buku: $this->judul oleh $this->penulis (Terbit: $this->tahun)<br>";
    }
}

$buku1 = new Buku('Belajar PHP 9', 'Dzakwan', 2024);
$buku2 = new Buku('Struktur Data', 'Kirei', 2023);
$buku3 = new Buku('Pemrograman Berorientasi Objek', 'Fahmi', 2022);

echo $buku1->tampilInfo();
echo $buku2->tampilInfo();
echo $buku3->tampilInfo();
?>