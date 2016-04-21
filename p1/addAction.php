<?php
header('content-type:text/html;charset=utf-8');
 
$mysqli=new mysqli("localhost", "root", "", "test");

if($mysqli->connect_errno)
{
    
    die("connect erro:");
}


    $id=$_POST["id"];
    $username=$_POST['username'];
    $act=$_GET['act'];
    
   switch($act)
   {
       case 'addUser':
           $sql="insert into table2(id,username) values('{$id}','{$username}')";
            $res=$mysqli->query($sql);
            if($res)
            {
                $affect=$mysqli->affected_rows;
                echo "<script type='text/javascript'>
                       alert('add success {$affect}');
                       location.href='index.php';
                       </script>
                    
                      ";
            }
            else
            {
                echo "<script type='text/javascript'>
                alert('add success {$affect}');
                location.href='add.php';
                </script>
                
                ";
                
                
            }
           break;
       
       default:
           
       
   }