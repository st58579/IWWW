<div class="container" id="nav-container">
    <div class="navbar">
        <div class="logo">
            <img src="./images/logo.png" width="70px" alt="" class="rotate">
        </div>
        <nav>
            <ul id="menu-items">
                <?php
                if (isset($_SESSION['user'])) {
                    if (isset($_SESSION['user']['role'])) {
                        if ($_SESSION['user']['role'] === 'admin') {
                            echo '<li><a href="index.php?dir=page&page=crud">CRUD</a></li>';
                            echo '<li><a href="index.php?dir=page&page=orders">Orders</a></li>';
                        }
                    }
                    echo '<li><a href="index.php?dir=page&page=home">Home</a></li>';
                    echo '<li><a href="index.php?dir=page&page=profile">Profile</a></li>';
                    echo '<li><a href="index.php?dir=page&page=products&sorting=default&pageNum=1">Shop</a></li>';
                                  echo '<li><a href="index.php?dir=page&page=cart">Cart</a></li>';
                } else {
                    echo '<li><a href="index.php?dir=page&page=login" >Login</a></li>';
                    echo '<li><a href="index.php?dir=page&page=register">Register</a></li>';
                }
                echo '<img src="./images/hamburger_icon.png" class="menu-icon" onclick="menutoggle()" alt="">';
                ?>
            </ul>
        </nav>
    </div>
</div>
<script>
    var MenuItems = document.getElementById("menu-items");
    MenuItems.style.maxHeight = "0px";

    function menutoggle() {
        if (MenuItems.style.maxHeight === "0px") {
            MenuItems.style.maxHeight = "200px";
        } else {
            MenuItems.style.maxHeight = "0px"
        }
    }
</script>