<?php
	
            $sql = "SELECT * FROM `user` WHERE `id`='$user'";
            $res = $mysqli -> query($sql);

            if($res -> num_rows > 0) {
                while($resArticle = $res -> fetch_assoc()) {

            ?>    
                    
                    <div class="article__block">
                        <h2 class="article__name"><?=  $resArticle['name'] ?></h2>
                        <img class="article__logo" src="uploads_images/<?=  $resArticle['image'] ?>" alt="">
                        <p class="article__mintext"><?=  $resArticle['text'] ?>
                        </p>
                    </div>
    <?php }} ?>