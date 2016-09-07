function attemptUserLogin(){
    var loginUser = $('#login-user').val().trim();
    var loginPass = $('#login-pass').val().trim();
    var $loginError = $('#login-error');
    $loginError.hide();

    if(loginUser === '' || loginPass === ''){
        $loginError.text('Please fill both fields');
        $loginError.show();
        return false;
    }

    $.post( // shorthand jQuery $.ajax type:POST func call
        "includes/process_login.php",
        "action=login&user="+loginUser+"&pass="+loginPass,
        function(response){ // if successful, hide form, show links. else show error
            if (response == 1){
                // refresh window on success
                window.location.reload();
            }
            else if (response == 2){
                $loginError.text('Username or password is incorrect!');
                $loginError.show();
            }
            else if (response == 3){
                $loginError.text('Please fill both fields');
                $loginError.show();
            }
            else {
                $loginError.html(response);
                $loginError.show();
            }
        }
    );
    return false;
}



var bbook = angular.module('bbook', ['ngRoute','ngAnimate']);

// configure our routes
bbook.config(function($routeProvider) {
    $routeProvider
        // Top nav bar
        // .when('/profile', {
        //     templateUrl : 'pages/profile.php',
        //     controller  : 'profileController'
        // })

        .when('/', {
            templateUrl : 'pages/dashboard.php',
            controller  : 'mainController'
        })

        .when('/browse/:skillLevel', {
            templateUrl : 'pages/browse.php',
            controller  : 'browseController'
        })

        .when('/browse/:skillLevel/:skillId', {
            templateUrl : function(params){
                return 'pages/skill_details.php?skill_id=' + params.skillId; },
                controller  : 'skillDetailsController'
        })

        .when('/progressions', {
            templateUrl : 'pages/progressions.php',
            controller  : 'treeController'
        })

        .when('/tree', {
            templateUrl : 'pages/tree.php',
            controller  : 'treeController'
        })

        // Manage section
        .when('/add', {
            templateUrl : 'pages/add.php',
            controller  : 'addController'
        })

        .when('/edit/:skillLevel/:skillId', {
            templateUrl : function(params){
                return 'pages/add.php?level=' + params.skillLevel + '&skill_id=' + params.skillId; },
            // controller  : 'editController'
        })

        .otherwise({
            templateUrl: 'pages/404.html'
        });

});

// create the controller and inject Angular's $scope
bbook.controller('mainController', function($scope) {
    // create a message to display in our view
    $scope.message = 'Everyone aint this awesome!!';
});

bbook.controller('browseController', ['$scope', '$routeParams', '$location', function($scope, $routeParams, $location){

    // if($routeParams.skillLevel != 'all'){
    //     console.log($('#'+$routeParams.skillLevel).offset().top-60);
    //     console.log($('#'+$routeParams.skillLevel).offset().top-60);

    //     scrollTo(0,$('#'+$routeParams.skillLevel).offset().top-60);
    // }

    // // for changing page from code
    // $scope.go = function ( path ) {
    //   $location.path( path );
    // };
}]);

bbook.controller('skillDetailsController', ['$scope', '$routeParams', '$location', function($scope, $routeParams, $location){

    scrollTo(0,0);

}]);

bbook.controller('treeController', ['$scope', '$routeParams',
  function($scope, $routeParams) {
    $scope.skillId = $routeParams.skillId;
  }
]);

bbook.controller('addController', ['$scope', '$routeParams',
  function($scope, $routeParams) {
    $scope.skillId = $routeParams.skillId;
  }
]);

bbook.controller('editController', ['$scope', '$routeParams', '$location', function($scope, $routeParams, $location){

    if($routeParams.skillLevel)
        changeLevelByName($routeParams.skillLevel);

    // for changing page from code
    $scope.go = function ( path ) {
      $location.path( path );
    };
}]);

