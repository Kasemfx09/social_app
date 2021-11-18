<?php
// require_once "autoloader.php";
if(userLogin()==false){
	header('location:index.php');
}else{
    $login_user = loginUserData('social_users', $_SESSION['id']);
}


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>
            
        </title>
        <!-- ALL CSS FILES  -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="assets/css/photo.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
    </head>

    <body>
        <section id="profile"> 
            <div class="top-profile-box-info profile">
                <div class="profile-photo">
                    <div class="photo-size">
                    <?php if(isset($login_user ->photo)) :  ?>
                    <img src="users_photo/<?php echo $login_user ->photo; ?>" alt=""> 
                    <?php elseif($login_user ->gender=='Male') : ?>
                    <img src="img/avatarmale.jpeg" alt="">
                    <?php elseif($login_user ->gender=='Female'): ?>
                    <img src="img/Female-Avatar-.jpg" alt="">
                    <?php endif; ?>
                    </div>
                    <?php 
                        if(isset($_POST['upload'])){
                        $user_id = $_SESSION['id'];
                        $file = photoUpload($_FILES['photo'], 'users_photo/');
                    
                        update("UPDATE social_users SET photo='$file' WHERE id='$user_id' ");
                        header('location:photo.php');
                        }  
                    ?>

                </div>   
                    <div class="form-submit">
                        <form action="" method="POST">
                            <input type="file" name="photo" id="file_upload" style="display: none;"><br>
                            <label for="file_upload" class="photo-filter"><i class="fa fa-camera" aria-hidden="true"></i></label>
                            <input type="submit" name="upload" value="Upload">
                        </form>
                    </div>
                </div>
        </section>




        <!-- JS FILES  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="assets/js/script.js"></script>
    </body>

    </html>