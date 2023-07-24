<?php
    @include 'connection.php';

    if(isset($_POST['register_submit'])){
    $name = mysqli_real_escape_string($conn, $_POST['your_name']);
    $email = mysqli_real_escape_string($conn, $_POST['your_email']);
    //$pass = $_POST['your_password'];
    //$cpass = $_POST['your_cpassword'];
    $pass = md5($_POST['your_password']);
    $cpass = md5($_POST['your_cpassword']);
    $user_type = $_POST['user_type'];

    $select = "SELECT * FROM reg_form WHERE your_email = '$email' ";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $error[] = 'user email already exist!'; 
    }else{
        if($pass != $cpass){
            $error[] = 'password not matched!';
        }else{
            $insert = "INSERT INTO reg_form(your_name, your_email, your_password, user_type) 
            VALUES('$name', '$email', '$pass', '$user_type')";
            mysqli_query($conn, $insert);
            header('location:login.php');
        }
        }
    };
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
        <!-- ?bootstrap css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"/>
        
        <!--?google font-->
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@500&display=swap');
        </style>
    
        <!--?SVG icons link-->
        <link
            rel="stylesheet"
            href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css"
        />
    
        <!--?Font-Awesome icons link-->
        <script
            src="https://kit.fontawesome.com/14e533ff66.js"
            crossorigin="anonymous"
        ></script>
    
        <!-- ?MyStyle link -->
        <link rel="stylesheet" href="style2.css" />
    
        <title>Hospital Management System</title>
    </head>
<body>

    <!-- ?Navbar -->
    <nav class="navbar sticky-top navbar-expand-md mynavbar loginnavbar">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#main_menu"
          aria-expanded="true"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"><i class="far fa-clone"></i></span>
        </button>
        <a class="navbar-brand" href="#">medino Hospital</a>
        <div class="collapse navbar-collapse mycontainer" id="main_menu">
          <ul>
            <li class="nav-item Home"><a href="index.php">HOME</a></li>
            <li class="nav-item Service"><a href="index.php#Service">SERVICES</a></li>
            <li class="nav-item Appointment"><a href="index.php#Appointment">APPOINTMENT</a></li>
            <li class="nav-item Doctors"><a href="index.php#Doctors">DOCTORS</a></li>
            <li class="nav-item Blogs"><a href="index.php#Blogs">BLOGS</a></li>          
          </ul>
        </div>
    </nav>

    <!--?LOGIN-->
    <section class="login" id="">
        <div class="container-lg">
            <div class="text-center">                                 
                <p class="card-title">SIGNUP</p>
                <div class="line"></div>
            </div>                                 
            <div class="">
                <form class="row g-4" action="#" method="post">

                    <?php
                        if(isset($error)){
                            foreach($error as $error){
                                echo '<span class = "error-msg">'.$error.'</span>';
                            };
                        };
                    ?>
                        <div class="col-3"></div>
                    <div class="col-6 form-group">                            
                        <input type="text" name="your_name" class="form-control" id="exampleInputName" placeholder="Your Name*" required/>                            
                    </div>                    
                        <div class="col-3"></div>
                        <div class="col-3"></div>
                    <div class="col-6 form-group">                        
                        <input type="email" name="your_email" class="form-control" id="exampleInputEmail1" placeholder="Your Email*" required/>                            
                    </div>
                        <div class="col-3"></div>
                        <div class="col-3"></div>
                    <div class="col-6 form-group">                            
                        <input type="password" name="your_password" class="form-control" id="exampleInputPassword1" placeholder="Write a Strong Password*" required/>
                    </div>
                        <div class="col-3"></div>
                        <div class="col-3"></div>
                    <div class="col-6 form-group">
                        <input type="password" name="your_cpassword" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password" required/>
                    </div>
                        <div class="col-3"></div>
                        <div class="col-3"></div>
                    <div class="col-6 form-group">
                        <select name="user_type" class="form-control">
                            <option selected>register as</option>
                            <option value="patient">Patient</option>
                            <option value="assistant">Assistant</option>
                        </select>
                    </div>
                        <div class="col-3"></div>
                    <div class="col-12 text-center">
                        <input class="btn all-btn" href="" role="button" type="submit" name="register_submit" value="Register Now">
                    </div>
                        <div class="col-3"></div>
                    <div class="col-6 form-group signbtn-group">                            
                            <label for="exampleInputEmail1" class="form-label">Already Have an Account?</label>
                            <a class="btn signbtn" href="login.php" role="button">LOGIN</a>                                                    
                    </div>                    
                </form>
            </div>                       
        </div>
    </section>


    <!-- ?bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>