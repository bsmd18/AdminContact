angular.module('contact').service('empresaServices', ['$http', function ($http) {

        this.agregarEnterprise = function (data) {
            return $http.post('http://localhost/AdminContact/www/server.php/agregarEmpresa', $.param(data));
        };
        this.obtenerEnterprise = $http.get('http://localhost/AdminContact/www/server.php/obtenerEmpresa');
    }]);
