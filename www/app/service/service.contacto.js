  angular.module('contact').service('contactosServices', ['$http', 'serverUrl', function ($http, serverUrl) {

    this.insertContacto = function (data) {
      return $http.post(serverUrl + 'crudContactos', $.param(data));
      
    };
	
    this.cargarContactos = function (data) {
      return $http.post(serverUrl + 'crudContactos', $.param(data));
      
    };
    this.eliminarContactos = function (data) {
      return $http.post(serverUrl + 'crudContactos', $.param(data));
      
    };

  }]);
