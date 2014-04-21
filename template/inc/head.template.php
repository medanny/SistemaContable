<?php 
include("class/session.class.php");
global $session;

$check=$session->checkLogin();
if(!$check&&empty($isindex))
{
header("location:index.php?error=3");
}
if($check&&isset($isindex)){
header("location:main.php");
}
?>

<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">
    <link rel="shortcut icon" href="images/favicon.html">

    <title><?PHP echo $title;?></title>

    <!--Core CSS -->
    <link href="template/bs3/css/bootstrap.min.css" rel="stylesheet">
    <link href="template/css/bootstrap-reset.css" rel="stylesheet">
    <link href="template/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />

    <!--icheck-->
    <link href="template/assets/iCheck-master/skins/minimal/minimal.css" rel="stylesheet">
    <link href="template/assets/iCheck-master/skins/minimal/red.css" rel="stylesheet">
    <link href="template/assets/iCheck-master/skins/minimal/green.css" rel="stylesheet">
    <link href="template/assets/iCheck-master/skins/minimal/blue.css" rel="stylesheet">
    <link href="template/assets/iCheck-master/skins/minimal/yellow.css" rel="stylesheet">
    <link href="template/assets/iCheck-master/skins/minimal/purple.css" rel="stylesheet">

    <link href="template/assets/iCheck-master/skins/square/square.css" rel="stylesheet">
    <link href="template/assets/iCheck-master/skins/square/red.css" rel="stylesheet">
    <link href="template/assets/iCheck-master/skins/square/green.css" rel="stylesheet">
    <link href="template/assets/iCheck-master/skins/square/blue.css" rel="stylesheet">
    <link href="template/assets/iCheck-master/skins/square/yellow.css" rel="stylesheet">
    <link href="template/assets/iCheck-master/skins/square/purple.css" rel="stylesheet">

    <link href="template/assets/iCheck-master/skins/flat/grey.css" rel="stylesheet">
    <link href="template/assets/iCheck-master/skins/flat/red.css" rel="stylesheet">
    <link href="template/assets/iCheck-master/skins/flat/green.css" rel="stylesheet">
    <link href="template/assets/iCheck-master/skins/flat/blue.css" rel="stylesheet">
    <link href="template/assets/iCheck-master/skins/flat/yellow.css" rel="stylesheet">
    <link href="template/assets/iCheck-master/skins/flat/purple.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="template/css/style.css" rel="stylesheet">
    <link href="template/css/style-responsive.css" rel="stylesheet" />

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="js/ie8/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>

<?php if(empty($isindex)){
?>
<section id="container"
 <?php }?>