<?php
class Mahasiswa {
    private string $nim;

    public function __construct(string $nim) {
        $nim = trim($nim);
        if ($nim === "") {
            throw new InvalidArgumentException("NIM wajib diisi");
        }
        $this->nim = $nim;
    }

    // Hanya menyediakan Getter (BACA SAJA)
    public function getNim(): string {
        return $this->nim;
    }
    
    // Tanpa setNim(), NIM otomatis menjadi Read-Only setelah dipasang di awal
}

$m = new Mahasiswa("23001");
echo $m->getNim(); // Output: 23001
// Tidak ada cara mengubah NIM dari luar karena tidak ada method setNim()