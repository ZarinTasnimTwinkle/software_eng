<?php
@include 'connection.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize and store the form data
    $username = mysqli_real_escape_string($conn, $_POST["your_name"]);
    $email = mysqli_real_escape_string($conn, $_POST["your_email"]);
    $password = mysqli_real_escape_string($conn, $_POST["your_password"]);

    // Query to update the user's profile
    $query = "UPDATE reg_form SET your_name='$username', your_email='$email' ";

    // Check if a new password is provided
    if (!empty($password)) {
        // Hash the new password before updating
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $query .= ", password='$hashed_password'";
    }

    $user_id = 1; // Replace 1 with the user's ID (you can get it from the session or wherever you store it)
    $query .= " WHERE id=$user_id";

    // Execute the update query
    if (mysqli_query($conn, $query)) {
        echo "Profile updated successfully.";
    } else {
        echo "Error updating profile: " . mysqli_error($conn);
    }
    header("location:login.php");
    // Close the database connection
    mysqli_close($conn);
}
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
        <link rel="stylesheet" href="style.css" />
    
        <title>Hospital Management System</title>
    </head>
<body>

    <!--?Update-->
    <section class="login" id="">
        <div class="container-lg">
            <div class="text-center">                                 
                <p class="card-title">Update Profile</p>
                <div class="line"></div>
            </div>                                 
            <div class="">
                <form class="row g-4" action="update.php" method="post">
                    <input type="hidden" name="email" value="<?php echo $email;?>" >
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
                    <!-- <div class="col-6 form-group">                            
                        <input type="password" name="your_password" class="form-control" id="exampleInputPassword1" placeholder="Write a Strong Password*" />
                    </div>
                        <div class="col-3"></div>
                        <div class="col-3"></div>
                    <div class="col-6 form-group">
                        <input type="password" name="your_cpassword" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password" />
                    </div>
                        <div class="col-3"></div>
                        <div class="col-3"></div> -->
                    <div class="col-12 text-center">
                        <input class="btn all-btn" href="" role="button" type="submit" name="" value="Update">
                    </div>
                        <div class="col-3"></div>                    
                </form>
            </div>                       
        </div>
    </section>


    <!-- ?bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>