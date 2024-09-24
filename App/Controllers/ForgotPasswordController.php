<?PHP
    SESSION_START();
    include '../Models/.php';

    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] === "GET") {
        $errors['err1'] = "Unauthorized access";
        header("Location: ../Views/Auth/ResetPassword.php");
        exit();
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $email = $_POST['email'];
        $_SESSION['email'] = $email;

        if (empty($email)) {
            $errors['err1'] = "Email is required";
        }

        if (!empty($errors)) {
            $_SESSION['err1'] = $errors['err1'];
            header("Location: ../Views/Auth/ForgotPassword.php");
            exit();
        }

        $user = getUserByEmail($email);
        if ($user) {
            $_SESSION['user'] = $user;
            header("Location: ../Views/Auth/ChangePassword.php");
            exit();
        } else {
            $_SESSION['err2'] = "Email not found";
            header("Location: Location: ../Views/Auth/ForgotPassword.php");
            exit();
        }
    }
    else {
        header("Location: Location: ../Views/Auth/ForgotPassword.php");
        exit();
    }
?>