<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "universitydb";

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
// Let us do some data manipulation task
//Insert a row in the department table of the universitydb database
// Insert Microbiology dept
/*
$sql = "insert into department values ('Microbiology', 'Jennings', 9900.00)";
if($conn->query($sql) === TRUE){
	echo "<br/>"; //new line
	echo "Insertion Successful";
}
else{
	echo "<br/>"; //new line
	echo "Error accessing the database: ".$conn->error;
}
*/

/*
//Update: increase the budget of Microbiology department by 5 percent
$sql = "update department set budget = budget*1.05 where dept_name = 'Microbiology'";
if($conn->query($sql) === TRUE){
	echo "<br/>"; //new line
	echo "Update Successful";
}
else{
	echo "<br/>"; //new line
	echo "Error accessing the database: ".$conn->error;
}
*/

//Extract information from database
//Select command
//Show all rows (data) from department table

/*
$sql = "select * from department";
$result = $conn->query($sql);
//number of rows
echo "<br/>Total records: $result->num_rows<br/>";

//Display the rows
if ($result->num_rows>0){
	//output data of each row using loop
	while($row = $result->fetch_assoc()){
		echo "Dept Name: ".$row["dept_name"]." Building: ".$row["building"]." Budget: ".$row["budget"]."<br>";
	}
}
else{
	echo "0 results";
}
*/

/*
//Show me the budget of Microbiology department
$sqlHere = "select budget from department where dept_name = 'Microbiology'";
$resultHere = $conn->query($sqlHere);
//number of rows
echo "<br/>Total records: $resultHere->num_rows<br/>";
$valueHere = $resultHere->fetch_assoc();
echo $valueHere["budget"];
*/

/*
//Show me the building of Physics department
$sqlHere = "select building from department where dept_name = 'Physics'";
$resultHere = $conn->query($sqlHere);
//number of rows
echo "<br/>Total records: $resultHere->num_rows<br/>";
$valueHere = $resultHere->fetch_assoc();
echo $valueHere["building"];
*/

// ================== MY ADDED CODE ==================

//Task 1: Insert Earth Science and Medicine departments
$sql = "insert into department values ('Earth Science', 'Science', 9999.00), ('Medicine', 'Science', 8888.00)";
echo "<br/><br/><b>Task 1: Insert Earth Science and Medicine departments</b>";
if($conn->query($sql) === TRUE){
	echo "<br/>"; //new line
	echo "Insertion Successful";
}
else{
	echo "<br/>"; //new line
	echo "Error accessing the database: ".$conn->error;
}

//Task 2: Insert student Mike into the student table
$sql = "insert into student values ('1111', 'Mike', 'Earth Science', 4.0)";
echo "<br/><br/><b>Task 2: Insert student Mike</b>";
if($conn->query($sql) === TRUE){
	echo "<br/>"; //new line
	echo "Insertion Successful";
}
else{
	echo "<br/>"; //new line
	echo "Error accessing the database: ".$conn->error;
}

//Task 3: Increase the budget of Earth Science department by 90 percent
$sql = "update department set budget = budget*1.90 where dept_name = 'Earth Science'";
echo "<br/><br/><b>Task 3: Increase Earth Science budget by 90%</b>";
if($conn->query($sql) === TRUE){
	echo "<br/>"; //new line
	echo "Update Successful";
}
else{
	echo "<br/>"; //new line
	echo "Error accessing the database: ".$conn->error;
}

//Task 4: Change the building of Medicine department to Health Services
$sql = "update department set building = 'Health Services' where dept_name = 'Medicine'";
echo "<br/><br/><b>Task 4: Change Medicine building to Health Services</b>";
if($conn->query($sql) === TRUE){
	echo "<br/>"; //new line
	echo "Update Successful";
}
else{
	echo "<br/>"; //new line
	echo "Error accessing the database: ".$conn->error;
}

//Task 5: Print all data of department table
$sql = "select * from department";
$result = $conn->query($sql);
echo "<br/><br/><b>Task 5: All data of department table</b>";
//number of rows
echo "<br/>Total records: $result->num_rows<br/>";
//Display the rows
if ($result->num_rows>0){
	//output data of each row using loop
	while($row = $result->fetch_assoc()){
		echo "Dept Name: ".$row["dept_name"]." Building: ".$row["building"]." Budget: ".$row["budget"]."<br>";
	}
}
else{
	echo "0 results";
}

//Task 6: Print the building of Medicine department
$sqlHere = "select building from department where dept_name = 'Medicine'";
$resultHere = $conn->query($sqlHere);
echo "<br/><b>Task 6: Building of Medicine department</b>";
//number of rows
echo "<br/>Total records: $resultHere->num_rows<br/>";
$valueHere = $resultHere->fetch_assoc();
echo $valueHere["building"];



























//terminate the connection
$conn->close();
?>