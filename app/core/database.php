<?php
class Database{
  public function connect(){
    $options = [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];
    return $pdo = new PDO('mysql:host=localhost;dbname=my_first_database', 'islom', '1234', $options);
  }

  public function read($query, $options=[]){
    $pdo = $this->connect();
    $stmt = $pdo->prepare($query);
    $result = $stmt->execute($options);
    if($result){
      return $stmt->fetchAll();
    }else{
      return false;
    }
  }

  public function write($query, $options=[]){
    $pdo = $this->connect();
    $stmt = $pdo->prepare($query);
    $result = $stmt->execute($options);
    if($result){
      return true;
    }else{
      return false;
    }
  }

}