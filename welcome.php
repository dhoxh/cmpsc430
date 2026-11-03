<html>
<body>

<?php
//Which form was submitted (department, course, student, or instructor)
$table = $_POST["table"] ?? "";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universitydb";

//PHP 8 throws an exception on SQL errors by default; turn that off so the
//"Error accessing the database" message below is shown instead
mysqli_report(MYSQLI_REPORT_OFF);

//Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if($conn->connect_error){
	die("Connection failed:".$conn->connect_error);
}
else{
	echo "Successfully connected to the database";
}

//DO YOUR TASK

//Build the insert command for the table chosen in the form
if($table == "department"){
	$value1 = $_POST["dept_name"];
	$value2 = $_POST["building"];
	$value3 = $_POST["budget"];
	$sql = "insert into department values ('$value1', '$value2', '$value3')";
}
else if($table == "course"){
	$value1 = $_POST["course_id"];
	$value2 = $_POST["title"];
	$value3 = $_POST["dept_name"];
	$value4 = $_POST["credits"];
	$sql = "insert into course values ('$value1', '$value2', '$value3', '$value4')";
}
else if($table == "student"){
	$value1 = $_POST["StdID"];
	$value2 = $_POST["name"];
	$value3 = $_POST["dept_name"];
	$value4 = $_POST["tot_cred"];
	$sql = "insert into student values ('$value1', '$value2', '$value3', '$value4')";
}
else if($table == "instructor"){
	$value1 = $_POST["ID"];
	$value2 = $_POST["name"];
	$value3 = $_POST["dept_name"];
	$value4 = $_POST["salary"];
	$sql = "insert into instructor values ('$value1', '$value2', '$value3', '$value4')";
}
else{
	echo "<br/>"; //new line
	die("No form was submitted. Go to index_forWelcome.php first.");
}

//Run the insert command
if($conn->query($sql) === TRUE){
	echo "<br/>"; //new line
	echo "Insertion Successful into the $table table";
}
else{
	echo "<br/>"; //new line
	echo "Error accessing the database: ".$conn->error;
}

//Show all rows of the table so the inserted row can be seen
$result = $conn->query("select * from $table");
echo "<br/><br/>All rows in the $table table (Total records: $result->num_rows):<br/>";
echo "<table border = '1'><tr>";
foreach($result->fetch_fields() as $field){
	echo "<th>".$field->name."</th>";
}
echo "</tr>";
while($row = $result->fetch_assoc()){
	echo "<tr>";
	foreach($row as $value){
		echo "<td>".$value."</td>";
	}
	echo "</tr>";
}
echo "</table>";

echo "<br/><a href = 'index_forWelcome.php'>Insert another row</a>";

//terminate the connection
$conn->close();
?>

</body>
</html>
