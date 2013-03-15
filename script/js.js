//加载函数
function addLoadEvent(func){
	var oldonload=window.onload;
	if(typeof window.onload!="function"){
		window.onload=func;
	}else{
		window.onload=function(){
			oldonload();
			func();
		}
	}
}

function $(id){
	return document.getElementById(id);
}

//查找相关元素的前一个兄弟元素的函数
function prev(elem){
	do{
		elem=elem.previousSibling;
	}while(elem && elem.nodeType!=1)
	return elem;
}
//查找相关元素的下一个兄弟元素的函数
function next(elem){
	do{
		elem=elem.nextSibling;
	}while(elem && elem.nodeType!=1)
	return elem;
}
//查找元素第一个子元素的函数
function first(elem){
	elem=elem.firstChild;
	return elem && elem.nodeType!=1 ? next(elem) : elem;
}
//查找元素最后一个子元素的函数
function last(elem){
	elem=elem.lastChild;
	return elem && elem.nodeType!=1 ? prev(elem) : elem;
}
//查找元素父元素的函数
function parent(elem,num){
	num=num || 1;
	for(var i=0;i<num;i++){
		if(elem!=null){
			elem=elem.parentNode;
		}
	}
	return elem;
}
//依靠文档标签定位元素的函数
function tag(name,elem){
	return (elem || document).getElementsByTagName(name);
}
//通过类的值查找元素
function hasClass(name,type){
	var r=[];
	var re=new RegExp("(^|\\s)"+name+"(\\s|$)");
	var e=document.getElementsByTagName(type || "*");
	for(var j=0;j<e.length;j++){
		(function(){
			var index=j;
			thisTag=e[j];
			if(re.test(thisTag.className)){
				r.push(thisTag);
			}
		})();
	}
	return r;
}
/*添加class*/
function addClass(element,value){
	if(!element.className){
		element.className=value;	
	}else{
		 var newClassName=element.className;
		 newClassName+=' ';
		 newClassName+=value;
		 element.className=newClassName;
	}
}
function removeClass( e , c ){
	e.className = e.className.replace( new RegExp('\\b' + c + '\\b\\s*' , 'g') , '');
};
//获取元素文本内容的通用函数
function text(e){
	var t="";
	e=e.childNodes || e;
	for(var j=0;j<e.length;j++){
		t+= e[j].nodeType !=1 ? e[j].nodeValue : text(e[j].childNodes);
	}
	return t;
}
//获取和设置元素特性的值
function attr(elem,name,value){
	if(!name || name.constructor !=String) return "";
	name={'for':"htmlFor",'class':"className"}[name] || name;
	if(typeof value !='undefined'){
		elem.style[name]=value;
		if(elem.setAttribute){
			elem.setAttribute(name,value);
		}
	}
	return elem[name] || elem.getAttribute(name) || "";
}
//获取元素的样式
function getStyle(elem,type){
	if(elem.currentStyle){
		return elem.currentStyle[type];
	}else if(window.getComputedStyle){
		return window.getComputedStyle(elem,null)[type];
	}
}
//offsetLeft 如果没有定位 FF:在火狐中指定的是第一个具有定位元素 直到body IE:中第一个父元素；
//offsetTop 如果定位了relative 或者 absolute IE中第一个定位的元素；FF中第一个定位元素，FF,IE都直到body；
//document.body.offsetParent 为null
//pageX pageY确定元素相对于整个文档的X和Y位置的函数，IE其中它们把border都减去了，即border=0;
function stopBubble(e){
	if(e && e.stopPropagation){
		e.stopPropagation();
	}else{
		window.event.cancelBubble=true;
	}
}
//border 都被减去了
function PageX(elem){
	var x=0;
	while(elem){
		x=x+elem.offsetLeft;
		elem=elem.offsetParent;
	}
	return x;
}
function PageY(elem){
	var y=0;
	while(elem){
		y=y+elem.offsetTop;
		elem=elem.offsetParent;
	}
	return y;
}
//确定元素相对于父元素的位置 是parentNode 的border内到elem的border外
function parentX(elem){
	var parentNode=elem.parentNode;
	return PageX(elem)-PageY(parentNode);
}
function parentY(elem){
	var parentNode=elem.parentNode;
	return PageY(elem)-PageY(parentNode);
}

