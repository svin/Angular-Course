function hello(){
	
}

var hello=function(){
	
}

var world=function(){
	
}
var hello2=world;

var num=2;

function getNum(){
	return 2;
}
var num2=getNum();

var myClosure =function(initNum){
	var _x=initNum;
	return function(){
		alert(++_x);
	}
}
var a=myClosure(10);
a();//11
a();//12
a();//13

var myClass =function(){
	// private props
	var _x=1;
	var _y=2;
	// private methods
	function _privateMethod(){
		//code goes here
	}
	return{
		//public setter
		setX:function(){
			
		},
		//public getter
		getX:function(){
			
		}
	}
}

var obj=myClass();
obj.getX();

var getParam= function(){
	alert(1);
}
//self executing function
(function(){
	// all my code goes here
	// code is inside the closure so not visible from the outside
})();

//module
var jQuery=(function(){
	// all my code goes here
	// code is inside the closure so not visible from the outside
	return{
		//API goes here
	}
})();





