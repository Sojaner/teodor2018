
(function() { //Wrapping our app in a closure is good habit
	var app = angular.module('main', ['route-provider', 'controllers', 'directives']); // Module, called in html-tag "ng-app"-attribute
})();