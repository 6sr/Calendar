<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" type="text/css" href="style.css">
    <link rel="icon" type="image/jpg" href="SRLogo.jpg" />
</head>
<body onload="displayCurrTime()">

<input type="date" id="gotoDate" />
<button class="gotoBtn" onclick="gotoDate()">Goto Date</button>
<!--<button class="plusBtn">+</button>-->
<br><br>
<div class="month">
	<ul>
		<li><span id="currTime" style="color:#ffffff;font-size:2em;" onclick="getFirstDayOfMonth()"></span></li>
		<li class="prev" onclick="prevMonth()">&#10094;</li>
		<li class="next" onclick="nextMonth()">&#10095;</li>
		<li>
			<h2 id="currMonth"></h2>
			<!-- <span style="font-size:18px">2017</span> -->
		</li>
	</ul>
</div>
<ul class="weekdays">
	<li>Sun</li>
	<li>Mon</li>
	<li>Tue</li>
	<li>Wed</li>
	<li>Thur</li>
	<li>Fri</li>
	<li>Sat</li>
</ul>

<ul class="days">  
	<li><span></span></li>
	<li><span onClick="addOnDateClick()"></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
	<li><span></span></li>
</ul>

	<script type="text/javascript" src="jsIndex.js"></script>
</body>
</html>
