var app = angular.module('myApp', ['ngMaterial']);

app.controller('AppCtrl', ['$scope', '$mdSidenav', function($scope, $mdSidenav){
  $scope.toggleSidenav = function(menuId) {
    $mdSidenav(menuId).toggle();
  };
}]);

app.controller('InputCtrl', function($scope) {
    $scope.user={
        title:''
    };


app.config(function($mdThemingProvider) {
    var customPrimary = {
        '50': '#9acffa',
        '100': '#82c4f8',
        '200': '#6ab8f7',
        '300': '#51adf6',
        '400': '#39a1f4',
        '500': '#2196F3',
        '600': '#0d8aee',
        '700': '#0c7cd5',
        '800': '#0a6ebd',
        '900': '#0960a5',
        'A100': '#b2dbfb',
        'A200': '#cae6fc',
        'A400': '#e3f2fd',
        'A700': '#08528d'
    };
    $mdThemingProvider
        .definePalette('customPrimary', 
                        customPrimary);

    var customAccent = {
        '50': '#79d4fd',
        '100': '#60ccfd',
        '200': '#47c4fd',
        '300': '#2ebcfc',
        '400': '#14b4fc',
        '500': '#03A9F4',
        '600': '#0398db',
        '700': '#0286c2',
        '800': '#0275a8',
        '900': '#02638f',
        'A100': '#92dcfe',
        'A200': '#ace4fe',
        'A400': '#c5ecfe',
        'A700': '#015276'
    };
    $mdThemingProvider
        .definePalette('customAccent', 
                        customAccent);

    var customWarn = {
        '50': '#d176e1',
        '100': '#ca61dc',
        '200': '#c34cd7',
        '300': '#bc37d3',
        '400': '#ae2cc5',
        '500': '#9C27B0',
        '600': '#89229b',
        '700': '#771e86',
        '800': '#641971',
        '900': '#52145c',
        'A100': '#d88be5',
        'A200': '#dfa0ea',
        'A400': '#e6b4ee',
        'A700': '#3f1048'
    };
    $mdThemingProvider
        .definePalette('customWarn', 
                        customWarn);

    var customBackground = {
        '50': '#ffffff',
        '100': '#ffffff',
        '200': '#ffffff',
        '300': '#ffffff',
        '400': '#fbfdff',
        '500': '#E3F2FD',
        '600': '#cbe7fb',
        '700': '#b3dcfa',
        '800': '#9cd1f8',
        '900': '#84c6f6',
        'A100': '#ffffff',
        'A200': '#ffffff',
        'A400': '#ffffff',
        'A700': '#6cbbf4'
    };
    $mdThemingProvider
        .definePalette('customBackground', 
                        customBackground);

   $mdThemingProvider.theme('default')
       .primaryPalette('customPrimary')
       .accentPalette('customAccent')
       .warnPalette('customWarn')
       .backgroundPalette('customBackground')
});