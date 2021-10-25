<?php

$msg = "";
$path = "";
//ISSET CHECKS TO SEE IF A VARIBLE EXISTS. RETURNS TRUE IF IT DOES AND FALSE IF IT DOES NOT. 
if(isset($_POST['name'])){
  $path = $_POST['name'];
   
  $success = mkdir("./".$path);
  
/* I NEED TO USE THE CHMOD HERE TO SET THE PROPER PERMISSIONS.*/
  chmod($path, 0777);
   
  $file = fopen("./".$path."/readme.txt","w") or die("Cannot Open File");
  $content = $_POST['contents'];
  fwrite($file,$content);
  fclose($file);

}

$link = "";

if(isset($_POST['name'])){
    $link = '<a href = "http://67.205.151.92/CPS276PHP/assignment5/' . $path . '/readme.txt">Path were file is located</a>';
}

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Form Project</title>
  </head>
  <body>
    <div class="container">
      <h1>File and Directory Assignment</h1>
      <p class="fs-5">Enter a folder name and the contents of a file.  Folder names should contain alpha numeric characters only.</p>
      <p class="fs5"><?php echo $link; ?> </p>
        <form method="POST" action="Directories.php" class="row g-3">
          <div class="mb-3">
            <label for="folderName" class="form-label">Folder Name</label>
            <input type="text" name ="name" class="form-control" id="folderName" >
          </div>
          <div class="mb-3">
            <label for="contents" class="form-label">File Contents</label>
            <textarea class="form-control" name="contents" id="nameList" rows="3"></textarea>
          </div>
          <div class="mb-12"> 
            <button type="submit" class="btn btn-primary">Submit</button>  
          </div>
        </form>    
    </div>    

  </body>
</html>