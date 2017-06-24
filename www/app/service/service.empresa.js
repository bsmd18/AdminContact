angular.module('contact').service('empresaServices', ['$http', 'Upload', 'serverUrl', function ($http, Upload, serverUrl) {

    this.agregarEnterprise = function (data) {
      return  Upload.upload({
        url: serverUrl + 'agregarEmpresa',
        data: data
      });

    };
    this.eliminarEnterprise = function(data){
//      console.log(data);
      return $http.post(serverUrl + 'eliminarEmpresa',$.param(data));
    };

    this.obtenerEnterprise = $http.get(serverUrl + 'obtenerEmpresa');

  }]);
