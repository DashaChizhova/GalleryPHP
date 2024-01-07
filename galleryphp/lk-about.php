<?php 
    session_start();
    include('include/db_connect.php'); 
    $id = $_GET["id"];
    $user = isset($_SESSION['user']['id']); 
    $action = isset($_GET["action"]);
    if (isset($action))
    {
    switch (isset($action)) {

            case 'delete':
            
            if (file_exists(isset($_GET["image"])))
            {
            unlink($_GET["image"]);  
            $query="UPDATE user SET image = NULL WHERE id = $id";
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
        $login = $_POST["login"];
        $name = $_POST["name"];
        $text = $_POST["text"];
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $repeat_password = $_POST["repeat_password"];

        if(isset($password)) {
           
            
            $querynew = "login='$login', pass='$password', name='$name', phone='$phone', 
            email='$email', text='$text'";

            $update ="UPDATE user SET $querynew WHERE id='$id' ";

            $result = mysqli_query($mysqli, $update) or die("Ошибка " . mysqli_error($mysqli));
        
        } else {
                $_SESSION['message'] = 'Passwords dont match!';
        }


        if (empty($_POST["upload_image"]))
      {        
        include("admin/action/about_image.php");
        unset($_POST["upload_image"]);           
      } 

     }
    

}  

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
                        <li class="lk__item"><a class="lk__link" href="lk.php">Project</a></li>
                        <li class="lk__item"><a class="lk__link" href="lk-add.php">Add a project</a></li>
                        <li class="lk__item"><a class="lk__link lk__link__active" href="lk-about.php?id=<?= $user ?>">About</a></li>
                       </ul>


                       <div class="row">
                        <div class="col-8">
                            <h2 class="form__title">Information about me</h2>
                            <p class="form__subtitle">By filling in the data, I agree to the privacy policy</p>
        
                            <form enctype="multipart/form-data" method="post">
                            <?php
                                $id = $_GET["id"];
        
                                $sql = "SELECT * FROM `user` WHERE `id` = '$id'";
                                $res = $mysqli -> query($sql);

                                if ($res -> num_rows === 1) {
                                    $resPost = $res -> fetch_assoc()

                            ?>	
                            <?php 


if  (	(strlen($resPost["image"]) > 0) && (file_exists("uploads_images/".$resPost["image"]))	)
{
	$img_pathh = 'uploads_images/'.$resPost["image"];
echo '
<label class="stylelabel" >Картинка</label>
<div id="baseimg col-4">
<img style="width: 200px;" src="'.$img_pathh.'" /> <br>
<a class="btn" href="lk-about.php?id='.$resPost["id"].'&image='.$resPost["image"].'&action=delete" >Удалить</a>
</div>    ';
}else {  
echo '
<label class="stylelabel" >Добавить файл</label>
<div id="baseimg-upload">
<input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
<input class="form-control" type="file" name="upload_image" />
</div> <br>
'; } 
?>

                                <div><input class="form__input" type="text" name="login" value="<?=  $resPost['login'] ?>" placeholder="Login" id=""></div>
                                <div><input class="form__input" type="text" name="name" value="<?=  $resPost['name'] ?>" placeholder="Name" id=""></div>
                                <div><input class="form__input" type="tel" name="phone" value="<?=  $resPost['phone'] ?>" placeholder="Phone" id=""></div>
                                <div><input class="form__input" type="email" name="email" value="<?=  $resPost['email'] ?>" placeholder="Email" id=""></div>
                                <div><textarea class="form__input" name="text" id="" cols="30" rows="10"><?=  $resPost['text'] ?></textarea></div>
                                <div><input class="form__input" type="password" name="password" value="<?=  $resPost['pass'] ?>" placeholder="Password" id=""></div>
                                <div><input class="form__input" type="password" name="repeat_password"  placeholder="Repeat at password" id=""></div>
           
                            <?php  } ?>
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