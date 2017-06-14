angular.module('contact').service('proyectosServices', ['$http', 'serverUrl', function($http, serverUrl) {
    this.insertProyects = function(data){
      return $http.post(serverUrl + 'insertarProyectos',$.param(data));
    };

  }]);

