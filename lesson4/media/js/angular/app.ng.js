var ContactListApp = angular.module('ContactListApp', ['ngRoute','ngResource']);
// configurations

// ContactListApp.config(['$locationProvider',function($locationProvider){
//     $locationProvider.html5Mode(true);
// }]);

ContactListApp.config(['$routeProvider', function ($routeProvider) {
    //$routeProvider.when('URL PATTERN',{templateUrl,controller})
    $routeProvider
        .when('/users', {
            templateUrl: 'media/templates/users.tpl.ng.html',
            controller: 'usersCtrl'
        })
        .when('/employees', {
            templateUrl: 'media/templates/employees.tpl.ng.html',
            controller: 'employeesCtrl'
        })
        .when('/employees/form', {
            templateUrl: 'media/templates/employeesForm.tpl.ng.html',
            controller: 'employeesFormCtrl'
        })
        .when('/employees/form/:id', {
            templateUrl: 'media/templates/employeesForm.tpl.ng.html',
            controller: 'employeesFormCtrl'
        })
        .when('/products', {
            templateUrl: 'media/templates/products.tpl.ng.html',
            controller: 'productsCtrl'
        })
        .when('/', {
            templateUrl: 'media/templates/contactList.tpl.ng.html',
            controller: 'ContactListCtr'
        })
        //on any othe url
        .otherwise({
            redirectTo: '/'
        });

}]);