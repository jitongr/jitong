<?
 $action='xing';
 $savlog=1;
require_once 'init.php';
?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>祭童行图</title>
    <meta name="viewport" content="width=1366" />
    <script src="view/jquery-1.11.1.js"></script>
</head>
<?

include "view/header.php";
?>
<body>
<div style="text-align:center;padding-top:5px;height:701px;">
    <canvas id='mainCanvas' ></canvas>
</div>
<script src="view/xing.js" charset="utf-8"></script>
</body>
</html>