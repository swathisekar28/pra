3)	Java Script
●	Write a java script program to find out duplicate elements in an array.
●	Write a java script function that accepts a sentence as input and then it should list out all 3 letter words in it.
●	Write a JavaScript program which accept a number as input and insert dashes (-) between each two even numbers.
    For example, if you accept 025468 the output should be 0-254-6-8
●	Write a JavaScript function to check whether a string is an anagram or not.
●	Write a JavaScript program to remove all of the numbers from  'A1B2C3D4E5F6G7H8I9J10'
1)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Duplicate Elements</title>
    <script>
        function findDuplicates(arr) {
            let duplicates = {};
            let result = [];
            for (let i = 0; i < arr.length; i++) {
                // If element is already in duplicates object, it's a duplicate
                if (duplicates[arr[i]] !== undefined) {
                    // If the element is encountered for the first time
                    if (duplicates[arr[i]] === 1) {
                        result.push(arr[i]);
                    }
                    // Increment the count of occurrences
                    duplicates[arr[i]]++;
                } else {
                    // If element is not in duplicates object, add it with count 1
                    duplicates[arr[i]] = 1;
                }
            }

            return result;
        }

        function findAndDisplayDuplicates() {
            // Get the input array from the HTML input field
            const inputArray = document.getElementById("inputArray").value.split(',').map(Number);

            // Call the function to find duplicate elements
            const duplicates = findDuplicates(inputArray);

            // Display the result in the HTML output area
            document.getElementById("output").innerText = "Duplicate elements in the array: " + duplicates.join(", ");
        }
    </script>
</head>
<body>
    <h2>Find Duplicate Elements in an Array</h2>
    <label for="inputArray">Enter comma-separated numbers:</label>
    <input type="text" id="inputArray">
    <button onclick="findAndDisplayDuplicates()">Find Duplicates</button>
    <div id="output"></div>
</body>
</html>


2)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Three-Letter Words Finder</title>
    <script>
        function listThreeLetterWords(sentence) {
            const words = sentence.split(/\s+/);
            const threeLetterWords = words.filter(word => word.length === 3);
            return threeLetterWords;
        }

        function findAndDisplayThreeLetterWords() {
            const inputSentence = document.getElementById("sentenceInput").value;
            const threeLetterWords = listThreeLetterWords(inputSentence);
            document.getElementById("output").innerText = "Three-letter words in the sentence: " + threeLetterWords.join(", ");
        }
    </script>
</head>
<body>
    <h2>Enter a sentence:</h2>
    <input type="text" id="sentenceInput">
    <button onclick="findAndDisplayThreeLetterWords()">Find Three-Letter Words</button>
    <div id="output"></div>
</body>
</html>
3)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Dashes Between Even Numbers</title>
    <script>
        function insertDashesBetweenEvenNumbers(number) {
            const strNumber = number.toString();
            let result = '';
            for (let i = 0; i < strNumber.length; i++) {
                if (parseInt(strNumber[i]) % 2 === 0 && parseInt(strNumber[i + 1]) % 2 === 0) {
                    result += strNumber[i] + '-';
                } else {
                    result += strNumber[i];
                }
            }

            return result;
        }

        function processInput() {
            const inputNumber = document.getElementById("inputNumber").value;
            const result = insertDashesBetweenEvenNumbers(inputNumber);
            document.getElementById("output").innerText = "Result: " + result;
        }
    </script>
</head>
<body>
    <h2>Insert Dashes Between Even Numbers</h2>
    <label for="inputNumber">Enter a number:</label>
    <input type="text" id="inputNumber">
    <button onclick="processInput()">Insert Dashes</button>
    <div id="output"></div>
</body>
</html>
4)
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Anagram Checker</title>
    <script>
        function isAnagram(str1, str2) {
            // Remove non-alphanumeric characters and convert to lowercase
            const cleanStr1 = str1.replace(/[^a-zA-Z0-9]/g, '').toLowerCase();
            const cleanStr2 = str2.replace(/[^a-zA-Z0-9]/g, '').toLowerCase();

            // Sort the characters of both strings
            const sortedStr1 = cleanStr1.split('').sort().join('');
            const sortedStr2 = cleanStr2.split('').sort().join('');

            // Compare the sorted strings
            return sortedStr1 === sortedStr2;
        }

        function checkAnagram() {
            // Get the input strings from the HTML input fields
            const inputString1 = document.getElementById("inputString1").value;
            const inputString2 = document.getElementById("inputString2").value;

            // Call the function to check if the strings are anagrams
            const result = isAnagram(inputString1, inputString2);

            // Display the result in the HTML output area
            document.getElementById("output").innerText = result ? "The strings are anagrams." : "The strings are not anagrams.";
        }
    </script>
</head>
<body>
    <h2>Anagram Checker</h2>
    <label for="inputString1">Enter the first string:</label>
    <input type="text" id="inputString1">
    <br>
    <label for="inputString2">Enter the second string:</label>
    <input type="text" id="inputString2">
    <br>
    <button onclick="checkAnagram()">Check Anagram</button>
    <div id="output"></div>
</body>
</html>

5)<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remove Numbers</title>
    <script>
        function removeNumbersFromString(str) {
    return str.replace(/\d+/g, '');
}

function removeNumbers() {
    const originalString = document.getElementById('originalString').textContent;
    const resultString = removeNumbersFromString(originalString);
    document.getElementById('resultString').textContent = resultString;
}

    </script>
</head>
<body>
    <h2>String with Numbers:</h2>
    <p id="originalString">A1B2C3D4E5F6G7H8I9J10</p>
    <button onclick="removeNumbers()">Remove Numbers</button>
    <h2>String without Numbers:</h2>
    <p id="resultString"></p>
</body>
</html>
6)
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Calculator</title>
</head>
<body>
    <form>
        Number 1: <input type="number" id="num1"><br><br>
        Number 2: <input type="number" id="num2"><br><br>
        Result: <input type="text" id="result" disabled><br><br>
        
        <input type="button" value="+" onclick="add()">
        <input type="button" value="-" onclick="subtract()">
        <input type="button" value="*" onclick="multiply()">
        <input type="button" value="/" onclick="divide()">
    </form>

    <script>
        function add() {
            var num1 = parseFloat(document.getElementById("num1").value);
            var num2 = parseFloat(document.getElementById("num2").value);
            var result = num1 + num2;
            document.getElementById("result").value = result;
        }

        function subtract() {
            var num1 = parseFloat(document.getElementById("num1").value);
            var num2 = parseFloat(document.getElementById("num2").value);
            var result = num1 - num2;
            document.getElementById("result").value = result;
        }

        function multiply() {
            var num1 = parseFloat(document.getElementById("num1").value);
            var num2 = parseFloat(document.getElementById("num2").value);
            var result = num1 * num2;
            document.getElementById("result").value = result;
        }

        function divide() {
            var num1 = parseFloat(document.getElementById("num1").value);
            var num2 = parseFloat(document.getElementById("num2").value);
            if (num2 !== 0) {
                var result = num1 / num2;
                document.getElementById("result").value = result;
            } else {
                document.getElementById("result").value = "Cannot divide by zero";
            }
        }
    </script>
</body>
</html>
