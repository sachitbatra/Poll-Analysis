<!DOCTYPE html>
<html>
<title> Voter Update </title>
<head>
</head>
<body>

    <?php
    $host = "localhost";
    $username = "root";
    $password = "";

    $conn = mysql_connect($host,$username,$password);
    $selected = mysql_select_db("elecanalysis", $conn);
            extract($_GET);

        $voterid = $_GET['voterid'];
        $name=$_GET['name'];
        $gender=$_GET['gender'];
        $conId=$_GET["conID"];
        $dob=$_GET['dob'];

        $query = "SELECT constituency_id FROM voter WHERE voter_id = '$voterid'";

        if ($query_run = mysql_query($query))
        {
            $query_row = mysql_fetch_assoc($query_run);
            $dbconId = $query_row['constituency_id'];
        }

        else
        {
        echo (mysql_error());
        }

        if ($dbconId == $conId)
        {
            $sql = "UPDATE voter SET name='$name', sex='$gender', date_of_birth='$dob' WHERE voter_id='$voterid'";

            if (mysql_query( $sql))
            {
                echo "Updated. <br>";
            }

            else
            {
                echo "Error in updating the values: " . mysql_error($conn);
            }
        }

        else
        {
            $sql ="DELETE FROM voter WHERE voter_id='$voterid'";

            if (mysql_query( $sql))
            {
                echo "Deleted. <br>";
            }

            else
            {
                echo "Error in deleting the values: " . mysql_error($conn);
            }

            $sql = "INSERT INTO voter(voter_id, name, sex, date_of_birth, constituency_id) VALUES ('$voterid', '$name', '$gender', '$dob', '$conId')";

            if (mysql_query($sql))
            {
                echo "Insertion Successful. <br>";
            }

            else
            {
                echo "Error in insertion: " . mysql_error($conn);
            }
        }
    ?>

</body>
</html>
