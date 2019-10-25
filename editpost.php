<?php
    require_once 'db/conn.php';

    //get values from post operations
    if (isset($_POST['submit'])){
        //extract value from the _POST array
        $id = $_POST['id'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['dob'];
        $email = $_POST['email'];
        $contact = $_POST['phone'];
        $specialty = $_POST['specialty'];
    
    //call crud function
        $result = $crud->editAttendee($id,$fname, $lname, $dob, $email, $contact, $specialty );
    //redirect to index.php 
    if ($result){
        header ("Location: viewrecords.php");
    }

    else {
        //echo 'error';
        include 'includes/errormessage.php';
    }
    }   
    else {
        //echo 'error';
        include 'includes/errormessage.php';
    }

?>