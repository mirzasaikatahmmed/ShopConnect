<?PHP
    session_start();
    session_destroy();
    header('Location: ../Views/Auth/Login.php');
    exit();
?>