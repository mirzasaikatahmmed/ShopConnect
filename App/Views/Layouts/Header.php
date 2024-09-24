<?php 
    session_start();
    include_once '../../Models/Database.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../Public/Assets/CSS/Style.css">
    <style>
        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {
            background-color: #4CAF50;
            color: white;
            padding: 16px;
            font-size: 16px;
            border: none;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
            z-index: 1;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown:hover .dropbtn {
            background-color: #3e8e41;
        }
    </style>
    <title>ShopConnect</title>
</head>
<body>
    <header class="header">
        <div class="logo">
            <h1>ShopConnect</h1>
        </div>
        <div class="user-info">
            <?php if (isset($_SESSION['user_id'])): ?>
                <?php
                $conn = getConnection();
                    if (isset($conn)) {
                        $userId = $_SESSION['user_id'];
                        $query = "SELECT name FROM users WHERE user_id = ?";
                        $stmt = $conn->prepare($query);
                        $stmt->bind_param("i", $userId);
                        $stmt->execute();
                        $stmt->bind_result($name);
                        $stmt->fetch();
                        $stmt->close();
                        echo "<span>Welcome, " . htmlspecialchars($name) . "</span>";
                    } else {
                        echo "<span>Database connection error</span>";
                    }
                ?>
                <span>&nbsp;</span>
                <div class="nav-links">
                    <div class="dropdown">
                        <button class="dropbtn">Account</button>
                        <div class="dropdown-content">
                            <a href="../Common/Profile.php">Profile</a>
                            <a href="../Auth/ChangePassword.php">Change Password</a>
                            <a href="../../Controllers/LogoutController.php">Logout</a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </header>
</body>
</html>
