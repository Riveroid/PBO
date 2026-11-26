<?php
class Rekening {
    private int $saldo = 0; // Saldo awal 0

    // Perubahan saldo dilakukan lewat operasi bisnis nyata: SETOR
    public function setor(int $jumlah): void {
        if ($jumlah <= 0) {
            throw new InvalidArgumentException("Setoran harus positif");
        }
        $this->saldo += $jumlah;
    }

    // Perubahan saldo dilakukan lewat operasi bisnis nyata: TARIK
    public function tarik(int $jumlah): void {
        if ($jumlah <= 0 || $jumlah > $this->saldo) {
            throw new InvalidArgumentException("Penarikan tidak valid");
        }
        $this->saldo -= $jumlah;
    }

    public function getSaldo(): int { 
        return $this->saldo; 
    }
}

$r = new Rekening();
$r->setor(100000); // Saldo + 100000
$r->tarik(25000);  // Saldo - 25000
echo $r->getSaldo(); // Output: 75000