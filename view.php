<html>

<head>
    <h1><center>ADD STUDENT DETAILS</center></h1></head>

<body>
    <form name="f1" method="post" action="studentController.php">
        <div>NAME:
            <input type="text" name="name">
        </div>
        <div>AGE:
            <input type="text" name="age">
        </div>
        <div>GENDER:
            <input type="radio" name="gender" value="male">male
            <input type="radio" name="gender" value="female">female
        </div>
        <div>ADDRESS:
            <textarea rows="4" cols="30" name="address"></textarea>
        </div>
        <div>ROLL NO:
            <input type="text" name="rollno" maxlength="10">
        </div>
        <div>
            <input type="submit" value="submit" name="submit_data">
        </div>
    </form>

</html>