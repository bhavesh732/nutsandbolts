<!DOCTYPE html>
<html lang="en" style="scroll-behavior: smooth;">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../registration/style.css">
    <link rel="stylesheet" href="../resources/style.css">
    <link rel="stylesheet" href="style.css">
    <script src="../bootstrap/jquery.min.js"></script>
    <script src="../bootstrap/popper.min.js"></script>
    <script src="../bootstrap/bootstrap.min.js"></script>
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
    $playname = $directorname = $target_files[] = $dateofperfo = $fest = $position = $email = $participants = $synopsis = $festname = $positionname = $playnamenospace = "";
    $playnameErr = $directornameErr = $emailErr = $error = $festerror = $participantsErr = $imgerr = $imgserr = $synopsisErr = $classErr = $playnamenospaceErr = "";


    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $validator = 0;
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
        $maindir = "resources";
        if (file_exists($maindir) == false) {
            mkdir($maindir);
        }        
        $target_dir = "resources/$playnamenospace/";
        if(file_exists($target_dir) == false){
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
        if ($_FILES["fileToUpload"]["size"] > 500000) {
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

        function reArrayFiles($filepost){
            $file_ary = array();
            $file_count = count($filepost['name']);
            $file_keys = array_keys($filepost);
            for ($i=0; $i < $file_count ; $i++) { 
                foreach ($file_keys as $key) {
                    $file_ary[$i][$key] = $filepost[$key][$i];
                }
            }
            return $file_ary;
        }

        if (isset($_FILES['filesToUpload'])) {
            $myFile = reArrayFiles($_FILES['filesToUpload']);
            for($i=0;$i<count($myFile);$i++){ 
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
    
    if ($validator >= 7) {
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
        for ($i = 0; $i < count($myFile); $i++){
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
        $dateofperfo = date_create(test_input($_POST['PerfDate']));
        $fest = test_input($_POST['Fest']);
        $position = test_input($_POST['Position']);
        $synopsis = test_input($_POST["synopsis"]);
        $participants = test_input($_POST["participants"]);

        $mainfile = fopen("main.html", "a+") or die("Unable to open file");
        $divtxt = "        
                <div class='col-sm-4'>
                    <a href='$playnamenospace.html'>
                        <div class='row'>
                            <div class='col-sm-12' style=\"background-image: url('$target_file')\">
                                <br>
                            </div>
                        </div>
                    </a>
                    <a href='$playnamenospace.html'>
                        <div class='row'>
                            <div class='col-sm-12'>
                                <div class='col'>Directed by :<span> $directorname</span> </div>
                                <div class='col'>Performed on :<span> " . date_format($dateofperfo, "d/m/Y") . "</span> </div>
                                <div class='col'>Fest :<span> $fest</span> </div>
                            </div>
                        </div>
                    </a>
                </div>";
        fwrite($mainfile, $divtxt);
        fclose($mainfile);
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
                    <!-- <a href="./registration/index.php"> -->
                    <div class="nbspan">MEMBERS PERFORMANCE UPLOAD FORM</div>
                    <!-- </a> -->
                </strong>
            </li>
        </ul>
    </nav>

    <div id="movenav" class="vertnav">
        <div id="butons" class="none">
            <ul type="none" style="width: 100%;" class="hr">
                <li><a href="../index.html">Home</a></li>
                <li><a href="../mime/upload.php">Mime</a></li>
                <li><a href="../proscenium/upload.php">Proscenium</a></li>
                <li><a href="../streetplay/upload.php">Street Play</a></li>
                <li><a href="../band/upload.php">Band</a></li>
                <li><a href="../dance/upload.php">Dance</a></li>
                <li><a href="../members/upload.php">Members</a></li>
                <li><a href="../upcomingevents/upload.php">Upcoming Events</a></li>
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
                    <input id="playname" type="text" name="PlayName" placeholder="Name of the Play(With Spaces)" required>*<span><br><?php echo $playnameErr ?></span><br>
                    <input id="playnamenospaces" type="text" name="PlayNamenospace" onblur="this.value=removeSpaces(this.value);" placeholder="Name of the Play(Without Spaces)" required>*<span><br><?php echo $playnamenospaceErr ?></span><br>
                    <input id="directorname" type="text" name="DirectorName" placeholder="Names of the Directors(Seperated by commas)" required>*<span><br><?php echo $directornameErr ?></span><br>
                    <span style="color: white; font-size: medium;">Date of performance:</span><input id="dateofperfo" type="date" name="PerfDate" placeholder="Date of performance" required>*<span><br><?php echo $error ?></span><br>
                    <input id="fest" type="text" name="Fest" placeholder="Name of the Fest Performed in" required>*<span><br><?php echo $festerror ?></span><br>
                    <input id="position" type="text" name="Position" placeholder="Position Acquired(if not placed type Participant)" required>*<span><br><?php echo $classErr ?></span><br>
                    <input type="file" name="fileToUpload" id="fileToUpload"><br><span style="color: #ffc102"><?php echo $imgerr ?></span><br>
                    <input type="file" name="filesToUpload[]" id="filesToUpload" multiple=""><br><span style="color: #ffc102"><?php echo $imgserr ?></span>
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
            "Date of Performance : " . date_format($dateofperfo, "d/m/Y") . "\n" .
            "Name of fest : " . $fest . "\n" .
            "Position acquired: " . $position . "\n" .
            "Participants : " . $participants . "\n" .
            "Synopsis : " . $synopsis
    );
    ?>

    <footer>
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