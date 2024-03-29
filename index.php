<?php
    $title = 'index';
    require_once 'includes/header.php';
    require_once 'db/conn.php';
    $result = $crud->getSpecialties();

?>
<!--
    First name
    Last name
    DOB
    Specialty
    Email
    Contact
-->
    <h1 class='text-center'>Registration of IT Conference</h1>
    <form method="post" action="success.php">
        <div class="form-group">
            <label for="firstname">First Name</label>
            <input required type="text" class="form-control" id="firstname" aria-describedby="firstname" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Last Name</label>
            <input required type="text" class="form-control" id="lastname" aria-describedby="lastname" name="lastname">
        </div>
        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input required type="text" class="form-control" id="dob" aria-describedby="dob" name="dob">
        </div>
        <div class="form-group">
            <label for="specialty">Choose Your Specialty</label>
                <select class="form-control" id="specialty" name="specialty">
                    <?php while($r = $result->fetch(PDO :: FETCH_ASSOC)){?>
                        <option value = "<?php echo $r['specialty_id'] ?>"><?php echo $r ['name']?></option>
                    <?php }?>   
                </select>
            </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input required type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name=email>
            <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="phone">Contact Number</label>
            <input type="text" class="form-control" id="phone" aria-describedby="phonehelp" placeholder="Enter Phone Number" name="phone">
            <small id="phonehelp" class="form-text text-muted">We'll never share your phone number with anyone else.</small>
        </div>
        
        <button type="submit" class="btn btn-primary btn-block" name="submit">Submit</button>
    </form>
    <br>
    <br>

    <?php require_once 'includes/footer.php'; ?>