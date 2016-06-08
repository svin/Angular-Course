ContactListApp.controller("ContactListCtr",['$scope','$filter','$http',function($scope,$filter,$http){
		// {{1000000.123456 |number : 2 }}
		var numberFilter=$filter('number');
		numberFilter(1000000.123456,2);
		
		var filteredData = $filter('number')(1000000.123456,2);
		
		console.log(filteredData);
		$scope.contact={};
		$scope.showMultiplesActions=false;
		$scope.contactList=[];
		//get contacts dataset from server
		$http
			.get('contacts')
			.then(function(res){//on success
				res.data //actual data AS JSON!!!
			},function(err){//on error
				console.log(err);
			});
		
		$scope.onContactAdd=function(){
				if($scope.contactForm.$valid){
					$scope.contact.createDate = new Date();
					$scope.contactList.push($scope.contact);
					$scope.contact={};
					$scope.addMode=false;
				}
		}

		//$watch on single item
		$scope.$watch('contact.email',function(newVal,oldVal){
		});
		//watch on collection
		$scope.$watchCollection('contactList',function(newVal,oldVal){
			
		});
		//deep watch (Objects/collections)
		$scope.$watch('contactList',function(newVal,oldVal){
			//handle local storage event
			_localStorageManager(newVal,oldVal);
			//on checkbox changes
			$scope.showMultiplesActions=false;
			for(var i=0;i<$scope.contactList.length;i++){
				if($scope.contactList[i].checked){
					// show the delete button
					$scope.showMultiplesActions=true;
					//no need to iterate over the rest of the items
					break;
				}
			}
		},true);

		function _localStorageManager(newVal,oldVal){
			if(!window.localStorage){
				alert('Browser not supported');

			}
			if(newVal==oldVal /*undefined on init*/){
				// init the lists
				var jsonStr = window.localStorage.getItem('contactList');
				//if item exists
				if(jsonStr){
					$scope.contactList=JSON.parse(jsonStr);
					if(!angular.isArray($scope.contactList)){
						$scope.contactList=[];
					}
				}

			}
			//user just added/removed item
			else{
				var jsonStr = JSON.stringify($scope.contactList);
				window.localStorage.setItem('contactList',jsonStr);
			}
		}
}]);