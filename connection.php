<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user2";
$con = mysqli_connect($servername ,$username, $password, $dbname);
if(mysqli_connect_errno()){
    echo "faild to connect!";
}else{
echo "connection success!";
}
// try{
//     $con = new PDO("mysql:host = $servername; dbname = $dbname", $username, $password);
//     $con -> setAttribute(PDO :: ATTR_ERRMODE, PDO :: ERRMODE_EXCEPTION);
//     echo "connection success";
// }
// catch(PDOEXCEPTION $e){
//     echo "ERROR UNCONNECTION" . $e -> getmessage();
// }
?>