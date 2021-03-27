<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./resources/css/bootstrap.min.css">
    <link rel="stylesheet" href="./resources/css/registration.css">
    <link rel="stylesheet" href="./resources/css/style.css">
    <link rel="stylesheet" href="./resources/css/mime.css">
    <script src="./resources/javascripts/jquery.min.js"></script>
    <script src="./resources/javascripts/popper.min.js"></script>
    <script src="./resources/javascripts/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body id="bod">
    <?php
    function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $playname = $directorname = $target_files[] = $dateofperfo = $fest = $position = $email = $participants = $synopsis = $festname = $positionname = $playnamenospace = $playtype = $word1 = $word2 = "";
    $playnameErr = $directornameErr = $emailErr = $error = $festerror = $participantsErr = $imgerr = $imgserr = $synopsisErr = $classErr = $playnamenospaceErr = $playtypeErr = "";
    $validator = 0;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $validator = 0;
        if (empty($_POST["playtype"])) {
            $playtypeErr = "Play's category is required";
            $validator = 0;
        } else {
            $playtest = test_input($_POST["playtype"]);
            if ($playtest == "Mime") {
                $word1 = "MI";
                $word2 = "ME";
            }
            if ($playtest == "Proscenium") {
                $word1 = "PROSC";
                $word2 = "ENIUM";
            }
            if ($playtest == "Street Play") {
                $word1 = "STREET ";
                $word2 = "PLAY";
            }
            if ($playtest == "Dance") {
                $word1 = "DAN";
                $word2 = "CE";
            }
            if ($playtest == "Band") {
                $word1 = "BA";
                $word2 = "ND";
            }
            if ($playtest == "Upcoming Events") {
                $word1 = "UPCOMING ";
                $word2 = "EVENTS";
            }
            $validator = $validator + 1;
        }

        if (empty($_POST["PlayName"])) {
            $playnameErr = "Play's Name is required";
            $validator = 0;
        } else {
            $name = test_input($_POST["PlayName"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                $playnameErr = "Only letters and white space allowed";
                $validator = 0;
            } else {
                $validator = $validator + 1;
            }
        }

        if (empty($_POST["PlayNamenospace"])) {
            $playnamenospaceErr = "Play's Name without spaces is required";
            $validator = 0;
        } else {
            $pname = test_input($_POST["PlayNamenospace"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $pname)) {
                $playnamenospaceErr = "Only letters and no white space allowed";
                $validator = 0;
            } else {
                $playnamenospace = test_input($_POST['PlayNamenospace']);
            }
        }

        if (empty($_POST["DirectorName"])) {
            $directornameErr = "Director's Name is required";
            $validator = 0;
        } else {
            $tname = test_input($_POST["DirectorName"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z ]*$/", $tname)) {
                $directornameErr = "Only letters and white space allowed";
                $validator = 0;
            } else {
                $validator = $validator + 1;
            }
        }

        if (empty($_POST["PerfDate"])) {
            $error = 'Date is required!';
            $validator = 0;
        } else {
            $validator = $validator + 1;
        }

        if (empty($_POST["Fest"])) {
            $festerror = "Fest's Name is required";
            $validator = 0;
        } else {
            $festname = test_input($_POST["Fest"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z0-9 ]*$/", $festname)) {
                $festerror = "Only letters,numbers and white space allowed";
                $validator = 0;
            } else {
                $validator = $validator + 1;
            }
        }

        if (empty($_POST["Position"])) {
            $classErr = "Position is required";
            $validator = 0;
        } else {
            $positionname = test_input($_POST["Fest"]);
            // check if name only contains letters and whitespace
            if (!preg_match("/^[a-zA-Z0-9 ]*$/", $positionname)) {
                $classErr = "Only letters,numbers and white space allowed";
                $validator = 0;
            } else {
                $validator = $validator + 1;
            }
        }

        if (empty($_POST["participants"])) {
            $synopsisErr = "List of Participants required";
            $validator = 0;
        } else {
            $validator = $validator + 1;
        }

        if (empty($_POST["synopsis"])) {
            $synopsisErr = "Synopsis required";
            $validator = 0;
        } else {
            $validator = $validator + 1;
        }
        $parentdir = $playtest;
        if (file_exists($parentdir) == false) {
            mkdir($parentdir);
        }
        $maindir = "$parentdir/resources";
        if (file_exists($maindir) == false) {
            mkdir($maindir);
        }
        $target_dir = "$maindir/$playnamenospace/";
        if (file_exists($target_dir) == false) {
            mkdir($target_dir);
        }
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOkay = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOkay = 1;
            } else {
                echo "File is not an image.";
                $uploadOkay = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $validator = 0;
            $imgerr = "Sorry, file already exists.";
            $uploadOkay = 0;
        }
        // Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000000) {
            $validator = 0;
            $imgerr = "Sorry, your file is too large.";
            $uploadOkay = 0;
        }
        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif"
        ) {
            $imgerr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOkay = 0;
            $validator = 0;
        }

        function reArrayFiles($filepost)
        {
            $file_ary = array();
            $file_count = count($filepost['name']);
            $file_keys = array_keys($filepost);
            for ($i = 0; $i < $file_count; $i++) {
                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $filepost[$key][$i];
                }
            }
            return $file_ary;
        }

        if (isset($_FILES['filesToUpload'])) {
            $myFile = reArrayFiles($_FILES['filesToUpload']);
            for ($i = 0; $i < count($myFile); $i++) {
                $target_files[$i] = $target_dir . basename($myFile[$i]["name"]);
                $uploadOk[$i] = 1;
                $imageFileType = strtolower(pathinfo($target_files[$i], PATHINFO_EXTENSION));
                $check = getimagesize($myFile[$i]["tmp_name"]);

                if ($check !== false) {
                    //echo "File is an image - " . $check["mime"] . ".";
                    $uploadOk[$i] = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk[$i] = 0;
                }

                if (file_exists($target_files[$i])) {
                    $validator = 0;
                    $imgserr = "Sorry, file already exists.";
                    $uploadOk[$i] = 0;
                }

                if ($myFile[$i]["size"] > 500000000) {
                    $validator = 0;
                    $imgserr = "Sorry, your file is too large.";
                    $uploadOk[$i] = 0;
                }

                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    $imgserr = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk[$i] = 0;
                    $validator = 0;
                }

                // echo nl2br(
                //     "i = $i \n
                //     Name of the file:".  $target_files[$i]."\n"
                // );
            }
        }
    }

    // echo "VALIDATOR = " . $validator . "\n"; echo "File count = ". count($myFile);
    // echo "filename = " . $target_files[$k];

    if ($validator >= 8) {
        if ($uploadOkay == 0) {
            $imgerr = "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                $imgerr = "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
            } else {
                $validator = 0;
                $imgerr = "Sorry, there was an error uploading your file.";
            }
        }
        $validator = 0;
        for ($i = 0; $i < count($myFile); $i++) {
            if ($uploadOk[$i] == 0) {
                $imgerr = "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($myFile[$i]["tmp_name"], $target_files[$i])) {
                    $imgserr = "The file " . basename($myFile[$i]["name"]) . " has been uploaded.";
                    $uploadOk[$i] = 0;
                } else {
                    $uploadOk[$i] = 0;
                    $validator = 0;
                    $imgserr = "Sorry, there was an error uploading your file.";
                }
            }
        }
        $playname = test_input($_POST['PlayName']);
        $directorname = test_input($_POST['DirectorName']);
        $dateofperfo = test_input($_POST['PerfDate']);
        $fest = test_input($_POST['Fest']);
        $position = test_input($_POST['Position']);
        $synopsis = test_input($_POST["synopsis"]);
        $participants = test_input($_POST["participants"]);
        $playtype = test_input($_POST["playtype"]);

        $servername = "localhost:3308";
        $username = "root";
        $password = "";
        $dbName = "nutsandbolts";

        $conn = new mysqli($servername, $username, $password, $dbName);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            echo "CONNECTED SUCCESSFULLY";
        }
        $sql = "INSERT INTO MIME (playname,playnamenospace,directorname,dateofperfo,fest,position,synopsis,playtype,word1,word2,mainimage,image1,image2,image3,image4,image5,image6,image7,image8,image9,image10) 
                VALUES ('$playname','$playnamenospace','$directorname','$dateofperfo','$fest','$position','$synopsis','$playtype','$word1','$word2','$target_file','$target_files[0]','$target_files[1]','$target_files[2]','$target_files[3]','$target_files[4]','$target_files[5]','$target_files[6]','$target_files[7]','$target_files[8]','$target_files[9]');";
        if ($conn->query($sql) === TRUE) {
            echo "Database updated successfully";
        } else {
            echo "Error updating database: " . $conn->error;
        }
    }

    ?>

    <button class="navpos" id="circlenav">
        <div id="navdiv"></div>
    </button>

    <button class="tothetop" onclick="topFunction()" id="tothetop" style="display: none;">
        <div id=""></div>
    </button>

    <nav class="navbar">
        <br><br>
        <ul type="none">
            <li><strong>
                    <div class="nbspan">PERFORMANCE DETAILS UPLOAD FORM</div>
                </strong>
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

    <?php
    // echo "VALIDATOR = ".$validator;
    ?>

    <div class="container-fluid" style="text-align: center">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h3>Please Fill in the Details of the performance</h3>
                <form method="post" class="error" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?>" enctype="multipart/form-data">
                    <div class="col margtop">Please select the Category of performance to Upload <span class="error">*</span><br><span></span></div><?php echo $playtypeErr ?>
                    <div>
                        <input type="radio" class="radio" id="mime" name="playtype" value="Mime">
                        <label for="mime">Mime</label><br>
                        <input type="radio" class="radio" id="proscenium" name="playtype" value="Proscenium">
                        <label for="proscenium">Proscenium</label><br>
                        <input type="radio" class="radio" id="street" name="playtype" value="Street Play">
                        <label for="street">Street Play</label><br>
                        <input type="radio" class="radio" id="band" name="playtype" value="Band">
                        <label for="band">Band</label><br>
                        <input type="radio" class="radio" id="dance" name="playtype" value="Dance">
                        <label for="dance">Dance</label><br>
                        <input type="radio" class="radio" id="upcoming" name="playtype" value="Upcoming Events">
                        <label for="upcoming">Upcoming Events</label><br>
                    </div>
                    <input id="playname" type="text" name="PlayName" placeholder="Name of the Play(With Spaces)" required>*<span><br><?php echo $playnameErr ?></span><br>
                    <input id="playnamenospaces" type="text" name="PlayNamenospace" onblur="this.value=removeSpaces(this.value);" placeholder="Name of the Play(Without Spaces)" required>*<span><br><?php echo $playnamenospaceErr ?></span><br>
                    <input id="directorname" type="text" name="DirectorName" placeholder="Names of the Directors(Seperated by commas)" required>*<span><br><?php echo $directornameErr ?></span><br>
                    <span style="color: white; font-size: medium;">Date of performance:</span><input id="dateofperfo" type="date" name="PerfDate" placeholder="Date of performance" required>*<span><br><?php echo $error ?></span><br>
                    <input id="fest" type="text" name="Fest" placeholder="Name of the Fest Performed in" required>*<span><br><?php echo $festerror ?></span><br>
                    <input id="position" type="text" name="Position" placeholder="Position Acquired(if not placed type Participant)" required>*<span><br><?php echo $classErr ?></span><br>
                    <div class="col margtop">Please select the photo for main page <span class="error">*</span><br><span></span></div><?php echo $imgerr ?>
                    <input type="file" name="path" id="fileToUpload"><br><span style="color: #ffc102"></span><br>
                    <div class="col margtop">Please select 10 stills from play <span class="error">*</span><br><span></span></div><?php echo $imgserr ?>
                    <input type="file" name="filesToUpload[]" id="filesToUpload" multiple=""><br><span style="color: #ffc102"></span>
                    <div class="col margtop">Enter the names of all the participants <span class="error">*</span><br><span>(And if possible please also mention if they had any prominent character in brackets and seperate the partipants name by commas)</span></div><?php echo $participantsErr ?>
                    <textarea name="participants" maxlength="500"><?php echo $participants ?></textarea>
                    <div class="col margtop">Enter the play's synopsis <span class="error">*</span><br><span>(Limit : 500 characters)</span></div><?php echo $synopsisErr ?>
                    <textarea name="synopsis" maxlength="500"><?php echo $synopsis ?></textarea>
                    <br><input type="submit" value="Upload Play" class="submitbutton">
                </form>
            </div>
        </div>
    </div>

    <?php
    echo nl2br(
        "Name of the play: " . $playname . "\n" .
            "Name of the play Without Spaces: " . $playnamenospace . "\n" .
            "Directors :" . $directorname . "\n" .
            "Date of Performance : " . $dateofperfo . "\n" .
            "Name of fest : " . $fest . "\n" .
            "Position acquired: " . $position . "\n" .
            "Participants : " . $participants . "\n" .
            "Synopsis : " . $synopsis . "\n" .
            // "Target Dir : " . $target_dir . "\n".
            "Word1 : " . $word1 . "\n" .
            "Word1 : " . $word2
    );
    ?>

    <footer style="position: static;">
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

    <script src="main.js"></script>

    <script>
        function removeSpaces(string) {
            return string.split(' ').join('');
        }
    </script>
</body>

</html>