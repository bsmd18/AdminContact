  angular.module('contact').service('contactosServices', ['$http', 'serverUrl', function ($http, serverUrl) {

    this.crudContactos = function (data) {
      return $http.post(serverUrl + 'crudContactos', $.param(data));
      
    };
	
  }]);
