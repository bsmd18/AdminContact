angular.module('contact').service('usuariosServices', ['$http', 'serverUrl', function ($http, serverUrl) {

    this.crudUsuarios = function (data) {
      return $http.post(serverUrl + 'crudUsuarios', $.param(data));
      
    };
	
  }]);