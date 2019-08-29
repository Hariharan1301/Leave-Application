<?php
echo nl2br("Hello World\n");
$eid = $_POST["eid"];
$password = $_POST["pass"];
session_start();
if(isset($_POST["admin"])){
    try{
        $db = mysqli_connect("localhost","root","","Org");
        $table = "Admin";
        $query = "SELECT * FROM $table WHERE eid='$eid'";
        $result = mysqli_query($db,$query);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                //$hash = password_hash($password,PASSWORD_DEFAULT);
                if($row["password"]===$password){
                    echo("Login Succeeded");
                    $_SESSION["eid"]=$eid;
                    $_SESSION["etype"]="admin";
                    header("Location: Browse.php");
                }
                else{
                    echo "Here!";
                    //header("Location: Login.html");                    
                }
            }
        }
        else{
            echo nl2br("Error\n");
            print_r($result);
            //header("Location: Login.html");
        }
        mysqli_close($db);
    }
    catch(Exception $e){
        echo "Exception Caught".$e;
    }
}
else{
    echo "Not Admin";
    try{
        $db = mysqli_connect("localhost","root","","Org");
        $table = "Employee";
        $query = "SELECT * FROM $table WHERE eid='$eid'";
        $result = mysqli_query($db,$query);
        if(mysqli_num_rows($result)>0){
            while($row = mysqli_fetch_assoc($result)){
                //$hash = password_hash($password,PASSWORD_DEFAULT);
                if($row["password"]===$password){
                    echo("Login Succeeded");
                    $_SESSION["eid"]=$eid;
                    $_SESSION["etype"]="emp";
                    header("Location: Apply.php");
                }
                else{
                    print_r($row);
                    //header("Location: Login.html");                    
                }
            }
        }
        else{
            echo nl2br("Error\n");
            print_r($result);
            //header("Location: Login.html");
        }
        mysqli_close($db);
    }
    catch(Exception $e){
        echo "Exception Caught".$e;
    }
}
?>