<html>
    <head>
        <style>
            body{
                margin:0;
                min-height:100vh;
                display:flex;
                justify-content:center;
                align-items:center;
                background-color:ivory;
                
            }

            .container{
                padding:10px 80px;
                width:30%;
                border-radius:20px;
                background-color: rgba(255,255,255,0.7);
                box-shadow: 10px 10px 8px #888888;

            }

            .button {
            background-color: #008CBA; /* Green */
            border: 1px grey;
            border-radius:10px;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            cursor:pointer;
            }

        </style>
    </head>
   <body> 
<?php

    // define variables and set to empty values
    $name = $email = $gender = $agree = "";
    $nameErr = $emailErr = $genderErr = $agreeErr = "";

    if ( $_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["name"])) {
            $nameErr = "Name is required";
            } else {
            $name = test_input($_POST["name"]);
            }

        if (empty($_POST["email"])) {
        $emailErr = "Email is required";
        } else {
        $email = test_input($_POST["email"]);
        }

        if (empty($_POST["gender"])) {
            $genderErr = "Gender is required";
            } else {
            $gender = test_input($_POST["gender"]);
            }
            if (empty($_POST["agree"])) {
            $agreeErr = "You Must Agree to Terms";
            } else {
            $agree = $_POST["agree"];
            }
    }

    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
            }

    $id=$_GET['id'];

//  Linking To Database
$link = mysqli_connect("localhost", "root", "", "cms_class");
      
      // Check connection
      if($link === false){
          die("ERROR: Could not connect. " . mysqli_connect_error());
      }
      
      // Attempt insert query execution
  $sql = "SELECT * FROM students WHERE st_id= $id";
  $retval = mysqli_query( $link,$sql );

//   $row = mysqli_fetch_assoc($retval)
        //second fetch Data
          while ($row = $retval -> fetch_assoc()) { 
            $Id = $row['st_id'];
            $Name = $row['st_name'];
            $Email = $row['email'];
            $Gender = $row['gender'];

        echo "<div class=\"container\">";

          echo "<h2> View Record </h2>";
          echo "<br>";
          echo "<hr>";
          echo "<h4>Name</h4><br>";
          echo "$Name";
          echo "<h4>Email</h4><br>";
          echo "$Email";
          echo "<h4>Gender</h4>";
          echo "<br>";
          echo "$Gender";
          echo "<br>";

          echo ($agree=='0') ? 'you will receive mail from us' : 'you willnot receive any mail';
          echo "<br>";
          echo "<button class=\"button\" onclick=\"window.location.href = 'index.php';\"> Back </button>";
          echo "</div>";

      } 
      
      // Close connection
      mysqli_close($link);
?>
</body>
</html>