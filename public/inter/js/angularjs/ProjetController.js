
	application.controller("projet", function ($scope, $http, uuid){

        $scope.Titre = "Test projet";//Titre du module
        $scope.ListeProjet = []; //Initialisation tableau liste Projet

//         $scope.lien= 'https://ssise.net/api/projets'
//         $scope.InitialiseProjetG = function(){

//             $scope.InitialiseProjet();
//              $scope.getListeProjet();
//              $scope.controlCode ();
//             $scope.affiche=true;
//         }

// $scope.produits = ["&aze-1djjd"];

//     $scope.initialiseSelect = function(){

//         $(".select2-angularjs").select2({
//             minimumResultsForSearch: Infinity
//         });
//     }

//     // $scope.initialiseSelectSearch = function(){

//     //     $(".select2-search-angularjs").select2();
//     // }

//     $scope.ajouterProduit = function(){
//         $scope.produits.push(uuid.v4());
//     }

//     $scope.retirerProduit = function(key){
//         $scope.produits = $scope.produits.filter(produit => produit != key);
//     }

//     $scope.listeProduits = [
//         {id_pro: 1, libelle_pro: "Carton 1L"},
//         {id_pro: 2, libelle_pro: "Carton 1,5L"},
//         {id_pro: 3, libelle_pro: "Bouteille 20L"},
//     ]
//      //Fonction qui gere les etapes
// //Declaration de la classe Projet
// $scope.Projet = {

//     code:"",
//     sigle_projet:"",
//     intitule_projet:"",
//     date_signature_projet:new Date(),
//     date_demarrage_projet:new Date(),
//     direction_lead:0,
//     maitre_oeuvre:0,
//     date_fin:new Date(),
//     duree_projet:"",
//     financement:"",
//     matrice:0,
//     couverture:"",
//     objectifs:"",
//     type_projet:"",
//     mode_execution:"",
//     priorite:0,
//     resultats:"",
//     image:"",
//     couleur:"",
//     zone:0,
//     thematiques:0,
//     mode_execution:"",
//     document:"",
// };
// //Fin Declaration de la classe Projet
// //console.log( $scope.Projet);

// //Initialisation de la classe Projet
// $scope.InitialiseProjet = function(){

// var date = new Date();
// $scope.Projet = {

//     code:"",
//     sigle_projet:"",
//     intitule_projet:"",
//     date_signature_projet:new Date(),
//     date_demarrage_projet:new Date(),
//     direction_lead:0,
//     maitre_oeuvre:0,
//     date_fin:new Date(),
//     duree_projet:"",
//     financement:"",
//     matrice:0,
//     couverture:"",
//     objectifs:"",
//     type_projet:"",
//     mode_execution:"",
//     priorite:0,
//     resultats:"",
//     image:"",
//     couleur:"",
//     zone:0,
//     thematiques:0,
//     mode_execution:"",
//     document:"",
// }

// }

// 	$scope.VueCreationProjet = "Etape1";

//     $scope.EtapeSuivante = function (Etape) {

//         if (Etape == 1) {

//             $scope.VueCreationProjet = "Etape1";

//             // $scope.initialise_Recherche();
//             // $scope.getListeDecaissementValideByDay();

//         } else if (Etape == 2) {

//             $scope.VueCreationProjet = "Etape2";
//             // $scope.initialise_Recherche();

//             // $scope.getListeDecaissementValideByWeek()

//         } else if (Etape == 3) {

//             $scope.VueCreationProjet = "Etape3";
//             // $scope.initialise_Recherche();
//             // $scope.getListeDecaissementValideByMonth();
//             // $scope.auth=true;

//         } else if (Etape == 4) {

//             $scope.VueCreationProjet = "Etape4";
//             // $scope.initialise_Recherche();
//             // $scope.getListeDecaissementValideByYear();
//         }
//         else if (Etape == 5) {

//             $scope.VueCreationProjet = "Etape5";
//             // $scope.initialise_Recherche();
//             // $scope.getListeDecaissementValideByYear();
//         }
//         else if (Etape == 6) {

//             $scope.VueCreationProjet = "Etape6";
//             // $scope.initialise_Recherche();
//             // $scope.getListeDecaissementValideByYear();
//         }
//     }



//     $scope.getListeProjet = function () {
// console.log("bonjour"); 
//         $scope.ListeProjet = [];
    
//         $http({ method: 'GET', url: $scope.lien}).
//             success(function (data, status, headers, config) {
//                 console.log(data);
//                 $scope.ListeProjet = data.projets;
//                 console.log($scope.ListeProjet)
//             });
//     }

//     $scope.controlCode = function () {

//         console.log($scope.ListeProjet)
//     }

    });
