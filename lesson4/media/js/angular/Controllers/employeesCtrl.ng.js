ContactListApp.controller("employeesCtrl", ['$scope', 'EmployeesResource', function ($scope, EmployeesResource) {
    $scope.employeesMap = EmployeesResource.query(); //get all
}]);
ContactListApp.controller("employeesFormCtrl", ['$scope', 'EmployeesResource', '$routeParams', function ($scope, EmployeesResource, $routeParams) {
    //init
    if ($routeParams.id) {
        $scope.employee = EmployeesResource.get({id: $routeParams.id});
    }

    //when user been redirected
    $scope.onSubmit = function () {
        //validate first
        //if user have id this is an update operation
        if ($scope.employee.id) {
            EmployeesResource.update($scope.employee);
        } else {
            //user have no id this is a new user
            EmployeesResource.save($scope.employee);
        }
    }
}]);