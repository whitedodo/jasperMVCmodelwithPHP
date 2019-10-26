<?php
/*
  Subject: JasperFramework Version 2
  FileName: index.php
  Created Date: 2019-08-31
  Author: Dodo (rabbit.white@daum.net)
  Description:

  2019-10-11 / Jasper / 게시판 Num, 코멘트 Num 추가
*/

header("Content-Type: text/html; charset=UTF-8");
header('X-Frame-Options: DENY');  // 'X-Frame-Options'

require_once 'controller.php';

$root = "C:/Apache24/htdocs/client";
$directories = '';

$realDir = $root . $directories;
require_once $realDir . '/application/system/JasperFunction.php';
require_once $realDir . '/application/system/AES256.php';
require_once $realDir . '/application/system/Database/connect.php';
require_once $realDir . '/model/application/ThirdModel.php';
require_once $realDir . '/model/application/BoardModel.php';
require_once $realDir . '/model/application/BoardCommentModel.php';

$jasperFunction = new JasperFunction();

// ThirdModel
$pageName = $jasperFunction->convertToUTF8( $_GET['pageName'] );
$subName = $jasperFunction->convertToUTF8( $_GET['subName'] );
$pageID = $jasperFunction->convertToUTF8( $_GET['pageID'] );

// BoardModel
$pageNum = $jasperFunction->convertToUTF8( $_GET['pageNum'] );
$commentNum = $jasperFunction->convertToUTF8( $_GET['commentNum'] );

// Comment Model
$commentId = $jasperFunction->convertToUTF8( $_POST['commentId'] );
$commentAuthor = $jasperFunction->convertToUTF8( $_POST['commentAuthor'] );
$commentPasswd = $jasperFunction->convertToUTF8( $_POST['commentPasswd'] );
$commentMemo = $jasperFunction->convertToUTF8( $_POST['commentMemo'] );
$commentRegidate = $jasperFunction->convertToUTF8( $_POST['commentRegidate'] );
$commentIp = $jasperFunction->convertToUTF8( $_POST['commentIp'] );

$thirdModel = new ThirdModel( $pageName, $subName, $pageID );
$boardModel = new BoardModel( $pageNum, $commentNum );
$boardCommentModel = new BoardCommentModel();
$boardCommentModel->setId($commentId);
$boardCommentModel->setAuthor($commentAuthor);
$boardCommentModel->setPasswd($commentPasswd);
$boardCommentModel->setMemo($commentMemo);
$boardCommentModel->setRegidate($commentRegidate);
$boardCommentModel->setIp($commentIp);

$controller = new Controller( $thirdModel, $boardModel, $realDir );
$controller->setBoardCommentModel($boardCommentModel);

// 프로그램 실행
$controller->run();
$controller->__destruct();

?>