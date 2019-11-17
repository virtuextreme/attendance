<?php
    $title = 'Success';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    require_once 'sendemail.php';

    if (isset($_POST['submit'])){
        //extract value from the _POST array
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];

        //call fuction to insert & track if success or not
        $isSuccess = $crud->insertAttendees($fname, $lname, $dob, $email, $contact, $specialty); 
        $specialtyName = $crud->getSpecialtyById($specialty);
        
        if($isSuccess){
            SendEmail::SendMail($email, 'Welcome to IT Conference 2019', 'You have successfully registerted for this year\'s IT Conference');
            include 'includes/successmessage.php';
        }
        else{
            include 'includes/errormessage.php';
        }
    }
?>


<div class="card" style="width: 18rem;">

  <div class="card-body">
        <h5 class="card-title">
            <?php echo $_POST['firstname'] . ' ' . $_POST['lastname'];  ?>
        
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?php echo $_POST['specialty'];  ?>
        
        </h6>
        <p class="card-text">
            Date of Birth: <?php echo $_POST['dob'];  ?>
        </p>
        <p class="card-text">
            Email: <?php echo $_POST['email'];  ?>
        </p>
        <p class="card-text">
            Phone Number: <?php echo $_POST['phone'];  ?>
        </p>
        
  </div>










<!--This prints out the values that were passed to the action page isung the get method-->
<!--
<h1 class="text-center text-success">You Have Been Registered!</h1>

<div class="card" style="width: 18rem;">
  <div class="card-body">
        <h5 class="card-title">
            <?php //echo $_GET['firstname'] . ' ' . $_GET['lastname'];  ?>
        
        </h5>
        <h6 class="card-subtitle mb-2 text-muted">
            <?php //echo $_GET['specialty'];  ?>
        
        </h6>
        <p class="card-text">
            Date of Birth: <?php //echo $_GET['dob'];  ?>
        </p>
        <p class="card-text">
            Email: <?php //echo $_GET['email'];  ?>
        </p>
        <p class="card-text">
            Phone Number: <?php //echo $_GET['phone'];  ?>
        </p>
        
  </div>
</div> -->
<!--
<?php
   // echo //$_GET['firstname'];
   // echo //$_GET['lastname'];
    //echo //$_GET['dob'];
   // echo //$_GET['specialty'];
    //echo //$_GET['email'];
//echo //$_GET['phone'];


?>-->

<br>
    <br>

    <?php require_once 'includes/footer.php'; ?>
    <a href="viewrecords.php" class="btn btn-info">Back to List</a> 
    <a href="edit.php?id=<?php echo $result['attendee_id']?>" class="btn btn-warning">Edit</a> 
    <a onclick="return confirm('Are you sure you want to delete this record?');" 
    
    href="delete.php?id=<?php echo $result['attendee_id']?>" class="btn btn-danger">Delete</a>