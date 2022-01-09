<?php

include "config.php";

if (isset($_GET["Id"])) {
    $user_id = $_GET["Id"];

    $sql = "DELETE FROM User WHERE User.'Id'='$user_Id'";
    //$sql1 = "DELETE FROM `User` WHERE `User`.`Id` = '$user_id'"; // zu überprüfen 
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record deleted Succesfully";
    } else {
        echo "Error:" .$sql. "<br>" .$conn->error;
    }
}
?>
<!-- 
<!Doctype html>
<html>

<head>
    <title>Delete Page</title>
</head>

<body>
    <h2>Delete</h2>
</body>

</html> -->