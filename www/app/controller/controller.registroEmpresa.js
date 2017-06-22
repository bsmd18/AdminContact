angular.module('contact').controller('registroEmpresaController' ,['$scope', 'empresaServices', '$sessionStorage', '$timeout', '$route', function ($scope, empresaServices, $sessionStorage, $timeout, $route) {

    $scope.empresas = [];
      
    $scope.dataempresa = {
        logo: '',
        tipoE:'',
        nit: '',
        telefono: '',
        razonSocial: '',
        razonComercial: '',
        dirrecion: '',
        correo: '',
        paginaWeb: '',
        };
     
    
  
     $scope.pintarTabla = function () {
      empresaServices.obtenerEnterprise.then(function successCallback(response) {
        switch (response.data.code) {
          case 200:
            $scope.empresas = response.data.datos;
            break;
          case 500:
            console.log(response.data);
        }
      });
    };

    $scope.pintarTabla();
    
    
    
    $scope.insertarEmpresa = function () {
        empresaServices.agregarEnterprise($scope.empresa, $scope.empresa1).then(function successCallback(response) {
            $scope.empresa = {};
            $scope.empres1 = {};
            if (response.data.code == 300) {
                console.log(response);

            } else if (response.data.code == 500) {
                console.log(response.data.datos);
            } else {
                $timeout(function () {
                    $('#nuevaempresa').modal('toggle');
                }, 700);
                $timeout(function () {
                    window.location.reload();
                }, 1000);

            }
        }, function errorCallback(response) {
            console.error(response);
        });
    };
}]);