
(function() { 
	var app = angular.module('route-provider', ['ngRoute']); 

	app.config(['$locationProvider', function($locationProvider) {
		$locationProvider.hashPrefix('');
	}]);

	app.config(function($routeProvider) {
		$routeProvider

		.when('/', {
			title 		: 'Oliver & olivolja av högsta kvalitet',
			templateUrl : 'views/view-home.html',
			controller  : 'HomeController'
		})

		.when('/order', {
			title       : 'Beställ olivolja och oliver',
			templateUrl : 'views/view-order.html',
			controller  : 'OrderController'
		})

		.when('/products', {
			title       : 'Olivolja och oliver från Grekland',
			templateUrl : 'views/view-products.html',
			controller  : 'ProductsController'
		})

		.when('/about', {
			title       : 'Traditionell, småskalig och exklusiv olivolja',
			templateUrl : 'views/view-about.html',
			controller  : 'AboutController'
		})

		.when('/contact', {
			title       : 'Kontakta oss om våra olivolja',
			templateUrl : 'views/view-contact.html',
			controller  : 'ContactController'
		})		

		.otherwise({redirectTo: '/'});
	});


	/*
		Update title on view change
	*/
	app.run(['$rootScope', function($rootScope) {
	    $rootScope.$on('$routeChangeSuccess', function (event, current, previous) {
	        $rootScope.title = current.$$route.title;
	    });
	}]);

})();