
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include("../connection/connection.php");?>
    <link rel="icon" type="image/jpg" href="../ImagesFolder/Everest Deal.jpg"> 
    <!-- Favicon for website -->
    <style>

        /* CSS for login form */
.begun {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f0f0f0;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.begun h2 {
    text-align: center;
    color: #333;
}

.init {
    margin-bottom: 20px;
}

.init label {
    display: block;
    margin-bottom: 5px;
    color: #555;
}

.init input[type="text"],
.init input[type="password"] {
    width: calc(100% - 30px);
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
    outline: none;
}

.init input[type="text"]:focus,
.init input[type="password"]:focus {
    border-color: #007bff;
}

button[type="button"] {
    border: none;
    background-color: transparent;
    cursor: pointer;
}

button[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 4px;
    background-color: #007bff;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
}

button[type="submit"]:hover {
    background-color: #0056b3;
}

#directsignup {
    text-align: center;
    margin-top: 10px;
    color: #555;
}

#directsignup a {
    color: #007bff;
    text-decoration: none;
}

#directsignup a:hover {
    text-decoration: underline;
}

.info {
    color: red;
    text-align: center;
    margin-bottom: 10px;
}


        </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="begun">
        <h2>Login</h2>
        <!-- Form submit vayesi yesko data afterloginpage ma janxa. -->
        <form action="" method="POST">
            <div class="init">
                <!-- ../views/afterloginpage.php -->
                <!-- init has begun -->

                <label for="registrationId">PU Registration Id:</label>
                <input type="text" id="registrationId" name="registrationId" required autocomplete="off">
                <!-- init has end with label id username -->
            </div>
            <div class="init">
                <!-- init has begun -->
                <label for="password">Password:</label>
                <input type="password" id="password" name="password"  required autocomplete="off">
                <button type="button" onclick="passwordVisibilitylogin()">o</button>

                <!-- init has begun with label id username  -->
            </div>
            <!-- <span class="rem_me">Remember me </span>
            <span class="forgot">Forgot Password</span> -->
            <div class="info"></div>
            <button type="submit" name="login">Log In</button>
            

            <p id="directsignup">Don't have account? <a href="../signup/signupform.php">Signup</a></p>

        </form>
        <p id="info"></p>

    </div>
    
    <script src="#"></script>
    <script src="../javascript/passwordvisibility.js"></script>
</body>
</html>






<?php

session_start();

include("../connection/connection.php");
// when login buttuon click vayo 
if (isset($_POST['login'])) 
{
        $puregistrationId = $_POST['registrationId'];
        $password = $_POST['password'];
        

       // running the query
       $query = "SELECT * FROM user_info WHERE puregistrationId='$puregistrationId' AND password='$password'";

        
        $data = mysqli_query($conn, $query);


        // this shows maile select gareko id ra password annusar kati wota rows match vayo.
        $total=mysqli_num_rows($data);
        // echo $total;

        if ($total==1)
         {
            echo"login successfull";
            $_SESSION['pu_registrationId'] = $puregistrationId;
            
            // id ra password milyo bhane yo page ma ja hai bhaneko maile.
            header('Location:http://localhost/EverestDeal/views/afterloginpage.php');
            exit(); 
        }  
        else
        {
            echo"Invalid Credentials!";
            exit();
        }
        
    } 
    ?>
    
