<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $password = $_POST['password'];

    if (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        die("Invalid name format");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email format");
    }
    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        die("Invalid phone number");
    }
    if ($flag === true) {
		if ($username === "admin" and $password === "admin") {
			echo "You credentials matched";
		}
		else {
			echo "Login Failed...!";
		}
	}
	else {
		header("Location: submit_registration.php?err1=" . $usernameErr . "&err2=" . $passwordErr);
	}

}
else {
	echo "Unauthorized Access;";
}

function sanitize($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
    $passwordHash = password_hash($password, PASSWORD_BCRYPT);

    $_SESSION['user'] = ['name' => $name, 'email' => $email, 'phone' => $phone];

    echo "Registration successful!";
?>