6)	PHP
●	Create a PHP script that prompts the user to input a year and checks whether it's a leap year or not.
●	Create a PHP script that checks whether a given number is a palindrome or not using loops.
●	Create a PHP script that generates a random number between 1 and 100 and prompts the user to guess the number. Provide feedback to the user if their guess is too high, too low, or correct.
●	Develop a PHP script that takes a person's age as input and categorizes them into different age groups (e.g., child, teenager, adult, senior).
●	Build a PHP script that prompts the user to input a password and checks its strength based on criteria such as length, presence of special characters, uppercase and lowercase letters, and numbers.

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leap Year Checker</title>
</head>
<body>
    <h1>Leap Year Checker</h1>
    <form action="check_leap_year.php" method="post">
        <label for="year">Enter a year:</label>
        <input type="number" id="year" name="year" required>
        <button type="submit">Check</button>
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = intval($_POST["year"]);

    if (checkLeapYear($year)) {
        echo "<h2>$year is a leap year.</h2>";
    } else {
        echo "<h2>$year is not a leap year.</h2>";
    }
}

function checkLeapYear($year) {
    if ($year % 4 == 0) {
        if ($year % 100 == 0) {
            if ($year % 400 == 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return true;
        }
    } else {
        return false;
    }
}
?>
2)<?php

function isPalindrome($number) {
    $originalNumber = $number;
    $reversedNumber = 0;

    while ($number > 0) {
        $lastDigit = $number % 10;              // Get the last digit
        $reversedNumber = ($reversedNumber * 10) + $lastDigit; // Append it to the reversed number
        $number = (int)($number / 10);         // Remove the last digit
    }

    return $originalNumber === $reversedNumber;
}

// Example usage:
$number = 12321;
if (isPalindrome($number)) {
    echo "$number is a palindrome.";
} else {
    echo "$number is not a palindrome.";
}
3)<?php
$message = '';
$guess = '';

// Generate a random number each time
$randomNumber = rand(1, 100);

// Check if there is a POST request
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $guess = $_POST['guess'] ?? '';

    // Validate input
    if (filter_var($guess, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 100))) === false) {
        $message = 'Please enter a valid number between 1 and 100.';
    } else {
        // Compare guess to random number generated at request time
        if ($guess < $randomNumber) {
            $message = 'Too low! The number was ' . $randomNumber;
        } elseif ($guess > $randomNumber) {
            $message = 'Too high! The number was ' . $randomNumber;
        } else {
            $message = 'Congratulations! You guessed the right number, which was ' . $randomNumber;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guess the Number Game</title>
</head>
<body>
    <h1>Guess the Number Game</h1>
    <p>Try to guess the number I'm thinking of, which is between 1 and 100.</p>
    <form method="post">
        <input type="number" name="guess" placeholder="Enter your guess" value="<?php echo htmlspecialchars($guess); ?>" required>
        <button type="submit">Submit</button>
    </form>
    <?php if ($message): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
</body>
</html>

4)<?php
// Initialize a message variable
$message = '';

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $age = $_POST['age'] ?? 0; // Get the age from POST data, default to 0 if not set

    // Validate input to make sure it's a number
    if (filter_var($age, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0))) === false) {
        $message = 'Please enter a valid age.';
    } else {
        // Determine the age category
        if ($age >= 0 && $age <= 12) {
            $message = 'You are a child.';
        } elseif ($age >= 13 && $age <= 19) {
            $message = 'You are a teenager.';
        } elseif ($age >= 20 && $age <= 64) {
            $message = 'You are an adult.';
        } else {
            $message = 'You are a senior.';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Age Categorizer</title>
</head>
<body>
    <h1>Age Categorizer</h1>
    <form method="post">
        <label for="age">Enter your age:</label>
        <input type="number" id="age" name="age" required>
        <button type="submit">Submit</button>
    </form>
    <?php
    if ($message) {
        echo "<p>$message</p>";
    }
    ?>
</body>
</html>
5)
<?php
function checkPasswordStrength($password) {
    $strength = 0;

    // Check for minimum length
    if (strlen($password) >= 8) {
        $strength++;
    } else {
        return "Password is too short. Must be at least 8 characters.";
    }

    // Check for numbers
    if (preg_match('/\d/', $password)) {
        $strength++;
    }

    // Check for uppercase letters
    if (preg_match('/[A-Z]/', $password)) {
        $strength++;
    }

    // Check for lowercase letters
    if (preg_match('/[a-z]/', $password)) {
        $strength++;
    }

    // Check for special characters
    if (preg_match('/[\W_]/', $password)) {
        $strength++;
    }

    // Evaluate strength based on the number of passed tests
    switch ($strength) {
        case 1:
            return "Very weak password.";
        case 2:
            return "Weak password.";
        case 3:
            return "Moderate password.";
        case 4:
            return "Strong password.";
        case 5:
            return "Very strong password.";
        default:
            return "Invalid password.";
    }
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['password'] ?? '';
    $message = checkPasswordStrength($password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<title>Password Strength Checker</title>
</head>
<body>
    <h1>Password Strength Checker</h1>
    <form method="post">
        <label for="password">Enter your password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Check Strength</button>
    </form>
    <?php if (!empty($message)): ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>
</body>
</html>
