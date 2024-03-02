<?php 
session_start();
include('include/db_connect.php');
 $user = $_SESSION['user']['id']; 
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
                        <li class="lk__item"><a class="lk__link lk__link__active" href="lk.php">Project</a></li>
                        <li class="lk__item"><a class="lk__link" href="lk-add.php">Add a project</a></li>
                        <li class="lk__item"><a class="lk__link" href="lk-about.php?id=<?= $user ?>">About</a></li>
                       </ul>


                       <div class="row">

                       <?php 
			$user = $_SESSION['user']['id'];
            $sql = "SELECT * FROM `project` WHERE `user_id`='$user'";
            $res = $mysqli -> query($sql);

            if($res -> num_rows > 0) {
                while($resArticle = $res -> fetch_assoc()) {
            
        ?>
                        <div class="col-6 proect__item">
                            <a href="#" class="proect__border"><img class="proect__img" src="uploads_images/<?=  $resArticle['image'] ?>" alt=""></a>
                            <div class="row justify__content__between align__items__center">
                                <div class="col-auto">
                                    <a class="lk__ed" href="lk-edit.php?id=<?= $resArticle['id'] ?>">Edit</a>
                                    <a class="lk__del" href="admin/delete/project.php?id=<?= $resArticle['id'] ?>">Delete</a>
                                </div>
                                <div class="col-auto">
                                    <ul>
                                        <li class="proect__like">79</li>
                                        <li class="proect__glass">4k</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php } } ?>

                        
                    </div>
                    
                </div>
                
            </div>
        </div>
    </article>

    <?php include('include/footer.php'); ?>


</body>
</html>