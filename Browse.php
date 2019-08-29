<!Doctype html>
    <head>
        <title>Browse</title>
    </head>
    <body>
        <?php
        session_start();
        if(!isset($_SESSION["eid"])){
            header("Location: Login.html");
        }
        if($_SESSION["etype"]=="emp"){
            echo("Unauthorized access");
            exit();
        }
        ?>
        <form method="POST" action="Record.php">
            <table>
                <tr>
                    <td>Employee ID:</td>
                    <td><input type="text" name="eid"></td>
                </tr>
                <tr>
                    <td>Employee Name:</td>
                    <td><input type ="text" name = "ename"></td>
                </tr>
                <tr>
                <td><input type="submit" value="Fetch Records"></td>
                <tr>
            </table>
        </form>
        <center><a href="DisplayAll.php">See All Records</a><center>
    </body>
</html>