<?Php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "angularcode";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['action']) ) {
    $action = $_POST['action'];
    if($action == 'gallery'){
    	decode();
    }else if($action == 'delete'){
		delete();
	}
}else{
    	upload();
    	
    }

function upload(){
	$target_dir = "./uploads";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
	if(isset($_POST["submit"])) {
		$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		if($check !== false) {
			echo "File is an image - " . $check["mime"] . ".";
			$uploadOk = 1;
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}
// Check if file already exists
	if (file_exists($target_file)) {
		echo "Sorry, file already exists.";
		$uploadOk = 0;
	}
// Check file size
	if ($_FILES["fileToUpload"]["size"] > 50000000) {
		echo "Sorry, your file is too large.";
		$uploadOk = 0;
	}
// Allow certain file formats
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" && $imageFileType != "mp3" && $imageFileType != "mp4" && $imageFileType != "doc" && $imageFileType != "pptx") {
		echo "Sorry, only JPG, JPEG, PNG, GIF, MP3, MP4, DOC and PPTX files are allowed.";
	$uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		echo "File uploaded"
		encode($target_file);
	} else {
		echo "Sorry, there was an error uploading your file.";
	}
}echo "File uploaded"
}
function encode($target_file){
	$finalimage = chunk_split(base64_encode($target_file));
	$sql = "INSERT INTO files_table SET filedata='$finalimage'";
	global $conn;
	mysqli_query($conn, $sql);
	echo "File uploaded"
	
}

function decode(){
	global $conn;
	//$category = $conn->real_escape_string($_POST['category']);
	$sql = "SELECT filedata FROM files_table ";
	$result = mysqli_query($conn, $sql);
	while ($row = mysqli_fetch_array($result)) {
		$thenewimage= $row["filedata"];
		$image = base64_decode($thenewimage);
		$imageFileType = pathinfo($image,PATHINFO_EXTENSION);
		if( $imageFileType == "doc"){
			echo '<a href="'.$image.'"download="'.$image.'"><img src="doc.png"  height="200" width="200" ></a>aaa';
		}
		if else($imageFileType == "jpg"){
			echo '<a href="'.$image.'"download="'.$image.'"><img src="doc.png"  height="200" width="200" ></a>bbb';
		}
		echo '<a href="'.$image.'"download="'.$image.'"><img src="'.$image.'"  height="200" width="200" ></a>ccc'; 
		echo "".$image."";
	}
	
}
?>