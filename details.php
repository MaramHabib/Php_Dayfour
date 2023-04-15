<html>
    <head>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="  https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">



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
                margin:10px;
                padding:10px 80px;
                width:50%;
                border-radius:20px;
                background-color: rgba(255,255,255,0.7);
                box-shadow: 10px 10px 8px #888888;

            }

            .edit_btn {
                text-decoration: none;
                padding: 2px 5px;
                background: #2E8B57;
                color: white;
                border-radius: 3px;
            }

            .del_btn {
                text-decoration: none;
                padding: 2px 5px;
                color: white;
                border-radius: 3px;
                background: #800000;
            }
        </style>
    </head>
   <body> 
        <?php 
        $dbhost = 'localhost';
        $dbuser = 'root';
        $dbpass = '';
        $dbname ='cms_class';

        $conn =  mysqli_connect($dbhost, $dbuser, $dbpass,$dbname);

        if(! $conn ) {
            die('Could not connect: ' . mysqli_error($conn));
            }
        
            // echo 'Connected successfully<br>';

            $sql = 'SELECT *  FROM students';
            mysqli_select_db($conn,$dbname);
            $results = mysqli_query($conn,$sql );
            
            if(! $results ) {
            die('Could not get data: ' . mysqli_error($conn));
            }

            // print_r($results);
            $rowsnum=mysqli_num_rows($results) ;
            // echo "Number of rows are:  $rowsnum"

        ?>
        <div class="container">
        <h2 style="display:inline"> Students Details </h2>
        <span style="float:right;"><button type="button" class="btn btn-success" onclick="window.location.href = 'index.php'">
         ADD NEW USER </button></span>
        <hr>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th >Email</th>
                    <th>Gender</th>
                    <th>Mail Status</th>
                    <th> Actions </th>
                    
                    <!-- <th>Action</th> -->
                </tr>
            </thead>

            <?php 
                
            
            while ($row = mysqli_fetch_array($results,MYSQLI_ASSOC)) { 
                // print_r($row);
                echo "<tr>";
                echo "<td>" . $row["st_id"] ."</td>";
                echo "<td>" . $row["st_name"] ."</td>";
                echo "<td>" . $row["email"] ."</td>";
                echo "<td>" . $row["gender"] ."</td>";
                echo "<td>" . $row["newsletter"] ."</td>";  
                ?> 
                <td>
                <a href="read.php?id=<?php echo $row['st_id']; ?>"> <i class="fa-sharp fa-solid fa-eye"></i></a>
                <a href="edit.php?edit=<?php echo $row['st_id']; ?>" > <i class="fa-solid fa-pen-to-square"></i></a>
                <a href="delete.php?del=<?php echo $row['st_id']; ?>" > <i class="fa-solid fa-trash"></i></a>
            </td>
                <?php    

                echo "</tr>";
                
                ?>
            

            <?php } ?>
        </table>
        </div>
    </body>
</html>

