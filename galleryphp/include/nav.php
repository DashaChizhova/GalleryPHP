<nav class="nav">
        <div class="container-full">
            <div class="row justify__content__between align__items__center">
                <div class="col-auto">
                    <ul>
                        <li class="nav__item"><a href="index.php" class="nav__link"><img class="nav__img" src="img/logo.svg" alt=""></a></li>
                        <li class="nav__item"><a href="#" class="nav__link">Inspiration</a></li>
                        <li class="nav__item"><a href="#" class="nav__link">Find Work</a></li>
                        <li class="nav__item"><a href="#" class="nav__link">Learn Design</a></li>
                        <li class="nav__item"><a href="#" class="nav__link">Go Pro</a></li>
                        <li class="nav__item"><a href="#" class="nav__link">Design Files</a></li>
                        <li class="nav__item"><a href="#" class="nav__link">Hire Designers</a></li>
                    </ul>
                </div>
                <div class="col-auto">
                    <ul>
                        <?php 
                            if(isset($_SESSION['user']['rights'])=='user' || isset($_SESSION['user']['rights'])=='admin') {
                        ?>  
                            <li class="nav__item"><a href="lk.php" class="nav__sign"><img style=" height: 17px; vertical-align: middle;" src="img/userlogo.png" alt=""></a></li>
                            <li class="nav__item"><a href="include/logout.php" class="nav__sign">Exit</a></li>
                        <?php  } else { ?>
                            <li class="nav__item"><a href="aut.php" class="nav__sign">Sign in</a></li>
                            <li class="nav__item"><a href="reg.php" class="nav__btn">Share my work</a></li>
                        <?php } ?>
                        
                    </ul>
                </div>
            </div>
        </div>
    </nav>
