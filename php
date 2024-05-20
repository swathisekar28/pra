6)	PHP
●	Create a PHP script that prompts the user to input a year and checks whether it's a leap year or not.
●	Create a PHP script that checks whether a given number is a palindrome or not using loops.
●	Create a PHP script that generates a random number between 1 and 100 and prompts the user to guess the number. Provide feedback to the user if their guess is too high, too low, or correct.
●	Develop a PHP script that takes a person's age as input and categorizes them into different age groups (e.g., child, teenager, adult, senior).
●	Build a PHP script that prompts the user to input a password and checks its strength based on criteria such as length, presence of special characters, uppercase and lowercase letters, and numbers.

1)<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $year = $_POST['year'];
 if ((($year % 4 == 0) && ($year % 100 != 0)) || ($year % 400 == 0)) {
 $result = "$year is a leap year.";
 } else {
 $result = "$year is not a leap year.";
 }
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>Leap Year Checker</title>
</head>
<body>
 <form method="post" action="">
 Enter a year: <input type="text" name="year" required>
 <input type="submit" value="Check">
 </form>
 <?php
 if (isset($result)) {
 echo "<p>$result</p>";
 }
 ?>
</body>
</html>
2)
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $number = $_POST['number'];
 $originalNumber = $number;
 $reversedNumber = 0;
 while ($number != 0) {
 $remainder = $number % 10;
 $reversedNumber = ($reversedNumber * 10) + $remainder;
 $number = (int)($number / 10);
 }
 if ($originalNumber == $reversedNumber) {
 $result = "$originalNumber is a palindrome.";
 } else {
 $result = "$originalNumber is not a palindrome.";
 }
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>Palindrome Checker</title>
</head>
<body>
 <form method="post" action="">
 Enter a number: <input type="text" name="number" required>
 <input type="submit" value="Check">
 </form>
 <?php
 if (isset($result)) {
 echo "<p>$result</p>";
 }
 ?>
</body>
</html>

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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $age = $_POST['age'];

 if ($age >= 0 && $age <= 12) {
 $category = "Child";
 } elseif ($age >= 13 && $age <= 19) {
 $category = "Teenager";
 } elseif ($age >= 20 && $age <= 64) {
 $category = "Adult";
 } elseif ($age >= 65) {
 $category = "Senior";
 } else {
 $category = "Invalid age";
 }
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>Age Categorizer</title>
</head>
<body>
 <form method="post" action="">
 Enter your age: <input type="text" name="age" required>
 <input type="submit" value="Check">
 </form>
 <?php
 if (isset($category)) {
 echo "<p>You are a $category.</p>";
 }
 ?>
</body>
</html>
5)
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $password = $_POST['password'];
 $strength = "Weak";
 if (strlen($password) >= 8 &&
 preg_match('/[A-Z]/', $password) &&
 preg_match('/[a-z]/', $password) &&
 preg_match('/[0-9]/', $password) &&
 preg_match('/[\W]/', $password)) {
 $strength = "Strong";
 } elseif (strlen($password) >= 6) {
 $strength = "Moderate";
 }
}
?>
<!DOCTYPE html>
<html>
<head>
 <title>Password Strength Checker</title>
</head>
<body>
 <form method="post" action="">
 Enter a password: <input type="password" name="password" required>
 <input type="submit" value="Check">
 </form>
 <?php
 if (isset($strength)) {
 echo "<p>Password strength: $strength</p>";
 }
 ?>
</body>
</html>
_________________________
