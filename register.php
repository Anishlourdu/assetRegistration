<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 
<style type="text/css">
p {
    color: white; 
    font-size: 50px;
}
body {
    background-color: black; 
    }
</style>

</head>
<body>
    
</body>
</html>
<p>

<?php
$ID=$_POST['ID'];
$AName=$_POST['AName'];
$AMake=$_POST['AMake'];
$ADate=$_POST['ADate'];
if(!empty($ID)||!empty($AName)||!empty($AMake)||!empty($ADate))
{
    $host="localhost";
    $dbusername="root";
    $dbpassword="";
    $dbname="asset";
    $conn = new mysqli ($host,$dbusername,$dbpassword,$dbname);
    if(mysqli_connect_error()){
        die('Connect Error('. mysqli_connect_errno() .')' . mysqli_connect_error());
    }
    else{
        $SELECT="SELECT ID From asset1 Where ID=? Limit 1";
        $INSERT="INSERT INTO asset1( ID,AName,AMake,ADate)values(?,?,?,?)";
        $stmt=$conn->prepare($SELECT);
        $stmt->bind_param("i",$ID);
        $stmt->execute();
        $stmt->bind_result($ID);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if($rnum==0){
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("isss",$ID,$AName,$AMake,$ADate);
            $stmt->execute();
            $spam=$conn->insert_id;
          echo"New Record inserted successfully...<br> Your Asset ID is : ". $spam; 

        }else{
            echo"AssetID is already Registered";
           
        }
        
        $stmt->close();
        $conn->close();
    }
}
    else{
        echo"All feilds are required";
        die();
    }
    
    ?>
    <br><br>
<button onclick="history.back()">Go Back !!!</button>
</p>