<!DOCTYPE html>
<html lang="en">
<head>
   
     <?php include('../upload_image/upload.php');?>
     
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/adminpage.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="page.php" method="POST" enctype="multipart/form-data">
        <!-- why enctype diyeko yeha -->

        <label>Image</label>
        <input type="file" name="image" class="image" required>

        <label>Title</label>
        <input type="text" placeholder="Shorter name of item is preferred" name="title" class="title">

        <label>Selling Price</label>
        <input type="number"  name="sp" class="sp">

        <label>Renting Price</label>
        <input type="number"  name="rp" class="rp">

        <label>Description</label>
        <input type="text" placeholder="Description about your item" name="description" class="description">

        <button name="form_submit" class ="upload">Upload</button>

        <?php 
       if(isset($image_success) && $image_success === 1) 
       {
        echo '<div class="message">Uploaded successfully</div>';
       }
        
        ?>




    </form>
</body>
</html>