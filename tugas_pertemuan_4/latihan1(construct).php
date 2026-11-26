<?php
declare(strict_types=1);

class Mahasiswa {
    // Parameter $fakultas ditambahkan di akhir dengan nilai default
    public function __construct(
        public string $nim,
        public string $nama,
        public int $semester = 1,
        public string $fakultas = "Belum diisi"
    ) {}

    public function profil(): string {
        return "$this->nim - $this->nama (Semester $this->semester, Fakultas: $this->fakultas)";
    }
}

$mhs1 = new Mahasiswa('231001', 'Alya', 3, 'Sains dan Teknologi');

$mhs2 = new Mahasiswa('231002', 'Budi', 2, 'Sains dan Teknologi');

echo $mhs1->profil() . "<br>";
echo $mhs2->profil() . "<br>";
?>