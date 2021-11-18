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
    <title><?php echo $login_user->uname;?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/edit.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
<?php
if(isset($_POST['update'])){
     $name = $_POST['name'];
     $uname = $_POST['uname'];
     $education = $_POST['education'];
     $occupation = $_POST['occupation'];
     $age = $_POST['age'];
     $email = $_POST['email'];
     $cell = $_POST['cell'];  
     $about_me = $_POST['about_me'];  

     $login_user_id = $login_user->id;
     $update_at = date('Y-m-d h:m:s');
  
 

    if(empty($name) || empty($uname) || empty($email) || empty($cell)){
        $msg = danger("All fields are required!");
    }else{          
        update("UPDATE social_users SET name ='{$name}', uname='{$uname}', education='{$education}',occupation='{$occupation}', age='{$age}', email='{$email}', cell='{$cell}', about_me='{$about_me}', update_at='{$update_at}' WHERE id='{$login_user_id}'");
        setMsg('success', 'Data Updated!');
        header('location:profile.php');
    }


   
}

?>
<section id="login">
    <div class="login-container">
        <div class="login-content">
            <div class="login-info">
                <div class=" item sign_in">                         
                    <div class="heading">
                        <h2>Update your profile</h2>
                        <span></span>                      
                    </div>
                 
                    <?php if(isset($msg)){
                        echo $msg;
                    } 
                    getMsg('success');
                    ?>
                    <div class="input_form">
                        <form action="" method="post">  
                        <div class="uname">
                                <input type="text" name="uname" placeholder="Username" value="<?php echo $login_user->uname;?>">
                            </div>                     
                            <div class="name">
                                <input type="text" name="name" placeholder="Name" value="<?php echo $login_user->name;?>">
                            </div>
                          
                           
                            <div class="uname">
                                <input type="text" name="education" placeholder="Education" value="<?php echo $login_user->education;?>">
                            </div>
                         
                            <div class="email">                           
                                <input type="text" name="occupation" placeholder="Occupation" value="<?php echo $login_user->occupation;?>">
                            </div>

                            <div class="email">                           
                                <input type="text" name="age" placeholder="Age" value="<?php echo $login_user->age;?>">
                            </div>
                            <div class="gender-box">                               
                                <div class="gender" >
                                    <label for="male">Male</label>
                                    <input type="radio" name="gender" checked id="male" value="Male" <?php echo ($login_user->gender=='Male')? 'checked' : ' '; ?>>                                
                                </div>
                                <div class="gender">
                                    <label for="female">Female</label>
                                    <input type="radio" name="gender" id="female" value="Female" <?php echo ($login_user->gender=='Female')? 'checked' : ' '; ?>>                                
                                </div>   
                            </div> 
                            <div class="email">                           
                                <input type="text" name="email" placeholder="Email" value="<?php echo $login_user->email;?>">
                            </div>
                            <div class="cell">
                                <input type="text" name="cell" placeholder="Cell number" value="<?php echo $login_user->cell;?>">
                            </div>
                         
                            <div class="about_me">
                                <textarea  name="about_me" placeholder="About me" value="<?php echo $login_user->about_me;?>"> </textarea>
                            </div>                
                        
                            <div class="signin-button">
                                <div class="update">
                                <input type="submit" name="update" value="Update"></a>
                                </div>
                                <div class="update">
                                <a href="profile.php" > Cancel</a>
                                </div>                               
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