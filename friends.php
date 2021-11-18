<?php
require_once "autoloader.php";

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
        <?php echo $login_user->uname; ?>
        </title>
        <!-- ALL CSS FILES  -->
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="assets/css/friends.css">
        <link rel="stylesheet" href="assets/css/responsive.css">
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
                     <div class="photo-size">
                              <?php if(isset($login_user ->photo)) : ?>
                               <img src="users_photo/<?php echo $login_user ->photo; ?>" alt=""> 
                                <?php elseif($login_user ->gender=='Male') : ?>
                                <img src="img/avatarmale.jpeg" alt="">
                                <?php elseif($login_user ->gender=='Female'): ?>
                                <img src="img/Female-Avatar-.jpg" alt="">
                                <?php endif; ?>                       
                                </div>
                        <form action="" method="POST" enctype="multipart/form-data">
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
                        <div class="menu-info" ><a href=""><i class="fa fa-handshake-o" aria-hidden="true"></i>Friends</a></div>
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


            <!-- Friends -->
            <div class="friends" id="">
                <div class="friends-heading">
                    <div class="heading">
                        <h2>My Friends</h2>
                    </div>                   
                </div>
                <div class="friends-cards"> 
                    <?php 

                    $all_users= all('social_users');
                    while($users= $all_users->fetch_object()):
                     ?>
                     
                     <?php if($users->id != $_SESSION['id'])  : ?>

                    <div class="friends-cards-box">
                        <div class="image">
                           <div class="color"></div>
                           <?php if(isset($users->photo)) : ?>
                               <img src="users_photo/<?php echo $users ->photo; ?>" alt=""> 
                                <?php elseif($users ->gender=='Male') : ?>
                                <img src="img/avatarmale.jpeg" alt="">
                                <?php elseif($users ->gender=='Female'): ?>
                                <img src="img/Female-Avatar-.jpg" alt="">
                                <?php endif; ?> 
                        </div>
                        <div class="friends-info">
                            <h2><?php echo $users->name;?></h2>
                        </div> 
                        <div class="friends-profile">
                            <a href="profile.php?user_id=<?php echo $users->id; ?>">View Profile</a>
                        </div>                                           
                    </div>
                    <?php endif; ?>
                    <?php endwhile;?>
                 
                </div>
                
            </div>
        </section>




        <!-- JS FILES  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="assets/js/script.js"></script>
    </body>

    </html>