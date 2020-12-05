<nav>
    <div>
        <label class="logo">Label</label>
    </div>
    <div>
        <ul>
            <?php
            if (isset($_SESSION['user'])) {
                if (isset($_SESSION['user']['role'])) {
                    if ($_SESSION['user']['role'] === 'admin') {
                        echo '<li><a href="index.php?dir=page&page=crud">CRUD</a></li>';
                    }
                }
                //  echo '<li><a href="home.php">Home</a></li>';
                // echo '<li><a href="about.php">About</a></li>';
                echo '<li><a href="index.php?dir=page&page=profile">Profile</a></li>';
                echo '<li><a href="index.php?dir=page&page=shop">Shop</a></li>';
                echo '<li><a href="index.php?dir=page&page=cart">Cart</a></li>';
            } else {
                echo '<li><a href = "index.php?dir=page&page=login" >Login</a></li>';
                echo '<li><a href="index.php?dir=page&page=register">Register</a></li>';
            }
            ?>
        </ul>
    </div>
</nav>