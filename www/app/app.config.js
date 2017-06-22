/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
angular.module('contact').constant('rolAdmin', 1);
angular.module('contact').constant('rolInvitado', 2);
angular.module('contact').constant('serverUrl', 'http://localhost/AdminContact/www/server.php/');

angular.module('contact').config(['$middlewareProvider',
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


angular.module('contact').config(['$routeProvider', '$httpProvider', function config($routeProvider, $httpProvider) {
        $httpProvider.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded; charset=UTF-8';
        $routeProvider.
                when('/', {
                    controller: 'loginController',
                    templateUrl: 'app/template/login.html',
                    middleware: ['comprobarNoTenerSesion']
                }).
                when('/formularioUsuario', {
                    controller: 'registroUsuariosController',
                    templateUrl: 'app/template/formularioUsuario.html',
                    middleware: ['comprobarSession', 'comprobarPermisoDeAdmnistracion']
                }).
                when('/menuPrincipal', {
                    controller: 'menuPrincipalController',
                    templateUrl: 'app/template/menuPrincipal.html',
                    middleware: ['comprobarSession']
                }).
                when('/logout', {
                    controller: 'logoutController',
                    template: '<p>Cerrando sesión...</p>',
                    middleware: ['comprobarSession']
                }).
                when('/proyectos', {
                    controller: 'registroproyectosController',
                    templateUrl: 'app/template/proyectos.html',
                    middleware: ['comprobarSession']
                }).
                when('/registrocontactos', {
                    controller: 'registroContactosController',
                    templateUrl: 'app/template/registroContactos.html',
                    middleware: ['comprobarSession']
                }).
                when('/empresa', {
                    controller: 'registroEmpresaController',
                    templateUrl: 'app/template/empresa.html',
                    middleware: ['comprobarSession']
                }).
                otherwise('/');
    }]);

