<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
}
require_once "../core/connect.php";
include "navbar.php";


if (isset($connect)) {
    $sql = "SELECT id, full_name, login, email, avatar, role FROM users order by id";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        if (isset($_SESSION['message'])) {
            echo '<p class="msg">' . $_SESSION['message'] . '</p>';
            unset($_SESSION['message']);
        }
        echo "<div class='flexbox'>";
        echo "<table>";
        echo "<tr class='admin'>";
        echo "<th>id</th>";
        echo "<th>full name</th>";
        echo "<th>login</th>";
        echo "<th>email</th>";
        echo "<th>avatar</th>";
        echo "<th>role</th>";
        echo "<th>edit</th>";
        echo "<th>permissions</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr class='admin'>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['full_name'] . "</td>";
            echo "<td>" . $row['login'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['avatar'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            if ($row['id'] != $_SESSION['user']['id']) {
                echo "<td><a href='edit_user.php?userid=" . $row['id'] . "'>Edit</a></td>";
                echo "<td><a href='../core/grant_perm.php?userid=" . $row['id'] . "'>Grant permission</a></td>";
            } else {
                echo "<td></td>";
                echo "<td></td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        echo "</div>";
        mysqli_free_result($result);
    } else {
        echo "No data found.";
    }
}