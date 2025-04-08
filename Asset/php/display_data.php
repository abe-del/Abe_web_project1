<?php
// Database connection parameters
$servername="localhost";// change if necessary
$username="root";// your MySQL username
$password="";// your MySQL password
$dbname="feed_back";//your database name

// create connection
$conn= new mysqli($servername,$username,$password,$dbname);

// check connection
if($conn->connect_error){
    die("connection failed:".$conn->connect_error);
}

// Query to fetch messages
$sql="SELECT First_Name,Last_Name,Email,Gender,Rank,Suggestion  FROM info_table";// feedback_db is the name of the db table
$result=$conn->query($sql);
?>

<!--  displaying the retrived/ fetched data -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8>
    <meta name="viewport"content="width=device-width,initial-scale=0">
    <title>Feedbacks</title>
    <link rel="stylesheet" href="../css/style.css" /><!--optional: Link to  an etension -->
    <style>
        table{
            width: 80%;
            border-collapse:collapse;
            margin:20px auto;
        }
        th,td{
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;

            }
            th{
                background-color: #f2f2f2;
            }
</style>
</head>
<body>
<div class="church">
        <header>
            <h2> Feedback</h2>
        </header>
    </div>
    <nav>

        <ul>
            <li>
                <a href="../../index.html">Eparchy</a>

            </li>
            <li>
                <a href="../html/abe.html">ETC Families</a>

            </li>
 

            <li>
                <a href="../html/form.html">Contact</a>

            </li>

            <li>
                <a href="#">Feedbacks</a>

            </li>

        </ul>

    </nav>
    <main>
    <h2 style="text-align:: center;">Message Data List</h2>
    <table>
        <tr>
            <th> First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th> Gender</th>
  <th>Rank</th>
<th>Suggestion</th>
<th>about_the_web_page</th>

</tr>
<?php
// check if there are results and output them as table rows
if($result->num_rows>0){
    // Fetch associative array of each row
    while($row=$result->fetch_assoc()){
        echo"<tr>";
        echo"<td>".htmlspecialchars($row['First_Name'])."</td>";
        echo"<td>".htmlspecialchars($row['Last_Name'])."</td>";
        echo"<td>".htmlspecialchars($row['Email'])."</td>";
        echo"<td>".htmlspecialchars($row['Gender'])."</td>";        
        echo"<td>".htmlspecialchars($row['Rank'])."</td>";
        echo"<td>".htmlspecialchars($row['Suggestion'])."</td>";
        echo"<td>".htmlspecialchars($row['about_ the _webpage'])."</td>";
        echo"</tr>";
    }
}
else{
    echo"<tr><td colspan='3'>No messages found</td></tr>";
}
?>
</table>
<?php
// close the database connection
$conn->close();
?>
</main>
    <footer>
        <p>&copy; 2025 All rights reserved</p>
    </footer>
</body>
</html>

