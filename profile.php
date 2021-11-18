<?php
require_once "autoloader.php";

if(userLogin()==false){
	header('location:index.php');
}else{
    if(isset($_GET['user_id'])){
        $login_user = loginUserData('social_users', $_GET['user_id']);

    }else{
        $login_user = loginUserData('social_users', $_SESSION['id']);
    }
    
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
        <link rel="stylesheet" href="assets/css/profile.css">
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
                        <?php if(isset($login_user ->photo)) :  ?>
                        <img src="users_photo/<?php echo $login_user ->photo;?>" alt=""> 
                        <?php elseif($login_user ->gender=='Male') : ?>
                        <img src="img/avatarmale.jpeg" alt="">
                        <?php elseif($login_user ->gender=='Female'): ?>
                        <img src="img/Female-Avatar-.jpg" alt="">
                        <?php endif; ?>
                        
                        </div>
                        <?php 
                        if(isset($_POST['upload'])){
                        $user_id = $_SESSION['id'];
                        $file = photoUpload($_FILES['photo'],'users_photo/');
                    
                        update("UPDATE social_users SET photo='$file' WHERE id='$user_id'");
                        header('location:profile.php');
                        }  
                        ?>
                       

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
                    <div class="top-profile-box-info cover-photo"><img src="img/coverphoto.png" alt=""></div>
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

            <!-- Profile  -->
            <div id="profile-box">
                <div class="heading">
                    <h2>Profile Details</h2>
                </div>
                <div class="profile-container">
                    <div class="profile-menu">
                        <ul class="gallery-filter">
                            <li class="filter-item active" data-filter="general">General</li>
                            <li class="filter-item" data-filter="address">Address</li>
                            <li class="filter-item" data-filter="social">Social</li>
                            <li class="filter-item" data-filter="Setting">Setting</li>
                            <li> <a href="password.php"> Password Change</a></li>
                        </ul>
                    </div>
                    <div class="profile-content general"> 

                        <div class="profile-uname">
                            <p>
                                <Strong>Username:</Strong>  <?php echo $login_user->uname; ?>  
                            </p>
                        </div>
                        <div class="profile-name">
                            <p>
                                <Strong>Name:</Strong>  <?php echo $login_user->name; ?> 
                            </p>
                        </div>  
                        <?php if($login_user->education!=NULL): ?>
                        <div class="profile-education">
                            <p>
                                <Strong>Education:</Strong>   <?php echo $login_user->education; ?>
                            </p>
                        </div> 
                        <?php endif; ?>
                        <?php if($login_user->occupation!=NULL): ?>
                        <div class="profile-occupation">
                            <p>
                                <Strong>Occupation:</Strong>  <?php echo $login_user->occupation; ?>  
                            </p>
                        </div>  
                        <?php endif; ?>
                        <?php if($login_user->age!=NULL): ?>
                        <div class="profile-age">
                            <p>
                                <Strong>Age:</Strong>  <?php echo $login_user->age; ?>
                            </p>
                        </div>  
                        <?php endif; ?>
                        <div class="profile-gender">
                            <p>
                                <Strong>Gender:</Strong>   <?php echo $login_user->gender; ?>
                            </p>
                        </div>  
                        <div class="profile-email">
                            <p>
                                <Strong>Email:</Strong>   <?php echo $login_user->email; ?>
                            </p>
                        </div>  
                        <div class="profile-cell">
                            <p>
                                <Strong>Cell:</Strong> <?php echo $login_user->cell; ?>
                            </p>
                        </div>  
                        <?php if($login_user->about_me !=NULL): ?>
                        <div class="profile-about">
                            <p>
                                <Strong>Address:</Strong> <?php echo $login_user->about_me;?>
                            </p>
                        </div>
                        <?php endif; ?>
                        <div class="update"><a href="edit.php">Edit</a> </div>
                                     
                    </div>
                    <!-- address -->
                    <!-- <div class="profile-content address">
                        <div class="profile-address">
                            <p>
                                <Strong>Address:</Strong> 
                            </p>
                        </div>
                        <div class="update"><a href="#">Update</a> </div>
                    </div>
                    <div class="profile-content social">
                        <div class="profile-address">
                            <p>
                                <Strong>Lorem ipsum dolor sit amet consectetur adipisicing elit. Reiciendis, animi.</Strong>
                            </p>
                        </div>
                        <div class="update"><a href="#">Update</a> </div>
                    </div> -->
                </div>
            </div>
            </div>
        </section>




        <!-- JS FILES  -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="assets/js/script.js"></script>
    </body>

    </html>