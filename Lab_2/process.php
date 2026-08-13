<?php

// Check whether the form was submitted using POST
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Invalid request.");
}

// Receive POST information
$applicant_id = trim($_POST["applicant_id"] ?? "");
$name = trim($_POST["name"] ?? "");
$email = trim($_POST["email"] ?? "");
$phone = trim($_POST["phone"] ?? "");
$password = $_POST["password"] ?? "";
$gender = $_POST["gender"] ?? "";
$position = $_POST["position"] ?? "";
$qualification = trim($_POST["qualification"] ?? "");
$address = trim($_POST["address"] ?? "");

$errors = [];

// Form Validation
if (empty($applicant_id)) {
    $errors[] = "Applicant ID is required.";
}

if (empty($name)) {
    $errors[] = "Name is required.";
}

if (empty($email)) {
    $errors[] = "Email is required.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Please enter a valid email address.";
}

if (empty($phone)) {
    $errors[] = "Phone number is required.";
} elseif (!preg_match("/^[0-9]{11}$/", $phone)) {
    $errors[] = "Phone number must contain exactly 11 digits.";
}

if (empty($password)) {
    $errors[] = "Password is required.";
} elseif (strlen($password) < 6) {
    $errors[] = "Password must contain at least 6 characters.";
}

if (empty($gender)) {
    $errors[] = "Please select your gender.";
}

if (empty($position)) {
    $errors[] = "Please select a job position.";
}

if (empty($qualification)) {
    $errors[] = "Qualification is required.";
}

if (empty($address)) {
    $errors[] = "Address is required.";
}

// CV File Validation
$uploadedFileName = "";

if (!isset($_FILES["cv"]) || $_FILES["cv"]["error"] == UPLOAD_ERR_NO_FILE) {
    $errors[] = "Please upload your CV.";
} elseif ($_FILES["cv"]["error"] != UPLOAD_ERR_OK) {
    $errors[] = "Error while uploading the CV.";
} else {
    $fileName = $_FILES["cv"]["name"];
    $fileSize = $_FILES["cv"]["size"];
    $tempName = $_FILES["cv"]["tmp_name"];

    $extension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExtensions = ["pdf", "doc", "docx"];
    $maxSize = 2 * 1024 * 1024;

    if (!in_array($extension, $allowedExtensions)) {
        $errors[] = "Only PDF, DOC and DOCX files are allowed.";
    }

    if ($fileSize > $maxSize) {
        $errors[] = "CV file size must not exceed 2 MB.";
    }
}

// Display Errors
if (!empty($errors)) {
    echo "<h2>Application Failed!</h2>";

    foreach ($errors as $error) {
        echo $error . "<br>";
    }

    echo "<br>";
    echo '<a href="index.php">Go Back</a>';
    exit();
}

// Upload CV
$uploadFolder = "uploads/";

if (!is_dir($uploadFolder)) {
    mkdir($uploadFolder, 0777, true);
}

$uploadedFileName = time() . "_" . basename($fileName);
$destination = $uploadFolder . $uploadedFileName;

if (!move_uploaded_file($tempName, $destination)) {
    die("Failed to save the uploaded CV.");
}

// Send information using GET
$data = [
    "id" => $applicant_id,
    "name" => $name,
    "email" => $email,
    "phone" => $phone,
    "gender" => $gender,
    "position" => $position,
    "qualification" => $qualification,
    "address" => $address,
    "cv" => $uploadedFileName
];

$queryString = http_build_query($data);

header("Location: result.php?" . $queryString);
exit();

?>
