<?php
declare(strict_types=1);

// --- Persiapan Class dari Modul ---
class Calculator {
    public function add(int ...$numbers): int {
        return array_sum($numbers);
    }
}

class StudentPresenter {
    public function __call(string $name, array $args): string {
        if ($name !== 'showData') {
            throw new BadMethodCallException('Unknown method: ' . $name);
        }
        if (count($args) === 1 && is_string($args[0])) {
            return 'Name: ' . $args[0];
        }
        if (count($args) === 2 && is_string($args[0]) && is_string($args[1])) {
            return 'ID: ' . $args[0] . ', Name: ' . $args[1];
        }
        throw new InvalidArgumentException('Expected 1 or 2 strings');
    }
}

abstract class Student {
    public function __construct(
        protected string $id,
        protected string $name,
        protected float $baseFee
    ) {}
    abstract public function calculateFee(): float;
    public function summary(): string {
        return $this->id . ' - ' . $this->name;
    }
}

class RegularStudent extends Student {
    public function calculateFee(): float { return $this->baseFee; }
}

class ScholarshipStudent extends Student {
    public function __construct(string $id, string $name, float $baseFee, private float $discountPercent) {
        if ($discountPercent < 0 || $discountPercent > 100) {
            throw new InvalidArgumentException('Invalid discount');
        }
        parent::__construct($id, $name, $baseFee);
    }
    public function calculateFee(): float {
        return $this->baseFee * (1 - $this->discountPercent / 100);
    }
    public function summary(): string {
        return parent::summary() . ' [Scholarship]';
    }
}

// --- Eksekusi T01 - T09 ---
$calc = new Calculator();
echo "T01: " . $calc->add(10, 20) . " dan " . $calc->add(10, 20, 30) . PHP_EOL;

$view = new StudentPresenter();
echo "T02: " . $view->showData("Ahmad") . PHP_EOL;
echo "T03: " . $view->showData("2026001", "Ahmad") . PHP_EOL;

try {
    $view->showData();
} catch (Throwable $e) {
    echo "T04: " . get_class($e) . " (" . $e->getMessage() . ")" . PHP_EOL;
}

try {
    $view->unknownMethod();
} catch (Throwable $e) {
    echo "T05: " . get_class($e) . " (" . $e->getMessage() . ")" . PHP_EOL;
}

$reg = new RegularStudent("M01", "Alya", 5000000);
echo "T06: " . $reg->calculateFee() . PHP_EOL;

$sch = new ScholarshipStudent("M02", "Bima", 5000000, 40);
echo "T07: " . $sch->calculateFee() . PHP_EOL;

try {
    new ScholarshipStudent("M03", "Cici", 5000000, 101);
} catch (Throwable $e) {
    echo "T08: " . get_class($e) . " (" . $e->getMessage() . ")" . PHP_EOL;
}

echo "T09: " . $reg->summary() . " | " . $sch->summary() . PHP_EOL;