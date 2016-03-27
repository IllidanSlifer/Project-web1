<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo $title ?></title>

	<link href="<?php echo base_url()?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script type="text" src="http://js.nicedit.com/nicEdit-latest.js"></script> <script type="text">
//<![CDATA[
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
  //]]>
  </script>
  <script>
  function myFunction(cid) {
  	if(confirm("do you want to delete the email?"))
  	{ 
  		var link = base_url()+"email/delete/?cid="+ $cid;
  		document.writeln(link);
  		window.location(link);
  	}	
  }
  </script>
</head>

<body >
	<div class="container">







