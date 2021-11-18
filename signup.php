<?php include_once "autoloader.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sign Up</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/signup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>

<?php
if(isset($_POST['sign_up'])){
     $name = $_POST['name'];
     $uname = $_POST['uname'];
     $email = $_POST['email'];
     $cell = $_POST['cell'];
     $pass = $_POST['password'];
     $c_pass = $_POST['c_pass'];
     $gender = NULL;
     $agree = NULL;
  
    if(isset($_POST['gender'])){
         $gender =$_POST['gender'];
    }
    if(isset($_POST['agree'])){
        $agree =$_POST['agree'];
   }

   $hash_password= getHash($pass);

    if(empty( $name) && empty($uname) && empty($email) && empty($cell) &&  empty($pass)  && empty($gender) &&  empty($agree)){
        $msg = danger("All fields are required!");
    }elseif($name==false){
        $msg_name = required("Required name*");
    }elseif($uname==false){
        $msg_uname = required("Required username*");        
    }elseif(emailCheck($email) ==false){
        $msg_mail = required("Required valid email*"); 
    }elseif(dataCheck('social_users', 'email', $email)== false){
        $msg_mail =required("Email already exit!");
    }elseif(cellCheck($cell) ==false){
        $msg_cell = required("Required correct cell number*"); 
    }elseif(dataCheck('social_users', 'cell', $cell)== false){
        $msg_cell =required("Cell number already exit!");
    }elseif($pass ==false){
        $msg_pass = required("Please input password*"); 
    }elseif(passCheck($pass, $c_pass)==false){
        $msg_cpass= required("Re-confirm password didn't match*");         
    }elseif($agree ==false){
        $msg_agree= required("Please accept tearms and conditions*");  
    }else{   
        $msg = sucess("Sign up successfully!");
        formClean();
        create("INSERT  INTO  social_users(name, uname, email, cell, password, gender, agree) VALUES ('$name', '$uname', '$email', '$cell', '$hash_password',  '$gender', '$agree')");
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
                        <h2>Create Account</h2>
                        <span></span>                      
                    </div>
                    <div class="social">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        <i class="fab fa-linkedin-in"></i>
                        <i class="fab fa-google-plus-g"></i>                        
                    </div>
                    <div class="or_email"><p>Or use your email account</p></div>

                          

                    <div class="input_form">
                        <form action="" method="post">
                        <?php if(isset($msg_name)){
                                    echo $msg_name;
                                } ?>
                            <div class="name">
                                <input type="text" name="name" placeholder="Name" value="<?php old('name')?>">
                            </div>
                            <?php if(isset($msg_uname)){
                                    echo $msg_uname;
                                } ?>
                            <div class="uname">
                                <input type="text" name="uname" placeholder="Username" value="<?php old('uname')?>">
                            </div>

                            <?php if(isset($msg_mail)){
                                    echo $msg_mail;
                                } ?>
                            <div class="email">                           
                                <input type="text" name="email" placeholder="Email" value="<?php old('email')?>">
                            </div>
                            <?php if(isset($msg_cell)){
                                    echo $msg_cell;
                                } ?>
                            <div class="cell">
                                <input type="text" name="cell" placeholder="Cell number" value="<?php old('cell')?>">
                            </div>
                            <?php if(isset($msg_pass)){
                                    echo $msg_pass;
                                } ?>
                            <div class="password">
                                <input type="password" name="password" placeholder="Password" value="">
                            </div>
                            <?php if(isset($msg_cpass)){
                                    echo $msg_cpass;
                                } ?>
                            <div class="c_password">
                                <input type="password" name="c_pass" placeholder="Confirm Password" value="">
                            </div>                   

                            <div class="gender-box">                               
                                <div class="gender" >
                                    <label for="male">Male</label>
                                    <input type="radio" name="gender" id="male" value="Male">                                
                                </div>
                                <div class="gender">
                                    <label for="female">Female</label>
                                    <input type="radio" name="gender" id="female" value="Female">                                
                                </div>   
                            </div>  
                            <?php if(isset($msg_agree)){
                                    echo $msg_agree;
                                } ?>
                            <div class="check-box-div ">
                              <input type="checkbox" name="agree" id="rem" class="checkbox" value="agree"/>
                                    <label for="rem" class="label">Agree to the tearms and conditions</label>
                            </div>
                            <div class="signin-button">
                                <input type="submit" name="sign_up" value="Sign Up">
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
                                <a href="index.php">Sign In</a>
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