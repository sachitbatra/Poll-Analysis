<!DOCTYPE html>
<html>
<title> Registration Voter </title>
<head>
</head>
<body>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = mysqli_connect($servername, $username, $password, "elecanalysis");
    
        extract($_GET);

        $name=$_GET['name'];
        $gender=$_GET['gender'];
        $conId=$_GET["conID"];
        $dob=$_GET['dob'];
    
        $sql = "INSERT INTO voter(name, sex, date_of_birth, constituency_id) VALUES ('$name', '$gender', '$dob', '$conId')";

        if (mysqli_query($conn, $sql)) 
        {
            echo "Insertion Successful. <br>";
        }

        else 
        {
            echo "Error in insertion: " . mysqli_error($conn);
        }
    ?>

</body>
</html>
