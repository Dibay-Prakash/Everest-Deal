<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seller Registration</title>
</head>
<body>
    <h2>Seller Registration Form</h2>
    <form action="../views/sellerinfoindb.php" method="POST">
        <div>
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required autocomplete="off">
        </div>

        <div>
            <label for="address">Address:</label>
            <input type="text" id="address" name="address" required autocomplete="off">
        </div>

        <div>
            <label for="college">College Name:</label>
            <select id="college" name="college" required autocomplete="off">
                <option value="">Select College</option>
                <option value="Everest Engineering College">Everest Engineering College</option>
                <!-- Add more options if needed -->
            </select>
        </div>
        <div>
            <label for="contact">Contact Details:</label>
            <input type="text" id="contact" name="contact" required autocomplete="off">
        </div>
        <div>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required autocomplete="off">
                <option value="">Select Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="other">Other</option>
            </select>
        </div>
        <div>
            <button type="submit" name="submit">Register Me</button>
        </div>
    </form>
</body>
</html>
