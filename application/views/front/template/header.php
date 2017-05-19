<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Schedule</title>
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/style.css">
	
	
	<style>
	.mySlides {display:none}
	.w3-left, .w3-right, .w3-badge {cursor:pointer}
	</style>
	
</head>

<body>

	<!-- Navbar -->
	
	<div class="slideshow">
		<img class="mySlides w3-animate-right img-ban" src="<?php echo base_url();?>/assets/images/tvsban_1.jpg">
		<img class="mySlides w3-animate-right img-ban" src="<?php echo base_url();?>/assets/images/tvsban_2.jpg">
		<img class="mySlides w3-animate-right img-ban" src="<?php echo base_url();?>/assets/images/tvsban_3.jpg">
		<img class="mySlides w3-animate-right img-ban" src="<?php echo base_url();?>/assets/images/tvsban_4.jpg">
		<img class="mySlides w3-animate-right img-ban" src="<?php echo base_url();?>/assets/images/tvsban_5.jpg">
		<img class="mySlides w3-animate-right img-ban" src="<?php echo base_url();?>/assets/images/tvsban_3.jpg">
	
		<div class="bottomright">
			<span class="w3-badge demo w3-white hover-c1" onclick="currentDiv(1)"></span>
			<span class="w3-badge demo w3-white hover-c1" onclick="currentDiv(2)"></span>
			<span class="w3-badge demo w3-white hover-c1" onclick="currentDiv(3)"></span>
			<span class="w3-badge demo w3-white hover-c1" onclick="currentDiv(4)"></span>
			<span class="w3-badge demo w3-white hover-c1" onclick="currentDiv(5)"></span>
			<span class="w3-badge demo w3-white hover-c1" onclick="currentDiv(6)"></span>
		</div>
	</div>

	<script>
	var slideIndex = 1;
	var myIndex = 0;
	showDivs(slideIndex);
	carousel();
	

	function currentDiv(n) {
	  myIndex = n;
	  showDivs(slideIndex = n);
	}
	
	function carousel() {
		var i;
		var x = document.getElementsByClassName("mySlides");
		var dots = document.getElementsByClassName("demo");
		for (i = 0; i < x.length; i++) {
		  x[i].style.display = "none";  
		}
		for (i = 0; i < dots.length; i++) {
		 dots[i].className = dots[i].className.replace(" c1", "");
		}
		myIndex++;
		if (myIndex > x.length) {myIndex = 1}    
		x[myIndex-1].style.display = "block";
		dots[myIndex-1].className += " c1";		
		setTimeout(carousel, 5000);    
	}

	function plusDivs(n) {
	  showDivs(slideIndex += n);
	}
	
	function showDivs(n) {
	  var i;
	  var x = document.getElementsByClassName("mySlides");
	  var dots = document.getElementsByClassName("demo");
	  if (n > x.length) {slideIndex = 1}    
	  if (n < 1) {slideIndex = x.length}
	  for (i = 0; i < x.length; i++) {
		 x[i].style.display = "none";  
	  }
	  for (i = 0; i < dots.length; i++) {
		 dots[i].className = dots[i].className.replace(" c1", "");
	  }
	  x[slideIndex-1].style.display = "block";  
	  dots[slideIndex-1].className += " c1";
	}
	</script>