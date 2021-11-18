<?php include_once "autoloader.php"; 
if(userLogin()==false){
	header('location:index.php');
}else{
    $login_user = loginUserData('social_users', $_SESSION['id']);
} 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $login_user->uname; ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/password.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

<section id="profile">
            <div class="header">
                <div class="header-box">
                    <a href="signout.php">Sign Out</a>
                </div>
            </div>

            <div class="top-profile-container">
                <div class="top-profile-box">
                    <div class="top-profile-box-info profile">
                    <div class="profile-photo">
                        <a href="photo.php">
                              <?php if(isset($login_user ->photo)) :  ?>
                               <img src="users_photo/<?php echo $login_user ->photo; ?>" alt=""> 
                                <?php elseif($login_user ->gender=='Male') : ?>
                                <img src="img/avatarmale.jpeg" alt="">
                                <?php elseif($login_user ->gender=='Female'): ?>
                                <img src="img/Female-Avatar-.jpg" alt="">
                                <?php endif; ?>
                        </a>

                        <form action="" method="POST">
                            <input type="file" name="photo" id="file_upload" style="display: none;"><br>
                            <label for="file_upload" class="photo-filter"><i class="fa fa-camera" aria-hidden="true"></i></label>
                            <input type="submit" name="upload" value="Upload">
                        </form>
                    </div>

                        <div class="profile-info">
                            <div class="info">
                                <p style="color:#0ECA96;"><strong>Username:</strong>
                                    <?php echo $login_user->uname; ?>
                                </p>
                            </div>
                            <div class="info">
                                <p><strong>Name:</strong>
                                    <?php echo $login_user->name; ?>
                                </p>
                            </div>
                            <div class="info">
                                <p><strong>Gender:</strong>
                                    <?php echo $login_user->gender; ?>
                                </p>
                            </div>
                            <div class="info">
                                <p><strong>Email:</strong>
                                    <?php echo $login_user->email; ?>
                                </p>
                            </div>
                            <!-- <div class="info"><p><strong>Ocupation:</strong> PHP Developer</p></div>
					        <div class="info"><p><strong>Country:</strong> Bangladesh</p></div> -->
                            <div class="info">
                                <p><strong>Cell:</strong>
                                    <?php echo $login_user->cell; ?>
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="top-profile-box-info cover-photo"><img src="img/cover-photo.jpg" alt=""></div>
                </div>
            </div>
            <!-- Menu bar -->


            <div class="menu">
                <div class="menu-bar-container">
                    <div class="menu-bar-content">
                        <div class="menu-info" ><a href="profile.php"><i class="fa fa-home" aria-hidden="true"></i>My Profile</a> </div>
                        <div class="menu-info" ><a href="photogallery.php"><i class="fa fa-camera" aria-hidden="true"></i>Photo</a></div>
                        <div class="menu-info"><a href="video.php"><i class="fa fa-video-camera" aria-hidden="true"></i>Video</a></div>
                        <div class="menu-info" ><a href="friends.php"><i class="fa fa-handshake-o" aria-hidden="true"></i>Friends</a></div>
                    </div>
                    <div class="menu-bar-searching">
                        <div class="searching">
                            <form action="" method="post">
                                <input type="text" name="search" placeholder="Search">
                            </form>
                        </div>
                    </div>
                </div>
            </div>         






<?php
if(isset($_POST['change_pass'])){
    $old_pass= $_POST['old'];
     $new_pass = $_POST['new'];
     $c_pass = $_POST['cnew'];
  
  
  
   $hash_password= getHash($old_pass);

    if(empty( $old_pass)|| empty($new_pass) ||empty($c_pass)){
        $msg = danger("All fields are required!");
    }elseif($new_pass != $c_pass ){
         $msg_pass = required("Confirm password didn't match*"); 
    }elseif(password_verify($old_pass, $login_user->pass)==false){
         $msg_cpass= required("Old password didn't match*");         
    }else{         
        update("UPDATE social_users SET pass=' $hash_password=' WHERE id ='$login_user->id' ");
        session_destroy();
        header('location:index.php');
    }


   
}
?>
   
<section id="login">
    <div class="login-container">
        <div class="login-content">
            <div class="login-info">
                <div class=" item sign_in">
                         <?php 
                            if(isset($msg)){
                                echo $msg;
                            }
                            ?>
                    <div class="heading">
                        <h2>Change Password</h2>
                        <span></span>                      
                    </div>  

                    <div class="input_form">
                        <form action="" method="post">
                          
                          
                            <div class="password">
                                <input type="password" name="old" placeholder="Old Password" value="">
                            </div>
                            <?php if(isset($msg_pass)){
                                        echo $msg_pass;
                                    } ?>  
                            <div class="password">
                                <input type="password" name="new" placeholder="New Password" value="">
                            </div>

                            <div class="c_password">
                                <input type="password" name="cnew" placeholder="Confirm Password" value="">
                            </div>
                            <div class="signin-button">
                                <input type="submit" name="change_pass" value="Change Password">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="assets/js/slick.min.js"></script>
    <script src="assets/js/fontawesome.js"></script>
    <script src="assets/js/script.js" async defer></script>
</body>

</html>