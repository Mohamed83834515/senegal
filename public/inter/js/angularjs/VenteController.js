application.controller("vente", function ($scope, $http, uuid) {
    $scope.a = 'global';
    $scope.auth = false;

    $scope.existe = 'true';
    $scope.aPayer = 'true';

    $scope.produits = ["&aze-1djjd"];

    $scope.initialiseSelect = function(){
        
        $(".select2-angularjs").select2({
            minimumResultsForSearch: Infinity
        });
    }

    $scope.initialiseSelectSearch = function(){
        
        $(".select2-search-angularjs").select2();
    }

    $scope.ajouterProduit = function(){
        $scope.produits.push(uuid.v4());
    }

    $scope.retirerProduit = function(key){
        $scope.produits = $scope.produits.filter(produit => produit != key);
    }

    $scope.listeProduits = [
        {id_pro: 1, libelle_pro: "Carton 1L"},
        {id_pro: 2, libelle_pro: "Carton 1,5L"},
        {id_pro: 3, libelle_pro: "Bouteille 20L"},
    ]
});
