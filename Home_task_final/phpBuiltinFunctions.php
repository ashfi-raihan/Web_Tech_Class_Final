<?php
// ============================================================
// Commonly Used Built-in Functions in PHP
// Small examples with comments explaining what each function does
// ============================================================


// -------------------- STRING FUNCTIONS --------------------

// 1. strlen()
// Returns the length of a string.
$text = "Hello World";
echo "strlen(): " . strlen($text) . "<br>"; // Output: 11


// 2. str_word_count()
// Counts the number of words in a string.
$text = "PHP is easy to learn";
echo "str_word_count(): " . str_word_count($text) . "<br>"; // Output: 5


// 3. str_contains()
// Checks whether a string contains a given substring.
$text = "I love PHP";
echo "str_contains(): ";
echo str_contains($text, "PHP") ? "Yes<br>" : "No<br>";


// 4. strpos()
// Finds the position of the first occurrence of a substring.
$text = "Hello PHP";
echo "strpos(): " . strpos($text, "PHP") . "<br>"; // Output: 6


// 5. strtoupper()
// Converts a string to uppercase.
$text = "hello php";
echo "strtoupper(): " . strtoupper($text) . "<br>"; // Output: HELLO PHP


// 6. strtolower()
// Converts a string to lowercase.
$text = "HELLO PHP";
echo "strtolower(): " . strtolower($text) . "<br>"; // Output: hello php


// 7. str_replace()
// Replaces some characters/text with other characters/text.
$text = "I like Java";
echo "str_replace(): " . str_replace("Java", "PHP", $text) . "<br>";


// 8. strrev()
// Reverses a string.
$text = "Hello";
echo "strrev(): " . strrev($text) . "<br>"; // Output: olleH


// 9. trim()
// Removes whitespace from the beginning and end of a string.
$text = "   Hello PHP   ";
echo "trim(): '" . trim($text) . "'<br>";


// 10. explode()
// Splits a string into an array using a separator.
$text = "Apple,Banana,Mango";
$fruits = explode(",", $text);
echo "explode(): ";
print_r($fruits);
echo "<br>";


// 11. implode()
// Joins array elements into a single string.
$fruits = ["Apple", "Banana", "Mango"];
echo "implode(): " . implode(", ", $fruits) . "<br>";


// 12. substr()
// Returns a part of a string.
$text = "Hello World";
echo "substr(): " . substr($text, 0, 5) . "<br>"; // Output: Hello



// -------------------- TYPE / NUMBER FUNCTIONS --------------------

// 13. is_int()
// Checks whether a variable is an integer.
$num = 25;
echo "is_int(): ";
echo is_int($num) ? "Yes<br>" : "No<br>";


// 14. is_float()
// Checks whether a variable is a floating-point number.
$num = 12.5;
echo "is_float(): ";
echo is_float($num) ? "Yes<br>" : "No<br>";


// 15. is_nan()
// Checks whether a value is Not-a-Number (NaN).
$value = acos(2);
echo "is_nan(): ";
echo is_nan($value) ? "Yes<br>" : "No<br>";


// 16. is_numeric()
// Checks whether a variable contains a number or numeric string.
$value = "12345";
echo "is_numeric(): ";
echo is_numeric($value) ? "Yes<br>" : "No<br>";


// 17. round()
// Rounds a floating-point number to the nearest integer.
$num = 12.56;
echo "round(): " . round($num) . "<br>"; // Output: 13



// -------------------- CONSTANT FUNCTION --------------------

// 18. define()
// Creates a named constant.
define("COLLEGE", "AIUB");
echo "define(): " . COLLEGE . "<br>";



// -------------------- DATE AND TIME FUNCTIONS --------------------

// 19. date()
// Formats the current date/time.
echo "date(): " . date("Y-m-d") . "<br>";


// 20. strtotime()
// Converts a date/time string into a Unix timestamp.
$timestamp = strtotime("2026-12-25");
echo "strtotime(): " . $timestamp . "<br>";


// 21. time()
// Returns the current Unix timestamp.
echo "time(): " . time() . "<br>";


// 22. date_default_timezone_set()
// Sets the default timezone used by date/time functions.
date_default_timezone_set("Asia/Dhaka");
echo "date_default_timezone_set(): " . date("Y-m-d H:i:s") . "<br>";


// 23. date_default_timezone_get()
// Returns the current default timezone.
echo "date_default_timezone_get(): " . date_default_timezone_get() . "<br>";



// -------------------- FILE INCLUSION --------------------

// 24. include
// Includes and executes another PHP file.
// Example:
// include "header.php";


// 25. require
// Includes and executes another PHP file.
// If the required file cannot be found, the script stops.
// Example:
// require "config.php";



// -------------------- JSON FUNCTIONS --------------------

// 26. json_encode()
// Converts a PHP value/array into a JSON string.
$student = [
    "name" => "Rahim",
    "age" => 21
];

$json = json_encode($student);
echo "json_encode(): " . $json . "<br>";


// 27. json_decode()
// Converts a JSON string into a PHP object or array.
$json = '{"name":"Rahim","age":21}';
$data = json_decode($json);

echo "json_decode(): " . $data->name . ", " . $data->age . "<br>";



// -------------------- ARRAY FUNCTIONS --------------------

// 28. array()
// Creates an array.
$colors = array("Red", "Green", "Blue");
echo "array(): " . $colors[0] . "<br>";


// 29. array_keys()
// Returns all the keys of an array.
$student = [
    "name" => "Rahim",
    "age" => 21,
    "department" => "CSE"
];

echo "array_keys(): ";
print_r(array_keys($student));
echo "<br>";


// 30. array_merge()
// Combines two or more arrays.
$array1 = ["Apple", "Banana"];
$array2 = ["Mango", "Orange"];

$merged = array_merge($array1, $array2);

echo "array_merge(): ";
print_r($merged);
echo "<br>";


// 31. array_push()
// Adds one or more elements to the end of an array.
$fruits = ["Apple", "Banana"];
array_push($fruits, "Mango");

echo "array_push(): ";
print_r($fruits);
echo "<br>";


// 32. array_reverse()
// Reverses the order of elements in an array.
$numbers = [1, 2, 3, 4, 5];

echo "array_reverse(): ";
print_r(array_reverse($numbers));
echo "<br>";


// 33. sizeof()
// Returns the number of elements in an array.
// sizeof() is an alias of count().
$numbers = [10, 20, 30, 40];

echo "sizeof(): " . sizeof($numbers) . "<br>";


// 34. count()
// Returns the number of elements in an array.
$numbers = [10, 20, 30, 40, 50];

echo "count(): " . count($numbers) . "<br>";


// 35. sort()
// Sorts an array in ascending order.
$numbers = [50, 10, 40, 20, 30];
sort($numbers);

echo "sort(): ";
print_r($numbers);
echo "<br>";


// ============================================================
// End of PHP Built-in Functions Examples
// ============================================================
?>
