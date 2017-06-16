angular.module('contact').controller('registroContactosController', ['$scope', 'contactosServices','$timeout', function ($scope, contactosServices,timeout) {

		$scope.contacto = {};
		$scope.contactoT = {};
                $scope.contactoEl = {};
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
		
		$scope.cargarTabla = function(){
			$scope.contacto.accion = 'cargarT';
			contactosServices.cargarContactos($scope.contacto).then(function succesCallback(response) {
				
				$scope.contactoT = response.data.datos;
				
				console.log(response.data.datos);
				
			}, function errorCallback(response) {
			});
		};
		
		
                
		$scope.insertContacto = function () {
			$scope.contacto.accion = 'insert';
			contactosServices.insertContacto($scope.contacto).then(function succesCallback(response) {
			if (response.data.code == 500) {
					console.log('error al eliminar');
				} else {
//					sessionStorage.msgEliminado = true;
//					console.log(response);
//					timeout(function () {
//						$('#eliminarContacto').modal('toggle');
//					}, 700);
					timeout(function () {
						// $route.reload();
						window.location.reload();
					}, 1000);
				}
                        
                        
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
			contactosServices.eliminarContactos($scope.contactoEl).then(function successCallback(response) {
				
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
	}]);


