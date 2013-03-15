// JavaScript Document
window.onload=function(){
	check();
	forsubmit()
}
function forcheck(){	
	var opacity =$('opacity');	
	var forcheck =$('forcheck');
	var height = getHeight(forcheck);
	var width = getWidth(forcheck);
	var wHeight = windowHeight();
	var wWidth = windowWidth();
	var sHeight =scrollY();
	var sWidth = scrollX();
	
	var w = pageWidth();
	var h = pageHeight();
	var left = ((wWidth - width)/2) + sWidth;
	var top = ((wHeight - height)/2) + sHeight;
	opacity.style.display = 'block';
	
	opacity.style.width = w + 'px';
	opacity.style.height = h +　'px';
	setOpacity(opacity , 70);
	
	forcheck.style.display = 'block';	
	forcheck.style.left = left + 'px';
	forcheck.style.top = top + 'px';
	setTimeout(closed , 2000);
}
function check(){
	var input = document.getElementsByTagName('input');
	var length = input.length;
	for(var i=0 ; i<length; i++){
		var curInput = input[i];			
		if(curInput.type != 'checkbox') continue;
		curInput.onclick = function(){
			var total = 0;
			for(var j=0 ; j<length ; j++){
				if(input[j].checked == true) total++;
			}
			if(total > 10 ){
				forcheck();
				return false;
			}
		};
	}
}
function closed(){
		var opacity =$('opacity');	
		var forcheck = $('forcheck');
		opacity.style.display = 'none';
		forcheck.style.display = 'none';		
}
function forsubmit(){
	var vote = $('s_form');	
	vote.onsubmit=function(){
		var input = document.getElementsByTagName('input');
		var length = input.length;	
		var total = 0;
		for(var j=0 ; j<length ; j++){
			if(input[j].checked == true) total++;
		}
		if(total == 0) return false;
	};
}



