<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['sid']==0)) {
  header('location:logout.php');
} else{
  if(isset($_POST['submit']))
  {
    $studentno=$_POST['studentno'];
    $lastname=$_POST['lastname'];
    $firstname=$_POST['firstname'];
    $middleinitial=$_POST['middleinitial'];
    $homeaddress=$_POST['homeaddress'];
    $age=$_POST['age'];
    $sex=$_POST['sex'];
    $nationality=$_POST['nationality'];
    $contactnumber=$_POST['contactnumber'];
    $religion=$_POST['religion'];
    $course=$_POST['course'];
    $yearlevel=$_POST['yearlevel'];
    $parentsname=$_POST['parentsname'];
    $address=$_POST['address'];
    $contactnumbers=$_POST['contactnumbers'];
    $occupation=$_POST['occupation'];
    $height=$_POST['height'];
    $weight=$_POST['weight'];
    $bmi=$_POST['bmi'];
    $temperature=$_POST['temperature'];
    $bp=$_POST['bp'];
    $pr=$_POST['pr'];
    $rr=$_POST['rr'];
    $datetime=$_POST['datetime'];
    $chief=$_POST['chief'];
    $medical=$_POST['medical'];
    $remarks=$_POST['remarks'];
    $photo=$_FILES["photo"]["name"];
    move_uploaded_file($_FILES["photo"]["tmp_name"],"studentimages/".$_FILES["photo"]["name"]);
    $query=mysqli_query($con, "insert into  students(studentno,lastname,firstname,middleinitial,homeaddress,age,sex,nationality,contactnumber,religion,course,yearlevel,parentsname,address,contactnumbers,occupation,height,weight,bmi,temperature,bp,pr,rr,datetime,chief,medical,remarks,studentImage) value('$studentno','$lastname','$firstname','$middleinitial','$homeaddress','$age','$sex','$nationality','$contactnumber','$religion','$course','$yearlevel','$parentsname','$address','$contactnumbers','$occupation','$height','$weight','$bmi','$temperature','$bp','$pr','$rr','$datetime','$chief','$medical','$remarks','$photo')");
    if ($query) {
      echo "<script>alert('Student has been registered.');</script>"; 
      echo "<script>window.location.href = 'add_student.php'</script>";   
      $msg="";
    }
    else
    {
      echo "<script>alert('Something Went Wrong. Please try again.');</script>";    
    }
  }
  ?>
  <!DOCTYPE html>
  <html>
  <?php @include("includes/head.php"); ?>
  <body class="hold-transition sidebar-mini">
    <div class="wrapper">
      <!-- Navbar -->
      <?php @include("includes/header.php"); ?>
      <!-- /.navbar -->

      <!-- Main Sidebar Container -->
      <?php @include("includes/sidebar.php"); ?>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">Add Student</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row ">
              <div class="col-md-12">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add Student</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form class="row g-3 p-4 w-100" method="post"  enctype="multipart/form-data">
                  <div class="row">
                        <div class="form-group col-md-3">
                          <label for="studentno">Student No.</label>
                          <input type="text" class="form-control" id="studentno" name="studentno" placeholder="Enter student No" required>
                        </div>
                    <div class="col-md-3">
                      <label for="inputEmail4" class="form-label">Last Name</label>
                      <input type="name" class="form-control" id="inputEmail4" name="lastname">
                    </div>
                    <div class="col-md-3">
                      <label for="inputPassword4" class="form-label">First Name</label>
                      <input type="name" class="form-control" id="inputname" name="firstname"> 
                    </div>
                    <div class="col-md-3">
                      <label for="inputPassword4" class="form-label">Middle Initial</label>
                      <input type="name" class="form-control" id="inputname" name="middleinitial"> 
                    </div>
                    <div class="col-md-4">
                      <label for="inputAddress" class="form-label">Home Address</label>
                      <input type="text" class="form-control" id="inputAddress" placeholder="Address" name="homeaddress">
                    </div>
                    <div class="col-md-4">
                      <label for="inputAddress2" class="form-label">Age</label>
                      <input type="text" class="form-control" id="age" placeholder="Age" name="age">
                    </div>
                    <div class="col-md-4">
                      <label for="inputAddress2" class="form-label">Sex</label>
                      <input type="text" class="form-control" id="sex" placeholder="Sex" name="sex">
                    </div>
                    <div class="form-group col-md-12">
                          <label for="exampleInputFile">Student Photo</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="" name="photo" id="photo" required>
                            </div>
                    <div class="col-md-3">
                      <label for="inputAddress2" class="form-label">Nationality</label>
                      <input type="text" class="form-control" id="inationality" placeholder="Nationality" name="nationality">
                    </div>
                    <div class="col-md-6">
                      <label for="inputAddress2" class="form-label">Contact Number</label>
                      <input type="text" class="form-control" id="contactnumber" placeholder="Contact Number" name="contactnumber">
                    </div>
                    <div class="col-md-6">
                      <label for="inputAddress2" class="form-label">Religion</label>
                      <input type="text" class="form-control" id="inputAddress2" placeholder="Religion" name="religion">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputcourse" class="form-label"  >Course</label>
                      <select id="inputcourse" class="form-control" name="course">
                        <option value="BSIT">BSIT</option>
                        <option value="BSHM">BSHM</option>
                        <option value="BSAB">BSAB</option>
                        <option value="BSCRIM">BSCRIM</option>
                        <option value="BSED">BSED</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputyearlevel" class="form-label" >Year Level</label >
                      <select id="inputyearlevel" class="form-control" name="yearlevel">
                        <option value="1st">1st</option>
                        <option value="2nd">2nd</option>
                        <option value="3nd">3rd</option>
                        <option value="4nd">4th</option>
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputAddress2" class="form-label">Name of Parents/Guardian</label>
                      <input type="text" class="form-control" id="inputAddress2" placeholder="Name of Parents/Guardian" name="parentsname">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputAddress2" class="form-label">Parent's Address</label>
                      <input type="text" class="form-control" id="inputAddress2" placeholder="Address" name="address">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputAddress2" class="form-label">Parent's Contact Number</label>
                      <input type="text" class="form-control" id="inputAddress2" placeholder="Contact Numbers" name="contactnumbers">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="inputAddress2" class="form-label">Occupation</label>
                      <input type="text" class="form-control" id="inputAddress2" placeholder="Occupation" name="occupation">
                    </div>
                    <div class="row w-100 form-group">
                      <div class="border d-flex align-items-center col-3"><h3>ANTHROPOMETRICS</h3></div>

                      <div class="border d-flex flex-column col-3">
                        <input type="text" placeholder="Height:" aria-label="Username" name="height"> 
                        <input type="text" placeholder="Weight:" aria-label="Username" name="weight">
                        <input type="text" placeholder="BMI:" aria-label="Username" name="bmi">
                      </div>
                      <div class="border d-flex align-items-center flex-grow col-3"><h3>VITAL SIGNS</h3 ></div>
                      <div class="border d-flex flex-column col-3">
                        <div class="row">
                          <input type="text" class="col-6" placeholder="Temperature" aria-label="Username" name="temperature">
                        <input type="text" class="col-6" placeholder="BP:" aria-label="Username" name="bp"> 
                        </div>
                        <div class="row">
                        <input type="text" class="col-6" placeholder="PR:" aria-label="Username" name="pr"> 
                          <input type="text" class="col-6" placeholder="RR:" aria-label="Username" name="rr">
                        </div>
                      </div>
                    </div>
                    <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">Date/Time</th>
      <th scope="col">Chief Complain</th>
      <th scope="col">Medical Treatment</th>
      <th scope="col">Remarks</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th><div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; width: 100%" name="datetime"></textarea >
  <label for="floatingTextarea2"></label>
</div></th>
      <td><div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; width: 100%" name="chief"></textarea >
  <label for="floatingTextarea2"></label>
</div></td>
      <td><div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; width: 100%" name="medical"></textarea >
  <label for="floatingTextarea2"></label>
</div></td>
      <td><div class="form-floating">
  <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; width: 100%" name="remarks"></textarea >
  <label for="floatingTextarea2"></label>
</div></td>
    </tr>
  </tbody>
</table>
                    
                    <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck">
                        <label class="form-check-label" for="gridCheck">
                          Check me out
                        </label>
                      </div>
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary" name="submit">Sign in</button>
                    </div>
                  </form>
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div>
          <!-- /.container-fluid -->
        </section>

        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
      <?php @include("includes/footer.php"); ?>

    </div>

    <!-- ./wrapper -->
    <?php @include("includes/foot.php"); ?>
  </body>
  </html>
  <?php
}?>
