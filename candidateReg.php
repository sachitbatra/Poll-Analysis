<!DOCTYPE html>
<html>
<title> Registration Candidate </title>
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
        $conId=$_GET["constID"];
        $party=$_GET['party'];

        $sql = "INSERT INTO candidate(name, sex, political_party_id, constituency_id) VALUES ('$name', '$gender', '$party', '$conId')";

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
