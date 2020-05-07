<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<?php
$servername = "localhost:3308";
$username = "root";
$password = "";
$dbName = "nutsandbolts";

$conn = new mysqli($servername, $username, $password, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "";
}

$playtype = $_GET['playtype'];

?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/css/style.css">
    <link rel="stylesheet" href="./resources/css/mime.css">
    <link rel="stylesheet" href="./resources/css/theme.css">
    <link rel="stylesheet" href="./resources/css/theme2.css">
    <script src="./resources/javascripts/jquery.min.js"></script>
    <script src="./resources/javascripts/popper.min.js"></script>
    <script src="./resources/javascripts/bootstrap.min.js"></script>
    <title>N&B</title>
</head>

<body id="bod">

    <button class="tothetop" onclick="topFunction()" id="tothetop" style="display: none;">
        <div id=""></div>
    </button>

    <nav class="navbar">
        <button class="navpos" id="circlenav">
            <div id="navdiv"></div>
        </button>
        <ul type="none">
            <li>
                <?php
                $sql2 = "SELECT * FROM MIME WHERE playtype = '$playtype' LIMIT 1;";
                $playdetails2 = $conn->query($sql2);
                if (isset($playdetails2->num_rows) && $playdetails2->num_rows > 0) {
                    while ($playrows = $playdetails2->fetch_assoc()) {
                        echo "<strong class='mainspan'><span>" . $playrows['word1'] . "<span class='logspan'>" . $playrows['word2'] . "</span></span></strong>";
                    }
                }
                ?>
                <a href="https://www.instagram.com/nuts_and_bolts_productions/"> <img src="./resources/images/insta.png" alt="" class="instalogo"> </a>
                <a href="https://www.youtube.cpm/channel/UC65klpXc13tz-rnsZb9UIrg" class="ytlogo"> <img src="./resources/images/youtube.png" alt="" class="ytlogoimg">
                </a>
            </li>
        </ul>
    </nav>

    <div id="movenav" class="vertnav">
        <div id="butons" class="none">
            <ul type="none" style="width: 100%;" class="hr">
                <li><a href="./index.html">Home</a></li>
                <li><a href="./about/index.html">About Us</a></li>
                <li><a href="./registration/index.php">Upload Your Script Ideas</a></li>
                <li><a href="template.php?playtype=Mime">Mime</a></li>
                <li><a href="template.php?playtype=Proscenium">Proscenium</a></li>
                <li><a href="template.php?playtype=Street%20Play">Street Play</a></li>
                <li><a href="template.php?playtype=Band">Band</a></li>
                <li><a href="template.php?playtype=Dance">Dance</a></li>
                <li><a href="template.php?playtype=Members">Members</a></li>
                <li><a href="template.php?playtype=Upacoming%20Events">Upcoming Events</a></li>
            </ul>
        </div>
    </div>

    <div class="container-fluid">

        <?php
        $sql = "SELECT * FROM MIME WHERE playtype = '$playtype' ORDER BY dateofperfo DESC;";
        $playdetails = $conn->query($sql);

        if (isset($playdetails->num_rows) && $playdetails->num_rows > 0) {
            $count = 0;
            while ($playrows = $playdetails->fetch_assoc()) {
                echo    "<a href='playtemplate.php?playname=". $playrows['playnamenospace'] ."&playtype=".$playrows['playtype']."' class='col-sm-6'>
                <div class='container-fluid'>
                    <div class='row'>
                        <div class='col-sm-12'>
                            <h1>".$playrows['playname']."</h1>
                        </div>
                        <div class='col-sm-12'>
                            <div class='col'>Directed by :<span>" . $playrows['directorname'] . "</span> </div>
                            <div class='col'>Performed on :<span> " . $playrows['dateofperfo'] . "</span> </div>
                            <div class='col'>Fest :<span>" . $playrows['fest'] . "</span> </div>
                        </div>
                    </div>
                </div>
            </a>";
                $count++;
            }
        }
        echo "";
        ?>

    </div>

    <footer style="position: static">
        <div class="social-media row">
            <a href="https://www.instagram.com/nuts_and_bolts_productions/">
                <img src="./resources/images/insta.png" class="instalogo instafooter" alt="Instagram">
            </a>
            <a href="https://www.youtube.com/channel/UC65klpXc13tz-rnsZb9UIrg" class="ytlogo ytfooter"> <img src="./resources/images/youtube.png" alt="" class="ytlogoimg ytfooter"></a>
        </div>
        <div class="copy">
            Copyright &copy; &lt;NUTS AND BOLTS PRODUCTIONS&gt;. All rights reserved.<br> Created by Media team NUTS AND BOLTS PRODUCTIONS and <a href="https://www.instagram.com/ctrlalt.create_/" style="color: #FFC102;">CTRL+ALT+CREATE</a>
        </div>
    </footer>
    <script src="./resources/javascripts/main.js"></script>
</body>

</html>