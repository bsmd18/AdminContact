angular.module('ensayo').controller('registroController', ['$scope', 'contactosServices', function ($scope, contactosServices) {

    $scope.contacto = {};

    $scope.crudContacto = function () {
      console.log($scope.contacto);
      contactosServices.insertContacto($scope.contacto).then(function succesCallback(response) {
        console.log(response);
      }, function errorCallback(response) {
//        console.log(response);
      });
    };

   }]);


