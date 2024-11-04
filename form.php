<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback Form</title>
    <link rel="stylesheet" href="form_feedback.css">
    <script src="form_validation.js"></script>
</head>
<body>
    <h2>Submit Your Feedback</h2>
    <form id="feedbackForm" action="submit_feedback.php" method="POST" onsubmit="return validateForm()">
        <label for="first_name">First Name:</label><br>
        <label for="last_name">Last Name:</label>
        <input type="text" id="name" name="name" required><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="feedback">Feedback:</label>
        <textarea id="feedback" name="feedback" rows="25" cols="25" required></textarea><br>

        <label for="rating">Rating (1-10):</label>
        <input type="number" id="rating" name="rating" min="1" max="10" required><br>

        <button type="submit">Submit</button>
    </form>
    <?php

$servername = "localhost";
$username = "root";
$password = "1234";
$dbname = "campaignform";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}


$name = htmlspecialchars($_POST['first-name']);
$name = htmlspecialchars($_POST['last-name']);
$email = htmlspecialchars($_POST['email']);
$feedback = htmlspecialchars($_POST['feedback']);
$rating = intval($_POST['rating']);


$sql = "INSERT INTO feedback (first_name,last_name, email, feedback, rating) VALUES ('$name', '$email', '$feedback', '$rating')";

if ($conn->query($sql) === TRUE) {
    echo "WE APPRECIATE FOR YOUR FEEDBACK";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}


$conn->close();
?>

</body>
</html>
