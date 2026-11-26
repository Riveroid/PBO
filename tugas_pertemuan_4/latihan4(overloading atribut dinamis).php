<?php
declare(strict_types=1);

class LatihanDinamis {
    // Array private untuk menampung atribut-atribut tambahan (dinamis)
    private array $atribut = [];

    // __set dijalankan saat kita mengisi nilai ke properti yang belum dideklarasikan
    public function __set(string $key, mixed $value): void {
        $this->atribut[$key] = $value;
        echo "<span style='color: blue;'>[__set]</span> Atribut '<b>$key</b>' berhasil diisi dengan nilai '<b>$value</b>'.<br>";
    }

    // __get dijalankan saat kita membaca properti yang belum dideklarasikan
    public function __get(string $key): mixed {
        echo "<span style='color: green;'>[__get]</span> Mengakses atribut '<b>$key</b>'.<br>";
        return $this->atribut[$key] ?? null;
    }

    // __isset dijalankan saat kita menggunakan fungsi isset() pada properti dinamis
    public function __isset(string $key): bool {
        echo "<span style='color: orange;'>[__isset]</span> Memeriksa keberadaan atribut '<b>$key</b>'.<br>";
        return isset($this->atribut[$key]);
    }

    // __unset dijalankan saat kita menggunakan fungsi unset() pada properti dinamis
    public function __unset(string $key): void {
        echo "<span style='color: red;'>[__unset]</span> Menghapus atribut '<b>$key</b>'.<br>";
        unset($this->atribut[$key]);
    }
}

echo "<b>--- Menguji Overloading Atribut Dinamis ---</b><br><br>";

$obj = new LatihanDinamis();

// 1. Menguji __set() dengan menambahkan atribut 'hobi'
$obj->hobi = "Fotografi & Mengedit Foto"; 
echo "<br>";

// 2. Menguji __get() dengan memanggil atribut 'hobi'
echo "Nilai dari hobi adalah: " . $obj->hobi . "<br><br>";

// 3. Menguji __isset() untuk mengecek apakah 'hobi' ada
if (isset($obj->hobi)) {
    echo "<i>=> Hasil pengecekan: Atribut hobi <b>ditemukan</b>.</i><br><br>";
}

// 4. Menguji __unset() untuk menghapus atribut 'hobi'
unset($obj->hobi);
echo "<br>";

// Mengecek ulang menggunakan __isset() setelah dihapus
if (!isset($obj->hobi)) {
    echo "<i>=> Hasil pengecekan: Atribut hobi <b>sudah tidak ada</b> (berhasil dihapus).</i><br>";
}
?>