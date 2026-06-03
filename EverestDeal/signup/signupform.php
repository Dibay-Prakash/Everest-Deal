<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php include("../connection/connection.php");?>
    <link rel="icon" type="image/jpg" href="../ImagesFolder/Everest Deal.jpg"> 
    <!-- Favicon for website -->
    <style>
        /* signup.css */
body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
  }
  
  .signupbegun {
    background-color: #fff;
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  }
  
  h2 {
    text-align: center;
    color: #333;
  }
  
  form {
    margin-top: 20px;
  }
  
  .init_signup {
    margin-bottom: 15px;
  }
  
  label {
    display: block;
    margin-bottom: 5px;
    color: #555;
  }
  
  input[type="text"],
  input[type="password"],
  select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
  }
  
  button {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 3px;
    cursor: pointer;
  }
  
  button:hover {
    background-color: #0056b3;
  }
  
  p {
    text-align: center;
    margin-top: 10px;
  }
  
  a {
    color: #007bff;
    text-decoration: none;
  }
  
  a:hover {
    text-decoration: underline;
  }
  
        </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
</head>
<body>
    <div class="signupbegun">
        <h2>Signup</h2>
        <form action="../signup/Signup_process.php" method="POST" >
            <div class="init_signup">
                <label for="fullname">Full Name:</label>
                <input type="text" id="fullname" name="fullname" required autocomplete="off">
            </div>
            <div class="init_signup">
            <label for="registrationId">PU Registration ID:</label>
            <input type="text" id="registrationId" name="registrationId" required autocomplete="off">
            </div>

            <div class="init_signup">
                <label for="gender">Gender:</label>
                <select id="gender" name="gender"  required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>
            </div>
            <div class="init_signup">
                <label for="passkey">Password:</label>
                <input type="password" id="passkey" name="passkey" required>
                <button type="button" onclick="passwordVisibility()">o</button>
            </div>
            <div class="init_signup">
                <label for="confirmpassword">Confirm Password:</label>
                <input type="password" id="confirmpassword" name="confirmpassword" required>
                <button type="button" onclick="confirmPasswordVisibility()">o</button>
            </div>
            <button type="submit" name="submit">Sign Up</button>
            <div class="info"></div>

            <p id="info"></p>
            <p id="infopassword"></p>
            
            <!-- ../ is used to go up one level in the directory structure and then navigate to the LoginFolder -->
            <p>Already have an account? <a href="../login/loginform.php">Login</a></p>


            
        </form>
    </div>
    <script src="signup.js"></script>
    <script src="../javascript/passwordvisibility.js"></script>
</body>
</html>