angular.module('contact').controller('registroEmpresaController', ['$scope', 'empresaServices', '$sessionStorage', '$timeout', '$route', 'urlUploads', function ($scope, empresaServices, $sessionStorage, $timeout, $route, urlUploads) {

    $scope.empresas = {};
    $scope.dataempresa = {};
    $scope.urlUploads = urlUploads;

//-------------------------------------Cargar Tabla Empresdas-----------------------------------------------------

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

//------------------------------------------------------------------------------------------------------------------

    $scope.insertarEmpresa = function () {

      if ($scope.frmInsertar.inputFile.$valid && $scope.dataempresa.logo !== '') {
        empresaServices.agregarEnterprise($scope.dataempresa).then(function successCallback(response) {

          $timeout(function () {
            $('#nuevaempresa').modal('toggle');
          }, 700);
          $timeout(function () {
            window.location.reload();
          }, 1000);

        }, function errorCallback(response) {
          console.error(response);
        });
      }
    };

  }]);
