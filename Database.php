<?php
/*Connecting to MySQL Server*/

            $conn = new mysqli($servername, $username, $password);

            if ($conn->connect_error)
            {
                die("Connection failed: " . $conn->connect_error);
            }

/*Creating the Database*/

            $sql = "DROP DATABASE elecanalysis";

            if ($conn->query($sql) === TRUE)
            {
                echo "Database deleted successfully <br>";
            }

            else
            {
                echo "Error deleting database: " . $conn->error;
            }

            $sql = "CREATE DATABASE elecanalysis";

            if ($conn->query($sql) === TRUE)
            {
                echo "Database created successfully <br>";
            }

            else
            {
                echo "Error creating database: " . $conn->error;
            }

            $conn = mysqli_connect($servername, $username, $password, "elecanalysis");

            if (!$conn)
            {
                die("Connection failed: " . mysqli_connect_error());
            }


/*Creating the tables in the database*/

            $sql = "DROP TABLE candidate";

            if ($conn->query($sql) === TRUE)
            {
                echo "Table deleted successfully <br>";
            }

            else
            {
                echo "Error deleting table: " . $conn->error;
            }

            $sql = "CREATE TABLE candidate
            (
                c_id INTEGER PRIMARY KEY,
                name VARCHAR(60) NOT NULL,
                sex VARCHAR(60) NOT NULL,
                political_party_id INTEGER,
                constituency_id VARCHAR(10) NOT NULL
            )";

            if (mysqli_query($conn, $sql))
            {
                echo "Table Candidate created successfully. <br>";
            }

            else
            {
                echo "Error creating table: " . mysqli_error($conn);
            }

            $sql = "DROP TABLE political_party";

            if ($conn->query($sql) === TRUE)
            {
                echo "Table deleted successfully <br>";
            }

            else
            {
                echo "Error deleting table: " . $conn->error;
            }

            $sql = "CREATE TABLE political_party
            (
                party_id INTEGER PRIMARY KEY,
                name VARCHAR(60) NOT NULL,
                symbol_id INTEGER NOT NULL
            )";

            if (mysqli_query($conn, $sql))
            {
                echo "Table Political Party created successfully. <br>";
            }

            else
            {
                echo "Error creating table: " . mysqli_error($conn);
            }

            $sql = "DROP TABLE symbol";
            if ($conn->query($sql) === TRUE)
            {
                echo "Table deleted successfully <br>";
            }
            else
            {
                echo "Error deleting table: " . $conn->error;
            }

            $sql = "CREATE TABLE symbol
            (
                symbol_id INTEGER PRIMARY KEY,
                image VARCHAR(60) NOT NULL
            )";

            if (mysqli_query($conn, $sql))
            {
                echo "Table Symbol created successfully. <br>";
            }

            else
            {
                echo "Error creating table: " . mysqli_error($conn);
            }

            $sql = "DROP TABLE constituency";
            if ($conn->query($sql) === TRUE)
            {
                echo "Table deleted successfully <br>";
            }
            else
            {
                echo "Error deleting table: " . $conn->error;
            }

            $sql = "CREATE TABLE constituency
            (
                constituency_id VARCHAR(10) PRIMARY KEY,
                name VARCHAR(60) NOT NULL,
                district_id VARCHAR(10) NOT NULL
            )";

            if (mysqli_query($conn, $sql))
            {
                echo "Table Constituency created successfully. <br>";
            }

            else
            {
                echo "Error creating table: " . mysqli_error($conn);
            }

            $sql = "DROP TABLE district";
            if ($conn->query($sql) === TRUE)
            {
                echo "Table deleted successfully <br>";
            }
            else
            {
                echo "Error deleting table: " . $conn->error;
            }

            $sql = "CREATE TABLE district
            (
                district_id VARCHAR(10) PRIMARY KEY,
                name VARCHAR(60) NOT NULL,
                state_id VARCHAR(10) NOT NULL
            )";

            if (mysqli_query($conn, $sql))
            {
                echo "Table District created successfully. <br>";
            }

            else
            {
                echo "Error creating table: " . mysqli_error($conn);
            }

            $sql = "DROP TABLE state";
            if ($conn->query($sql) === TRUE)
            {
                echo "Table deleted successfully <br>";
            }
            else
            {
                echo "Error deleting table: " . $conn->error;
            }

            $sql = "CREATE TABLE state
            (
                state_id VARCHAR(10) PRIMARY KEY,
                name VARCHAR(60) NOT NULL
            )";

            if (mysqli_query($conn, $sql))
            {
                echo "Table State created successfully. <br>";
            }

            else
            {
                echo "Error creating table: " . mysqli_error($conn);
            }

            $sql = "DROP TABLE voter";
            if ($conn->query($sql) === TRUE)
            {
                echo "Table deleted successfully <br>";
            }

            else
            {
                echo "Error deleting table: " . $conn->error;
            }

            $sql = "CREATE TABLE voter
            (
                voter_id INTEGER PRIMARY KEY AUTO_INCREMENT,
                name VARCHAR(60) NOT NULL,
                sex VARCHAR(60) NOT NULL,
                date_of_birth DATE NOT NULL,
                constituency_id VARCHAR(10) NOT NULL
            )";

            if (mysqli_query($conn, $sql))
            {
                echo "Table Voter created successfully. <br>";
            }

            else
            {
                echo "Error creating table: " . mysqli_error($conn);
            }

            $sql = "DROP TABLE vote_bank";
            if ($conn->query($sql) === TRUE)
            {
                echo "Table deleted successfully <br>";
            }
            else
            {
                echo "Error deleting table: " . $conn->error;
            }

            $sql = "CREATE TABLE vote_bank
            (
                voter_id INTEGER NOT NULL,
                c_id INTEGER,
                PRIMARY KEY(voter_id, c_id)
            )";

            if (mysqli_query($conn, $sql))
            {
                echo "Table Vote_Bank created successfully. <br>";
            }

            else
            {
                echo "Error creating table: " . mysqli_error($conn);
            }

