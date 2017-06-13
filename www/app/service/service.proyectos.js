angular.module('contact').service('proyectosServices', ['$http', function($http) {
    this.insertProyects = function(data){
      return $http.post(serverUrl + 'insertarProyectos',$.param(data));
    };

  }]);

