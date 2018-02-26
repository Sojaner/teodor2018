(function() {

	var app = angular.module('directives', []);

	app.directive('menuContainer', function() {
		return {
			restrict: 'E', 
			templateUrl: 'templates/menu-container.html'
		};
	});

	app.directive('productContainer', function() {
		return {
			restrict: 'E',
			templateUrl: 'templates/product-container.html'
		}
	});

	app.directive('footerContainer', function() {
		return {
			restrict: 'E', 
			templateUrl: 'templates/footer-container.html'
		};
	});	


	app.directive('sideButtons', function() {
		return {
			restrict: 'E', 
			templateUrl: 'templates/side-buttons.html'
		};
	});	

	app.directive('jumbotron', function(){
		return{
			restrict: 'E',
			templateUrl: 'templates/jumbotron.html'
		};
	});

	app.directive('orderForm', function(){
		return{
			restrict: 'E',
			templateUrl: 'templates/order-form.html',
			controller: 'formController'
		}
	})

	
})();