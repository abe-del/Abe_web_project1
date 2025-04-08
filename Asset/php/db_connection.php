<!-- is the server side script /code-->
<?php
 if($_SERVER['REQUEST_METHOD'] =='POST'){
    //create variables to accept and save the user data coming fromt html
    $first_name=$_POST['fname'];
    // saving the data of the email in the email_variable
    $last_name =$_POST['lname'];
    $email=$_POST['email'];
    $rank =$_POST['rank'];
    $gender=$_POST['gender'];
    $suggestions =$_POST['suggestions'];
    $message_variable=$_POST['message'];

    //Display the collected Information
    // echo"<h2> Display the collected Information</h2>";
    // echo "<h3>Message Summary:</h3>";
    // echo"<p><strong>Name:</strong> $name_variable</p>";
    // echo"<p><strong>Email:</strong> $email_variable</p>";
    // echo"<p><strong>Message:</strong> $message_variable</p>";

 }

// if there is no user information to display-return to the form page
else{
    header(header:"Location: contact.html");
    exit();
}


// // connecting to Database
$conn= new mysqli("localhost","root","","info_db");
// // check if the connection is having an error
if($conn->connect_error){
    // display error message
    echo "Could not connect to the database";
    die('Connection Failed:'.$conn->connect_error);
    // else create a sql insert statement to pass the values that came from the user form

}
else{
    $sql_statement = $conn->prepare("insert into message_table(Name,Email,Message) values(?,?,?)");
    $sql_statement->bind_param("sss",$name_variable,$email_variable,$message_variable);
    // excute the sql statement
    $sql_statement->execute();

    // display the message to tell users that the form is sent successfully to the database
        echo"Message sent Successfully";

        // after a successful insertionclose the statement and also close the connection
        $sql_statement->close();
        $conn->close();
}
?>
