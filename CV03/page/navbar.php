<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/main.css" <?php echo time(); ?>>
</head>

<body>
<nav>
    <div>
        <label class="logo">Label</label>
    </div>
    <div>
        <ul>
            <?php
            if(isset($_SESSION['user'])) {
                if(isset($_SESSION['user']['role'])){
                    if($_SESSION['user']['role'] === 'admin') {
                        echo '<li><a href="crud.php">CRUD</a></li>';
                    }
                }
                echo '<li><a href="home.php">Home</a></li>';
                echo '<li><a href="about.php">About</a></li>';
                echo '<li><a href="profile.php">Profile</a></li>';
            }
            if (!isset($_SESSION['user'])) {
                echo '<li><a href = "login.php" > Login</a></li>';
                echo '<li><a href="register.php">Register</a></li>';
            }
            ?>

        </ul>
    </div>
</nav>
</body>
