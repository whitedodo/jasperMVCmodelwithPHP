<?php
/*
  Subject: JasperFramework Version 2
  FileName: controller.php
  Created Date: 2019-08-31
  Author: Dodo (rabbit.white@daum.net)
  Description:
  1. 2019-10-12 / Jasper / 
*/

class Controller{
  
  private $conn;
  private $directories;
  private $thirdModel;
  private $boardModel;
  private $boardCommentModel;
  
  function __construct($thirdModel, $boardModel, $directories){
    $this->conn = new Connect('localhost', 'rabbit2me', '1234', 'rabbit2me');
    $this->thirdModel = $thirdModel;
    $this->boardModel = $boardModel;
    $this->boardCommentModel = null;
    $this->directories = $directories;
  }
  
  function __destruct(){
    unset($this->thirdModel);
    unset($this->boardModel);
  }
  
  private function getConn(){
    return $this->conn;
  }
  
  public function getBoardCommentModel(){
    return $this->boardCommentModel;
  }
  
  public function setBoardCommentModel( $boardCommentModel ){
    $this->boardCommentModel = $boardCommentModel;
  }
  
  public function run(){
    
    $connect = $this->getConn();
    
    require_once $this->directories . '/controller/home.php';
    require_once $this->directories . '/controller/food.php';
    require_once $this->directories . '/controller/board.php';
    require_once $this->directories . '/application/food/FoodDBClient.php';
    require_once $this->directories . '/application/board/BoardDBClient.php';
    //require_once $this->directories . '/controller/member.php';
    
    $thirdModel = $this->thirdModel;
    $boardModel = $this->boardModel;
    $boardCommentModel = $this->boardCommentModel;
    
    $pageName = $thirdModel->getPageName();
    $subName = $thirdModel->getSubName();
    $pageId = $thirdModel->getPageId();
    
    $pageNum = $boardModel->getPageNum();
    $commentNum = $boardModel->getCommentNum();
    
    // Comment Model
    $commentId = $boardCommentModel->getId();
    $commentBoardId = $boardCommentModel->getBoardId();
    $commentAuthor = $boardCommentModel->getAuthor();
    $commentPasswd = $boardCommentModel->getPasswd();
    $commentMemo = $boardCommentModel->getMemo();
    $commentRegidate = $boardCommentModel->getRegidate();
    $commentIp = $boardCommentModel->getIp();
    
    // 홈페이지
    if ( strcasecmp( $pageName, '') == 0 ){
        
        $home = new Home($connect, '/home');
        $home->index($pageId);
        
    }
    // 식당
    else if ( strcasecmp ( $pageName, 'food' ) == 0 ){
      $food = new Food($connect, '/client');
      
      if ( strcasecmp ( $subName, 'client') == 0 ){    
        $food->client( $pageId );
      }
      else if ( strcasecmp ( $subName, 'counter') == 0 ){
        $food->counter( $pageId );
      }
      
    } // end of if
    
    // 게시판
    else if ( strcasecmp ( $pageName, 'board' ) == 0 ){
      $board = new Board($connect, '/board');
      
      // 목록
      if ( strcasecmp ( $subName, 'catalog' ) == 0 ){
        $board->catalog( $thirdModel );
      }
      
      // 내용
      else if ( strcasecmp ( $subName, 'view' ) == 0 ){
        $board->view( $thirdModel, $boardModel );
      }
      
      // 수정
      else if ( strcasecmp ( $subName, 'modify' ) == 0 ){
        $board->modify( $thirdModel, $boardModel );
      }
      
      // 쓰기
      else if ( strcasecmp ( $subName, 'write' ) == 0 ){
        $board->remove( $thirdModel );
      }
      // 삭제
      else if ( strcasecmp ( $subName, 'remove' ) == 0 ){
        $board->remove( $thirdModel, $boardModel );
      }
      // 댓글
      else if ( strcasecmp ( $subName, 'comment') == 0 ){
        // CRUD 범위 내 구현
        $commentId;
        $commentBoardId;
        $commentAuthor;
        $commentPasswd;
        $commentMemo;
        $commentRegidate;
        $commentIp;
      }
      
    } // end of if 
    
  }
  
};

?>