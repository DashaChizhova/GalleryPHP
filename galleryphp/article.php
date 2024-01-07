<?php 
    session_start();
    include('include/db_connect.php'); 
    $user = isset($_SESSION['user']['id']); 

    $id = $_GET["id"];

    $sql="SELECT t1.id,t1.image, t1.title, t1.subtitle, t1.text, t1.date, t1.time, t1.likes, t1.glass, 
    t2.image AS userimage, 
    t2.name AS username, 
    t2.text AS usertext, 
    t3.name AS category 
    FROM project t1 
    JOIN user t2 ON (t1.user_id = t2.id)
     JOIN category t3 ON (t1.category_id = t3.id) 
    WHERE t1.id = '$id'";

		$res = $mysqli -> query($sql);
		
		if ($res -> num_rows === 1) {
			
			$resPost = $res -> fetch_assoc() 

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
                    <li class="bread__item"><a class="bread__link" href="#">Proect</a></li>
                    <li class="bread__item"><img class="bread__img" src="img/ic_outline-keyboard-arrow-right.svg" alt=""></li>
                    <li class="bread__item"><p class="bread__name"><?= $resPost['title'] ?></p></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-8 article__right">
                    <!-- см в article строка 8 -->
                       <h2 class="article__title"><?= $resPost['title'] ?></h2>
                        <h3 class="article__subtitle"><?= $resPost['subtitle'] ?></h3>

                        <ul class="article__list">
                            <li class="article__type"><img src="img/time.png" alt=""><?= $resPost['time'] ?> read</li>
                            <li class="article__type"><img src="img/graf.png" alt="">1.6K views</li>
                            <li class="article__type"><?= $resPost['category'] ?></li>
                            <li class="article__type"><?= $resPost['date'] ?></li>
                        </ul>


                        <div>
                            <img class="article__img" src="uploads_images/<?= $resPost['image'] ?>" alt="">
                        </div>

                        <div class="row">
                            <div class="col-1">
                                <ul>
                                    <li class="article__soc"><a href=""><img src="img/soc/f.svg" alt=""></a></li>
                                    <li class="article__soc"><a href=""><img src="img/soc/inst.svg" alt=""></a></li>
                                    <li class="article__soc"><a href=""><img src="img/soc/p.svg" alt=""></a></li>
                                    <li class="article__soc"><a href=""><img src="img/soc/tv.svg" alt=""></a></li>
                                </ul>
                            </div>
                            <div class="col-11 article__txt">

                                <?= $resPost['text'] ?>

                            </div>
                        </div>
                    

                </div>
                <div class="col-4">
                    <div class="article__block">
                        <h2 class="article__name"><?= $resPost['username'] ?></h2>
                        <img class="article__logo" src="uploads_images/<?= $resPost['userimage'] ?>" alt="">
                        <p class="article__mintext"><?= $resPost['usertext'] ?></p>
                        <ul>
                            <li class="proect__like like" data-id="<?= $resPost['id'] ?>"><span class="counter"><?= $resPost['likes']?></span></li>
                            <li class="proect__glass"><?= $resPost['glass'] ?></li>
                        </ul>

                    </div>
                </div>
            </div>
        </div>
    </article>

    <?php include('include/footer.php'); ?>

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/likes.js"></script>



</body>
</html>
<?php } ?>