/*Adding foreign keys to the tables in the database*/

            $sql = "ALTER TABLE candidate
                    ADD FOREIGN KEY (political_party_id) REFERENCES political_party(party_id),
                    ADD FOREIGN KEY (constituency_id) REFERENCES constituency(constituency_id)
            ";

            if (mysqli_query($conn, $sql))
            {
                echo "Candidate Foreign Key Added Successfully. <br>";
            }

            else
            {
                echo "Error Adding Foreign Key: " . mysqli_error($conn);
            }

            $sql = "ALTER TABLE political_party
                    ADD FOREIGN KEY (party_id) REFERENCES symbol(symbol_id)
            ";

            if (mysqli_query($conn, $sql))
            {
                echo "Political Party Foreign Key Added Successfully. <br>";
            }

            else
            {
                echo "Error Adding Foreign Key: " . mysqli_error($conn);
            }

            $sql = "ALTER TABLE constituency
                    ADD FOREIGN KEY (district_id) REFERENCES district(district_id)
            ";

            if (mysqli_query($conn, $sql))
            {
                echo "Constituency Foreign Key Added Successfully. <br>";
            }

            else
            {
                echo "Error Adding Foreign Key: " . mysqli_error($conn);
            }

            $sql = "ALTER TABLE district
                    ADD FOREIGN KEY (state_id) REFERENCES state(state_id)
            ";

            if (mysqli_query($conn, $sql))
            {
                echo "District Foreign Key Added Successfully. <br>";
            }

            else
            {
                echo "Error Adding Foreign Key: " . mysqli_error($conn);
            }

            $sql = "ALTER TABLE voter
                    ADD FOREIGN KEY (constituency_id) REFERENCES constituency(constituency_id)
            ";

            if (mysqli_query($conn, $sql))
            {
                echo "Voter Foreign Key Added Successfully. <br>";
            }

            else
            {
                echo "Error Adding Foreign Key: " . mysqli_error($conn);
            }

            $sql = "ALTER TABLE vote_bank
                    ADD FOREIGN KEY (voter_id) REFERENCES voter(voter_id) ON DELETE CASCADE,
                    ADD FOREIGN KEY (c_id) REFERENCES candidate(c_id) ON DELETE CASCADE
            ";

            if (mysqli_query($conn, $sql))
            {
                echo "Vote_Bank Foreign Key Added Successfully. <br>";
            }

            else
            {
                echo "Error Adding Foreign Key: " . mysqli_error($conn);
            }

