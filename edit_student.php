<?php

session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
{
  $sid=$_SESSION['edid']; 
  $lastname=$_POST['lastname'];
  $firstname=$_POST['firstname'];
  $middleinitial=$_POST['middleinitial'];
  $sex=$_POST['sex'];
  $age=$_POST['age'];
  $nationality=$_POST['nationality'];
  $contactnumber=$_POST['contactnumber'];
  $religion=$_POST['religion'];
  $course=$_POST['course'];
  $yearlevel=$_POST['yearlevel'];
  $sql="update students set lastName=:lastname,firstname=:firstname,sex=:sex,age=:age,middleinitial=:middleinitial,nationality=:nationality contactnumber=:contactnumber religion=:religion course=:course yearlevel=:yearlevel where id='$sid'";
  $query = $dbh->prepare($sql);
  $query->bindParam(':lastname',$lastname,PDO::PARAM_STR);
  $query->bindParam(':firstname',$firstname,PDO::PARAM_STR);
  $query->bindParam(':middleinitial',$middleinitial,PDO::PARAM_STR);
  $query->bindParam(':sex',$sex,PDO::PARAM_STR);
  $query->bindParam(':age',$age,PDO::PARAM_STR);
  $query->bindParam(':nationality',$nationality,PDO::PARAM_STR);
  $query->bindParam(':contactnumber',$contactnumber,PDO::PARAM_STR);
  $query->bindParam(':religion',$religion,PDO::PARAM_STR);
  $query->bindParam(':course',$course,PDO::PARAM_STR);
  $query->bindParam(':yearlevel',$yearlevel,PDO::PARAM_STR);
  $query->execute();
  if ($query->execute()) {
    echo "<script>alert('updated successfuly.');</script>";
    echo "<script>window.location.href ='student_list.php'</script>";
  }else{
    echo "<script>alert('something went wrong, please try again later');</script>";
  }
}

if(isset($_POST['save']))
{
  $sid=$_SESSION['edid']; 
  $parentsname=$_POST['parentsname'];
  $address=$_POST['address'];
  $contactnumbers=$_POST['contactnumbers'];
  $occupation=$_POST['occupation'];
  $phone=$_POST['phone'];
  $contact=$_POST['contact'];
  $email=$_POST['email'];
  $sql="update students set parentsName=:parentname,address=:address,contactnumbers=:contactnumbers,occupation=:occupation,contactno=:phone,nextphone=:contact,email=:email where id='$sid'";
  $query = $dbh->prepare($sql);
  $query->bindParam(':parentsname',$parentsname,PDO::PARAM_STR);
  $query->bindParam(':address',$address,PDO::PARAM_STR);
  $query->bindParam(':contactnumbers',$contactnumbers,PDO::PARAM_STR);
  $query->bindParam(':occupation',$occupation,PDO::PARAM_STR);
  $query->bindParam(':phone',$phone,PDO::PARAM_STR);
  $query->bindParam(':contact',$contact,PDO::PARAM_STR);
  $query->bindParam(':email',$email,PDO::PARAM_STR);
  $query->execute();
  if ($query->execute()) {
    echo "<script>alert('updated successfuly`.');</script>";
    echo "<script>window.location.href ='student_list.php'</script>";
  }else{
    echo "<script>alert('something went wrong, please try again later');</script>";
  }
}

if(isset($_POST['pass']))
{
  $sid=$_SESSION['edid'];
  $height=$_POST['height'];
  $weight=$_POST['weight'];
  $bmi=$_POST['bmi'];
  $temperature=$_POST['temperature'];
  $bp=$_POST['bp'];
  $pr=$_POST['pr'];
  $rr=$_POST['rr'];
  $sql="update students set height=:height,weight=:weight,bmi=:bmi,temperature=:temperature, bp=:bp,pr=:pr,rr=:rr where id='$sid'";
  $query = $dbh->prepare($sql);
  $query->bindParam(':height',$height,PDO::PARAM_STR);
  $query->bindParam(':weight',$weight,PDO::PARAM_STR);
  $query->bindParam(':bmi',$bmi,PDO::PARAM_STR);
  $query->bindParam(':temperature',$temperature,PDO::PARAM_STR);
  $query->bindParam(':bp',$bp,PDO::PARAM_STR);
  $query->bindParam(':pr',$pr,PDO::PARAM_STR);
  $query->bindParam(':rr',$rr,PDO::PARAM_STR);
  $query->execute();
  if ($query->execute()) {
    echo "<script>alert('updated successfuly.');</script>";
    echo "<script>window.location.href ='student_list.php'</script>";
  }else{
    echo "<script>alert('something went wrong, please try again later');</script>";
  }
}

