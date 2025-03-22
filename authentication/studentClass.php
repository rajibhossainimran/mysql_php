<?php
//Step 1:
class Student{   
   private $id;
   private $name;
   private $email;
   private $phone;  
 
   function __construct($_id,$_name,$_email,$_phone){
	   $this->id=$_id;
	   $this->name=$_name;
	   $this->email=$_email;
	   $this->phone=$_phone;
    }
  
   public function combined(){
	 return $this->id.",".$this->name.",".$this->email.",".$this->phone.PHP_EOL;   
   }
   
   public function save(){
		file_put_contents("data.txt",$this->combined(),FILE_APPEND);
	   
   }
       
   
   public static function display(){
    $students = file("data.txt");
    echo "<table border='1' cellspacing='0' cellpadding='10' style='width: 100%; text-align: left; border-collapse: collapse;'>";
    echo "<thead>";
    echo "<tr style='background-color: #6e8efb; color: white;'>";
    echo "<th>ID</th>";
    echo "<th>Name</th>";
    echo "<th>Email</th>";
    echo "<th>Phone</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    foreach ($students as $student) {
        list($id, $name, $email, $phone) = explode(",", trim($student));
        echo "<tr>";
        echo "<td>$id</td>";
        echo "<td>$name</td>";
        echo "<td>$email</td>";
        echo "<td>$phone</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
}
   

}

?>