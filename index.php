<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
require_once("dbConnection.php");

// Check database connection
if (!$mysqli) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Fetch data in descending order
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");

if (!$result) {
    die("Database query failed: " . mysqli_error($mysqli));
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Homepage</title>
</head>

<body>

    <h2>Homepage</h2>

    <p>
        <a href="add.php">Add New Data</a>
    </p>

    <table width="80%" border="0">

        <tr bgcolor="#DDDDDD">
            <td><strong>Name</strong></td>
            <td><strong>Age</strong></td>
            <td><strong>Email</strong></td>
            <td><strong>Action</strong></td>
        </tr>

        <?php

        while ($res = mysqli_fetch_assoc($result)) {

            echo "<tr>";

            echo "<td>" . $res['name'] . "</td>";
            echo "<td>" . $res['age'] . "</td>";
            echo "<td>" . $res['email'] . "</td>";

            echo "<td>";
            echo "<a href=\"edit.php?id=" . $res['id'] . "\">Edit</a> | ";
            echo "<a href=\"delete.php?id=" . $res['id'] . "\" onclick=\"return confirm('Are you sure you want to delete?')\">Delete</a>";
            echo "</td>";

            echo "</tr>";
        }

        ?>

    </table>

</body>
</html>