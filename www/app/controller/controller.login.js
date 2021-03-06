angular.module('contact').controller('loginController', ['$scope', 'securityService', '$localStorage', '$sessionStorage', '$location', 'rolAdmin', function ($scope, security, $localStorage, $sessionStorage, $location, rolAdmin) {
    
    $scope.datos = {};
    
    $scope.usuarioErroneo = false;
    
    $scope.submit = function () {

      security.validateUserAndPassword($scope.datos).then(function successCallback(response) {
        $scope.usuarioErroneo = false;
        if (response.data.codigo == 500) {
          $scope.usuarioErroneo = true;
          $scope.datos = {};
        } else {
          $sessionStorage.usuario = response.data.usuario[0];
          if ($sessionStorage.usuario.rol_id == rolAdmin) {
            $location.path('/registrarContacto');
          } else {
            $location.path('/menuPrincipal');
          }
        }
      }, function errorCallback(response) {
        console.error(response);
      });
      
    };
  }]);
