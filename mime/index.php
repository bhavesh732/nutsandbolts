<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../resources/style.css">
    <link rel="stylesheet" href="style.css">
    <script src="../bootstrap/jquery.min.js"></script>
    <script src="../bootstrap/popper.min.js"></script>
    <script src="../bootstrap/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body id="bod">
    <!-- <video id="bgVideo" autoplay loop poster="">
            <source src="present.mp4" type="video/mp4">
        </video>
         -->
    <button class="navpos" id="circlenav">
        <div id="navdiv"></div>
    </button>

    <button class="tothetop" onclick="topFunction()" id="tothetop" style="display: none;">
        <div id=""></div>
    </button>

    <nav class="navbar">
        <ul type="none">
            <li>
                <!-- <a><img src="mime.png" class="logo"></a> -->
                <strong class="mainspan"><span>MI<span class="logspan">ME</span></span></strong>
                <a href="https://www.instagram.com/nuts_and_bolts_productions/"> <img src="../resources/insta.png" alt="" class="instalogo"> </a>
                <a href="https://www.youtube.cpm/channel/UC65klpXc13tz-rnsZb9UIrg" class="ytlogo"> <img src="../resources/youtube.png" alt="" class="ytlogoimg">
                </a>
            </li>
        </ul>
    </nav>

    <div id="movenav" class="vertnav">
        <div id="butons" class="none">
            <ul type="none" style="width: 100%;" class="hr">
                <li><a href="../index.html">Home</a></li>
                <li><a href="../about/index.html">About Us</a></li>
                <li><a href="../registration/index.php">Upload Your Script Ideas</a></li>
                <li><a href="../mime/index.html">Mime</a></li>
                <li><a href="../proscenium/index.html">Proscenium</a></li>
                <li><a href="../streetplay/index.html">Street Play</a></li>
                <li><a href="../band/index.html">Band</a></li>
                <li><a href="../dance/index.html">Dance</a></li>
                <li><a href="../members/index.html">Members</a></li>
                <li><a href="../upcomingevents/index.html">Upcoming Events</a></li>
            </ul>
        </div>
    </div>

    <div class="container-fluid">

        <?php
        // include('main.php')
        ?>

        <?php
        $servername = "localhost:3308";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=nutsandbolts", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $playdetails = $conn->prepare("SELECT * FROM MIME ORDER BY dateofperfo DESC;");
            // $sql = $dbh->prepare("SELECT * FROM MIME ORDER BY dateofperfo DESC;");
            $playdetails->execute();

            $rowcount = $playdetails->rowCount();

            if ($rowcount > 0) {
                $count = 0;
                while ($playrows = $playdetails->fetch(PDO::FETCH_ASSOC)) {
                    echo    "<div class='col-sm-4'>
                    <a href=\'" . $playrows['playnamenospace'] . "html\'>
                        <div class='row'>
                            <div class='col-sm-12' style=\"background-image: url('')\">
                                <br>
                            </div>
                        </div>
                    </a>
                    <a href=\'" . $playrows['playnamenospace'] . "html\'>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='col'>Directed by :<span>" . $playrows['directorname'] . "</span> </div>
                                <div class='col'>Performed on :<span> " . $playrows['dateofperfo'] . "</span> </div>
                                <div class='col'>Fest :<span>" . $playrows['fest'] . "</span> </div>
                            </div>
                        </div>
                    </a>
                </div>";
                    $count++;
                }
            }
            echo "Data retrieved successfully and count = $count";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        ?>

    </div>

    <footer class="">
        <div class="social-media row">
            <a href="https://www.instagram.com/nuts_and_bolts_productions/">
                <img src="../resources/insta.png" class="instalogo instafooter" alt="Instagram">
            </a>
            <a href="https://www.youtube.com/channel/UC65klpXc13tz-rnsZb9UIrg" class="ytlogo ytfooter"> <img src="../resources/youtube.png" alt="" class="ytlogoimg ytfooter"></a>
        </div>
        <div class="copy">
            Copyright &copy; &lt;NUTS AND BOLTS PRODUCTIONS&gt;. All rights reserved.<br> Created by Media team NUTS AND BOLTS PRODUCTIONS and <a href="https://www.instagram.com/ctrlalt.create_/" style="color: #FFC102;">CTRL+ALT+CREATE</a>
        </div>
    </footer>
    <script src="./main.js"></script>
</body>

</html>