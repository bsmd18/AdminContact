angular.module('contact').service('empresaServices', ['$http', 'Upload', 'serverUrl', function ($http, Upload, serverUrl) {

    this.agregarEnterprise = function (data) {
      return  Upload.upload({
        url: serverUrl + 'agregarEmpresa',
        data: data
      });

    };

    this.obtenerEnterprise = $http.get(serverUrl + 'obtenerEmpresa');

  }]);
