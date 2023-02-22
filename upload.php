<!DOCTYPE html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
  <style>
    <?php include 'style.css'; ?>
  </style>
</head>

<body class="font-family">

  <?php

  //creating unique id based on time stamp
  $newFileName = uniqid();
  //setting target directory
  $targetDir = 'uploads/';
  //setting boolean to track upload success
  $uploadOk = 1;
  $temp = explode(".", $_FILES["fileToUpload"]["name"]);
  //attaching correct extension
  $newFileName = uniqid() . '.' . end($temp);
  //renaming file
  $targetFile = $targetDir . $newFileName;
  $uploadIsSuccessful = false;

  $successMessage = "";

  // Checking if file already exists
  if (file_exists($targetFile)) {
    $successMessage = "Sorry, file already exists.";
    $uploadOk = 0;
  }

  // Checking file size
  if ($_FILES["fileToUpload"]["size"] > 500000000) {
    $successMessage = "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  //Checking if $uploadOk is set to 0
  if ($uploadOk == 0) {
    $successMessage = "Sorry, your file was not uploaded.";
  } else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
      $uploadIsSuccessful = true;
    } else {
      $successMessage = "Sorry, an error was encountered while attempting to upload your file.";
    }
  }


  if ($uploadIsSuccessful == true) {
    //sending confirmation email
    $to = "emailAddress@googlemail.com";
    $subject = "A new file was uploaded.";
    $message = "Your file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
    $headers = "Gallery\r\n" . 'Content-Type: text/plain; charset=UTF-8';
    mail($to, $subject, $message, $headers);

    //initializing variables for table output
    $nameToPrint = $_REQUEST['personName'];
    $fileNameToPrint = $targetFile;
    $fileSizeToPrint = filesize($targetFile);
    $fileMimeToPrint = mime_content_type($targetFile);
    $successMessage = "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded. <br><br>";
  }
  ?>

  <h2><?= $successMessage ?></h2>

  <div class="responsive-table">
    <table>
      <tr>
        <th>Name</th>
        <th>File Name</th>
        <th>File Mime</th>
        <th>File Size</th>
      </tr>
      <tr>
        <td><?= $nameToPrint ?></td>
        <td><?= $fileNameToPrint ?></td>
        <td><?= $fileMimeToPrint ?></td>
        <td><?= $fileSizeToPrint ?></td>
      </tr>
    </table>
  </div>

</body>

</html>