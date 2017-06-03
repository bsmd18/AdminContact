angular.module('contacto').service('proyectosService', ['$http', function($http) {
    this.insertProyects = function(data){
      return $http.post('http://localhost/contacto/www/server.php/insertarProyectos',$.param(data));
    };

  }]);

