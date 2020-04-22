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
    
    if($rowcount>0){
        $count = 0;
        while($playrows = $playdetails->fetch(PDO::FETCH_ASSOC)){
        echo    "<div class='col-sm-4'>
                    <a href=\'".$playrows['playnamenospace']."html\'>
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
                                <div class='col'>Performed on :<span> " . date_format($playrows['dateofperfo'], "d/m/Y") . "</span> </div>
                                <div class='col'>Fest :<span>".$playrows['fest']."</span> </div>
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