angular.module('contact').service('contactosServices', ['$http', 'serverUrl', function ($http, serverUrl) {

    this.insertContacto = function (data) {
      return $http.post(serverUrl + 'insertarContacto', $.param(data));
      
    };

  }]);