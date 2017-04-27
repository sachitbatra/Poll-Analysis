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
  ?>

<div id="resultDiv">

<table id="resultsConstTable">
  <tr>
      <th> Party ID </th>
      <th> Party </th>
      <th> Constituency ID </th>
      <th> Constituency </th>
      <th> No of Votes </th>
  </tr>
  <tbody>
       <?php
         while( $row = mysql_fetch_assoc( $result ) ){
           echo
           "<tr>
             <td>{$row['party_id']}</td>
             <td>{$row['party']}</td>
             <td>{$row['constituency_id']}</td>
             <td>{$row['constituency']}</td>
             <td>{$row['noVotes']}</td>
           </tr>\n";
         }
         mysql_close($connector);
       ?>
   </tbody>
</table>
</div>

  <pre id="linkBack"><i class="fa fa-home" aria-hidden="true"></i><a  href="landingPage.html"> Home Page </a></pre>
</body>
</html>
