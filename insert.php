<?php
$target_dir = "img/";
$target_file = $target_dir . basename($_FILES["pic"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["insert"])) 
{
    $check = getimagesize($_FILES["pic"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }


if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($_FILES["pic"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";

}
else 
{
    if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file))
    {
        echo "hiii";
         $sql = "INSERT INTO search_lawyer(name,location,law,experience,photo) VALUES('$name','$location','$law','$experince','$target_file')";
            if ($conn->query($sql) === TRUE)
            {
                echo "login";
            }
            else 
            {
            echo  "".$conn->error;
            }   
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
}
?>
<html>
<body>
<form action="<?php 
         echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
         <input type="text" name="name" placeholder="name"><br>
         <input type="text" name="location" placeholder="location"><br>
         <input type="text" name="law" placeholder="law"><br>
         <input type="text" name="ex" placeholder="experience"><br>
         <input type="file" name="pic" placeholder="pic"><br>
         <button name="insert">submit</button>
         </form>
</body>
</html>