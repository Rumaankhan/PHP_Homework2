<?php
include "db.php";
$result=$conn->query('select * from employee');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table border="1" style="border:solid black; cellpadding:10px; width:80%; text-align:center; margin:auto; height:200px; margin-top:50px; background:linear-gradient(skyblue, #f0f0f0, #d0d0d0);    ">
        <tr>
            <td>Id</td>
            <td>Name</td>
            <td>Job Title</td>
            <td>Salary</td>
        </tr>
        <?php
        while($row=$result->fetch_assoc()){?>
        <tr>
            <td><?php echo $row['id']?></td>
            <td><?php echo $row['name']?></td>
            <td><?php echo $row['position']?></td>
            <td><?php echo $row['salary']?></td>
        </tr>

       <?php }?>

</table>
    
</body>
</html>