/*Creating Views*/

            $sql = "CREATE VIEW candidate_votes AS SELECT b.c_id, b.name 'candidate', c.party_id, c.name 'party', d.constituency_id, d.name 'constituency', e.district_id, e.name 'district', f.state_id, f.name 'state', COUNT(a.c_id) 'votes' FROM vote_bank a, candidate b, political_party c, constituency d, district e, state f WHERE a.c_id = b.c_id AND b.political_party_id = c.party_id AND b.constituency_id = d.constituency_id AND d.district_id = e.district_id AND e.state_id = f.state_id GROUP BY a.c_id";

            if (mysqli_query($conn, $sql))
            {
                echo "Candidate Votes View Created. <br>";
            }

            else
            {
                echo "Error in View Creation (Candidate Votes): " . mysqli_error($conn);
            }

            $sql = "CREATE VIEW party_votes AS SELECT party_id, party, SUM(votes) 'votes' FROM candidate_votes GROUP BY party_id";

            if (mysqli_query($conn, $sql))
            {
                echo "Party Votes View Created. <br>";
            }

            else
            {
                echo "Error in View Creation (Party Votes): " . mysqli_error($conn);
            }

            $sql = "CREATE VIEW constituency_votes AS SELECT party_id, party, constituency_id, constituency, SUM(votes) 'votes' FROM candidate_votes GROUP BY party_id, constituency_id";

            if (mysqli_query($conn, $sql))
            {
                echo "Constituency Votes View Created. <br>";
            }

            else
            {
                echo "Error in View Creation (Constituency Votes): " . mysqli_error($conn);
            }

            $sql = "CREATE VIEW district_votes AS SELECT party_id, party, district_id, district, SUM(votes) 'votes' FROM candidate_votes GROUP BY party_id, district_id";

            if (mysqli_query($conn, $sql))
            {
                echo "District Votes View Created. <br>";
            }

            else
            {
                echo "Error in View Creation (District Votes): " . mysqli_error($conn);
            }

            $sql = "CREATE VIEW state_votes AS SELECT party_id, party, state_id, state, SUM(votes) 'votes' FROM candidate_votes GROUP BY party_id, state_id";

            if (mysqli_query($conn, $sql))
            {
                echo "State Votes View Created. <br>";
            }

            else
            {
                echo "Error in View Creation (State Votes): " . mysqli_error($conn);
            }

            $sql = "CREATE VIEW win_constituency AS SELECT party_id, party, constituency_id, constituency, MAX(votes) 'votes' FROM constituency_votes GROUP BY constituency_id";

            if (mysqli_query($conn, $sql))
            {
                echo "Win Constituency View Created. <br>";
            }

            else
            {
                echo "Error in View Creation (Win Constituency): " . mysqli_error($conn);
            }

            $sql = "CREATE VIEW win_party_seats AS SELECT party_id, party, COUNT(constituency_id) 'seats' FROM win_constituency GROUP BY party_id";

            if (mysqli_query($conn, $sql))
            {
                echo "Win Party Seats View Created. <br>";
            }

            else
            {
                echo "Error in View Creation (Win Party Seats): " . mysqli_error($conn);
            }
?>
