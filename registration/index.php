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

    <nav class="navbar">
        <ul type="none">
            <li>
                <!-- <a><img src="mime.png" class="logo"></a> -->
                <strong class="mainspan"><span>REGISTR<span class="logspan">ATIONS</span></span></strong>
                <a href="instagram.com"> <img src="../resources/insta.png" alt="" class="instalogo"> </a>
                <a href="instagram.com" class="ytlogo"> <img src="../resources/youtube.png" alt="" class="ytlogoimg">
                </a>
            </li>
        </ul>
    </nav>

    <div id="movenav" class="vertnav">
        <div id="butons" class="none">
            <ul type="none" style="width: 100%;" class="hr">
                <li><a href="../index.html">Home</a></li>
                <li><a href="../about/index.html">About Us</a></li>
                <li><a href="../registration/index.php">Registrations</a></li>
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

    <?php 
        include('./first.php');
    ?>
    <footer class="container-fluid">
        <div class="social-media row">
            <a href="https://www.instagram.com/">
                <img src="../resources/insta.png" class="instalogo" alt="Instagram">
            </a>
        </div>
        <div class="copy">
            Copyright &copy; &lt;NUTS AND BOLTS PRODUCTIONS&gt;. All rights reserved.<br> Created by Media team NUTS AND BOLTS PRODUCTIONS and <a href="https://www.instagram.com/ctrlalt.create_/" style="color: #FFC102;">CTRL+ALT+CREATE</a>
        </div>
    </footer>
    <script src="./main.js"></script>

</body>

</html>