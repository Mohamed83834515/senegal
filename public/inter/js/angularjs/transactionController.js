application.controller("transactions", function ($scope, $http, uuid) {
    $scope.a = 'projet';
    $scope.auth = false;
    $scope.link ='http://facturation-aziz.project:8000/dashboard/';

    $scope.projets = []; // panier vide.

    $scope.search = {
        type: "",
        structure: "",
        periode: 'jour',
        jour: "",
        semaine: "",
        mois: "",
        datedebut: "",
        datefin: "",
        annee: "",
    }

    $scope.initialiseVariable = function (periode, structure, type, jour, semaine, mois, datedebut, datefin, annee) {
        $scope.search = {
            type: type,
            structure: structure,
            periode: periode,
            jour: jour,
            semaine: semaine,
            mois: mois,
            datedebut: datedebut,
            datefin: datefin,
            annee: annee,
        }

        console.log('====================================');
        console.log("search", $scope.search);
        console.log('====================================');
    };

    // Get all product from cart 
    // if user is logged from online cart
    // if user isn't logged from local cart
    $scope.getProjets = function() {
        $scope.startDashboardBlockUi();
        $http({ 
            method: 'GET', 
            url: $scope.link +'projets/search?etat='+$scope.search.etat+'&domaine='+$scope.search.domaine+'&categorie='+$scope.search.categorie
        })
        .success(function (data, status, headers, config) {
            $scope.projets = data;

            $scope.stopDashboardBlockUi();
        })
        .error(function (data, status, headers, config) {
            console.log('====================================');
            console.log(data);
            console.log('====================================');

            $scope.stopDashboardBlockUi();
        });
    }

});
