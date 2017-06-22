angular.module('contact').controller('registroContactosController', ['$scope', 'contactosServices', '$timeout', '$filter', function ($scope, contactosServices, timeout, $filter) {

		$scope.contacto = {};
		$scope.contactoT = {};
		$scope.contactoEl = {};
		$scope.accion = {};
		$scope.btnaccion = {};



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

		$scope.cargarTabla = function () {
			$scope.contacto.accion = 'cargarT';
			contactosServices.crudContactos($scope.contacto).then(function succesCallback(response) {

				$scope.contactoT = response.data.datos;

				console.log(response.data.datos);

			}, function errorCallback(response) {
			});
		};

		$scope.eliminar = function (contacto) {
			$('#eliminarContacto').modal('toggle');
			$scope.contactoEl.codigo = contacto.ter_codigo;
			$scope.contactoEl.nombre = contacto.ter_nombres;
			$scope.contactoEl.apellido = contacto.ter_apellidos;
		};

		$scope.eliminarContacto = function () {
			$scope.contactoEl.accion = 'delete';
			contactosServices.crudContactos($scope.contactoEl).then(function successCallback(response) {

				if (response.data.code == 500) {
					console.log('error al eliminar');
				} else {
					sessionStorage.msgEliminado = true;
					console.log(response);
					timeout(function () {
						$('#eliminarContacto').modal('toggle');
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
		$scope.cargarTabla();

		$scope.newContact = function () {

			$scope.accion.accion = "Nuevo Contacto";
			$scope.contacto = {};
			$scope.btnaccion.accion = "Guardar";

		};

		$scope.editContact = function (x) {

			$scope.accion.accion = "Editar Contacto";
			$scope.btnaccion.accion = "Editar";

			$scope.contacto.codigo = x.ter_codigo;
			$scope.contacto.documento = x.ter_documento;
			$scope.contacto.nombre = x.ter_nombres;
			$scope.contacto.apellido = x.ter_apellidos;
			$scope.contacto.correo = x.ter_correo;
			$scope.contacto.contacto = x.ter_contacto;
			$scope.contacto.rasocial = x.ter_rason_social;
//			$scope.contacto.fnacimiento = x.ter_fecha_nacimiento;
			$scope.contacto.fnacimiento = $filter('date')(x.ter_fecha_nacimiento, 'yyyy-MM-dd');
			$scope.contacto.direccion = x.ter_direccion;
			$scope.contacto.ciudad = x.ter_ciudad;
			$scope.contacto.pais = x.ter_pais;
			$scope.contacto.departamento = x.ter_departamento;
			$scope.contacto.telefono = x.ter_telefono;
			$scope.contacto.pagweb = x.ter_pag_web;
			$scope.contacto.foto = x.ter_foto;
			$scope.contacto.descripcion = x.ter_descripcion;
			$scope.contacto.estado = x.ter_estado;
			$scope.contacto.tcodigo = x.tet_codigo;
			$scope.contacto.rcodigo = x.res_codigo;

		};

		$scope.guardarContacto = function () {

			$scope.contacto.fnacimiento1 = $filter('date')($scope.contacto.fnacimiento, 'yyyy-MM-dd');

			if ($scope.accion.accion === "Nuevo Contacto") {
				$scope.contacto.accion = 'insert';

				contactosServices.crudContactos($scope.contacto).then(function succesCallback(response) {
					timeout(function () {
						window.location.reload();
					}, 1000);
				}, function errorCallback(response) {
				});
			} else if ($scope.accion.accion === "Editar Contacto") {
				$scope.contacto.accion = 'update';
				contactosServices.crudContactos($scope.contacto).then(function succesCallback(response) {
					timeout(function () {
						window.location.reload();
					}, 1000);
				}, function errorCallback(response) {
				});
			}
		};


	}]);


