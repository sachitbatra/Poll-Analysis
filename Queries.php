<?php
            $servername = "localhost";
            $username = "root";
            $password = "";

            $conn = mysqli_connect($servername, $username, $password, "elecanalysis");

            if (!$conn) 
            {
                echo "Linking to Database file. <br>";
                require 'Database.php';
            }
            
            $sql = "SELECT COUNT(a.c_id), b.name FROM vote_bank a, candidate b WHERE a.c_id = b.c_id GROUP BY a.c_id";

            if (mysqli_query($conn, $sql)) 
            {
                echo "Query Executed. <br>";
            }

            else 
            {
                echo "Error in Query: " . mysqli_error($conn);
            }

            $sql = "SELECT a.name, b.name FROM district a, state b WHERE a.state_id = b.state_id";

            if (mysqli_query($conn, $sql)) 
            {
                echo "Query Executed. <br>";
            }

            else 
            {
                echo "Error in Query: " . mysqli_error($conn);
            }

            $sql = "SELECT constituency FROM constituency_votes HAVING COUNT(party_id) = 3 GROUP BY constituency_id" ;

            if (mysqli_query($conn, $sql)) 
            {
                echo "Query Executed. <br>";
            }

            else 
            {
                echo "Error in Query: " . mysqli_error($conn);
            }

            $sql = "SELECT party_id, party, MAX(seats) FROM win_party_seats" ;

            if (mysqli_query($conn, $sql)) 
            {
                echo "Query Executed. <br>";
            }

            else 
            {
                echo "Error in Query: " . mysqli_error($conn);
            }
?>