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
            
   ?>

    <div class="container">    
    <!-- <?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?> -->
    <h2> USER REGISTERATION FORM </h2>
    <hr >
      <form action = "record.php" method = "POST">

        <table>
          <p style="color:red;">* Required Fields</p>
            <tr>
                <th>Name  :</th>
                <td> <input type = "text" name = "name" />  <span style="color:red;">* <?php echo $nameErr;?></span> </td>
            </tr>
            <tr>
                <th>Email  :</th>
                <td> <input type = "text" name = "email" /> <span style="color:red;">* <?php echo $emailErr;?></span> </td>
            </tr>

            <tr>
                <th>Gender  :</th>
                <td>    <input type="radio" name="gender" value="female">Female
                        <input type="radio" name="gender" value="male">Male
                        <span style="color:red;">* <?php echo $genderErr;?></span> 
                </td>
            </tr>

            <tr> 
              <td>
                <input type="hidden" name="agree" value="0" />
                <input type="checkbox" name="agree" value="1" /> </td>
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
        echo "<h2>Your Input:</h2>";
        echo "Name :".$name;
        echo "<br>";
        echo "Email :".$email;
        echo "<br>";
        echo "Gender :".$gender;
        echo "<br>";
//--------------------------------Second attempt ------------

// if (isset($_POST["submit"])) {
  // $stname = $_POST["name"];
  // $stmail  = $_POST["email"];
  // $stgender  = $_POST["gender"];
  // $stagree = $_POST["agree"];
 
  // echo "$stname";
  // echo "$stmail";
  // echo "$stgender";
  // echo "$stagree";

  // if (!empty($stname) && !empty($stmail) && !empty($stgender)) {
      
      /*host, username, password, dbname*/
      $link = mysqli_connect("localhost", "root", "", "cms_class");
      
      // Check connection
      if($link === false){
          die("ERROR: Could not connect. " . mysqli_connect_error());
      }
      
      // Attempt insert query execution
  $sql = "INSERT INTO students(st_name, email, gender, newsletter) VALUES ('$name', '$email' , '$gender', '$agree')";
      if(mysqli_query($link, $sql)){
          // echo "<h4 style=\"background-color:green;color:white;padding:10px 10px;\"> Records inserted successfully. </h4>";
      } else{
          echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
      }
      
      // Close connection
      mysqli_close($link);

//   }else{
//       echo "Please provide all information";
//   }
//   }
// else {
//   echo "hello world";
//   }











        //open & close connection
        // $dbhost = 'localhost';
        // $dbuser = 'root';
        // $dbpass = '';
        // $dbname = 'cms_class';
        // $link = mysqli_connect( $dbhost, $dbuser, $dbpass, $dbname);

        //select
//        mysqli_select_db( $link,$dbname );

        // create table
        // $sql = 'CREATE TABLE students( st_id INT NOT NULL AUTO_INCREMENT,
        // st_name VARCHAR(20) NOT NULL,
        // gender  VARCHAR(10) NOT NULL,
        // receive Boolean,
        // primary key ( st_id ))';



      // $stname = $_REQUEST['name'];

      // $stname = $_POST["name"];


    //  $stgender = $_REQUEST['gender'];
    //   $stagree = $_REQUEST['agree'];

          // $sql = "INSERT INTO students(st_name,email,gender,newsletter)
          // VALUES ( $stname , '$email' , '$gender','$agree')";
       
          // $retval = mysqli_query( $link,$sql );
          
          // if(! $retval ) {
          //    die('Could not insert to table: ' . mysqli_error($link));
          // }
           
          // echo "<br>Data inserted to table successfully\n";
          // mysqli_close($link);
  
    ?>
  
    </div>

      
   </body>
</html>