angular.module('contact').service('securityService', ['$http', 'serverUrl', function($http, serverUrl){
    
    this.validateUserAndPassword = function (data) {
      return $http.post(serverUrl + 'identificar' , $.param(data));
    };

    // this.getUser = $http.get('http://localhost/cras/www/server.php/obtener_usuarios');
    
}]);