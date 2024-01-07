<?php 

$id = intval($_POST["id"]);
$count = 0;
$message = "";
$error = true;

if($id){
	$query = $mysqli -> prepare("UPDATE project SET likes = likes + 1 WHERE id=:id");
	$query->execute(array(":id"=>$id));

	$query = $mysqli->prepare("SELECT likes FROM project WHERE id = :id");
	$query->execute(array(":id"=>$id));
	$result = $query->fetch(PDO::FETCH ASSOC);
	$count = isset($result["likes"])?$result["likes"]:0;

	$error = false;

} else{
	$error = true;
	$message = "No project";
}
$out = array(
	'error'=>$error,
	'message'=>$message,
	'count'=>$count,



);
header('Content-Type: text/json; charset=utf-8');

echo json_encode($out);

?>