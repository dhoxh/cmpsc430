<html>
<body>

<!-- Each form sends a hidden "table" field so welcome.php knows which table to insert into -->

<h3>Insert into Department</h3>
<form action = "welcome.php" method = "post">
<input type = "hidden" name = "table" value = "department">
Department Name: <input type = "text" name = "dept_name" required><br>
Building: <input type = "text" name = "building"><br>
Budget: <input type = "number" name = "budget" step = "0.01" required><br>
<input type = "submit">
</form>

<h3>Insert into Course</h3>
<form action = "welcome.php" method = "post">
<input type = "hidden" name = "table" value = "course">
Course ID: <input type = "text" name = "course_id" required><br>
Title: <input type = "text" name = "title"><br>
Department Name: <input type = "text" name = "dept_name" required><br>
Credits: <input type = "number" name = "credits" required><br>
<input type = "submit">
</form>

<h3>Insert into Student</h3>
<form action = "welcome.php" method = "post">
<input type = "hidden" name = "table" value = "student">
Student ID: <input type = "text" name = "StdID" required><br>
Name: <input type = "text" name = "name" required><br>
Department Name: <input type = "text" name = "dept_name" required><br>
Total Credits: <input type = "number" name = "tot_cred" required><br>
<input type = "submit">
</form>

<h3>Insert into Instructor</h3>
<form action = "welcome.php" method = "post">
<input type = "hidden" name = "table" value = "instructor">
Instructor ID: <input type = "text" name = "ID" required><br>
Name: <input type = "text" name = "name" required><br>
Department Name: <input type = "text" name = "dept_name" required><br>
Salary: <input type = "number" name = "salary" step = "0.01" required><br>
<input type = "submit">
</form>

</body>
</html>
