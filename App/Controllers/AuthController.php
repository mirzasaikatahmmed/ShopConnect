<?PHP
session_start();
require_once '../Models/User.php';

function validateEmail($email) {
    return preg_match('/^[\w\.-]+@[\w\.-]+\.\w+$/', $email);
}

function validatePassword($password) {
    return preg_match('/^(?=.*[A-Za-z])(?=.*\d).{8,}$/', $password);
}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $remember = isset($_POST['remember']) ? true : false;

        if (!validateEmail($email)) {
            $_SESSION['error'] = 'Invalid email format.';
            header('Location: ../Views/Auth/Login.php');
            exit();
        }
        $user = getUser($email);

        if ($user && $password === $user['password']) {
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['role'] = $user['role'];

            if ($remember) {
                setcookie('user_id', $user['user_id'], time() + (86400 * 30), "/");
            }

            if ($user['role'] === 'admin') {
                header('Location: ../Views/Admin/Dashboard.php');
            } else {
                header('Location: ../Views/Common/Dashboard.php');
            }
            exit();
        } else {
            $_SESSION['error'] = 'Invalid email or password.';
            header('Location: ../Views/Auth/Login.php');
            exit();
        }
    }

    if (isset($_POST['register'])) {
        $name = trim($_POST['name']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);
        $role = $_POST['role'];
        $profileImage = $_FILES['profile_image'];

        if (!validateEmail($email)) {
            $_SESSION['error'] = 'Invalid email format.';
            header('Location: ../Views/Auth/Registration.php');
            exit();
        }

        if (!validatePassword($password)) {
            $_SESSION['error'] = 'Password must be at least 8 characters long, contain at least one letter and one number.';
            header('Location: ../Views/Auth/Registration.php');
            exit();
        }

        $targetDir = '../../Public/Uploads/Users/';
        $uniqueFileName = uniqid() . '_' . basename($profileImage['name']);
        $targetFile = $targetDir . $uniqueFileName;
        $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if ($profileImage['size'] > 5000000) {
            $_SESSION['error'] = 'Sorry, your file is too large.';
            $uploadOk = 0;
        }
        if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
            $_SESSION['error'] = 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.';
            $uploadOk = 0;
        }

        if ($uploadOk && move_uploaded_file($profileImage['tmp_name'], $targetFile)) {
            $inserted = createUser($name, $email, $password, $role, $uniqueFileName);

            if ($inserted) {
            header('Location: ../Views/Auth/Login.php');
            exit();
            } else {
            $_SESSION['error'] = 'Registration failed. Please try again.';
            header('Location: ../Views/Auth/Registration.php');
            exit();
            }
        } else {
            header('Location: ../Views/Auth/Registration.php');
            exit();
        }
    }
}

?>