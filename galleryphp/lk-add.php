<?php 
session_start();
include('include/db_connect.php');
 $user = isset($_SESSION['user']['id']); 


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
    
	$query ="INSERT INTO project (  title, subtitle, text, date, time, user_id, category_id  ) 
    VALUES ( '".mysqli_real_escape_string($mysqli, $title)."', 
    '".mysqli_real_escape_string($mysqli, $subtitle)."',
    '".mysqli_real_escape_string($mysqli, $text)."',
    '".mysqli_real_escape_string($mysqli, $date)."',
    '".mysqli_real_escape_string($mysqli, $time)."',
    '".mysqli_real_escape_string($mysqli, $user_id)."',
    '".mysqli_real_escape_string($mysqli, $category_id)."'
    )";
 
$result = mysqli_query($mysqli, $query) or die("Ошибка " . mysqli_error($mysqli)); 

$id = mysqli_insert_id($mysqli);
if (empty(isset($_POST["upload_image"])))
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
                        <li class="lk__item"><a class="lk__link" href="lk.php">Project</a></li>
                        <li class="lk__item"><a class="lk__link lk__link__active" href="lk-add.php">Add a project</a></li>
                        <li class="lk__item"><a class="lk__link" href="lk-about.php?id=<?= $user ?>">About</a></li>
                       </ul>


                       <div class="row">
                        <div class="col-8">
                            <h2 class="form__title">Add a project</h2>
                            <p class="form__subtitle">Add your project, do not violate the rules of the site</p>
        
                            <form enctype="multipart/form-data" method="post">
                                <div><input class="form__input" type="text" name="title" placeholder="title" id=""></div>
                                <div><input class="form__input" type="text" name="subtitle" placeholder="subtitle" id=""></div>
                                <div>
                                    <textarea class="form__input" name="text" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div><input class="form__input" type="date" name="date" placeholder="date" id=""></div>
                                <div><input class="form__input" type="text" name="time" placeholder="time" id=""></div>
                                <div>
                                    <select class="form__input" name="category_id" id="">
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
                                <label class="stylelabel" >Изображение</label>
                                <div id="baseimg-upload">
                                <input class="form-control" type="hidden" name="MAX_FILE_SIZE" value="5000000"/>
                                <input class="form-control" type="file" name="upload_image" />
                                </div>

                                
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