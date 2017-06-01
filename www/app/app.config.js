/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
angular.module('ensayo').constant('rolAdmin', 1);
angular.module('ensayo').constant('rolInvitado', 2);
angular.module('ensayo').constant('serverUrl', 'http://localhost/contacto-/www/server.php/');

angular.module('ensayo').config(['$middlewareProvider',
  function middlewareProviderConfig($middlewareProvider) {
    $middlewareProvider.map({
      'comprobarSession': ['$localStorage', '$sessionStorage', function comprobarSession($localStorage, $sessionStorage) {
          middlewareComprobarSession(this, $localStorage, $sessionStorage);
        }],
      'comprobarPermisoDeAdmnistracion': ['$localStorage', '$sessionStorage', 'rolAdmin', function comprobarPermisoDeAdmnistracion($localStorage, $sessionStorage, rolAdmin) {
          middlewareComprobarPermisoDeAdmnistracion(this, $localStorage, $sessionStorage, rolAdmin);
        }],
      'comprobarPermisoDeCelador': ['$localStorage', '$sessionStorage', 'rolCelador', function comprobarPermisoDeInvitado($localStorage, $sessionStorage, rolCelador) {
          middlewareComprobarPermisoDeCelador(this, $localStorage, $sessionStorage, rolCelador);
        }],
      'comprobarNoTenerSesion': ['$localStorage', '$sessionStorage', 'rolAdmin', function comprobarPermisoDeInvitado($localStorage, $sessionStorage, rolAdmin) {
          middlewareComprobarNoTenerSesion(this, $localStorage, $sessionStorage, rolAdmin);
        }]
    });
  }]);


angular.module('ensayo').config(['$routeProvider', '$httpProvider', function config($routeProvider, $httpProvider) {
    $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
    $routeProvider.
            when('/', {
              controller: 'loginController',
              templateUrl: 'app/template/login.html',
            }).
            when('/registrarContacto', {
              controller: 'registroController',
              templateUrl: 'app/template/formularioContacto.html',
              middleware: ['comprobarSession', 'comprobarPermisoDeAdmnistracion' ]
            }).
            when('/menuPrincipal', {
              controller: 'registroController',
              templateUrl: 'app/template/menuPrincipal.html',
              middleware: ['comprobarSession']
            }).
            otherwise('/');
  }]);

