<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .error {
        color: red;
    }
    </style>
</head>
<body>

    <?php 
    $name = $lname = $experience = $status = $message = "";

    if($_SERVER["REQUEST_METHOD"] === "POST"){

        if (empty($_POST["name"])) {
            echo "<span class=\"error\">Error: first name required</span>";
        } else if (empty($_POST["lname"])) {    
            // USE !preg_match to check what characters have been input
            echo "<span class=\"error\">Error: last name required</span>";
        } else {
            $name = val($_POST["name"]);
            $lname = val($_POST["lname"]);
            $experience = val($_POST["experience"]);
            $status = val($_POST["status"]);
            $message = val($_POST["message"]);
        }
    }

    function val ($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    ?>

    <h2>Form Test</h2>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div>
        <label for="">First Name:</label>
        <input type="text" name="name">
        <label for="">Last Name:</label>
        <input type="text" name="lname">
        </div>
         <div>
         <label for="">Experince Lebel: </label>
         <select name="experience" id="">
         <option value="Entry Level">Entry Level</option>
         <option value="Mid Level">Mid Level</option>
         <option value="Senior Level">Senior Level</option>
         </select>
        </div>
        <div>
        <label for="">Employment Status:</label>
        <input type="radio" name="status" value="Employed">Employed
        <input type="radio" name="status" value="Unemployed">Unemployed
        <input type="radio" name="status" value="Student">Student
        </div>
        <div>
        <label for="">Message:</label> <br>
        <textarea name="message" id="" cols="30" rows="10"></textarea>
        </div>
        <input type="submit">
        <input type="reset">
    </form>

    <?php 
        echo "<h2>Users Input</h2>";
        echo "Name: " . $name;
        echo "<br>";
        echo "Last Name: " . $lname;
        echo "<br>";
        echo "Experience: " . $experience;
        echo "<br>";
        echo "Status: " . $status;
        echo "<br>";
        echo "Message: " . $message;
        echo "<br>";
    ?>
</body>
</html>