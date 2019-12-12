<?php
//conect to the database
$link = mysqli_connect("127.0.0.1", "root", "", "pcs");

//my query
$sql = "INSERT INTO results (firstName, lastName, email, q1, q2, q3)
VALUES
('$_POST[firstName]','$_POST[lastName]','$_POST[email]','$_POST[q1]','$_POST[q2]', '$_POST[q2]')
";

// Execute query
mysqli_query( $link, $sql);

// Give feedback
echo "1 record added"

?> 


