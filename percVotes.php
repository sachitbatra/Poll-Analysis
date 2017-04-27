<!DOCTYPE html>
<html>
<title> Results Constituency </title>
<head>
  <link rel="stylesheet" href="resultsConstituency.css">
</head>

<body>
  <p> Constituency Results </p>
  <?php

  $username = "root";
  $password = "";
  $host = "localhost";

  $connector = mysql_connect($host,$username,$password);
  $selected = mysql_select_db("elecanalysis", $connector);
  $candidate_votes=mysql_query("SELECT b.c_id, b.name 'candidate', c.party_id, c.name 'party', d.constituency_id, d.name 'constituency', e.district_id, e.name 'district', f.state_id, f.name 'state', COUNT(a.c_id) 'votes' FROM vote_bank a, candidate b, political_party c, constituency d, district e, state f WHERE a.c_id = b.c_id AND b.political_party_id = c.party_id AND b.constituency_id = d.constituency_id AND d.district_id = e.district_id AND e.state_id = f.state_id GROUP BY a.c_id");
  $result = mysql_query("SELECT party_id, party, constituency_id, constituency, SUM(votes) 'noVotes' FROM candidate_votes GROUP BY party_id, state_id");
  $sql = "SELECT party_id, party, MAX(seats) FROM win_party_seats" ;
  $sqlr=mysql_query('$sql');
  $partyIDWin=$sqlr['party_id'];
  $pvotes = "CREATE VIEW party_votes AS SELECT party_id, party, SUM(votes) 'votes' FROM candidate_votes GROUP BY party_id";
  $pvotesResult=mysql_query('$pvotes');
  ?>

<div id="resultDiv">
    <p> The percentage of Votes recieved by the winning are </p>
       <?php
        $sumVotes=0;
         while( $row = mysql_fetch_assoc( $pvotesResult ) ){
           if($row['party_id']==$partyIDWin)
           {
             $noOfVotes=$row['votes'];
           }
         }
         while( $row = mysql_fetch_assoc( $pvotesResult ) ){
           $sumVotes=$sumVotes+$row['votes'];
         }

         $perc=($noOfVotes*100/$sumVotes);
         echo"<h2>$perc</h2>";
         mysql_close($connector);
       ?>

</div>

  <pre id="linkBack"><i class="fa fa-home" aria-hidden="true"></i><a  href="landingPage.html"> Home Page </a></pre>
</body>
</html>
