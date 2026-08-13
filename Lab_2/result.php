<?php

// Receive values using $_GET
$applicant_id = $_GET["id"] ?? "";
$name = $_GET["name"] ?? "";
$email = $_GET["email"] ?? "";
$phone = $_GET["phone"] ?? "";
$gender = $_GET["gender"] ?? "";
$position = $_GET["position"] ?? "";
$qualification = $_GET["qualification"] ?? "";
$address = $_GET["address"] ?? "";
$cv = $_GET["cv"] ?? "";

// Required use of $_REQUEST - retrieve at least two values
$request_id = $_REQUEST["id"] ?? "";
$request_name = $_REQUEST["name"] ?? "";

?>

<!DOCTYPE html>
<html>
<head>
    <title>Application Result</title>
</head>
<body>

<h2>================================</h2>
<h2>APPLICATION SUCCESSFUL</h2>
<h2>================================</h2>

<p><strong>Applicant ID:</strong> <?php echo htmlspecialchars($request_id); ?></p>
<p><strong>Name:</strong> <?php echo htmlspecialchars($request_name); ?></p>
<p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
<p><strong>Phone:</strong> <?php echo htmlspecialchars($phone); ?></p>
<p><strong>Gender:</strong> <?php echo htmlspecialchars($gender); ?></p>
<p><strong>Job Position:</strong> <?php echo htmlspecialchars($position); ?></p>
<p><strong>Qualification:</strong> <?php echo htmlspecialchars($qualification); ?></p>
<p><strong>Address:</strong> <?php echo htmlspecialchars($address); ?></p>

<br>

<p><strong>Uploaded CV:</strong> <?php echo htmlspecialchars($cv); ?></p>

<br>

<p>Application submitted successfully.</p>

</body>
</html>
