<?php
include "config.php";

$sql = "SELECT *FROM User";

$result = $conn->query($sql);
?>
<!Doctype html>
<html>

<head>
    <title> View Page </title>
    <link rel="stylesheet" href="assests/css/bootstrap.min.css">
    <link rel="stylesheet" href="assests/css/styles.css">
</head>

<body>
    <div class="container">
        <h2>Users</h2>
        <table class="table">

            <head>
                <tr>
                    <th>Id</th>
                    <th>Firstname</th>
                    <th>Lastname</th>
                    <th>Email</th>
                    <th>Gender</th>
                    <th>Passwort</th>
                    <th>Action</th>
                </tr>
                </thread>
                <tbody>

                    <?php

                    if ($result->num_rows > 0) {

                        while ($row = $result->fetch_assoc()) {

                    ?>
                            <tr>
                                <td><?php echo $row["Id"]; ?></td>
                                <td><?php echo $row["Firstname"]; ?></td>
                                <td><?php echo $row["Lastname"]; ?></td>
                                <td><?php echo $row["Email"]; ?></td>
                                <td><?php echo $row["Gender"]; ?></td>
                                <td><?php echo $row["Passwort"]; ?></td>
                                <td><a class="btn btn-info" href="Update.php?id=<?php echo $row["Id"]; ?>">
                                        Edit</a>&nbsp;<a class="btn btn-danger" href="Delete.php?id=<?php echo $row['Id']; ?>">Delete</a> </td>
                            </tr>
                    <?php }
                    }
                    ?>

                </tbody>
        </table>
    </div>
</body>

</html>