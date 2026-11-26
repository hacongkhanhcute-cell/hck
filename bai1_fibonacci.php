<?php
/**
 * Bài 1: Dãy số Fibonacci
 * generateFibonacci($n): trả về mảng gồm n phần tử Fibonacci đầu tiên.
 */
function generateFibonacci(int $n): array
{
    if ($n <= 0) {
        return [];
    }

    $fib = [0];
    if ($n === 1) {
        return $fib;
    }

    $fib[] = 1;
    for ($i = 2; $i < $n; $i++) {
        $fib[] = $fib[$i - 1] + $fib[$i - 2];
    }
    return $fib;
}

$n = 10;
$result = generateFibonacci($n);

echo "Dãy Fibonacci gồm $n phần tử đầu tiên:\n";
echo implode(", ", $result) . "\n";
// Kết quả: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34
