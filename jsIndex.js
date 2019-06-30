var monthList = ["January","February","March","April","May","June","July","August","September","October","November","December"];
var maxMonthDay = [31,28,31,30,31,30,31,31,30,31,30,31];
var d = new Date();
var currDateDisp = d.getDate();		// 1-31 - number
var currMonthDisp = d.getMonth();	// 0-11 - number
var currYearDisp = d.getFullYear();	// YYYY - number

document.getElementById("currMonth").innerHTML = monthList[currMonthDisp] + "  " + currYearDisp;
setDateList();

function addOnDateClick(elem) {
	elem.classList.add('active');
}

function displayCurrTime() {
	function checkTime(i) {
		if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
		return i;
	}
	var today = new Date();
	var h = today.getHours();
	var m = today.getMinutes();
	var s = today.getSeconds();
	h = checkTime(h);
	m = checkTime(m);
	s = checkTime(s);
	document.getElementById('currTime').innerHTML = h + ":" + m + ":" + s;
}
setInterval(displayCurrTime, 500);

function setDefaultInputDate() {
	var tempDate = new Date();
	tempDate.setMinutes(tempDate.getMinutes() - tempDate.getTimezoneOffset());
	//console.log(tempDate.toJSON());
		//The getTimezoneOffset() method returns the time difference between UTC time and local time, in minutes.
		//For example, If your time zone is GMT+2, -120 will be returned.
	
		//Causes error in handleActiveClass() 
		//It changes date of d to 330 minutes to curr date as GMT+5:30
	
	//d.setMinutes(d.getMinutes());
		//This changes default date of input 05:30 hrs after 00:00 hrs
	document.getElementById("gotoDate").value = tempDate.toJSON().slice(0,10);
}
setDefaultInputDate();

function gotoDate() {
	currDateDisp = parseInt(document.getElementById("gotoDate").value.split("-")[2]);
	currMonthDisp = parseInt(document.getElementById("gotoDate").value.split("-")[1]) - 1;
	currYearDisp = parseInt(document.getElementById("gotoDate").value.split("-")[0]);
	document.getElementById("currMonth").innerHTML = monthList[currMonthDisp] + "  " + currYearDisp;
	setDateList();
	var liNumGoto = getFirstDayOfMonth() + currDateDisp - 1;
	document.getElementsByClassName("days")[0].getElementsByTagName("li")[liNumGoto].getElementsByTagName("span")[0].classList.add("active");
}

function setDateList() {
	var firstDay = getFirstDayOfMonth();
	var dayList = document.getElementsByClassName("days")[0];
	dayList = dayList.getElementsByTagName("li");
	if(currMonthDisp == 1 && currYearDisp % 4 == 0) {	//	February in leap year
		maxMonthDay[1] = 29;
	}
	else {
		maxMonthDay[1] = 28;
	}
	for(var i = 0 ;i < 37;i++) {
		dayList[i].getElementsByTagName("span")[0].innerHTML = "";
	}
	for(var i = 0 ;i < maxMonthDay[currMonthDisp];i++) {
		dayList[i + firstDay].getElementsByTagName("span")[0].innerHTML = i + 1;
	}
	handleActiveClass();
}

function getFirstDayOfMonth() {
	var firstDay;
	if(currYearDisp < 100) {
		if(currYearDisp < 10) {
			if(currMonthDisp < 10) {
				firstDay = new Date("000" + currYearDisp + "-0" + (currMonthDisp + 1) + "-01");
				console.log("000" + currYearDisp + "-0" + (currMonthDisp + 1) + "-01 lol");
			}
			else {
				firstDay = new Date("000" + currYearDisp + "-" + (currMonthDisp + 1) + "-01");
			}
		}
		else {
			if(currMonthDisp < 10) {
				firstDay = new Date("00" + currYearDisp + "-0" + (currMonthDisp + 1) + "-01");
			}
			else {
				firstDay = new Date("00" + currYearDisp + "-" + (currMonthDisp + 1) + "-01");
			}
		}
	}
	else {
		firstDay = new Date(currYearDisp,currMonthDisp,1);
	}
	//console.log(firstDay);
	//var firstDay = new Date(0001,01,01);
		//Year 1-99 is treated as 1901-1999
	//document.getElementById("currMonth").innerHTML = firstDay.getDay();
	return firstDay.getDay();
}

function prevMonth() {
	if(currMonthDisp == 0) {
		currMonthDisp = 11;
		currYearDisp = currYearDisp - 1;
	}
	else {
		currMonthDisp = currMonthDisp - 1;
	}
	document.getElementById("currMonth").innerHTML = monthList[currMonthDisp] + "  " + currYearDisp;
	setDateList();
}


function nextMonth() {
	if(currMonthDisp == 11) {
		currMonthDisp = 0;
		currYearDisp = currYearDisp + 1;
	}
	else {
		currMonthDisp = currMonthDisp + 1;
	}
	document.getElementById("currMonth").innerHTML = monthList[currMonthDisp] + "  " + currYearDisp;
	setDateList();
}

document.onclick = function(event) {
         var target = event.target || event.srcElement;
         target.style.background = '#cf5c3f';
        };
		
function handleActiveClass() {
	for(var i = 0;i < 37;i++) {
		var todayLiTag = document.getElementsByClassName("days")[0].getElementsByTagName("li")[i].getElementsByTagName("span")[0].classList;
		if(todayLiTag.contains("active")) {
			todayLiTag.remove("active");
			document.getElementsByClassName("days")[0].getElementsByTagName("li")[i].getElementsByTagName("span")[0].style.border = "0px";
		}
	}
	
	//console.log(currDateDisp);
	//console.log(currMonthDisp);
	//console.log(currYearDisp);
	//console.log(d.getDate());
	//console.log(d.getMonth());
	//console.log(d.getFullYear());
	//	Adding active class to today date
	var curr = new Date();
	if(currMonthDisp == curr.getMonth() && currYearDisp == curr.getFullYear()) {
		//console.log("lol");
		var liNumToday = getFirstDayOfMonth() + d.getDate() - 1;
		document.getElementsByClassName("days")[0].getElementsByTagName("li")[liNumToday].getElementsByTagName("span")[0].classList.add("active");
		document.getElementsByClassName("days")[0].getElementsByTagName("li")[liNumToday].getElementsByTagName("span")[0].style.border = "1px solid black";
	}
}
