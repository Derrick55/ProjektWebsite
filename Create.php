<?php

include "config.php";

if (isset($_POST['submit'])) {
    $first_Name = $_POST['Firstname'];
    $last_Name = $_POST['Lastname'];
    $E_Mail = $_POST['Email'];
    $gender = $_POST['Gender'];
    $Passwort = password_hash($_POST['Passwort'],PASSWORD_DEFAULT);
}

$sql = "INSERT INTO User (Firstname,Lastname,Email,Gender,Passwort) VALUES ('$first_Name','$last_Name','$E_Mail','$gender','$Passwort')";
$result = $conn->query($sql);
if ($result == TRUE) {
    echo 'new record Created succesfully';
} else {
    echo " Error " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

<!Doctype html>
<html>

<head>
    <title> Create Page</title>
</head>

<body>
    <h2> Signup Form</h2>
    <form action="" method="POST">
        <fieldset>
            <legend> Personal Information:</legend>
            Firstname:<br>
            <input type="text" name="Firstname">
            <br>
            Lastname: <br>
            <input type="text" name="Lastname">
            <br>
            Emai: <br>
            <input type="text" name="Email">
            <br>
            Passwort: <br>
            <input type="password" name="Passwort"> <!-- a revoir le type de passwort -->
            <br>
            Gender: <br>
            <input type="radio" name="Gender" value="Male"> male
            <input type="radio" name="Gender" value="Female"> Female
            <br><br>
            <input type="submit" name="submit" value="submit">
        </fieldset>
    </form>
</body>

</html>