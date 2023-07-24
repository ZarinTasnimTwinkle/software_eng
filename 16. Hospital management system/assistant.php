<?php
    @include 'connection.php';
    
    //Appointment Form Table
    if(isset($_POST['booking_submit']))
    {
      $name = mysqli_real_escape_string($conn, $_POST['name']);
      $phone = mysqli_real_escape_string($conn, $_POST['phone_no']);
      $email = mysqli_real_escape_string($conn, $_POST['email']);
      $time = $_POST['time'];
      $department = $_POST['department'];
      $doctor = $_POST['doctor'];
      $message = mysqli_real_escape_string($conn, $_POST['message']);
  
      $insert = "INSERT INTO pending(name, phone_no, email, time, department, doctor, message, status) 
            VALUES('$name', '$phone', '$email', '$time', '$department', '$doctor', '$message', 'Pending')";
            mysqli_query($conn, $insert);
            header('location:assistant.php');
    };

    session_start();
    if(!isset($_SESSION['assistant_name'])){
      header('location:login.php');
    }

    //approve and delete
    if(isset($_POST['approve'])){

      $id = $_POST['id'];
      $select = "UPDATE pending SET status = 'Approved' WHERE id = '$id' ";
      $resut = mysqli_query($conn,$select);
      header("location:assistant.php");
    }
    
    
    if(isset($_POST['delete'])){
    
      $id = $_POST['id'];
      $select = "DELETE  FROM pending  WHERE id = '$id' ";
      $resut = mysqli_query($conn,$select);
      header("location:assistant.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

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
    <nav class="navbar sticky-top navbar-expand-md another-navbar">
        <a class="navbar-brand" href="#">MEDINO Hospital</a>        
        <div class="dropdown">          
          <a class="btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="fa-sharp fa-solid fa-user-nurse"></i> <?php echo $_SESSION['assistant_name']?>
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item text-center" href="update.php" role="button">Update</a></li>
            <li><a class="dropdown-item text-center" href="logout.php" role="button">Logout</a></li>
          </ul>
        </div>
    </nav>

    <!-- ?Main section -->
    <section class="assistant_page">
      <div class="container-fluid">
        <div class="row">
          <div class="col-2">
            <ul class="nav flex-column border-end">
              <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" aria-controls="dashboard" aria-selected="true" href="#dashboard">
                  Dashboard
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" aria-controls="collapseExample" aria-expanded="false" href="#collapseExample">
                  Patient
                </a>
                <ul class="collapse" id="collapseExample">
                  <li><a class="nav-link" data-bs-toggle="tab" aria-controls="pview" aria-selected="true" href="#pview">View Patient</a></li>
                  <li><a class="nav-link" data-bs-toggle="tab" aria-controls="pconfirm" aria-selected="true" href="#pconfirm">Confirm Patient</a></li>
                  <li><a class="nav-link" data-bs-toggle="tab" aria-controls="p_appoint" aria-selected="true" href="#p_appoint">Create Appointment</a></li>
                </ul>
              </li>
              <li class="nav-item">
                <a class="nav-link dropdown-toggle" data-bs-toggle="collapse" aria-controls="collapseExample2" aria-expanded="false" href="#collapseExample2">
                  Doctor
                </a>
                <ul class="collapse" id="collapseExample2">
                  <li><a class="nav-link" data-bs-toggle="tab" aria-controls="dview" aria-selected="true" href="#dview">View Doctor</a></li>
                </ul>
              </li>
            </ul>
          </div>

          <div class="col-10">
            <div class="text-center">
              <p class="card-title">Assistant</p>
              <div class="line"></div>
            </div>
            <div class="tab-content">
              <div class="tab-pane fade active show" id="dashboard">
                <div class="department-text">
                  <h3>Patient List</h3>
                  <table class="table table-striped-columns pending_table">
                  <thead class="table-primary">
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">Email</th>
                        <th scope="col">Schedule Time</th>
                        <th scope="col">Doctor Department</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Comments</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>                   
                      <?php
                        // Step 3: Fetch data from the pending table
                        $sql = "SELECT id, name, phone_no, email, time, department, doctor, message, status FROM pending WHERE status= 'Approved'";
                        $result = $conn->query($sql);

                        //Step 4: Generate HTML table and populate with data
                        if ($result->num_rows > 0) 
                        {
                          while ($row = $result->fetch_assoc()) 
                          {
                            echo "<tr>
                                  <td>" . $row["id"] . "</td>
                                  <td>" . $row["name"] . "</td>
                                  <td>" . $row["phone_no"] . "</td>
                                  <td>" . $row["email"] . "</td>
                                  <td>" . $row["time"] . "</td>
                                  <td>" . $row["department"] . "</td>
                                  <td>" . $row["doctor"] . "</td>
                                  <td>" . $row["message"] . "</td>
                                  <td>" . $row["status"] . "</td>
                                </tr>";
                          }                          
                        } 
                      ?>
                    </tbody>                                    
                  </table>
                </div>
                <div class="department-text">
                  <h3>Doctor List</h3>
                  <table class="table table-striped-columns pending_table">
                    <thead class="table-primary">
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">Email</th>
                        <th scope="col">Doctor Department</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>                   
                      <?php
                        // Step 3: Fetch data from the doctors table
                        $dsql = "SELECT id, dname, dphone_no, demail, ddepartment, daction FROM doctors";
                        $dresult = $conn->query($dsql);
                        //Step 4: Generate HTML table and populate with data
                        if ($dresult->num_rows > 0) 
                        {
                          while ($drow = $dresult->fetch_assoc()) 
                          {
                            echo "<tr>
                                    <td>" . $drow["id"] . "</td>
                                    <td>" . $drow["dname"] . "</td>
                                    <td>" . $drow["dphone_no"] . "</td>
                                    <td>" . $drow["demail"] . "</td>
                                    <td>" . $drow["ddepartment"] . "</td>
                                    <td>
                                      <form method='post'>
                                        <a name='transferBtn' href=" . $drow["id"] ." class='btn another-btn' type='submit'><i class='fa-regular fa-circle-check'></i> View</a>
                                      </form>           
                                    </td>
                                  </tr>";
                          }                          
                        } 
                      ?>
                    </tbody>                                       
                  </table>
                </div>
              </div>
              <div class="tab-pane fade" id="pview">
                <div class="department-text">
                  <h3>Patient List</h3>
                  <table class="table table-striped-columns pending_table">
                    <thead class="table-primary">
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">Email</th>
                        <th scope="col">Schedule Time</th>
                        <th scope="col">Doctor Department</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Comments</th>
                        <th scope="col">Status</th>
                      </tr>
                    </thead>
                    <tbody>                   
                      <?php
                        // Step 3: Fetch data from the pending table
                        $sql = "SELECT id, name, phone_no, email, time, department, doctor, message, status FROM pending WHERE status= 'Approved'";
                        $result = $conn->query($sql);

                        //Step 4: Generate HTML table and populate with data
                        if ($result->num_rows > 0) 
                        {
                          while ($row = $result->fetch_assoc()) 
                          {
                            echo "<tr>
                                  <td>" . $row["id"] . "</td>
                                  <td>" . $row["name"] . "</td>
                                  <td>" . $row["phone_no"] . "</td>
                                  <td>" . $row["email"] . "</td>
                                  <td>" . $row["time"] . "</td>
                                  <td>" . $row["department"] . "</td>
                                  <td>" . $row["doctor"] . "</td>
                                  <td>" . $row["message"] . "</td>
                                  <td>" . $row["status"] . "</td>
                                </tr>";
                          }                          
                        } 
                      ?>
                    </tbody>                                    
                  </table>
                </div>            
              </div>
              <div class="tab-pane fade" id="pconfirm">
                <div class="department-text">
                  <h3>Pending Appointments</h3>
                  <table class="table table-striped-columns pending_table">
                    <thead class="table-primary">
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">Email</th>
                        <th scope="col">Schedule Time</th>
                        <th scope="col">Doctor Department</th>
                        <th scope="col">Doctor</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>                   
                      <?php
                        // Step 3: Fetch data from the pending table
                        $sql = "SELECT * FROM pending WHERE status= 'Pending' ORDER BY id ASC";
                        $result = $conn->query($sql);

                        //Step 4: Generate HTML table and populate with data
                        if ($result->num_rows > 0) 
                        {
                          while ($row = $result->fetch_assoc()) 
                          {
                            echo "<tr>
                                  <td>" . $row["id"] . "</td>
                                  <td>" . $row["name"] . "</td>
                                  <td>" . $row["phone_no"] . "</td>
                                  <td>" . $row["email"] . "</td>
                                  <td>" . $row["time"] . "</td>
                                  <td>" . $row["department"] . "</td>
                                  <td>" . $row["doctor"] . "</td>
                                  <td>" . $row["status"] . "</td>
                                  <td>
                                    <form action='assistant.php' method='POST'>
                                      <input type='hidden' name='id' value=" . $row["id"] . "/>
                                      <input class='btn another-btn' type='submit' name='approve' value='Approve'><br>
                                      <input class='btn another-btn' type='submit' name='delete' value='Delete'>                               
                                    </form>
                                  </td>
                                </tr>";
                          }                          
                        }
                      ?>
                    </tbody>                                     
                  </table>
                </div>            
              </div>
              <div class="tab-pane fade" id="p_appoint">
                <div class="department-text">
                  <h3>Create Appointment</h3><br>
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
              <div class="tab-pane fade" id="dview">
                <div class="department-text">
                  <h3>Doctor List</h3>
                  <table class="table table-striped-columns pending_table">
                    <thead class="table-primary">
                      <tr>
                        <th scope="col">id</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone No</th>
                        <th scope="col">Email</th>
                        <th scope="col">Doctor Department</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>                   
                      <?php
                        // Step 3: Fetch data from the doctors table again
                        $ddsql = "SELECT id, dname, dphone_no, demail, ddepartment, daction FROM doctors";
                        $ddresult = $conn->query($ddsql);
                        //Step 4: Generate HTML table and populate with data
                        if ($ddresult->num_rows > 0) 
                        {
                          while ($ddrow = $ddresult->fetch_assoc()) 
                          {
                            echo "<tr>
                                    <td>" . $ddrow["id"] . "</td>
                                    <td>" . $ddrow["dname"] . "</td>
                                    <td>" . $ddrow["dphone_no"] . "</td>
                                    <td>" . $ddrow["demail"] . "</td>
                                    <td>" . $ddrow["ddepartment"] . "</td>
                                    <td>
                                      <form method='post'>
                                      <a name='transferBtn' href=" . $ddrow["id"] ." class='btn another-btn' type='submit'><i class='fa-regular fa-circle-check'></i> View</a>
                                      </form>           
                                    </td>
                                  </tr>";
                          }                          
                        } 
                      ?>
                    </tbody>                                       
                  </table>
                </div>            
              </div>
            </div>
          </div>
        </div>       
      </div>
    </section>


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


      
        // JavaScript function to send the approval request to the server
        // function approveAppointment(appointmentId) {
        //     // Make an AJAX request to process the approval
        //     const xhr = new XMLHttpRequest();
        //     xhr.open("POST", "appointment.php", true);
        //     xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //     xhr.onreadystatechange = function() {
        //         if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        //             // Refresh the page to update the table
        //             location.reload();
        //         }
        //     };
        //     xhr.send("id=" + appointmentId);
        // }
    
    </script>

    <!-- ?bootstrap js link -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>
</html>