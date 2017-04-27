<!DOCTYPE html>
<html>
<title> Registration Voter </title>
<head>
</head>
<body>

    <?php


    $host = "localhost";
    $username = "root";
    $password = "";

    $conn = mysql_connect($host,$username,$password);
    $selected = mysql_select_db("elecanalysis", $conn);    extract($_GET);

        $v=$_GET['voterId'];
        $c=$_GET['candId'];

        $sql = "SELECT b.constituency_id FROM voter b WHERE b.voter_id='$v'";
        $result = mysql_query($sql);
        if($result==false)
        {
          die(mysql_error());
        }
        while ($row=mysql_fetch_assoc($result))
        {
            $vconId=$row['constituency_id'];
        }

        $sql = "SELECT c.constituency_id FROM candidate c
                            WHERE c.c_id = '$c'";
        $result = mysql_query($sql);

        while ($row=mysql_fetch_assoc($result))
        {
            $cconId=$row['constituency_id'];
        }

        if ($vconId == $cconId)
        {
            $sql = "INSERT INTO vote_bank VALUES ('$v', '$c')";
              if (mysql_query($sql))
            {
                echo "Insertion Successful. <br>";
            }

            else
            {
                echo "Error in insertion: " . mysql_error($conn);
            }
        }

        else
        {
            echo"Invalid constituency.";
        }
    ?>

</body>
</html>
