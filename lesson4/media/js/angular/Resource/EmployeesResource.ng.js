ContactListApp.factory('EmployeesResource',['$resource',
    function($resource){
        return $resource('php/rest.php?tableName=employees&id=:id',{},{
            update: {method:'PUT', params: {id: '@id'}}
        });
}]);
