<?php

include "config.php";

if (isset($_POST['update'])) {
    $first_Name = $_POST['Firstname'];
    $user_id = $_POST['Id'];
    $last_Name = $_POST['Lastname'];
    $E_Mail = $_POST['Email'];
    $passwort = $_POST['Passwort'];
    $gender = $_POST['Gender'];

    $sql = "UPDATE User SET 'Firstname' = '$first_Name','Lastname' = '$last_Name','Email'='$E_Mail','Passwort'='$passwort','Gender' = '$gender' WHERE 'Id'='$user_id'"; // Problem
    $result = $conn->query($sql);

    if ($result == TRUE) {
        echo "Record update sucessfully";
    } else {

        echo "Error:". $sql ."</br>" . $conn->error;
    }
}

if (isset($_GET['Id'])) {
    $user_id = $_GET['Id'];

    $sql = "SELECT *FROM User WHERE 'Id'= '$user_id'"; // $sql = "SELECT *FROM 'User' WHERE `Id`= '$user_id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $first_Name = $row['Firstname'];
            $last_Name = $row['Lastname'];
            $E_Mail = $row['Email'];
            $passwort = $row['Passwort'];
            $user_id = $row['Id'];
            $gender = $row['Gender'];
        }

?><!-- 
        <!Doctype html>
        <html>

        <head>
            <title>Update Page </title>
        </head>

        <body> -->

            <h2> User Update Form</h2>
            <form action="" method="POST">
                <fieldset>
                    <legend>Personal Information</legend>
                    Firstname:<br>
                    <input type="text" name="Firstname" value="<?php echo $first_Name; ?>">
                    <input type="hidden" name="Id" value="<?php echo $user_id; ?>">
                    <br>
                    Lastname: <br>
                    <input type="text" name="Lastname" value="<?php echo $last_Name; ?>">
                    Password: <br>
                    <input type="text" name="Passwort" value="<?php echo $passwort; ?>">
                    <br>
                    Email: <br>
                    <input type="text" name="Email" value="<?php echo $E_Mail; ?>">
                    <br>
                    Gender:<br>
                    <input type="radio" name="Gender" value="Male" <?php if ($gender == "Male") {
                                                                        echo "Checked";
                                                                    } ?>>Male
                    <input type="radio" name="Gender" value="Female" <?php if ($gender == "Female") {
                                                                            echo "Checked";
                                                                        } ?>>Female
                    <br><br>
                    <input type="submit" value="Update" name="update">
                </fieldset>
            </form>
        </body>
        </html>

<?php

    } else {
      // this action woul redirected the user on the View page if the Id is not valid 
        header("location: view.php");
    }
}
?>