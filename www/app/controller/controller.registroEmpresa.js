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


//------------------------------------insertar Empresa------------------------------------------------------------------------------

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
//--------------------------------------------------------------------------------------------------------------






//----------------------------------------------------eliminar Empresa---------------------------------------------------
     $scope.eliminar = function (dato) {
      $('#eliminarEmpresa').modal('toggle');
      $scope.nitEliminar = dato.emp_nit;
    };
    
    $scope.empresaEliminada = false;
    
    
    $scope.Eliminarempresa = function () {
      empresaServices.eliminarEnterprise({nit: $scope.nitEliminar}).then(function successCallback(response) {
        $scope.empresaEliminada = false;
        if (response.data.code == 500) {
        } else {
          $scope.empresaEliminada = true;
          $timeout(function () {
            $('#eliminarEmpresa').modal('toggle');
          }, 700);
          $timeout(function () {
            // $route.reload();
            window.location.reload();
          }, 1000);
        }
      }, function errorCallback(response) {
        console.error(response);
      });
    };

  }]);
