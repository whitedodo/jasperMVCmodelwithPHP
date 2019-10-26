<?php
/*
  Subject: JasperFramework Version 2
  FileName: board.php
  Created Date: 2019-10-11
  Author: Dodo (rabbit.white@daum.net)
  Description:

*/

class Home{
  
  private $conn;
  private $skin_dir;
  
  public function __construct($conn, $skin_dir){
    $this->conn = $conn;
    $this->skin_dir = $skin_dir;
  }
  
  public function home($pageId){
    echo '홈페이지';
  }
  
  public function index($pageId){
    
    $boardDBclient = new BoardDBClient($this->conn);
    $skin_dir = $this->skin_dir;
    $title = "홈페이지1";
    $locationID = $pageId;
    
    require_once './view/home/head.php';
    require_once './view/home/body.php';
    require_once './view/home/foot.php';
    
  }
  
}

?>