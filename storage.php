<?

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dropbox Clone</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Self written styles -->
    <link href="css/style.css" rel="stylesheet">

  </head>
  <body>

    <div class="col-sm-12" id="top">
    <p><h1>File Storage Clone</h1>
    <a><h4>{Username}, Sign out </h4></p></a>
    </div>

    <div id="left-nav" class="col-sm-2 col-">
        <h2>Options</h2>
        <button class="btn btn-lg btn-danger">Docs</button>
        <button class="btn btn-lg btn-danger">Images</button>


    </div>

    <div class="col-sm-10" id="upload-file">
        <div class="col-sm-6 col-sm-offset-2">
          <h2>Upload a file</h2>
        <span class="btn btn-info btn-lg btn-file">
        Browse <input type="file">
        </span>
      </div>
    </div>
  </div>

  <div class="col-sm-10 col-sm-offset-2" id="uploads">
     <div class="col-sm-6 col-sm-offset-2">
      <h2>Upload's go here</h2>
     </div> 
  </div>


    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap"></script>
  </body>
</html>