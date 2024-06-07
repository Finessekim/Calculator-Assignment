<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculator</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="calculator">
        <h2>Calculator Application</h2> <br>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <label for="num1"><h3>Number 1:</h3></label>
            <input type="number" id="num1" name="num1" required> <br><br>
            
            <label for="operation"><H3>Operation:</H3></label>
            <select id="operation" name="operation" required>
                <option value="add">Addition (+)</option>
                <option value="subtract">Subtraction (-)</option>
                <option value="multiply">Multiplication (*)</option>
                <option value="divide">Division (/)</option>
                <option value="exponent">Exponentiation (^)</option>
                <option value="percentage">Percentage (%)</option>
                <option value="sqrt">Square Root (√)</option>
                <option value="log">Logarithm (log)</option>
            </select>
            <br>
            <br>
            <label for="num2"><h3>Number 2:</h3></label>
            <input type="number" id="num2" name="num2">
            <br><br>
            <button type="submit" name="submit"><h3>Calculate</h3></button> <br> <br>
        </form>
        
        <?php
        // Retrieve user inputs
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = isset($_POST['num1']) ? (float)$_POST['num1'] : 0;
            $num2 = isset($_POST['num2']) ? (float)$_POST['num2'] : 0;
            $operation = isset($_POST['operation']) ? $_POST['operation'] : '';
            $result = '';

            // Function to perform basic arithmetic operations
            switch ($operation) {
                case 'add':
                    $result = add($num1, $num2);
                    break;
                case 'subtract':
                    $result = subtract($num1, $num2);
                    break;
                case 'multiply':
                    $result = multiply($num1, $num2);
                    break;
                case 'divide':
                    $result = divide($num1, $num2);
                    break;
                case 'exponent':
                    $result = exponentiation($num1, $num2);
                    break;
                case 'percentage':
                    $result = percentage($num1, $num2);
                    break;
                case 'sqrt':
                    $result = squareRoot($num1);
                    break;
                case 'log':
                    $result = logarithm($num1, $num2);
                    break;
                default:
                    $result = "Error: Invalid operation";
                    break;
            }

            // Display the result
            if (isset($result)) {
                echo "<p><h3>Result: $result</h3></p>";
            }
        }
        ?>
    </div>
</body>
</html>

<?php
function add($num1, $num2) {
    return $num1 + $num2;
}

function subtract($num1, $num2) {
    return $num1 - $num2;
}

function multiply($num1, $num2) {
    return $num1 * $num2;
}

function divide($num1, $num2) {
    if ($num2 == 0) {
        return "Error: Division by zero";
    } else {
        return $num1 / $num2;
    }
}

function exponentiation($num1, $num2) {
    return pow($num1, $num2);
}

function percentage($num, $percent) {
    return ($num * $percent) / 100;
}

function squareRoot($num) {
    return sqrt($num);
}

function logarithm($num, $base) {
    return log($num, $base);
}
?>
