angular.module('contact').service('proyectosServices', ['$http', 'serverUrl', function($http, serverUrl) {
    this.insertProyects = function(data){
      return $http.post(serverUrl + 'crudProyectos',$.param(data));
    };
    this.cargarProyects = function(data){
//      console.log(data);
      return $http.post(serverUrl + 'crudProyectos',$.param(data));
    };
    this.eliminarProyects = function(data){
//      console.log(data);
      return $http.post(serverUrl + 'crudProyectos',$.param(data));
    };
    this.editarProyects = function(data){
//      console.log(data);
      return $http.post(serverUrl + 'crudProyectos',$.param(data));
    };

  }]);

