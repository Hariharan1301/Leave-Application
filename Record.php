<html>
    <head><title>Emp Record</title></head>
    <?php
    session_start();
    if(!isset($_SESSION["eid"])){
        header("Location: Login.html");
    }
    if($_SESSION["etype"]=="emp"){
        echo("Unauthorized access");
        exit();
    }
    $eid=$_POST["eid"];
    $ename = $_POST["ename"];
    if($eid==="" && $ename===""){
        header("Location: Browse.php");
    }
    try{
        $db = mysqli_connect("localhost","root","","Org");
        $table = "Employee";
        if($eid!="" && $ename!=""){
            $query="SELECT * FROM $table WHERE eid='$eid' and ename='$ename'";
        }
        else if($eid!="" && $ename===""){
            $query="SELECT * FROM $table WHERE eid='$eid'";
        }
        else if($eid==="" && $ename!=""){
            $query="SELECT * FROM $table WHERE ename='$ename'";
        }
        $result=mysqli_query($db,$query);
        if(mysqli_num_rows($result)>0){
            while($row=mysqli_fetch_assoc($result)){
    ?>
        <body>
            <table>
                <tr>
                    <td><?php echo $row["eid"];?></td>
                    <td><?php echo $row["ename"];?></td>
                    <td><?php echo $row["dates"];?></td>
                    <td><?php echo $row["count"];?></td>
                </tr>
            </table>
        </body>
    <?php 
            }
        }
        else{
            print_r($result);
            echo nl2br("\nNo Such records\n"."$query");
        }
    }
    catch(Exception $e){
        echo "Exception Occurred: ".$e;
    }
    ?>
    <a href="Browse.php">Back</a>
</html>