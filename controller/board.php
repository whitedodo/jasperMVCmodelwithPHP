<?php
/*
  Subject: JasperFramework Version 2
  FileName: board.php
  Created Date: 2019-10-11
  Author: Dodo (rabbit.white@daum.net)
  Description:

*/

class Board{
  
  private $conn;
  private $skin_dir;
  
  public function __construct($conn, $skin_dir){
    $this->conn = $conn;
    $this->skin_dir = $skin_dir;
  }
  
  public function home($pageId){
    echo '홈페이지';
  }
  
  public function catalog($pageId){
    
    $boardDBclient = new BoardDBClient($this->conn);
    $skin_dir = $this->skin_dir;
    $title = "글 목록";
    $locationID = $pageId;
    require_once './view/board/catalog/head.php';
    require_once './view/board/catalog/body.php';
    require_once './view/board/catalog/foot.php';
    
  }
  
  public function view($thirdModel, $boardModel){
      
      $boardDBclient = new BoardDBClient($this->conn);
      $skin_dir = $this->skin_dir;
      $title = "보기" . $boardModel->getPageNum();
      $locationID = $pageId;
      require_once './view/board/catalog/head.php';
      require_once './view/board/catalog/body.php';
      require_once './view/board/catalog/foot.php';
  }
  
  public function write($thirdModel){
      
      $boardDBclient = new BoardDBClient($this->conn);
      $skin_dir = $this->skin_dir;
      $title = "글 쓰기";
      $locationID = $pageId;
      require_once './view/board/catalog/head.php';
      require_once './view/board/catalog/body.php';
      require_once './view/board/catalog/foot.php';
  }
  
  public function modify($thirdModel, $boardModel){
      
      $boardDBclient = new BoardDBClient($this->conn);
      $skin_dir = $this->skin_dir;
      $title = "글 수정";
      $locationID = $pageId;
      require_once './view/board/catalog/head.php';
      require_once './view/board/catalog/body.php';
      require_once './view/board/catalog/foot.php';
  }
  
  public function remove($thirdModel, $boardModel){
      
      $boardDBclient = new BoardDBClient($this->conn);
      $skin_dir = $this->skin_dir;
      $title = "글 삭제";
      $locationID = $pageId;
      require_once './view/board/catalog/head.php';
      require_once './view/board/catalog/body.php';
      require_once './view/board/catalog/foot.php';
  }
  
  public function comment($thirdModel, $boardModel){
      
  }
  
}

?>