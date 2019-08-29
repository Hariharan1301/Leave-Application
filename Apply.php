<!Doctype html>
    <head>
        <title>Apply Leave</title>
    </head>
    <body>
        <?php
        session_start();
        if(!isset($_SESSION["eid"])){
            header("Location: Login.html");
        }
        ?>
        <h2 color="black">Leave Application Form</h2>
        <hr color="green">
        <center><form method="POST" action="Validate.php">
            <table>
                <tbody>
                    <tr>
                        <td>Name:</td>
                        <td><input type="text" name="ename"/></td>
                    </tr>
                    <tr>
                        <td>ID:</td>
                        <td><input type="text" name="eid" value="<?php echo($_SESSION["eid"]);?>"/></td>
                    </tr>
                    <tr>
                        <td>Department:</td>
                        <td><input type="text" name="desg"/></td>
                    </tr>
                    <tr>
                        <td>Begining Date:</td>
                        <td><input type="date" name="dt"></td>
                    </tr>
                    <tr>
                        <td>No of days:</td>
                        <td><input type="number" name="count"></td>
                    </tr>
                    <tr>
                        <td>Leave Type:</td>
                        <td><input type="text" name="desc"></td>
                    </tr>
                    <tr><td>
                    <center><input type="submit" value="Apply"></center>
                    </td></tr>
                </tbody>
            </table>
        </form></center>
    </body>
</html>