<?php
// include_once ('../../app/app-settings.php');
// include_once ('../adm_app/adm_app-settings.php');
$name = $_POST['name'];
$image = $_POST['image'];
$folder = $_POST['folder'];

var_dump($image); 


exit();
list($type, $image) = explode(';',$image);
list(, $image) = explode(',',$image);

$image = base64_decode($image);
$image_name =$name;


file_put_contents($folder.$image_name, $image);




// 	$sql = "UPDATE $table_name 
// 			SET 
// 			image = ?
// 		WHERE id = $id;";
// 	$stmt = mysqli_stmt_init($conn);

// if (!mysqli_stmt_prepare($stmt, $sql)) {
//   echo "SQL STMT error";
// } else{
// 	mysqli_stmt_bind_param($stmt, "s", $image_name);
// 	mysqli_stmt_execute($stmt);


// }


?>