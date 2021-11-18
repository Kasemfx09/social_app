<?php include_once "autoloader.php"; 
if(userLogin()==true){
	header('location:profile.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign In</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <?php





        // if(isset($_POST['sign_in'])){
        //      $email = $_POST['email'];
        //      $pass = $_POST['pass'];
        //     if(empty($email) || empty($pass)){
        //         $msg =danger("All fields are required!");
        //     }else{
        //         $signin_data= authCheck( 'social_users', 'email', $email );
        //         if($signin_data !== false ){
                    
        //             if(pwCheck($pass, $signin_data->pass)){                
        //                 $_SESSION['id']= $signin_data->id; 
        //                 header('location:profile.php'); 
        //             }else{
        //                 $msg =danger("Incorrect password");
                        
        //             } 
        //         }else{
        //             $msg=danger("Invalid email address!");
        //         }
        //     }
        // }
        if(isset($_POST['sign_in'])){

            //get value
    
            $email = $_POST['email'];
            $pass = $_POST['password'];
    
            if(empty($email) || empty($pass)){
                $msg =danger("All fields are required!");
            }else{
    
                $login_user_data = authCheck('social_users', 'email', $email);
    
                if($login_user_data !== false){
                    $_SESSION['id'] = $login_user_data->id;
                    if(pwCheck($pass, $login_user_data->password)){
    
                     
    
                        header('location:profile.php');
    
                    }else{
                        $msg = danger('Password doesnt match');
                    }
                }else{
                    $msg = danger('Invalid Login Email');
                }
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
                        <h2>Sign in to Account</h2>
                        <span></span>                      
                    </div>
                    <div class="social">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        <i class="fab fa-linkedin-in"></i>
                        <i class="fab fa-google-plus-g"></i>                        
                    </div>
                    <div class="or_email"><p>Or use your email account</p></div>
                    <div class="input_form">
                        <form action="" method="POST">
                            <div class="email">
                                <input type="text" name="email" placeholder="Email or Cell number" value="<?php old('email') ?>">
                            </div>
                            <div class="password">
                                <input type="password" name="password" placeholder="Password" value="">
                            </div>
                            
                            <div class="check-box-div ">
                              <input type="checkbox" name="check" id="rem" class="checkbox" />
                                    <label for="rem" class="label">Remember me!</label>
                                <a href="#"> Forgot Password?</a>
                            </div>
                            <div class="signin-button">
                                <input type="submit" name="sign_in" value="Sign In">
                            </div>
                        </form>
                    </div>
                </div>               
                <div class="item sign_up">
                    <div class="sign_up_info">
                        <div class="heading">
                            <h2>Welcome Friend!</h2>
                            <span></span>  
                            <p>Fill up personal information and <br> start journy with us!</p>                                             
                        </div>
                        <div class="signup-button">
                            <a href="signup.php">Sign Up</a>
                        </div>   
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

