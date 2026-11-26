<?php
class Mahasiswa {
    public int $semester;

    public function __construct(int $semester) {
        if ($semester < 1 || $semester > 14) {
            throw new InvalidArgumentException("Semester tidak valid");
        }
        $this->semester = $semester;
    }
}

$m = new Mahasiswa(3);
$m->semester = -7;
echo $m->semester;