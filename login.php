<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">
<script language="Javascript">
    var password = prompt("Enter in the password")
    if (password == "Password") {
        alert("Welcome!")
    } else {
        location = "https://google.com"
    }
</script>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/style.css">
    <script src="./bootstrap/jquery.min.js"></script>
    <script src="./bootstrap/popper.min.js"></script>
    <script src="./bootstrap/bootstrap.min.js"></script>
    <title>N&B</title>
</head>

<body id="bod">
    <!-- <video id="bgVideo" autoplay loop poster="">
            <source src="./resources/home.mp4" type="video/mp4">
        </video> -->

    <button class="navpos" id="circlenav">
        <div id="navdiv"></div>
    </button>

    <button class="tothetop" onclick="topFunction()" id="tothetop" style="display: none;">
        <div id=""></div>
    </button>

    <nav class="navbar">
        <ul type="none">
            <li><strong>
                <!-- <a href="./registration/index.php"> -->
                        <div class="nbspan">NUTS AND BOLTS</div>
                        <div class="nb1span">PRODUCTIONS</div>
                    </a>
                </strong>
                <a href="https://www.instagram.com/nuts_and_bolts_productions/"> <img src="./resources/insta.png" alt="" class="instalogo"> </a>
                <a href="https://www.youtube.com/channel/UC65klpXc13tz-rnsZb9UIrg" class="ytlogo1"> <img src="./resources/youtube.png" alt="" class="ytlogoimg">
                </a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="col" style="text-align: center; color: #ffc102;">
            <h4>INSTRUCTIONS</h4>
        </div>
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam pariatur, delectus omnis totam adipisci accusamus laudantium. Hic quo modi nulla, vero provident impedit, beatae cupiditate quia aliquam dolores vel soluta?
        </p>
    </div>
    <footer class="container-fluid">
        <div class="social-media row">
            <a href="https://www.instagram.com/nuts_and_bolts_productions/">
                <img src="./resources/insta.png" class="instalogo instafooter" alt="Instagram">
            </a>
            <a href="https://www.youtube.com/channel/UC65klpXc13tz-rnsZb9UIrg" class="ytlogo ytfooter"> <img src="./resources/youtube.png" alt="" class="ytlogoimg ytfooter"></a>
        </div>
        <div class="copy">
            Copyright &copy; &lt;NUTS AND BOLTS PRODUCTIONS&gt;. All rights reserved.<br> Created by Media team NUTS AND BOLTS PRODUCTIONS and <a href="https://www.instagram.com/ctrlalt.create_/" style="color: #FFC102;">CTRL+ALT+CREATE</a>
        </div>
    </footer>
    <script src="./resources/main.js"></script>
</body>

</html>