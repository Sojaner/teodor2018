
(function() { //Wrapping our app in a closure is good habit
	var app = angular.module('controllers', []); // Module, called in html-tag "ng-app"-attribute
	
	app.controller('StoreController', function(){ 
		this.products = product;
	});

	app.controller('PanelController', function() {
		this.tab = 1;

		this.selectTab = function(setTab) {
			this.tab = setTab;
		}
		this.isSelected = function(checkTab) {
			return this.tab === checkTab;
		}			
	});
	app.controller('FooterController', function() {
		this.contacts = contact;
	});

	app.controller('HomeController', function($scope) {
		$scope.title = 'Oliver & olivolja av högsta kvalitet';
		$scope.message = 'Medelhavsmat sundare liv';
		$scope.img = 'teodorslivs-oliveoil-1366x911.jpg'
	});

	app.controller('OrderController', function($scope) {
		$scope.title = 'Skicka din beställning här!';		
		$scope.message = 'Hello from OrderController';
	});

	app.controller('ProductsController', function($scope) {
		$scope.title = 'Våra produkter';		
		$scope.message = '';
	});		

	app.controller('AboutController', function($scope) {
		$scope.title = 'Traditionell, småskalig och exklusiv olivolja';		
		$scope.message = '';
	});	

	app.controller('formController', function($scope) {

		this.products = product;
		$scope.submitForm = function(isValid) {
		// check to make sure the form is completely valid
		if (isValid) {
		  alert('our form is amazing');
		}

		};

		$scope.sumCalc = function() {
		var sum = 0;
		angular.forEach(product, function(product, index) {
		  sum += parseInt(product.quantity, 10) * product.price;

		});
		return sum;
		//totalPrice = sum;
		};
	});		

	var product = [
		{
			name: 'Extra Virgin Olivolja',
			productId: 01,
			price: 100,
			description: '500ml, glasflaska',
			specification: "Vår kallpressade extra virgin olivolja i 500 ml mörkgrön glasflaska bevarar produktens smak och organoleptiska egenskaper på bästa möjliga sätt. Förvaras bäst mörkt och svalt.",
			images: 
				{
					full: 'assets/img/oliveoil-bottle-full.jpg',
					thumb: 'assets/img/oliveoil-bottle-thumb.jpg'
				},
			quantity: 0
		},
		{
			name: "Amfissis-oliver",
			productId: 02,
			price: 100,
			description: "720ml, glasburk",
			specification: "Våra oliver av sorten amfissis är extra goda att äta som de är till matlagning. Inga kemiska tillsatser, det enda konserveringsmedlet är salt, citronsyra och olivolja. Förvaras mörkt och svalt.",
			images: 
				{
					full: 'assets/img/olives-jar-full.jpg',
					thumb: 'assets/img/olives-jar-thumb.jpg'
				},
			quantity: 0					
		}
	];

	var contact = {
		name: "Karanis Sweden AB",
		street: "Hagvägen 4A",
		zip: "702 85",
		city: "Örebro",
		email: "contact@teodorslivs.se", 
		phone: "+46 706 06 31 70",
	};

})();