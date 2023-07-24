<?php
    @include 'connection.php';

    session_start();

if(isset($_POST['login_submit'])){
    //$name = mysqli_real_escape_string($conn, $_POST['your_name']);
    $email = mysqli_real_escape_string($conn, $_POST['your_email']);
    $pass = md5($_POST['your_password']);
    //$cpass = md5($_POST['your_cpassword']);
    //$user_type = $_POST['user_type'];

    $select = "SELECT * FROM reg_form WHERE your_email = '$email' && your_password = '$pass' ";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result); 

        if($row['user_type'] == 'assistant'){

            $_SESSION['assistant_name'] = $row['your_name'];
            header('location:assistant.php');

        }elseif($row['user_type'] == 'patient'){

            $_SESSION['patient_name'] = $row['your_name'];
            header('location:patient.php');

        }
    }else{
        $error[] = 'incorrect email or password!';
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
        <a class="navbar-brand" href="#">MEDINO Hospital</a>
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
    <section class="login" id="login">
        <div class="container-lg">
            <div class="text-center">                                 
                <p class="card-title">LOGIN</p>
                <div class="line"></div>
            </div>                                 
            <div class="">
            <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<span class = "error-msg">'.$error.'</span>';
                    };
                };
            ?>
                <form class="row g-2" action="#" method="post">         
                            <div class="col-3"></div>
                        <div class="col-6 form-group">              
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="your_email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>                            
                        </div>
                            <div class="col-3"></div>
                            <div class="col-3"></div>
                        <div class="col-6 form-group">                            
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" name="your_password" class="form-control" id="exampleInputPassword1" required>                            
                        </div>
                            <div class="col-3"></div>
                        <div class="col-12 text-center">
                            <!-- <a class="btn all-btn" href="patient.php" role="button" type="submit">Patient login</a>
                            <a class="btn all-btn" href="assistant.php" role="button" type="submit">Assistant login</a> -->
                            <input type="submit" name="login_submit" value="Login now" class="btn all-btn" href="" role="button">
                        </div>
                            <div class="col-3"></div>
                        <div class="col-6 form-group signbtn-group">                            
                            <label for="exampleInputEmail1" class="form-label">Don't Have Account?</label>
                            <a class="btn signbtn" href="signup.php" role="button">SIGNUP</a>                                                    
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