<?php
declare(strict_types=1);

class DemoCall {
    public function __construct(private string $nama) {}

    // __call otomatis berjalan jika kita memanggil method yang tidak ada di dalam class
    public function __call(string $method, array $args): mixed {
        
        // Kita hanya mengizinkan method bernama 'cetakInfo'
        if ($method === 'cetakInfo') {
            return "<span style='color: blue;'>Berhasil:</span> Method '<b>$method</b>' dipanggil untuk user bernama <b>{$this->nama}</b>.<br>";
        }

        // Jika memanggil method SELAIN 'cetakInfo', program akan melempar Exception
        throw new BadMethodCallException("Error: Method '$method' tidak tersedia di class ini.");
    }
}

echo "<b>--- Menguji Overloading Method (__call) ---</b><br><br>";

// Membuat objek baru
$demo = new DemoCall('Fauzan');

// 1. Menguji pemanggilan method yang DIIZINKAN
echo "<b>1. Memanggil method yang diizinkan (cetakInfo):</b><br>";
echo $demo->cetakInfo();
echo "<br>";

// 2. Menguji pemanggilan method yang TIDAK DIIZINKAN (akan memicu Exception)
echo "<b>2. Memanggil method yang TIDAK diizinkan (gantiPassword):</b><br>";
try {
    // Kita sengaja memanggil method yang tidak pernah dibuat
    echo $demo->gantiPassword(); 
} catch (BadMethodCallException $e) {
    // try...catch digunakan agar program tidak "crash" dan errornya bisa kita tampilkan dengan rapi
    echo "<span style='color: red;'>" . $e->getMessage() . "</span><br>";
}

echo "<br><b>--- Semua Latihan Praktikum Selesai! ---</b><br>";
?>