<?php
Class Database{
  
   public $host   = 'localhost';
   public $user   = 'root';
   public $pass   = '';
   public $dbname = 'cnpm';
 
 
   public $link;
   public $error;
 
public function __construct(){
    $this->connectDB();
}
 
private function connectDB(){

    $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

    if(!$this->link){
        $this->error ="Connection fail".$this->link->connect_error;
    return false;
    }
    
}
 
//dùng để truy vấn khi đã tồn tại ít nhất 1 hàng
public function select($query){
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if($result->num_rows > 0 ){
        return $result;
    } else {
        return false;
    }
}

//dùng để truy vấn khi chưa có hàng nào được tạo
public function select1($query){
    $result = $this->link->query($query) or die($this->link->error.__LINE__);
    if($result->num_rows >= 0 ){
        return $result;
    } else {
        return false;
    }
}

public function insert($query){
   $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
   if($insert_row){
        return $insert_row;
    } else {
        return false;
    }
}
  
public function update($query){
    $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
    if($update_row){
        return $update_row;
    } else {
        return false;
    }
}
  

public function delete($query){
    $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
    if($delete_row){
        return $delete_row;
    } else {
        return false;
    }
}
 


}
?>
