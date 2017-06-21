angular.module('contact').controller('registroproyectosController', ['$scope', 'proyectosServices', '$sessionStorage', '$timeout', '$route', function ($scope, proyectosServices, $sessionStorage, $timeout, $route) {

    $scope.proyecto = {};
    $scope.proyectosT = {};
    $scope.accion = {};
    $scope.btnaccion = {};
    $scope.proyectoEl = {};

    /*--------------------------------cargar tabla------------------------------------*/
    $scope.cargarTabla = function () {

      $scope.proyecto.accion = 'cargarT';
      proyectosServices.cargarProyects($scope.proyecto).then(function succesCallback(response) {

        $scope.proyectosT = response.data.datos;

//        console.log(response.data.datos);
      }, function errorCallback(response) {
      });
    };
    $scope.cargarTabla();

    /*--------------------------------insertar proyecto------------------------------------*/

    $scope.insertarProyecto = function () {


      if ($scope.accion.accion === 'Nuevo Proyecto') {
        $scope.proyecto.accion = 'insertar';
        $scope.proyecto.fecha_inicio = moment($scope.proyecto.fecha_inicio, "YYYY-MM-DD").format('YYYY-MM-DD');
        $scope.proyecto.fecha_final = moment($scope.proyecto.fecha_final, "YYYY-MM-DD").format('YYYY-MM-DD');
        proyectosServices.insertProyects($scope.proyecto).then(function succesCallback(response) {
//          $sessionStorage.mensaje = true;
          $timeout(function () {
            $('#nuevoProyecto').modal('toggle');
          }, 700);
          $timeout(function () {
            $route.reload();
            window.location.reload();
          }, 1000);
        }, function errorCallback(response) {
        });
      } else {
        if ($scope.accion.accion === 'Editar Proyecto') {
          $scope.proyecto.accion = 'editar';
//          $scope.proyecto.fecha_inicio = moment($scope.proyecto.fecha_inicio, "YYYY-MM-DD").format('YYYY-MM-DD');
//          $scope.proyecto.fecha_final = moment($scope.proyecto.fecha_final, "YYYY-MM-DD").format('YYYY-MM-DD');
          $scope.proyecto.fecha_inicio = (typeof $scope.proyecto.fecha_inicio === "undefined") ? $scope.proyecto.fecha_inicio : moment($scope.proyecto.fecha_inicio, "YYYY-MM-DD").format('YYYY-MM-DD');
          $scope.proyecto.fecha_final = ($scope.proyecto.fecha_final === null) ? $scope.proyecto.fecha_final : moment($scope.proyecto.fecha_final, "YYYY-MM-DD").format('YYYY-MM-DD');
          proyectosServices.editarProyects($scope.proyecto).then(function succesCallback(response) {

            $timeout(function () {
              $('#nuevoProyecto').modal('toggle');
            }, 700);
            $timeout(function () {
              $route.reload();
              window.location.reload();
            }, 1000);
          }, function errorCallback(response) {
          });
        }
      }


    };

    /*--------------------------------nuevo proyecto------------------------------------*/
    $scope.nuevop = function () {

      $scope.accion.accion = 'Nuevo Usuario';
      $scope.proyecto = {};
      $scope.btnaccion.accion = 'Guardar';
    };

    /*--------------------------------editar proyecto------------------------------------*/

    $scope.editarpro = function ($proyect) {

      $scope.accion.accion = 'Editar Usuario';
      $scope.btnaccion.accion = 'Editar';
      $scope.proyecto.codigo = $proyect.pro_codigo;
      $scope.proyecto.nombre = $proyect.pro_nombre;
      $scope.proyecto.descripcion = $proyect.pro_descripcion;
      $scope.proyecto.fecha_inicio = $proyect.pro_fecha_inicio;
      $scope.proyecto.fecha_final = $proyect.pro_fecha_final;
      $scope.proyecto.tipo = $proyect.pro__tipo;
      $scope.proyecto.valor = $proyect.pro_valor;
      $scope.proyecto.estado = $proyect.pro_estado;
    };


    /*--------------------------------------------------------------------Eliminar proyecto-------------------------------------------------------------------*/

    $scope.eliminarpro = function (proyecto) {
      $('#eliminarProyecto').modal('toggle');
      $scope.proyectoEl.codigo = proyecto.pro_codigo;
      $scope.proyectoEl.nombre = proyecto.pro_nombre;
//      $scope.proyectoEl.apellidos = usuario.usu_apellidos;
    };

    $scope.eliminarProyecto = function () {
      $scope.proyectoEl.accion = 'eliminar';
      proyectosServices.eliminarProyects($scope.proyectoEl).then(function successCallback(response) {

        if (response.data.code == 500) {
          console.log('error al eliminar');
        } else {
//          sessionStorage.msgEliminado = true;
//          console.log(response);
          $timeout(function () {
            $('#eliminarProyecto').modal('toggle');
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

