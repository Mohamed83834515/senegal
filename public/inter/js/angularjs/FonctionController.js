
	application.controller("fonction", function ($scope, $http, uuid){

        $scope.Titre = "Gestion des Fonctions";//Titre du module
        $scope.ListeFonction = []; //Initialisation tableau liste Fonction

		$scope.lien= 'http://127.0.0.1:8000/api/fonction'
        $scope.InitialiseFonctionG = function(){

            $scope.InitialiseFonction();
            // $scope.getListeFonction();
            // $scope.getListeFonction();
            $scope.affiche=true;
			$scope.getListeMotif();
        }

$scope.produits = ["&aze-1djjd"];

    $scope.initialiseSelect = function(){

        $(".select2-angularjs").select2({
            minimumResultsForSearch: Infinity
        });
    }

    // $scope.initialiseSelectSearch = function(){

    //     $(".select2-search-angularjs").select2();
    // }
 
//Declaration de la classe Fonction
$scope.Fonction = {
	IdFonction:0,
    nom:"",
    description:"",
    agence:"", 
};
//Fin Declaration de la classe Fonction
console.log( $scope.Fonction);

//Initialisation de la classe Fonction
$scope.InitialiseFonction = function(){
 
$scope.Fonction = {
	IdFonction:0,
    nom:"",
    description:"",
    agence:"", 
}

}
$scope.getListeMotif = function () {

	$scope.ListeFonction = [];

	$http({ method: 'GET', url: $scope.lien}).
		success(function (data, status, headers, config) {

			$scope.ListeFonction = data;
			console.log(data)
		});
}

$scope.ValiderEditionFonction = function () {

	swal({
		title: "Etes vous sur?",
		text: "Les données seront enregistrées",
		icon: "warning",
		buttons: true,
		dangerMode: false,
	})
		.then((willEdit) => {
			if (willEdit) {
				if ($scope.Fonction.IdFonction === 0) {
					// $scope.InsertFonction();
					// $('#exampleModal').modal('hide');
					// $scope.InitialiseFonction();
					//console.log($scope.Fonction.IdFonction )
			
				} else {
				 
					$scope.UpdateFonction();
					$('#modal_iconified').modal('hide');
					$scope.InitialiseFonction();

				}
			}
		});
}
$scope.getOneFonction = function (IdFonction) {
	// $('#modal_iconified').modal('show');
		$http({ method: 'GET', url: $scope.lien+'/'+IdFonction }).
			success(function (data, status, headers, config) {
				//console.log(data);
				$scope.Fonction.IdFonction = data.fonction.id_fnct;
				$scope.Fonction.nom = data.fonction.nom_fnct;
				$scope.Fonction.description = data.fonction.description_fnct;
				$scope.Fonction.agence = data.fonction.agence_fnct; 
				//console.log($scope.Fonction.IdFonction)
			});
	
	}
$scope.UpdateFonction = function () {
	var donnee = $.param($scope.Fonction);
	console.log(donnee)
	$http({
		method: 'PATCH',
		url: $scope.lien +'/' + $scope.Fonction.IdFonction,  
		headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
		data: donnee
	}).success(function (data, status, headers, config) {
		
		if (data.status == "success") {
			console.log(data)
			//$scope.getListeFonction(1);
			//$scope.confirmationSwal("Fonction modifié avec succès", "success");
			//$location.path('/Fonction');

		} else {

			$scope.confirmationSwal("Échec modification", "error");
		}
	});
}
	$scope.VueCreationFonction = "Etape1";

    $scope.EtapeSuivante = function (Etape) {

        if (Etape == 1) {

            $scope.VueCreationFonction = "Etape1";

            // $scope.initialise_Recherche();
            // $scope.getListeFonctionValideByDay();

        } else if (Etape == 2) {

            $scope.VueCreationFonction = "Etape2";
            // $scope.initialise_Recherche();

            // $scope.getListeFonctionValideByWeek()

        } else if (Etape == 3) {

            $scope.VueCreationFonction = "Etape3";
            // $scope.initialise_Recherche();
            // $scope.getListeFonctionValideByMonth();
            // $scope.auth=true;

        } else if (Etape == 4) {

            $scope.VueCreationFonction = "Etape4";
            // $scope.initialise_Recherche();
            // $scope.getListeFonctionValideByYear();
        }
        else if (Etape == 5) {

            $scope.VueCreationFonction = "Etape5";
            // $scope.initialise_Recherche();
            // $scope.getListeFonctionValideByYear();
        }
        else if (Etape == 6) {

            $scope.VueCreationFonction = "Etape6";
            // $scope.initialise_Recherche();
            // $scope.getListeFonctionValideByYear();
        }
    }





    });