if(isset($_POST['save2']))
{
  $sid=$_SESSION['edid'];
  $studentimage=$_FILES["studentimage"]["name"];
  move_uploaded_file($_FILES["studentimage"]["tmp_name"],"studentimages/".$_FILES["studentimage"]["name"]);
  $sql="update students set studentImage=:studentimage where id='$sid' ";
  $query = $dbh->prepare($sql);
  $query->bindParam(':studentimage',$studentimage,PDO::PARAM_STR);
  $query->execute();
  if ($query->execute()) {
    echo "<script>alert('updated successfuly.');</script>";
    echo "<script>window.location.href ='student_list.php'</script>";
  }else{
    echo "<script>alert('something went wrong, please try again later');</script>";
  }
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="card-body">
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
       <?php
       $eid=$_POST['edit_id'];
       $ret=mysqli_query($con,"select * from  students where id='$eid'");
       $cnt=1;
       while ($row=mysqli_fetch_array($ret))
       {
         $_SESSION['edid']=$row['id']; 
         ?>
         <div class="col-md-3">
           <!-- Profile Image -->
           <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="img-circle"
                src="studentimages/<?php echo htmlentities($row['studentImage']);?>" width="150" height="150" class="user-image"
                alt="User profile picture">
              </div>

              <h3 class="profile-username text-center"><?php  echo $row['name'];?></h3>



              <p class="text-muted text-center"><strong></strong></p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Email</b> <a class="float-right"><?php  echo $row['email'];?></a>
                </li>
                <li class="list-group-item">
                  <b>Contact No</b> <a class="float-right">0<?php  echo $row['contactno'];?> </a>
                </li>
                
              </ul>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card">
            <div class="card-header p-2">
              <ul class="nav nav-pills">
                <li class="nav-item"><a class="nav-link active" href="#companydetail" data-toggle="tab">Registration Detail</a></li>
                <li class="nav-item"><a class="nav-link" href="#companyaddress" data-toggle="tab">Parent Info</a></li>
                <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">ANTHROPOMETRICS/VITALSIGNS</a></li>
                <li class="nav-item"><a class="nav-link" href="#change" data-toggle="tab">Update Image</a></li>
              </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
              <div class="tab-content">
                <div class="active tab-pane" id="companydetail">
                  <form role="form" id=""  method="post" enctype="multipart/form-data" class="form-horizontal" >
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                         <label for="companyname">Last Name</label>
                         <input name="lastname" class="form-control" name="lastname" id="studentname" value="<?php  echo $row['lastname'];?>" required>
                       </div>
                       <!-- /.form-group -->
                     </div>
                     <div class="col-md-4">
                      <div class="form-group">
                        <label for="regno">First Name</label>
                        <input name="firstname" class="form-control" name="firstname" id="firstname" value="<?php  echo $row['firstname'];?>" required>
                      </div>        
                    </div>
                  </div>
                  <div class="col-md-4">
                      <div class="form-group">
                        <label>Middle Initial</label>
                        <input class="form-control" name="middleinitial" value="<?php  echo $row['middleinitial'];?>" required>
                      </div>  

                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Sex</label>
                        <input class="form-control" name="sex" value="<?php  echo $row['sex'];?>" required>
                      </div>        
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <label>Age</label>
                        <input class="form-control" name="age" value="<?php  echo $row['age'];?>" required>
                      </div>        
                    </div>      
                    </div>
                    <!-- /.col -->
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Nationality</label>
                        <input class="form-control" name="nationality" value="<?php  echo $row['nationality'];?>" required>
                      </div>        
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Contact Number</label>
                        <input class="form-control" name="contactnumber" value="<?php  echo $row['contactnumber'];?>" required>
                      </div>        
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label>Religion</label>
                        <input class="form-control" name="religion" value="<?php  echo $row['religion'];?>" required>
                      </div>        
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
                    <!-- /.col --> 
                  </div>
                  <!-- /.card-body -->
                  <div class="modal-footer text-right">
                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
              <div class=" tab-pane" id="companyaddress">
                <form role="form" id=""  method="post" enctype="multipart/form-data" class="form-horizontal" >

                  <div class="row">
                    <div class="form-group col-md-6">
                     <label for="companyname">Parents Name</label>
                     <input name="parentsname" class="form-control" id="parentsname"  value="<?php  echo $row['parentsname'];?>" required>
                   </div>
                   <!-- /.form-group -->
                   <div class="form-group col-md-6">
                     <label for="companyname">Parents Address</label>
                     <input name="address" class="form-control" id="address"  value="<?php  echo $row['address'];?>" required>
                   </div>
                   <div class="form-group col-md-6">
                     <label for="contactnumbers">Parents Contact Number</label>
                     <input name="contactnumbers" class="form-control" id="contactnumbers"  value="<?php  echo $row['contactnumbers '];?>" required>
                   </div>
                   <!-- /.form-group -->

                   <div class="col-md-12">
                    <div class="form-group">
                      <label for="regno">Occupation</label>
                      <input name="occupation" class="form-control" id="occupation" value="<?php  echo $row['occupation'];?>" required>
                    </div>        
                  </div>
                  <!-- /.col -->
                </div><!-- ./row -->

                <!-- /.card-body -->
                <div class="modal-footer text-right">
                  <button type="submit" name="save" class="btn btn-primary">Update</button>
                </div>

              </form>
            </div>
            

            <!-- /.tab-pane -->

            <div class=" tab-pane" id="change">
             <div class="row">
              <form role="form" id=""  method="post" enctype="multipart/form-data" class="form-horizontal" >
                <div class="form-group">
                  <label>Upload Image</label>
                  <input type="file" class="" name="studentimage" value="" required>
                </div>  

                <div class="modal-footer text-right">
                  <button type="submit" name="save2" class="btn btn-primary">Update</button>
                </div>

              </form>
            </div>
          </div>



          <div class="tab-pane" id="settings">
            <form role="form" id=""  method="post" enctype="multipart/form-data" >
              <div class="row">
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
              <div class="form-group row">
                <div class="offset-sm-2 col-sm-10">
                  <button type="submit" name="pass" class="btn btn-primary">Update</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.tab-pane -->
          <?php  
        }?>
      </div>
      <!-- /.tab-content -->
    </div><!-- /.card-body -->
  </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->