//获取元素的左端位置
function posX(elem){
	return parseInt(getStyle(elem,'left'));
}
function posY(elem){
	return parseInt(getStyle(elem,'top'));
}
//获取元素的高和宽
function  getHeight(elem){
	return parseInt(getStyle(elem,'height'));
}
function getWidth(elem){
	return parseInt(getStyle(elem,'width'));
}
function setX(elem,pos){
	elem.style.left=pos+"px";
}
function setY(elem,pos){
	elem.style.top=pos+"px";
}
function addX(elem,pos){
	setX(elem,posX(elem)+pos);
}
function addY(elem,pos){
	setY(elem,posY(elem)+pos);
}
function hide(elem){
	var curDisplay=getStyle(elem,'display');
	if(curDisplay!='none'){
		elem.$oldDisplay=curDisplay;
	}
	elem.style.display='none';
}
function show(elem){
	elem.style.display=elem.$oldDisplay || '';
}
//包含border,padding 但不包含margin
function fullHeight(elem){
	if(getStyle(elem,'display')!='none'){
		return elem.offsetHeight || getHeight(elem);
	}
}
function fullWidth(elem){
	if(getStyle(elem,'display')!='none'){
		return elem.offsetWidth || getWidth(elem);
	}
}
function resetCSS(elem,prop){
	var old={};
	for(var i in prop){
		old[i]=elem.style[i];
		elem.style[i]=prop[i];
	}
	return old;
}
function restoreCSS(elem,prop){
	for(var i in prop){
		elem.style[i]=prop[i];
	}
}
//鼠标相对于窗口的位置
function getX(e){
	var e= e || window.event;
	return e.clientX;
}
function getY(e){
	var e=e || window.event;
	return e.clientY;
}

//文档偏出大小
function scrollX(){
	var de=document.documentElement;
	return window.pageXOffset || (de && de.scrollLeft) || document.body.scrollLeft;
}
function scrollY(){
	var de=document.documentElement;
	return window.pageYOffset || (de && de.scrollTop) || document.body.scrollTop;
}
//鼠标相对于文档的位置
function getPageX(e){
	return getX(e)+scrollX();
}
function getPageY(e){
	return getY(e)+scrollY();
}
function pageHeight(){
	return document.body.scrollHeight;
}
function pageWidth(){
	return document.body.scrollWidth;
}
function windowHeight(){
	var de=document.documentElement;
	return self.innerHeight || (de && de.clientHeight) || document.body.clientHeight;
}
function windowWidth(){
	var de=document.documentElement;
	return self.innerWidth || (de && de.clientWidth) || document.body.clientWidth;
}
//FF e.target 触发事件的节点 e.currentTarget 绑定的节点
//IE e.scrElement 触发事件的节点，没有获得绑定时间节点的方法
// FF e.layerX 相对于margin 外边距
// FF 中把border加入
//IE window.event.offsetX 相对于padding 内
//IE 中border 不加入

