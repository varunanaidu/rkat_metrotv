<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta name="description" content="Chameleon Admin is a modern Bootstrap 4 webapp &amp; admin dashboard html template with a large number of components, elegant design, clean and organized code.">
	<meta name="keywords" content="admin template, Chameleon admin template, dashboard template, gradient admin template, responsive admin template, webapp, eCommerce dashboard, analytic dashboard">
	<meta name="author" content="ThemeSelect">
	<title>Strategic Planning Playbook</title>
	<link rel="apple-touch-icon" href="<?= base_url(); ?>front/theme-assets/images/ico/apple-icon-120.png">
	<link rel="shortcut icon" type="image/x-icon" href="<?= base_url(); ?>front/theme-assets/images/ico/favicon.ico">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
	<link href="https://fonts.googleapis.com/css?family=Muli:300,300i,400,400i,600,600i,700,700i%7CComfortaa:300,400,700" rel="stylesheet">
	<link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>front/theme-assets/css/vendors.css">
	<!-- END VENDOR CSS-->
	<!-- BEGIN CHAMELEON  CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>front/theme-assets/css/app-lite.css">
	<!-- END CHAMELEON  CSS-->
	<!-- BEGIN Page Level CSS-->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>front/theme-assets/css/core/menu/menu-types/vertical-menu.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>front/theme-assets/css/core/colors/palette-gradient.css">
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>front/theme-assets/css/pages/dashboard-ecommerce.css">
	<!-- END Page Level CSS-->
	<!-- BEGIN Custom CSS-->
	<!-- END Custom CSS-->
  <?php 
  if ( isset($css) ) {
    for ( $i = 0; $i < sizeof($css); $i++) { 
      ?>
      <link rel="stylesheet" href="<?= $css[$i] ?>" type="text/css"></link>
      <?php 
    }
  }
  ?>
</head>
<body class="vertical-layout" data-open="click" data-menu="vertical-menu" data-color="bg-chartbg" data-col="2-columns">
	<img class="brand-logo ml-5" alt="MGN logo" src="<?php echo base_url(); ?>assets/img/logo.png"/>

              
        