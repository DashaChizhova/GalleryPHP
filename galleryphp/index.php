<?php 
    session_start();
    include('include/db_connect.php'); 
    $user = isset($_SESSION['user']['id']); 
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


    <header class="header">
        <div class="container">
            <div class="header__category">
                <ul>
                                               <?php 
            
            $sql = "SELECT * FROM `category`";
            $res = $mysqli -> query($sql);

            if($res -> num_rows > 0) {
                while($resArticle = $res -> fetch_assoc()) {
            
        ?>
                    <li class="header__item"><a href="category.php?id=<?=$resArticle['id']?>" class="header__link">
                        <?=$resArticle['name']?></a></li>
                   <?php } } ?>
                </ul>
            </div>
            <div class="header__utp">
                <h1 class="header__title">Explore the world’s leading <br> design portfolios</h1>
                <h2 class="header__subtitle">Millions of designers and agencies around the world showcase their portfolio work on Dribbble - the<br> home to the world’s best design and creative professionals.</h2>
            </div>
            <div class="header__search">
                <form action="header__form">
                    <input type="search" class="header__form-input" name="" placeholder="Search..." id="">
                </form>
                <ul class="header__tag">
                    <li class="header__tag-item"><p class="header__tag-text">Trending searches</p></li>
                    <li class="header__tag-item"><a href="#" class="header__tag-link">landing page</a></li>
                    <li class="header__tag-item"><a href="#" class="header__tag-link">ios</a></li>
                    <li class="header__tag-item"><a href="#" class="header__tag-link">food</a></li>
                    <li class="header__tag-item"><a href="#" class="header__tag-link">landingpage</a></li>
                    <li class="header__tag-item"><a href="#" class="header__tag-link">uxdesign</a></li>
                    <li class="header__tag-item"><a href="#" class="header__tag-link">app design</a></li>
                </ul>
            </div>
        </div>
    </header>

    <section class="proect">
        <div class="container">
            <div class="row">

            <?php 
			
				$sql = "SELECT t1.id, t1.image, t1.likes, t1.glass, t2.image AS userimage, 
                t2.name AS username, t3.name AS category 
                FROM project t1 
                JOIN user t2 ON (t1.user_id = t2.id)
                 JOIN category t3 ON (t1.category_id = t3.id) 
                 ORDER BY t1.id;";
				$res = $mysqli -> query($sql);

				if($res -> num_rows > 0) {
					while($resArticle = $res -> fetch_assoc()) {
				
			?>
                <div class="col-4 proect__item">
                    <a href="article.php?id=<?= $resArticle['id'] ?>" class="proect__border"><img class="proect__img" src="uploads_images/<?= $resArticle['image'] ?>" alt=""></a>
                    <div class="row justify__content__between align__items__center">
                        <a href="#" class="col-auto">
                            <ul>
                                <li class="proect__inlain"><img class="proect__logo" src="uploads_images/<?= $resArticle['userimage'] ?>" alt=""></li>
                                <li class="proect__inlain"><h2 class="proect__title"><?= $resArticle['username'] ?></h2></li>
                            </ul>
                        </a>
                        <div class="col-auto">
                            <a class="proect__category" href="#"><?= $resArticle['category'] ?></a>
                        </div>
                        <div class="col-auto">
                            <ul>
                                <li class="proect__like"><?= $resArticle['likes'] ?></li>
                                <li class="proect__glass"><?= $resArticle['glass'] ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php } } ?>	
       
            </div>
        </div>
    </section>


    <?php include('include/footer.php'); ?>


</body>
</html>