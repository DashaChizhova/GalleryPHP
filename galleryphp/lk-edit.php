<?php 
session_start();
include('include/db_connect.php');
$id = $_GET["id"];
 $user = isset($_SESSION['user']['id']); 

$action = $_GET["action"];
if (isset($action))
{
   switch ($action) {

	    case 'delete':
        
         if (file_exists("uploads_images/".$_GET["image"]))
        {
          unlink("uploads_images/".$_GET["image"]);  
          $query="UPDATE project SET image = NULL WHERE id = $id";
          $result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 
        }
	    break;

	} 
}


if (isset($_POST["submit_add"]))
    {

      $error = array();
      if (count($error))
       {           
            $_SESSION['message'] = "<p id='form-error'>".implode('<br />',$error)."</p>";
            
       }else
       {
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle']; $text = $_POST['text'];
        $date = $_POST['date']; $time = $_POST['time'];
        $category_id = $_POST['category_id']; $user_id = $user;

$querynew = "title='$title', subtitle='$subtitle', text='$text', date='$date', 
time='$time', user_id='$user_id', category_id='$category_id' ";

$update ="UPDATE project SET $querynew WHERE id='$id' ";

$result = mysqli_query($mysqli, $update) or die("Ошибка " . mysqli_error($mysqli));
 
//Если запрос пройдет успешно то в переменную result вернется true
if ($result == 'true') {
	echo "Ваши данные успешно добавлены";
	
	}
else {echo "Ваши данные не добавлены";}
   
      $_SESSION['message'] = "<p id='form-success'>Данные успешно добавлены!</p>";

      if (empty($_POST["upload_image"]))
      {        
        include("admin/action/project_image.php");
      unset($_POST["upload_image"]);           
      } 
      
      
      
  } }   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/setka.css">
    <link rel="stylesheet" href="css/main.css">

</head>
<body>
    
<?php include('include/nav.php'); ?>

    <article class="article">
        <div class="container">
            <div class="row bread">
                <ul>
                    <li class="bread__item"><a class="bread__link" href="index.php">Home</a></li>
                    <li class="bread__item"><img class="bread__img" src="img/ic_outline-keyboard-arrow-right.svg" alt=""></li>
                    <li class="bread__item"><p class="bread__name">Personal account</p></li>
                </ul>
            </div>
            <div class="row">
                
                <div class="col-4">
                <?php include('include/about.php'); ?>
                </div>
                <div class="col-8 article__left">
                    
                       <ul class="lk__list">
                        <li class="lk__item"><a class="lk__link lk__link__active" href="">Editing a project</a></li>
                        <li class="lk__item"><a class="lk__link" href="lk.php">Project</a></li>
                        <li class="lk__item"><a class="lk__link" href="lk-add.php">Add a project</a></li>
                        <li class="lk__item"><a class="lk__link" href="lk-about.php?id=<?= $user ?>">About</a></li>
                       </ul>


                       <div class="row">
                        <div class="col-8">
                            <h2 class="form__title">Editing a project</h2>
                            <p class="form__subtitle">Add your project, do not violate the rules of the site</p>
        
                            <form enctype="multipart/form-data" method="post">

                            <?php
                            $id = $_GET["id"];
	
    $sql = "SELECT * FROM `project` WHERE `id` = '$id'";
    $res = $mysqli -> query($sql);

    if ($res -> num_rows === 1) {
        $resPost = $res -> fetch_assoc()

            ?>	
				 

                                <div><input class="form__input" type="text" value="<?= $resPost['title'] ?>" name="title" placeholder="title" id=""></div>
                                <div><input class="form__input" type="text" value="<?= $resPost['subtitle'] ?>" name="subtitle" placeholder="subtitle" id=""></div>
                                <div>
                                    <textarea class="form__input" name="text" id="" cols="30" rows="10"><?= $resPost['text'] ?></textarea>
                                </div>
                                <div><input class="form__input" type="date" value="<?= $resPost['date'] ?>" name="date" placeholder="date" id=""></div>
                                <div><input class="form__input" type="text" value="<?= $resPost['time'] ?>" name="time" placeholder="time" id=""></div>
                                <div>
                                    <select class="form__input" name="category_id" id="">
                                    <?php 
			$category_name = $resPost['category_id'];
            $sql = "SELECT * FROM `category` WHERE `id`='$category_name'";
            $res = $mysqli -> query($sql);

            if($res -> num_rows > 0) {
                while($resArticle = $res -> fetch_assoc()) {
            
        ?>
                                        <option value="<?=  $resArticle['id'] ?>"><?=  $resArticle['name'] ?></option>
                                        <?php } } ?>
                                    <?php 
			
            $sql = "SELECT * FROM `category`";
            $res = $mysqli -> query($sql);

            if($res -> num_rows > 0) {
                while($resArticle = $res -> fetch_assoc()) {
            
        ?>
                                        <option value="<?=  $resArticle['id'] ?>"><?=  $resArticle['name'] ?></option>
                                        <?php } } ?>
                                    </select>


                                </div> <br>
                                <?php 


if  (	(strlen($resPost["image"]) > 0) && (file_exists("uploads_images/".$resPost["image"]))	)
{
	$img_pathh = 'uploads_images/'.$resPost["image"];
echo '
<label class="stylelabel" >Картинка</label>
<div id="baseimg col-4">
<img style="width: 200px;" src="'.$img_pathh.'" /> <br>
<a class="btn" href="lk-edit.php?id='.$resPost["id"].'&image='.$resPost["image"].'&action=delete" >Удалить</a>
</div>    ';
}else {  
echo '
<label class="stylelabel" >Добавить файл</label>
<div id="baseimg-upload">
<input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
<input class="form-control" type="file" name="upload_image" />
</div> <br>
'; } 

}
?>
                                <input class="form__btn" name="submit_add" type="submit" value="Send">
                            </form>
                
        
                        </div>
                        
                    </div>
                    
                </div>
                
            </div>
        </div>
    </article>

    <?php include('include/footer.php'); ?>


</body>
</html>