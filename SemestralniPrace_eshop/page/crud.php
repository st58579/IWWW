<?php
if (!isset($_SESSION['user'])) {
    header('Location: index.php');
}


$connect = Connection::getConnectionInstance();
$sql = "SELECT idUser, firstName, secondName, login, email, city, image, phone, role FROM eshop.user order by idUser";
$result = mysqli_query($connect, $sql);
if (mysqli_num_rows($result) > 0) {
    if (isset($_SESSION['message'])) {
        echo '<p class="msg">' . $_SESSION['message'] . '</p>';
        unset($_SESSION['message']);
    }
    echo"<div class='small-container'>";
    echo "<div class='flexbox'>";
    echo "<table>";
    echo "<tr class='admin'>";
    echo "<th>id</th>";
    echo "<th>name</th>";
    echo "<th>surname</th>";
    echo "<th>login</th>";
    echo "<th>email</th>";
    echo "<th>city</th>";
    echo "<th>phone</th>";
    echo "<th>avatar</th>";
    echo "<th>role</th>";
    echo "<th>edit</th>";
    echo "<th>permissions</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_array($result)) {
        echo "<tr class='admin'>";
        echo "<td>" . $row['idUser'] . "</td>";
        echo "<td>" . $row['firstName'] . "</td>";
        echo "<td>" . $row['secondName'] . "</td>";
        echo "<td>" . $row['login'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['city'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        if (isset($row['image'])) {
            echo "<td>" . $row['image'] . "</td>";
        } else {
            echo "<td></td>";
        }
        echo "<td>" . $row['role'] . "</td>";
        if ($row['idUser'] != $_SESSION['user']['id']) {
            echo "<td><a href='index.php?dir=page&page=edit_user&userid=" . $row['idUser'] . "'>Edit</a></td>";
            echo "<td><a href='index.php?dir=core&page=grant_perm&userid=" . $row['idUser'] . "'>Grant permission</a></td>";
        } else {
            echo "<td></td>";
            echo "<td></td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    echo "</div>";
    echo'</div>';
    mysqli_free_result($result);
} else {
    echo "No data found.";
}
