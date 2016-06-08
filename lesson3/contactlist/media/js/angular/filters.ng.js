// - filter example
// ContactListApp.filter("filterName",filterFunc);
// - filter example with call back type function
// ContactListApp.filter("reverse",function(){
// });

ContactListApp.filter("reverse",_reverse);
ContactListApp.filter("esrever",_reverse);
// ABC|reverse
function _reverse(){
	//private props/methods
	return function(filterParam /*ABC*/,addToSuff){
		return filterParam.split("").reverse().join("")+' '+addToSuff;
	}
}

 