<?php

header("Content-Type:text/html;Charset=utf-8");

define("PI", "3.14");
$isD=defined("PI");
$A=constant("PI");



$arr=array();

$arr[0]="a";
$arr[1]="b";
$arr[2]="c";

$arr1=array("num"=>"110","home"=>"shaoyang");
$arr1["name"]="lizhen";
$arr1["city"]="changsha";
$arr1["age"]="18";

$num=1;
$a=1;
$b=2;
if($num==1)
{
     $fun="fun1";
}
else
{
    $fun="fun2";
    
}



function fun1()
{
    echo "fun1 is runing";
    
}

function fun2()
{
    echo "fun2 is runing";

}

$d=exchang($a,$b);

function  exchang($a,$b)
{
    $tmp=$a;
    $a=$b;
    $b=$tmp;
    return  $a;
}

$str= "**我是一中国人 在学习js js ,    "."abc&&";

$n=str_replace("*", "&", $str);
$number = 2;
$str = "Shanghai";
$txt = sprintf("There are %u million cars in %s.",$number,$str);

$citys=array("beijing","shanghai","shenzhen");
$citystr=implode("&", $citys);
$tmp=explode("&", $citystr);



setcookie("user","lizhen",time()+60);




class A 
{
    private static $obj=null;
    public static function getInstance()
    {
        if(empty(self::$obj))
        {
            
            self::$obj=new A();
        }
         
        return  self::$obj;
        
    }
    
    private  function __construct()
    {
        
        
    }
    
    public  $name="aa";
    public  $id=18;
    public function getName()
    {
        return $this->name;
        
    }
    
}

// $a=A::getInstance();


// $f="a.txt";
// fopen("a.txt","w");

// $data="test";
// echo  file_put_contents($f, $data);
// while (!feof($f))
// {
//     echo "line:::".fgets($f);
    
// }
// fclose($f); 

// $filename='a.txt';
// if(file_exists($filename))
// {
//     file_put_contents($filename, "hello files1");
//     echo file_get_contents($filename);
// }
// else
// {
    
//     echo  "not exit;";
// }

//----------------------mysqli  start-------------------------------

$mysqli=new mysqli("localhost", "root", "", "test");

if($mysqli->connect_errno)
{
 echo $mysqli->connect_error;
    
}
else
{
  $sql=<<<EOF
  
    create table if not exists table2(
        
        id tinyint unsigned auto_increment key,
        username varchar(20) not null
        );  
  
EOF;
 
  $res=$mysqli->query($sql);
  if($res)
  {
//       echo  "create table2 succ";
      
  }
  else
  {
//       echo "create table failure..";
      
  }
  
  $insert ='insert into table2(id,username) values("15","lizhen02")';
  $res=$mysqli->query($insert);
  if($res)
  {
      echo "insert into".$mysqli->insert_id;
      
  }
  else
  {
      
      echo("insert failure");
  }
  
  $update='update table2 set username="update" where id=15';
  $mysqli->query($update);
  
  echo $mysqli->affected_rows."更新了";
  echo  "<hr/>";
  
  $del='delete from table2 where id=15';
  $mysqli->query($del);
  echo "del".$mysqli->affected_rows;
  echo "<hr>";
  
  $sel='select id,username from table2';
  $res=$mysqli->query($sel);
  if($res && $res->num_rows>0)
  {
      //$rows=$res->fetch_all(MYSQLI_NUM);
//       $rows=$res->fetch_all(MYSQLI_ASSOC);
      
//       print_r($rows);
          
//          while($row=$res->fetch_assoc())
//          {
//              print_r($row);
             
//          }
       $arr=$res->fetch_all(MYSQLI_ASSOC);
       print_r($arr);
      
      
  }
}

?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Insert title here</title>
</head>
<body>
<h2>user
<a href="add.php">add data</a></h2>

<table border="1" cellpadding="0" cellspacing="0" width="80%" bgcolor="#cccccc">
<tr>
<td> index</td>
<td> id</td>
<td> user</td>
<td> </td>
<td> </td>
</tr>
 <?php  $i=1;foreach ($arr as $row):?>
   <tr>
     <td><?php echo  $i?></td>
     <td><?php echo  $row['id']?></td>
     <td><?php echo  $row['username']?></td>
     <td>我</td>
     <td>
        <a href="#">update</a>||<a href="#">delete</a>
     </td>
   </tr>
 
 
 <?php $i++;endforeach;?>
</table>
</body>
</html>




//----------------------mysqli  end-------------------------------





