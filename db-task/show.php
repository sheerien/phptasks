<?php 
require_once "function.php";

    $conn = db_connect("localhost", "root","","phptask");
    if($conn){
        $result =$conn->query("SELECT id, name, img_path FROM users");
        if ($result->num_rows > 0) {
            // output data of each row
            // $row = $result->fetch_assoc();
            // while($row = $result->fetch_assoc()) {
            // $id = $row["id"];
            // $name = $row["name"];
            // $img = $row["img_path"];
            //   echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["img_path"]. "<br>";
            }
          } else {
            echo "0 results";
          }

    
?>
<!DOCTYPE html>
<html>

<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }
        
        td,
        th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        
        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>

<body>

    <h2>HTML Table</h2>

    <table>
        <tr>
            <th>id</th>
            <th>name</th>
            <th>img-path</th>
            <th>Delete</th>
        </tr>
        <?php  while($row = $result->fetch_assoc()){?>
            <tr>
                <th><?php echo  $row["id"]?></th>
                <th><?php echo  $row["name"]?></th>
                <th><?php echo  $row["img_path"]?></th>
                <th><form action="delete.php" method="GET"><input type="submit" value="delete" name="delete"></form></th>

            </tr>
            <?php };?>
    </table>

</body>

</html>