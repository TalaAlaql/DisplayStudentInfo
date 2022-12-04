<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web project</title>
    <style>
      body{
        background-color:Whitesmoke; 
        font-family:courier;
      }
      #start{
         width: 100%;
         font-size:20px;
      }  
      main{
         float:right;
         border:1px solid gray;
         padding:5px;
      }
      input{
        padding:4px;
        border:2px solid black;
        font-size:17px;
      }
      aside{
        text-align:center;
        width: 300px;
        height: 700px;
        float:left;
        border:5px solid black;
        padding:10px;
        font-size:20px;
        background-color:gray;
        color:black;
      }
      #t1{
        width: 700px;
        font-size:20px;
      }
      #t1 th{
        background-color:silver;
        color:black;
        padding:10px;
        font-size:20px;
      }
      aside button{
        width: 130px;
        padding:8px;
        font-size:18px;
        font-weight:bold;
      }
     #lan{
        ext-align:left;
    } 

    </style>
</head>
<body>
    <?php
    #Connecting to database
    $host='localhost';
    $user='root';
    $pass1='';
    $db='students';
    $con=mysqli_connect($host,$user,$pass1,$db);
    $res=mysqli_query($con,"select * from st");
    $name='';
    $pass='';
    $c1='';
    $c2='';
    if(isset($_POST['name'])){
        $name=$_POST['name'];
    }
    if(isset($_POST['pass'])){
        $pass=$_POST['pass'];
    }
    if(isset($_POST['c1'])){
        $c1=$_POST['c1'];
    }
    if(isset($_POST['c2'])){
        $c2=$_POST['c2'];
    }
    if(isset($_POST['l1'])){
        $bl="php";
        
    }
    if(isset($_POST['l2'])){
        $bl="java Script";
    }

    $sqls='';
    if(isset($_POST['add'])){
        $sqls="insert into st value('$name','$pass','$c1','$c2','$bl')";
        mysqli_query($con,$sqls);
        header("location: home.php");
    }
    
    ?>
    <div id='start'>
<form method='post'>
<aside>
<div id='div'>
<img src='https://thumbs.dreamstime.com/b/black-school-icon-shadow-logo-design-white-157312165.jpg' alt='Logo' width='100'><br>
<label>Student Name:</label><br>
<input type="text" name='name'><br>
<label>Password:</label><br>
<input type="text" name='pass'><br><br>
<label id='co'> course one:</label>
<input type="text" name='c1'>
<label id='co'> course two:</label>
<input type="text" name='c2'><br><br>

<label>Your best web lagnguage:</label><br>
<input type="radio" name='l1'>
<label>PHP</label><br>
<input type="radio" name='l2' id="js">
<label >JavaScript</label><br><br>
<button name="add">Submit</button>

</div>
</aside>
<main>
<table id='t1'>
<tr>
   
    <th>Student Name</th>
    <th>Password</th>
    <th>course one</th>
    <th> course two</th>
    <th>Best language</th>
</tr>
<?php
while($row=mysqli_fetch_array($res)){
    echo "<tr>";
    echo "<td>".$row['name']."</td>";
    echo "<td>".$row['pass']."</td>";
    echo "<td>".$row['c1']."</td>";
    echo "<td>".$row['c2']."</td>";
    echo "<td>".$row['bl']."</td>";
    echo "</tr>";
}
?>
</table>
</main>
</form>
    </div>
</body>
</html>