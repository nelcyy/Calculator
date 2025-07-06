<?php
// CORS Headers:
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

// Optional: handle OPTIONS preflight (some browsers require it)
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// Calculation logic:
$num1 = $_POST['num1'] ?? 0;
$num2 = $_POST['num2'] ?? 0;
$op = $_POST['operator'] ?? 'add';

$num1 = floatval($num1);
$num2 = floatval($num2);

switch ($op) {
  case 'add': $result = $num1 + $num2; break;
  case 'sub': $result = $num1 - $num2; break;
  case 'mul': $result = $num1 * $num2; break;
  case 'div':
    if ($num2 == 0) {
      echo "Error: Division by zero";
      exit;
    }
    $result = $num1 / $num2;
    break;
  default:
    echo "Invalid operation";
    exit;
}

echo "Result: " . $result;
?>