function getElementX(e){
	return (e && e.layerX) || window.event.offsetX;
}
function getElementY(e){
	return (e && e.layerY) || window.event.offsetY;
}
function changeLength(elem,final_length,type,interval,divisor){
	if(arguments.length<4){
		var interval=10;
		var divisor=10;
	}
	var innerType='change'+type;
	if(elem[innerType]){
		clearTimeout(elem[innerType]);
	}
	if(!elem.style[type]){
		elem.style[type]=0+"px";
	}
	var length=parseInt(elem.style[type]);
	if(length==final_length){
		return true;
	}
	if(length<final_length){
		var dist=Math.ceil((final_length-length)/divisor);
		length=length+dist;
	}
	if(length>final_length){
		var dist=Math.ceil((length-final_length)/divisor);
		length=length+dist;
	}
	elem.style[type]=length+"px";
	var repeat=function(){
		changeLength(elem,final_length,type,interval,divisor);
	}
	elem[innerType]=setTimeout(repeat,interval);
}
function slideLength(elem,length,type,details,time){
	if(arguments.length<4){
		var details=10;
		var time=10;
	}
	var innerType='change'+type;
	if(elem[innerType]){
		clearTimeout(elem[innerType]);
	}
	var cur=parseInt(elem.style[type]);
	if(!cur){
		cur=0;
	}
	var offset=cur-length;
	if(cur>length){
		for(var i=0;i<=100;i+=details){
			(function(){
				var pos=i;
				elem[innerType]=setTimeout(function(){
					elem.style[type]=(cur-(pos/100)*offset)+"px";
				},(pos+1)*time);
			})();
		}
	}else if(cur<length){
		for(var i=0;i<=100;i++){
			(function(){
				var pos=i;
				elem[innerType]=setTimeout(function(){
					elem.style[type]=(cur+(pos/100)*(-offset))+"px";
				},(pos+1)*time);
			})();
		}
	}else{
		return false;
	}
}
function for_slidePosition(elem,final,type,details,time){
	if(arguments.length<4){
		var details=10;
		var time=10;
	}
	var innerType='change'+type;
	if(elem[innerType]){
		clearTimeout(elem[innerType]);
	}
	if(!elem.style[type]){
		elem.style[type]="0px";
	}
	var pos=parseInt(elem.style[type]);
	var offset=pos-final;
	if(pos>final){
		for(var i=0;i<=100;i+=details){
			(function(){
				var index=i;
				elem[innerType]=setTimeout(function(){
					elem.style[type]=(pos-(index/100)*offset)+'px';
				},(index+1)*time);
			})();
		}
	}else if(pos<final){
		for(var i=0;i<=100;i+=details){
			(function(){
				var index=i;
				elem[innerType]=setTimeout(function(){
					elem.style[type]=(pos+(index/100)*(-offset))+'px';
				},(index+1)*time);
			})();
		}
	}else{
		return false;
	}
}
function slidePosition(elem,final_x,final_y,details,time){
	if(arguments.length<4){
		var details=10;
		var time=10;
	}
	for_slidePosition(elem,final_x,'left',details,time);
	for_slidePosition(elem,final_y,'top',details,time);
}
function changePosition(elem,final_x,final_y,interval,divisor){
	if(arguments.length<4){
		var interval=15;
		var divisor=10;
	}
	if(elem.movement){
		clearTimeout(elem.movement);
	}
	if(!elem.style.left){
		elem.style.left='0px';
	}
	if(!elem.style.top){
		elem.style.top="0px";
	}
	var xpos=parseInt(elem.style.left);
	var ypos=parseInt(elem.style.top);
	if(xpos==final_x && ypos==final_y){
		return true;
	}
	if(xpos<final_x){
		var dist=Math.ceil((final_x-xpos)/divisor);
		xpos=xpos+dist;
	}
	if(xpos>final_x){
		var dist=Math.ceil((xpos-final_x)/divisor);
		xpos=xpos-dist;
	}
	if(ypos<final_y){
		var dist=Math.ceil((final_y-ypos)/divisor);
		ypos=ypos+dist;
	}
	if(ypos>final_y){
		var dist=Math.ceil((ypos-final_y)/divisor);
		ypos=ypos-dist;
	}
	elem.style.left=xpos+"px";
	elem.style.top=ypos+"px";
	var repeat=function(){
		changePosition(elem,final_x,final_y,interval,divisor)
	}
	elem.movement=setTimeout(repeat,interval);
}
function fade(elem,red,green,blue){
	if(elem.fade){
		clearTimeout(elem.fade);
	}
	elem.style.backgroundColor='rgb('+red+','+green+','+blue+')';
	if(red==255 && green==255 && blue==255){
		return false;
	}
	var newRed=red+Math.ceil((255-red)/10);
	var newGreen=green+Math.ceil((255-green)/10);
	var newBlue=green+Math.ceil((255-blue)/10);
	var repeat=function(){
		fade(elem,newRed,newGreen,newBlue);
	}
	elem.fade=setTimeout(repeat,50);
}
function setOpacity(elem,level){
	if(elem.filters){
		elem.style.filter='alpha(opacity='+level+')';
	}else{
		elem.style.opacity=level/100;
	}
}
function slideShow(elem,level,details,time){
	if(arguments.length<3){
		var details=10;
		var time=10;
	}
	if(elem.slideShow){
		clearTimeout(elem.slideShow);
	}
	if(typeof elem.opacity=='undefined'){
		elem.opacity=100;
	}
	var opacity=elem.opacity;
	var offset=opacity-level;
	if(opacity<level){
		for(var i=0;i<level;i+=details){
			(function(){
				var pos=i;
				elem.slideShow=setTimeout(function(){
					setOpacity(elem,pos);
					elem.opacity=pos;
				},(pos+1)*time);
			})();
		}
	}else if(opacity>level){
		for(var i=opacity;i>=level;i=i-details){
			(function(){
				var pos=i;
				elem.slideShow=setTimeout(function(){
					setOpacity(elem,pos);
					elem.opacity=pos;
				},(opacity-pos+1)*time);
			})();
		}
	}else{
		return false;
	}
}
function slideShowTwo(elem,level,interval,divisor){
	if(arguments.length<3){
		var interval=10;
		var divisor=10;
	}
	if(elem.slideShowTwo){
		clearTimeout(elem.slideShowTwo);
	}
	if(typeof elem.opacity=='undefined'){
		elem.opacity=100;
	}
	var opacity=elem.opacity;
	if(elem.opacity==level){
		return true;
	}
	if(elem.opacity>level){
		var dist=Math.ceil((opacity-level)/divisor);
		opacity=opacity-dist;
	}
	if(elem.opacity<level){
		var dist=Math.ceil((level-opacity)/divisor);
		opacity=opacity+dist;
	}
	setOpacity(elem,opacity);
	elem.opacity=opacity;
	var repeat=function(){
		slideShowTwo(elem,level);
	}
	elem.slideShowTwo=setTimeout(repeat,interval);
}

function insertAfter(newElement,targetElement){
	var parent=targetElement.parentNode;
	if(parent.lastChild==targetElement){
		parent.appendChild(newElement);	
	}else{
		parent.insertBefore(newElement,targetElement.nextSibling);	
	};
};


