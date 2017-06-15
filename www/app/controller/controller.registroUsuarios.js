angular.module('contact').controller('registroUsuariosController', ['$scope', 'usuariosServices', '$timeout', '$sessionStorage', function ($scope, usuariosServices, timeout, sessionStorage) {

		$scope.usuario = {};
		$scope.usuarioT = {};
		$scope.usuarioEl = {};
		$scope.accion = {};
		$scope.btnaccion = {};
		$scope.usuarioGuardado = false;
		$scope.usuarioEditado = false;
		$scope.usuarioEliminado = false;
		$scope.contrasenaerronea = false;

		/*-------------------------------------------------------------------------------Array Países-----------------------------------------------------------------------------*/

		$scope.paises = ["Afganistán", "Akrotiri", "Albania", "Alemania", "Andorra", "Angola", "Anguila", "Antártida", "Antigua y Barbuda", "Antillas Neerlandesas",
			"Arabia Saudí", "Arctic Ocean", "Argelia", "Argentina", "Armenia", "Aruba", "Ashmore andCartier Islands", "Atlantic Ocean", "Australia", "Austria", "Azerbaiyán",
			"Bahamas", "Bahráin", "Bangladesh", "Barbados", "Bélgica", "Belice", "Benín", "Bermudas", "Bielorrusia", "Birmania Myanmar", "Bolivia", "Bosnia y Hercegovina",
			"Botsuana", "Brasil", "Brunéi", "Bulgaria", "Burkina Faso", "Burundi", "Bután", "Cabo Verde", "Camboya", "Camerún", "Canadá", "Chad", "Chile", "China", "Chipre",
			"Clipperton Island", "Colombia", "Comoras", "Congo", "Coral Sea Islands", "Corea del Norte", "Corea del Sur", "Costa de Marfil", "Costa Rica", "Croacia", "Cuba",
			"Dhekelia", "Dinamarca", "Dominica", "Ecuador", "Egipto", "El Salvador", "El Vaticano", "Emiratos Árabes Unidos", "Eritrea", "Eslovaquia", "Eslovenia", "España",
			"Estados Unidos", "Estonia", "Etiopía", "Filipinas", "Finlandia", "Fiyi", "Francia", "Gabón", "Gambia", "Gaza Strip", "Georgia", "Ghana", "Gibraltar", "Granada",
			"Grecia", "Groenlandia", "Guam", "Guatemala", "Guernsey", "Guinea", "Guinea Ecuatorial", "Guinea-Bissau", "Guyana", "Haití", "Honduras", "Hong Kong", "Hungría",
			"India", "Indian Ocean", "Indonesia", "Irán", "Iraq", "Irlanda", "Isla Bouvet", "Isla Christmas", "Isla Norfolk", "Islandia", "Islas Caimán", "Islas Cocos",
			"Islas Cook", "Islas Feroe", "Islas Georgia del Sur y Sandwich del Sur", "Islas Heard y McDonald", "Islas Malvinas", "Islas Marianas del Norte", "IslasMarshall",
			"Islas Pitcairn", "Islas Salomón", "Islas Turcas y Caicos", "Islas Vírgenes Americanas", "Islas Vírgenes Británicas", "Israel", "Italia", "Jamaica", "Jan Mayen",
			"Japón", "Jersey", "Jordania", "Kazajistán", "Kenia", "Kirguizistán", "Kiribati", "Kuwait", "Laos", "Lesoto", "Letonia", "Líbano", "Liberia", "Libia",
			"Liechtenstein", "Lituania", "Luxemburgo", "Macao", "Macedonia", "Madagascar", "Malasia", "Malaui", "Maldivas", "Malí", "Malta", "Man, Isle of", "Marruecos",
			"Mauricio", "Mauritania", "Mayotte", "México", "Micronesia", "Moldavia", "Mónaco", "Mongolia", "Montserrat", "Mozambique", "Namibia", "Nauru", "Navassa Island",
			"Nepal", "Nicaragua", "Níger", "Nigeria", "Niue", "Noruega", "Nueva Caledonia", "Nueva Zelanda", "Omán", "Pacific Ocean", "Países Bajos", "Pakistán", "Palaos",
			"Panamá", "Papúa-Nueva Guinea", "Paracel Islands", "Paraguay", "Perú", "Polinesia Francesa", "Polonia", "Portugal", "Puerto Rico", "Qatar", "Reino Unido",
			"República Centroafricana", "República Checa", "República Democrática del Congo", "República Dominicana", "Ruanda", "Rumania", "Rusia", "Sáhara Occidental",
			"Samoa", "Samoa Americana", "San Cristóbal y Nieves", "San Marino", "San Pedro y Miquelón", "San Vicente y las Granadinas", "Santa Helena", "Santa Lucía",
			"Santo Tomé y Príncipe", "Senegal", "Seychelles", "Sierra Leona", "Singapur", "Siria", "Somalia", "Southern Ocean", "Spratly Islands", "Sri Lanka", "Suazilandia",
			"Sudáfrica", "Sudán", "Suecia", "Suiza", "Surinam", "Svalbard y Jan Mayen", "Tailandia", "Taiwán", "Tanzania", "Tayikistán", "TerritorioBritánicodel Océano Indico",
			"Territorios Australes Franceses", "Timor Oriental", "Togo", "Tokelau", "Tonga", "Trinidad y Tobago", "Túnez", "Turkmenistán", "Turquía", "Tuvalu", "Ucrania",
			"Uganda", "Unión Europea", "Uruguay", "Uzbekistán", "Vanuatu", "Venezuela", "Vietnam", "Wake Island", "Wallis y Futuna", "West Bank", "World", "Yemen", "Yibuti",
			"Zambia", "Zimbabue"];

		/*--------------------------------------------------Cargar Tabla---------------------------------------------------------*/

		$scope.cargarTabla = function () {
			$scope.usuario.accion = 'cargarT';
			usuariosServices.crudUsuarios($scope.usuario).then(function succesCallback(response) {
				$scope.usuarioT = response.data.datos;
			}, function errorCallback(response) {
			});
		};

		$scope.cargarTabla();

		/*--------------------------------------------------------Nuevo Usuario------------------------------------------------------*/

		$scope.nuevo = function () {

			$scope.accion.accion = 'Nuevo Usuario';
			$scope.usuario = {};
			$scope.btnaccion.accion = 'Guardar';

		};

		/*-------------------------------------------------------Editar Usuario-------------------------------------------------------*/

		$scope.editar = function ($datos) {

			$scope.accion.accion = 'Editar Usuario';
			$scope.btnaccion.accion = 'Editar';

			$scope.usuario.codigo = $datos.usu_codigo;
			$scope.usuario.nombres = $datos.usu_nombres;
			$scope.usuario.apellidos = $datos.usu_apellidos;
			$scope.usuario.correo = $datos.usu_correo;
//			$scope.usuario.clave = $datos.usu_clave;
			$scope.usuario.rol = $datos.rol_id;
			$scope.usuario.razonsocial = $datos.usu_razon_social;
			$scope.usuario.cargo = $datos.usu_cargo;
			$scope.usuario.pais = $datos.usu_pais;
			$scope.usuario.departamento = $datos.usu_departamento;
			$scope.usuario.ciudad = $datos.usu_ciudad;
			$scope.usuario.direccion = $datos.usu_direccion;
			$scope.usuario.estado = $datos.usu_estado;
			$scope.usuario.telefono = parseInt($datos.usu_telefono);
			$scope.usuario.paginaweb = $datos.usu_pagina_web;
			$scope.usuario.descripcion = $datos.usu_descripcion;

		};

		/*----------------------------------Guardar el Registro independiente de si es Insert o Update--------------------------------------*/

		$scope.guardarUsuario = function () {
			
			if($scope.usuario.clave === $scope.usuario.confirmarclave){
				if ($scope.accion.accion === 'Nuevo Usuario') {
				$scope.usuario.accion = 'insert';
				usuariosServices.crudUsuarios($scope.usuario).then(function succesCallback(response) {
					sessionStorage.msgGuardado = true;
					timeout(function () {
						$('#usuarios').modal('toggle');
					}, 700);
					timeout(function () {
						// $route.reload();
						window.location.reload();
					}, 1000);
				}, function errorCallback(response) {
				});
			} else if ($scope.accion.accion === 'Editar Usuario') {
				$scope.usuario.accion = 'update';
				usuariosServices.crudUsuarios($scope.usuario).then(function succesCallback(response) {
					sessionStorage.msgEditado = true;
					timeout(function () {
						$('#usuarios').modal('toggle');
					}, 700);
					timeout(function () {
						// $route.reload();
						window.location.reload();
					}, 1000);
				}, function errorCallback(response) {
				});
			}
			}else{
				$scope.contrasenaerronea = true;
			}
		};

		/*--------------------------------------------------------------------Eliminar Usuario-------------------------------------------------------------------*/

		$scope.eliminar = function (usuario) {
			$('#eliminarUsuario').modal('toggle');
			$scope.usuarioEl.codigo = usuario.usu_codigo;
			$scope.usuarioEl.nombres = usuario.usu_nombres;
			$scope.usuarioEl.apellidos = usuario.usu_apellidos;
		};

		$scope.eliminarUsuario = function () {
			$scope.usuarioEl.accion = 'delete';
			usuariosServices.crudUsuarios($scope.usuarioEl).then(function successCallback(response) {
				
				if (response.data.code == 500) {
					console.log('error al eliminar');
				} else {
					sessionStorage.msgEliminado = true;
					console.log(response);
					timeout(function () {
						$('#eliminarUsuario').modal('toggle');
					}, 700);
					timeout(function () {
						// $route.reload();
						window.location.reload();
					}, 1000);
				}
			}, function errorCallback(response) {
				console.error(response);
			});
		};

		/*-------------------------------------------------------------Mensages Success---------------------------------------------------------*/

		if (sessionStorage.msgGuardado === true) {
			$scope.usuarioGuardado = sessionStorage.msgGuardado;
			delete sessionStorage.msgGuardado;
		} else if (sessionStorage.msgEditado === true) {
			$scope.usuarioEditado = sessionStorage.msgEditado;
			delete sessionStorage.msgEditado;
		}else if (sessionStorage.msgEliminado === true){
			$scope.usuarioEliminado = sessionStorage.msgEliminado;
			delete sessionStorage.msgEliminado;
		}

	}]);


