'use strict';

/* Filters */

angular.module('myApp.filters', [])
  	.filter('startFrom', function() {
	    return function(input, start) {
	        start = +start; //parse to int
	        console.log(input, start , " Start");
	        return input.slice(start);
	    }
	})
	.filter('format', function(){
	  	return function(value, replace) {
		    if (!value) {
		      return value;
		    }
		    var target = value.toString(), token;
		    if (replace === undefined) {
		      return target;
		    }
		    if (!angular.isArray(replace) && !angular.isObject(replace)) {
		      return target.split('$0').join(replace);
		    }
		    token = angular.isArray(replace) && '$' || ':';

		    angular.forEach(replace, function(value, key){
		      target = target.split(token+key).join(value);
		    });
		    return target;
	  	};
	});;