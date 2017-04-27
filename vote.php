<!DOCTYPE html>
<html>
<title> Vote </title>
<head>
  <link rel="stylesheet" href="vote.css">
<style>


#fDiv
{
  border: solid 2px black;
  position: relative;
  top:150px;
  left:400px;

}
</style>


</head>
<body>

    <div id="fDiv">
      <h2> Vote </h2>

        <form method="get" action="voteConfirm.php">
        <input type="text" name="voterId" id="vID" placeholder="Enter Your Voter ID">
        <br>
        <br>
        <input type="text" name="candId" id="cID" placeholder="Enter the candidate ID">
        <br>
        <br>
        <input type="submit">
      </div>
</body>
</html>
