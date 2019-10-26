<?php

class BoardModel{
  
  private $pageNum;
  private $commentNum;
  
  public function __construct($pageNum, $commentNum){
    $this->pageNum = $pageNum;
    $this->commentNum = $commentNum;
  }
  
  public function __destruct(){
    
  }
  
  public function getPageNum(){
    return $this->pageNum;
  }
  
  public function getCommentNum(){
    return $this->commentNum;
  }
  
  public function setPageNum($pageNum){
    $this->pageNum = $pageNum;
  }
  
  public function setCommentNum($commentNum){
    $this->commentNum = $commentNum;
  }
  
}

?>