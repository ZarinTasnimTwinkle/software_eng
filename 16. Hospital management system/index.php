<?php
    @include 'connection.php';

    if(isset($_POST['booking_submit'])){
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $phone = mysqli_real_escape_string($conn, $_POST['phone_no']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $time = $_POST['time'];
      $department = $_POST['department'];
      $doctor = $_POST['doctor'];
      $message = mysqli_real_escape_string($conn, $_POST['message']);
  
      $select = "SELECT * FROM reg_form WHERE your_name = '$name' && your_email = '$email' ";
      $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
      $insert = "INSERT INTO pending(name, phone_no, email, time, department, doctor, message) 
            VALUES('$name', '$phone', '$email', '$time', '$department', '$doctor', '$message')";
            mysqli_query($conn, $insert);
            header('location:login.php'); 
  }else{
      $insert = "INSERT INTO pending(name, phone_no, email, time, department, doctor, message) 
          VALUES('$name', '$phone', '$email', '$time', '$department', '$doctor', '$message')";
          mysqli_query($conn, $insert);
          header('location:signup.php');
      
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
    <script src="https://kit.fontawesome.com/14e533ff66.js"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"/>

    <!-- ?MyStyle link -->
    <link rel="stylesheet" href="style2.css" />

    <title>Hospital Management System</title>
</head>
<body>
  <!--?Top Header Area-->
  <header class="top-header-area">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-6 col-md-9 col-lg-8">
          <div class="top-header-content">
            <a href="#" data-bs-toggle="tooltip" data-placement="bottom" title="26 Dhanmondi, Satmoshjid Road 1205">
              <i class="fa fa-map-marker"></i>
              <span>26 Dhanmondi, Satmoshjid Road 1205</span>
            </a>
            <a href="#" data-bs-toggle="tooltip" data-placement="bottom" title="info.ZT@gmail.com">
              <i class="fa fa-envelope"></i>
              <span>info.ZT@gmail.com</span>
            </a>
          </div>
        </div>
        <div class="col-6 col-md-3 col-lg-4">
          <div class="top-header-social-info">
            <a href="#" data-bs-toggle="tooltip" data-placement="bottom" title="Facebook">
              <i class="fa fa-facebook"></i>
            </a>
            <a href="#" data-bs-toggle="tooltip" data-placement="bottom" title="Twitter">
              <i class="fa fa-twitter"></i>
            </a>
            <a href="#" data-bs-toggle="tooltip" data-placement="bottom" title="Linkedin">
              <i class="fa fa-linkedin"></i>
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- ?Navbar -->
    <nav class="navbar sticky-top navbar-expand-md mynavbar">
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
            <li class="nav-item Home active"><a href="#Home">HOME</a></li>
            <li class="nav-item Service"><a href="#Service">SERVICES</a></li>
            <li class="nav-item Appointment"><a href="#Appointment">APPOINTMENT</a></li>
            <li class="nav-item Doctors"><a href="#Doctors">DOCTORS</a></li>
            <li class="nav-item Blogs"><a href="#Blogs">BLOGS</a></li>          
          </ul>
          <a class="btn" href="login.php" role="button">LOGIN/SIGNUP</a>
        </div>
    </nav>

  <!-- ?Main Image -->
    <section class="main_image" id="Home">
        <div class="main_image_porda">
          <div class="main_image_content">
            <p class="display-6">WE CARE About Your Health</p>
            <p>
              Lorem ipsum dolor sit amet consectetur <br />
              adipisicing elit. Dolor quasi, iste ullam similique doloribus.
            </p>
            <a class="btn all-btn" href="#Appointment" role="button">MAKE AN APPOINTMENT</a>
          </div>
        </div>
    </section>

  <!--?Service Card-->
    <section class="My_service" id="Service">
      <div class="container-lg Navtab">
        <div class="text-center">
          <p class="card-title">Our Services</p>
          <div class="line"></div>
        </div>   
      <!--Nav-Tabs-->
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a
            class="nav-link active"
            data-bs-toggle="tab"
            aria-controls="skills"
            aria-selected="true"
            href="#skills"
            >NEUROLOGY</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            data-bs-toggle="tab"
            aria-controls="awards"
            aria-selected="false"
            href="#awards"
            >CARDIOLOGY</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            data-bs-toggle="tab"
            aria-controls="experience"
            aria-selected="false"
            href="#experience"
            >DERMATOLOGY</a
          >
        </li>
        <li class="nav-item">
          <a
            class="nav-link"
            data-bs-toggle="tab"
            aria-controls="edu"
            aria-selected="false"
            href="#edu"
            >PSYCOLOGY</a
          >
        </li>
      </ul>
      <!--Tab-Content-->
      <div class="tab-content">
        <div class="tab-pane fade active show" id="skills">
          <div class="department-text">
            <h3>Neurological Department</h3>
            <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.</p>
          </div>
          <div class="row row-cols-1 row-cols-md-3 g-3">
            <div class="col">
              <div class="card">
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-plus" viewBox="0 0 16 16">
                      <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                      <path d="M8 4.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V9a.5.5 0 0 1-1 0V7.5H6a.5.5 0 0 1 0-1h1.5V5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    PRIMARY CARE</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">             
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eyedropper" viewBox="0 0 16 16">
                      <path d="M13.354.646a1.207 1.207 0 0 0-1.708 0L8.5 3.793l-.646-.647a.5.5 0 1 0-.708.708L8.293 5l-7.147 7.146A.5.5 0 0 0 1 12.5v1.793l-.854.853a.5.5 0 1 0 .708.707L1.707 15H3.5a.5.5 0 0 0 .354-.146L11 7.707l1.146 1.147a.5.5 0 0 0 .708-.708l-.647-.646 3.147-3.146a1.207 1.207 0 0 0 0-1.708l-2-2zM2 12.707l7-7L10.293 7l-7 7H2v-1.293z"/>
                    </svg>
                    LAB TEST</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse" viewBox="0 0 16 16">
                      <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                      <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                      <path d="M9.979 5.356a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.926-.08L4.69 10H4.5a.5.5 0 0 0 0 1H5a.5.5 0 0 0 .447-.276l.936-1.873 1.138 3.793a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h.5a.5.5 0 0 0 0-1h-.128L9.979 5.356Z"/>
                    </svg>
                    SYMPTOM CHECK</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse" viewBox="0 0 16 16">
                      <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Z"/>
                      <path d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z"/>
                    </svg>
                    HEART RATE</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hospital" viewBox="0 0 16 16">
                      <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
                      <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
                    </svg>
                    HOSPITALITY</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body icon">                  
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-plus" viewBox="0 0 16 16">
                      <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      <path fill-rule="evenodd" d="M12.5 1a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    EMERGENCY CARE</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="awards">
          <div class="department-text">
            <h3>Cardiology Department</h3>
            <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.</p>
          </div>
          <div class="row row-cols-1 row-cols-md-3 g-3">
            <div class="col">
              <div class="card">
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-plus" viewBox="0 0 16 16">
                      <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                      <path d="M8 4.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V9a.5.5 0 0 1-1 0V7.5H6a.5.5 0 0 1 0-1h1.5V5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    PRIMARY CARE</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">             
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eyedropper" viewBox="0 0 16 16">
                      <path d="M13.354.646a1.207 1.207 0 0 0-1.708 0L8.5 3.793l-.646-.647a.5.5 0 1 0-.708.708L8.293 5l-7.147 7.146A.5.5 0 0 0 1 12.5v1.793l-.854.853a.5.5 0 1 0 .708.707L1.707 15H3.5a.5.5 0 0 0 .354-.146L11 7.707l1.146 1.147a.5.5 0 0 0 .708-.708l-.647-.646 3.147-3.146a1.207 1.207 0 0 0 0-1.708l-2-2zM2 12.707l7-7L10.293 7l-7 7H2v-1.293z"/>
                    </svg>
                    LAB TEST</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse" viewBox="0 0 16 16">
                      <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                      <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                      <path d="M9.979 5.356a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.926-.08L4.69 10H4.5a.5.5 0 0 0 0 1H5a.5.5 0 0 0 .447-.276l.936-1.873 1.138 3.793a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h.5a.5.5 0 0 0 0-1h-.128L9.979 5.356Z"/>
                    </svg>
                    SYMPTOM CHECK</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse" viewBox="0 0 16 16">
                      <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Z"/>
                      <path d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z"/>
                    </svg>
                    HEART RATE</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hospital" viewBox="0 0 16 16">
                      <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
                      <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
                    </svg>
                    HOSPITALITY</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body icon">                  
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-plus" viewBox="0 0 16 16">
                      <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      <path fill-rule="evenodd" d="M12.5 1a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    EMERGENCY CARE</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="experience">
          <div class="department-text">
            <h3>Dermatology Department</h3>
            <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.</p>
          </div>
          <div class="row row-cols-1 row-cols-md-3 g-3">
            <div class="col">
              <div class="card">
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-plus" viewBox="0 0 16 16">
                      <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                      <path d="M8 4.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V9a.5.5 0 0 1-1 0V7.5H6a.5.5 0 0 1 0-1h1.5V5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    PRIMARY CARE</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">             
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eyedropper" viewBox="0 0 16 16">
                      <path d="M13.354.646a1.207 1.207 0 0 0-1.708 0L8.5 3.793l-.646-.647a.5.5 0 1 0-.708.708L8.293 5l-7.147 7.146A.5.5 0 0 0 1 12.5v1.793l-.854.853a.5.5 0 1 0 .708.707L1.707 15H3.5a.5.5 0 0 0 .354-.146L11 7.707l1.146 1.147a.5.5 0 0 0 .708-.708l-.647-.646 3.147-3.146a1.207 1.207 0 0 0 0-1.708l-2-2zM2 12.707l7-7L10.293 7l-7 7H2v-1.293z"/>
                    </svg>
                    LAB TEST</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse" viewBox="0 0 16 16">
                      <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                      <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                      <path d="M9.979 5.356a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.926-.08L4.69 10H4.5a.5.5 0 0 0 0 1H5a.5.5 0 0 0 .447-.276l.936-1.873 1.138 3.793a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h.5a.5.5 0 0 0 0-1h-.128L9.979 5.356Z"/>
                    </svg>
                    SYMPTOM CHECK</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse" viewBox="0 0 16 16">
                      <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Z"/>
                      <path d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z"/>
                    </svg>
                    HEART RATE</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hospital" viewBox="0 0 16 16">
                      <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
                      <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
                    </svg>
                    HOSPITALITY</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body icon">                  
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-plus" viewBox="0 0 16 16">
                      <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      <path fill-rule="evenodd" d="M12.5 1a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    EMERGENCY CARE</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade" id="edu">
          <div class="department-text">
            <h3>Psycological Department</h3>
            <p>On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word.</p>
          </div>
          <div class="row row-cols-1 row-cols-md-3 g-3">
            <div class="col">
              <div class="card">
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-plus" viewBox="0 0 16 16">
                      <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
                      <path d="M8 4.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V9a.5.5 0 0 1-1 0V7.5H6a.5.5 0 0 1 0-1h1.5V5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    PRIMARY CARE</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">             
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eyedropper" viewBox="0 0 16 16">
                      <path d="M13.354.646a1.207 1.207 0 0 0-1.708 0L8.5 3.793l-.646-.647a.5.5 0 1 0-.708.708L8.293 5l-7.147 7.146A.5.5 0 0 0 1 12.5v1.793l-.854.853a.5.5 0 1 0 .708.707L1.707 15H3.5a.5.5 0 0 0 .354-.146L11 7.707l1.146 1.147a.5.5 0 0 0 .708-.708l-.647-.646 3.147-3.146a1.207 1.207 0 0 0 0-1.708l-2-2zM2 12.707l7-7L10.293 7l-7 7H2v-1.293z"/>
                    </svg>
                    LAB TEST</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clipboard2-pulse" viewBox="0 0 16 16">
                      <path d="M9.5 0a.5.5 0 0 1 .5.5.5.5 0 0 0 .5.5.5.5 0 0 1 .5.5V2a.5.5 0 0 1-.5.5h-5A.5.5 0 0 1 5 2v-.5a.5.5 0 0 1 .5-.5.5.5 0 0 0 .5-.5.5.5 0 0 1 .5-.5h3Z"/>
                      <path d="M3 2.5a.5.5 0 0 1 .5-.5H4a.5.5 0 0 0 0-1h-.5A1.5 1.5 0 0 0 2 2.5v12A1.5 1.5 0 0 0 3.5 16h9a1.5 1.5 0 0 0 1.5-1.5v-12A1.5 1.5 0 0 0 12.5 1H12a.5.5 0 0 0 0 1h.5a.5.5 0 0 1 .5.5v12a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5v-12Z"/>
                      <path d="M9.979 5.356a.5.5 0 0 0-.968.04L7.92 10.49l-.94-3.135a.5.5 0 0 0-.926-.08L4.69 10H4.5a.5.5 0 0 0 0 1H5a.5.5 0 0 0 .447-.276l.936-1.873 1.138 3.793a.5.5 0 0 0 .968-.04L9.58 7.51l.94 3.135A.5.5 0 0 0 11 11h.5a.5.5 0 0 0 0-1h-.128L9.979 5.356Z"/>
                    </svg>
                    SYMPTOM CHECK</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart-pulse" viewBox="0 0 16 16">
                      <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053.918 3.995.78 5.323 1.508 7H.43c-2.128-5.697 4.165-8.83 7.394-5.857.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17c3.23-2.974 9.522.159 7.394 5.856h-1.078c.728-1.677.59-3.005.108-3.947C13.486.878 10.4.28 8.717 2.01L8 2.748ZM2.212 10h1.315C4.593 11.183 6.05 12.458 8 13.795c1.949-1.337 3.407-2.612 4.473-3.795h1.315c-1.265 1.566-3.14 3.25-5.788 5-2.648-1.75-4.523-3.434-5.788-5Z"/>
                      <path d="M10.464 3.314a.5.5 0 0 0-.945.049L7.921 8.956 6.464 5.314a.5.5 0 0 0-.88-.091L3.732 8H.5a.5.5 0 0 0 0 1H4a.5.5 0 0 0 .416-.223l1.473-2.209 1.647 4.118a.5.5 0 0 0 .945-.049l1.598-5.593 1.457 3.642A.5.5 0 0 0 12 9h3.5a.5.5 0 0 0 0-1h-3.162l-1.874-4.686Z"/>
                    </svg>
                    HEART RATE</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body icon">
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hospital" viewBox="0 0 16 16">
                      <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
                      <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
                    </svg>
                    HOSPITALITY</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
            <div class="col">
              <div class="card">
                <div class="card-body icon">                  
                  <h5 class="service-title mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-plus" viewBox="0 0 16 16">
                      <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
                      <path fill-rule="evenodd" d="M12.5 1a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                    EMERGENCY CARE</h5>
                  <p class="card-text">This is a longer card with supporting text below as a natural</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      </div>
    </section>

  <!--?Appointment Card-->
  <section class="booking" id="Appointment">
    <div class="container-lg">
      <div class="text-center">
        <p class="card-title">Book An Appointment</p>
        <div class="line"></div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="appointment-form">
            <form name="" class="row g-5" action="#" method="post">
                <div class="col-md-6 form-group">                  
                  <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Your Name*" required/>                  
                </div>
                <div class="col-md-6 form-group">                  
                  <input type="text" name="phone_no" class="form-control" id="exampleInputphone" placeholder="Your Phone*" required/>
                </div>
                <div class="col-md-6 form-group">                 
                  <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Your Email*" required/>                  
                </div>
                <div class="col-md-6 form-group">
                  <select name="time" class="form-control">
                    <option selected>Choose Your Schedule</option>
                    <option value="9AM to 10AM">9AM to 10AM</option>
                    <option value="11AM to 12PM">11AM to 12PM</option>
                    <option value="2PM to 4PM">2PM to 4PM</option>
                  </select>                  
                </div>
                <div class="col-md-6 form-group">
                  <select name="department" class="form-control">
                    <option selected>Select Department</option>
                    <option value="Neurology">Neurology</option>
                    <option value="Cardiology">Cardiology</option>
                    <option value="Dermatology">Dermatology</option>
                    <option value="Psycology">Psycology</option>
                  </select>                  
                </div>
                <div class="col-md-6 form-group">
                  <select name="doctor" class="form-control">
                    <option selected>Select Doctor</option>
                    <option value="Dr. NASHIMUDDIN AHMED">Dr. NASHIMUDDIN AHMED</option>
                    <option value="Dr. TASNEEM HASIN">Dr. TASNEEM HASIN</option>
                    <option value="Dr. SHARMIN KABIR">Dr. SHARMIN KABIR</option>
                    <option value="Dr. KUMRUL HASAN">Dr. KUMRUL HASAN</option>
                  </select>                  
                </div>
                <div class="col-12 form-group">
                  <textarea name="message" class="form-control" placeholder="Your Message" id="exampleInputMsg" rows="5"></textarea>                  
                </div>
                <div class="col-12 text-center">
                  <input class="btn all-btn" href="" role="button" type="submit" name="booking_submit" value="BOOKING NOW">
                </div>               
            </form>
          </div>
        </div>
      </div>           
    </div>
  </section>

    <!--?Doctors Card-->
    <section class="doctor-card" id="Doctors">
      <div class="container-lg">
      <div class="text-center">
        <p class="card-title">Our Doctors</p>
        <div class="line"></div>
      </div>   
      <div class="row row-cols-1 row-cols-md-4">
        <div class="col">
            <div class="card">
              <div class="card-body">
                <img src="images/neurologist (2).jpg"
                  class="card-img-top" alt="...">              
                <h5 class="doctor-title text-center">DR. NASHIMUDDIN AHMED</h5>
                <p class="card-text text-center">Neurology Specialist</p>
              </div>
            </div>         
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <img src="images/cardiologist.jpeg"
                class="card-img-top" alt="...">            
              <h5 class="doctor-title text-center">DR. TASNEEM HASIN</h5>
              <p class="card-text text-center">Assistant Professor of Cardiology</p>
            </div>
          </div>         
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <img src="images/dermatologist.jpg"
                class="card-img-top" alt="...">            
              <h5 class="doctor-title text-center">DR. SHARMIN KABIR</h5>
              <p class="card-text text-center">Assistant Professor of Dermatology</p>
            </div>
          </div>         
        </div>
        <div class="col">
          <div class="card">
            <div class="card-body">
              <img src="images/psycology.jpg"
                class="card-img-top" alt="...">              
              <h5 class="doctor-title text-center">DR. KUMRUL HASAN</h5>
              <p class="card-text text-center">Neuro Psychiatrist, Brain Specialist</p>
            </div>
          </div>         
        </div>        
      </div>
      </div>
    </section>

  <!--?Blogs-->
  <section class="review" id="Blogs">
    <div class="container-lg">
      <div class="text-center">
        <p class="card-title">Recent Blogs</p>
        <div class="line"></div>
      </div>      
      <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="images/care1.jpg" class="w-100">
            <div class="carousel-caption d-none d-md-block">
              <i class="fa-solid fa-quote-left"></i>
              <h5>"I'd been avoiding the consultation for years due to bad experiences. A reminder SMS is sent the working day beforehand. I also had a call confirming appoinment. I have been a patient ever since. My Psycologist is very reassuring and very helpful. Excellent treatment and advice."</h5>
              <b>Zinia Zafrin</b>
              <p>Psycology Patient</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/care2.jpg" class="w-100">
            <div class="carousel-caption d-none d-md-block">
              <i class="fa-solid fa-quote-left"></i>
              <h5>"I'd been avoiding the consultation for years due to bad experiences. A reminder SMS is sent the working day beforehand. I also had a call confirming appoinment. I have been a patient ever since. My Psycologist is very reassuring and very helpful. Excellent treatment and advice."</h5>
              <b>Zinia Zafrin</b>
              <p>Psycology Patient</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="images/care3.jpg" class="w-100">
            <div class="carousel-caption d-none d-md-block">
              <i class="fa-solid fa-quote-left"></i>
              <h5>"I'd been avoiding the consultation for years due to bad experiences. A reminder SMS is sent the working day beforehand. I also had a call confirming appoinment. I have been a patient ever since. My Psycologist is very reassuring and very helpful. Excellent treatment and advice."</h5>
              <b>Zinia Zafrin</b>
              <p>Psycology Patient</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

    <!--?Pricing Card-->
    <section class="pricing-section" id="Pricing">
      <div class="container-lg">
        <div class="text-center">
          <p class="card-title">Our Pricing</p>
          <div class="line"></div>
        </div>   
        <div class="row row-cols-1 row-cols-md-4">
          <div class="col">
              <div class="card pricing-card">
                <div class="card-body text-center">              
                  <h3>Basic</h3>
                  <b><i class="fa fa-bangladeshi-taka-sign"></i>1500</b><span>/session</span><br><br>
                  <p class="card-text">
                    Diagnostic Services <br><br>
                    Professional Consultation <br><br>
                    Surgical Extractions <br><br>
                    Heart Implants <br><br>
                    Best Examination <br>
                  </p>
                </div>
              </div>         
          </div>
          <div class="col">
            <div class="card pricing-card">
              <div class="card-body text-center">              
                <h3>Standard</h3>
                <b><i class="fa fa-bangladeshi-taka-sign"></i>2000</b><span>/session</span><br><br>
                <p class="card-text">
                  Diagnostic Services <br><br>
                  Professional Consultation <br><br>
                  Surgical Extractions <br><br>
                  Heart Implants <br><br>
                  Best Examination <br>
                </p>
              </div>
            </div>         
          </div>
          <div class="col">
            <div class="card pricing-card">
              <div class="card-body text-center">              
                <h3>Premium</h3>
                <b><i class="fa fa-bangladeshi-taka-sign"></i>4700</b><span>/session</span><br><br>
                <p class="card-text">
                  Diagnostic Services <br><br>
                  Professional Consultation <br><br>
                  Surgical Extractions <br><br>
                  Heart Implants <br><br>
                  Best Examination <br>
                </p>
              </div>
            </div>         
          </div>
          <div class="col">
            <div class="card pricing-card">
              <div class="card-body text-center">              
                <h3>Platinum</h3>
                <b><i class="fa fa-bangladeshi-taka-sign"></i>7650</b><span>/session</span> <br><br>
                <p class="card-text">
                  Diagnostic Services <br><br>
                  Professional Consultation <br><br>
                  Surgical Extractions <br><br>
                  Heart Implants <br><br>
                  Best Examination <br>
                </p>
              </div>
            </div>         
          </div>        
        </div>
      </div>
    </section>

    <!--?Footer-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid footer">
        <a class="footer_brand" href="#">MEDINO Hospital</a>
        <div class="footer_icon">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-facebook"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-twitter"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-instagram"></i></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#"><i class="fa fa-linkedin"></i></a>
            </li>
          </ul>
        </div>
        <span class="navbar-text"
          >Copyright &copy; 2021. All Rights Reserved</span
        >
      </div>
    </nav>


    <!--?My JS-->
    <script>
      const sections = document.querySelectorAll("section");
      const navli = document.querySelectorAll("nav, .mycontainer ul li");

      window.addEventListener("scroll", () => {
        let current = "";
        sections.forEach((section) => {
          const sectionTop = section.offsetTop;
          const sectionHeight = section.clientHeight;

          if (pageYOffset >= sectionTop - sectionHeight / 3) {
            current = section.getAttribute("id");
          }
        });

        navli.forEach((li) => {
          li.classList.remove("active");
          if (li.classList.contains(current)) {
            li.classList.add("active");
          }
        });
      });



      // function deleteRow(id) {
      //       if (confirm('Are you sure you want to delete this row?')) {
      //           // Send an asynchronous request to delete_row.php
      //           const xhr = new XMLHttpRequest();
      //           xhr.open('POST', 'delete_row.php', true);
      //           xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
      //           xhr.onload = function () {
      //               if (xhr.status === 200) {
      //                   location.reload(); // Refresh the page to update the table
      //               } else {
      //                   alert('Error deleting row. Please try again.');
      //               }
      //           };
      //           xhr.send('id=' + id);
      //       }
      //   }
    </script>

    <!-- ?bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>


</body>
</html>