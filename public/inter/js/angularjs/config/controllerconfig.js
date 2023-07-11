
application.run(function($rootScope,$http) {
  
  $rootScope.link ='http://facturation-aziz.project:8000/';

  $rootScope.listeMois = [
    {id: 1, libelle: "Janvier"},
    {id: 2, libelle: "Fevrier"},
    {id: 3, libelle: "Mars"},
    {id: 4, libelle: "Avril"},
    {id: 5, libelle: "Mai"},
    {id: 6, libelle: "Juin"},
    {id: 7, libelle: "Juillet"},
    {id: 8, libelle: "Août"},
    {id: 9, libelle: "Septembre"},
    {id: 10, libelle: "Octobre"},
    {id: 11, libelle: "Novembre"},
    {id: 12, libelle: "Décembre"},
  ];

  $rootScope.listeAnnees = [
  ];

  for (let i = new Date().getFullYear() - 30; i < new Date().getFullYear()+1; i++) {
    $rootScope.listeAnnees.push(i);
  }

});// JavaScript Document

// directive pour prendre en compte les style html
application.directive('ngHtmlCompile', function($compile) {
  return {
      restrict: 'A',
      link: function(scope, element, attrs) {
          scope.$watch(attrs.ngHtmlCompile, function(newValue, oldValue) {
              element.html(newValue);
              $compile(element.contents())(scope);
          });
      }
  }
});