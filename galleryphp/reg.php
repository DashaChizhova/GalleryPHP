<?php 
session_start();
include('include/db_connect.php'); 
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


    <section class="form">
        <div class="container">
            <div class="row justify__content__center form__shadow">
                <div class="col-5 form__block">
                    <h2 class="form__title">Welcome!</h2>
                    <p class="form__subtitle">Register to make full use of our resource.</p>

                    <form enctype="multipart/form-data" method="post" action="include/reg.php">
                    <div><input class="form__input" type="text" name="login" placeholder="Login" id=""></div>
                        <div><input class="form__input" type="text" name="name" placeholder="Name" id=""></div>
                        <div><input class="form__input" type="tel" name="phone" placeholder="Phone" id=""></div>
                        <div><input class="form__input" type="email" name="email" placeholder="Email" id=""></div>
                        <div><input class="form__input" type="password" name="password" placeholder="Password" id=""></div>
                        <div><input class="form__input" type="password" name="repeat_password" placeholder="Repeat at password" id=""></div>
                        <div><input class="form__input" type="file" name="avatar" placeholder="Your photo" id=""></div>
                        <div><input type="text" name="rights" value="user" style="display: none;" id=""></div>
                        <input class="form__btn" type="submit" value="Send">
                    </form>
                    <?php 
                        if(isset( $_SESSION['message'])){
                        echo '<p class="form__polit">' . $_SESSION['message'] . '</p>';
                        }
                        unset( $_SESSION['message']);
		            ?>
                    <p class="form__polit">By clicking on the button you agree to the privacy policy</p>

                </div>
                <div class="col-5 form__image-reg"></div>
            </div>
        </div>
    </section>
   

    <?php include('include/footer.php'); ?>


</body>
</html>