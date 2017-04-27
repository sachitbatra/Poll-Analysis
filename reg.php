<!DOCTYPE html>
<html>
<title> Election Commission of India </title>
<head>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="font-awesome/font-awesome/css/font-awesome.min.css">

</head>
<body>

  <p id="mainHeading"> REGISTRATION </p>

<p id="voterHead"> VOTER </p>
<div id="voterReg">
  <form id="voterForm" method="get" action="voterRegConfirm.php">
    <pre><i class="fa fa-user-circle"></i> <input type="text"  class="inp" placeholder="Enter Your Name" id="voterName" name="name"> </input></pre>
    <pre><i class="fa fa-male" aria-hidden="true"></i> <input type="text" id="gender" class="inp" placeholder="M/F" name="gender"> </pre>

    <pre><i class="fa fa-home" aria-hidden="true"></i> <select  class="inp" type="text" placeholder="Enter your Constituency ID" id="constID" name="conID">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";

            $connector = mysql_connect($host,$username,$password);
            $selected = mysql_select_db("elecanalysis", $connector);

            $sql = "SELECT constituency_id FROM constituency";
            $result = mysql_query($sql);

            while ($row=mysql_fetch_assoc($result))
            {
                $title=$row['constituency_id'];
                echo "<option>$title</option>";
            }
        ?>
    </select></pre>

    <pre><i class="fa fa-clock-o" aria-hidden="true"></i> <input type="date" class="inp"  placeholder="Enter Your Date OF Birth" id="dob" name="dob"> </input></pre>
  <input class="inp" type="Submit" id="sub"> </submit>
  </form>
</div>

<p id="candHead"> CANDIDATE </p>
<div id="candidateReg">
  <form id="candidateForm" method="get" action="candidateReg.php">
    <pre><i class="fa fa-user-circle"></i> <input type="text"  class="inp" placeholder="Enter Your Name" id="candName" name="candName"> </input></pre>
    <pre><i class="fa fa-male" aria-hidden="true"></i> <input type="text" id="gender" class="inp" placeholder="M/F" name="gender"> </pre>

    <pre><i class="fa fa-home" aria-hidden="true"></i> <select  class="inp" placeholder="Enter your Constituency ID" id="constID" name="constID">
        <?php
            $servername = "localhost";
            $username = "root";
            $password = "";

            $conn = mysqli_connect($servername, $username, $password, "elecanalysis");

            $sql = "SELECT constituency_id FROM constituency";
            $result = mysql_query($sql);

            while ($row=mysql_fetch_array($result))
            {
                $title=$row["constituency_id"];
                echo "<option>
                        $title
                    </option>";
            }
        ?>
    </select>
    </pre>

    <pre><i class="fa fa-users" aria-hidden="true"></i> <input type="text" class="inp"  placeholder="Enter Your Party ID" id="pid" name="party"> </input></pre>
    <input class="inp" type="Submit" id="sub"> </submit>
  </form>
</div>
  <pre id="linkBack"><i class="fa fa-home" aria-hidden="true"></i><a  href="landingPage.html"> Home Page </a></pre>

</body>

</html>
