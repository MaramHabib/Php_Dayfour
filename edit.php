
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
                width:40%;
                border-radius:20px;
                background-color: rgba(255,255,255,0.7);
                box-shadow: 10px 10px 8px #888888;

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

      //open connection
      $link = mysqli_connect("localhost", "root", "", "cms_class");
      $id=$_GET['edit'];

      // echo "Hello There $id";
        if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["gender"])){
          $name = $_POST['name'];
          $email = $_POST['email'];
          $gender = $_POST['gender'];
          mysqli_select_db($link,"cms_class");
          $sql = "UPDATE students SET  st_name = '$name', email= '$email', gender= '$gender'  WHERE st_id =  $id";
          if (mysqli_query($link, $sql)) {
              header("Data updated successfully");
              // header("location: index.php");
          } else {
              echo "Something went wrong. Please try again later.";
          }
      }
  ?>
 



    <div class="container">    
    <!-- <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> -->
    <h2> USER REGISTERATION - UPDATE FORM </h2>
    <hr >

    <?php
      //open connection
      $link = mysqli_connect("localhost", "root", "", "cms_class");
      //check connection 
      if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
        }
      $id=$_GET['edit'];
      echo "student id is $id";
      $sql="SELECT * FROM students WHERE st_id = $id LIMIT 1";
      mysqli_select_db($link,"cms_class");

     // $result = $conn ->query($sql_query)
      //first mysqli_query
      $results = mysqli_query($link,$sql );
    //second fetch Data
      while ($row = $results -> fetch_assoc()) { 
        $Id = $row['st_id'];
        $Name = $row['st_name'];
        $Email = $row['email'];
        $Gender = $row['gender'];
      

    ?>

      <form action = "edit.php?edit=<?php echo $Id; ?>" method = "POST">

        <table>
          <p style="color:red;">* Required Fields</p>
            <tr>
                <th>Name  :</th>
                <td> <input type = "text" name = "name"  value="<?php echo $Name ?>" required >  <span style="color:red;">* <?php echo $nameErr;?></span> </td>
            </tr>
            <tr>
                <th>Email  :</th>
                <td> <input type = "text" name = "email" value="<?php echo $Email?>" /> <span style="color:red;">* <?php echo $emailErr;?></span> </td>
            </tr>

            <tr>
                <th>Gender  :</th>
                <td>    <input type="radio" name="gender" value="female" <?php echo ($Gender =='female' )?"checked":"";?>/>Female
                        <input type="radio" name="gender" value="male" <?php echo ($Gender =='male' )?"checked":"";?>/>Male
                        <span style="color:red;">* <?php echo $genderErr;?></span> 
                </td>
            </tr>

            <tr> 
              <td>
                <input type="hidden" name="agree" value="0" />
                <input type="checkbox" name="agree" value="1"  <?php echo ($Gender =='male' )?"checked":"";?>/> </td>
                  <td> Receive Email from us
                  <span style="color:red;">* <?php echo $agreeErr;?></span> 
              </td> 
            </tr>  
            <tr> <td><input type = "submit" /> </td></tr>  
        </table>
      </form>

     
    <!-- <script>
      let checkbox = document.getElementById("checkbox_id");
      let checkbox.checked; // it returns Boolean value
    </script> -->
    <?php
       }
        echo "<h2>Your Input:</h2>";
        echo "Name :".$name;
        echo "<br>";
        echo "Email :".$email;
        echo "<br>";
        echo "Gender :".$gender;
        echo "<br>";

              // Close connection
              mysqli_close($link);
    ?>

    </div>



      
   </body>
</html>

<!-- https://www.linkedin.com/pulse/php-crud-operations-mysql-html-bootstrap-2022-udara-liyanage/ -->