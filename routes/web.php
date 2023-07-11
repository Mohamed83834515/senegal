<?php

use App\Http\Controllers\Application\ApprovisionnementController;
use App\Http\Controllers\Application\ClientController;
use App\Http\Controllers\Application\DepenseController;
use App\Http\Controllers\Application\FournisseurController;
use App\Http\Controllers\Application\ProduitController;
use App\Http\Controllers\Application\RapportController;
use App\Http\Controllers\Application\VenteController;
//use App\Http\Controllers\Cadre_Resultat\AnalytiqueController;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\ModuleController;
use App\Http\Controllers\Dashboard\ProfilController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Parametrages\AutreParametrageController;
use App\Http\Controllers\Parametrages\CategorieDepenseController;
use App\Http\Controllers\Parametrages\DepartementController;
use App\Http\Controllers\Parametrages\FonctionController;
use App\Http\Controllers\Parametrages\LocaliteController;
use App\Http\Controllers\Parametrages\PartenaireController;
use App\Http\Controllers\Parametrages\ProgrammeController;
use App\Http\Controllers\Parametrages\ProjetController;
use App\Http\Controllers\Parametrages\RegionController;
use App\Http\Controllers\Parametrages\SousPrefectureController;
use App\Http\Controllers\Parametrages\ThematiqueController;
use App\Http\Controllers\Parametrages\TypePartenaireController;
use App\Http\Controllers\Parametrages\NiveauLocaliteController;
use App\Http\Controllers\Parametrages\TypeProgrammeController;
use App\Http\Controllers\Parametrages\UniteIndicateurController;
use App\Http\Controllers\Parametrages\VillageController;
use App\Http\Controllers\Parametrages\ProjetUserController;
use App\Http\Controllers\Cadre_Resultat\CadreLogiqueController;
use App\Http\Controllers\Cadre_Resultat\NiveauCadreLogiqueController;
use App\Http\Controllers\Cadre_Resultat\TypeCadreLogiqueController;
use App\Http\Controllers\Cadre_Resultat\IndicateurCSController;
use App\Http\Controllers\Projets\IndicateurProjetController;
use App\Http\Controllers\Cadre_Resultat\NiveauCadreResultatProjetController;
use App\Http\Controllers\Cadre_Resultat\PlanAnalytiqueController;
use App\Http\Controllers\Projets\CadreResultatController;
use App\Http\Controllers\Cadre_Resultat\NiveauPlanAnalytiqueController;
use App\Http\Controllers\Cadre_Resultat\NiveauxPlanAnalytiqueController;
use App\Http\Controllers\Documentation\tacheController;
use App\Http\Controllers\Documentation\DossierController;
use App\Http\Controllers\Documentation\GroupeUser;
use App\Http\Controllers\Documentation\fichierController;
//use App\Http\Controllers\Dashboard\ModulesController;
//use App\Http\Controllers\Dashboard\ProfileController;
//use App\Http\Controllers\Dashboard\UsersController;
use App\Http\Controllers\Programmation\ConventionActiviteController;
use App\Http\Controllers\Programmation\ConventionController;
use App\Http\Controllers\Programmation\ConventionResultatController;
use App\Http\Controllers\Programmation\TypeActiviteController;
//use App\Http\Controllers\Parametrages\PlanAnalytiqueController;
//use App\Http\Controllers\Parametrages\NiveauPlanAnalytiqueController;
use App\Http\Controllers\Parametrages\PlanAnalytiqueController as ParametragesPlanAnalytiqueController;
//use App\Http\Controllers\Parametrages\PlanAnalytiquesController;
use App\Http\Controllers\Programmation\PTBAController;
use App\Http\Controllers\Programmation\PTBAIndicateurController;
use App\Http\Controllers\Programmation\PTBATacheController;
use App\Http\Controllers\Programmation\RecommandationActionController;
use App\Http\Controllers\Programmation\RecommandationController;
use App\Http\Controllers\Projets\AnalytiqueController;
use App\Http\Controllers\Projets\NiveauAnalytiqueController;
use App\Http\Controllers\SuiviResultat\SuiviPRBAController;
use App\Http\Controllers\SuiviResultat\ResultatAttenduController;
use App\Http\Controllers\SuiviResultat\ObservationPTBAController;
use App\Http\Controllers\SuiviResultat\SuiviTachePRBAController;
use App\Http\Controllers\SuiviResultat\SuiviIndicateurPRBAController;
use App\Http\Controllers\SuiviResultat\SuiviIndicateurCSController;
use App\Http\Controllers\SuiviResultat\SuiviIndicateurProjetController;
use App\Http\Controllers\SuiviResultat\SuiviIndicateurPPController;
use App\Http\Controllers\Etat_Rapport\EtatPTBAController;
use App\Http\Controllers\Etat_Rapport\EtatSuiviResultatController;
use App\Http\Controllers\Etat_Rapport\RapportIndicateurController;
use App\Http\Controllers\Programmation\PTBACoutController;
use App\Http\Controllers\rapport_dynamique\rapport_dynamique;
use App\Http\Controllers\SuiviResultat\ClasseurController;
use App\Http\Controllers\SuiviResultat\FeuilleController;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// ADMINISTRATION ROUTES
Route::get('/', function () {
    return view('dashboard.auth.login');
});

Route::get('/change-password', [UserController::class, 'change_password_view'])->name('user.change_password_view')->middleware('auth');
Route::put('/change-password-action', [UserController::class, 'change_password'])->name('user.change_password')->middleware('auth');

Route::group([
    'prefix' => 'dashboard',
    'middleware' => ['auth', 'changed', 'global.variable.enabled']
], function () {
    Route::get('/bienvenue', [DashboardController::class, 'home'])->name('dashboard.home');
    Route::get('/bienvenue/{idp}', [DashboardController::class, 'show'])->name('dashboard.show');
    Route::get('/bienvenues/{idprojet}', [DashboardController::class, 'showProjet'])->name('dashboard.showProjet');
    Route::prefix('administration')->group(function () {
        Route::PATCH('module_update/{idmd}',[ModuleController::class,'update']);
        Route::post('rang_update',[ModuleController::class,'updaterang'])->name('rang.update');
        Route::get('module_edit/{idmd}',[ModuleController::class,'edit']);
        Route::resource('module', ModuleController::class);
        Route::resource('profil', ProfilController::class);
        Route::put('/user/{user}/reset-password/', [UserController::class, 'reset_password'])->name('user.reset_password');
        Route::resource('user', UserController::class);
        Route::PATCH('user_update/{idss}',[UserController::class,'update']);
        Route::get('user_edit/{idss}',[UserController::class,'edit']);

    });

    Route::prefix('gestion-ventes')->group(function () {
        Route::resource('client', ClientController::class);
        Route::get('/client/imprimer/facture/{client}', [ClientController::class, 'imprimeFacture'])->name('client.imprimeFacture');

        Route::resource('vente', VenteController::class);
        Route::post('/vente/ajouter-versement/{vente}', [VenteController::class, 'ajouterVersement'])->name('vente.ajouterVersement');
        Route::post('/vente/livrer/{vente}', [VenteController::class, 'livrer'])->name('vente.livrer');
        Route::get('/vente/imprimer/facture/{vente}', [VenteController::class, 'imprimeFacture'])->name('vente.imprimeFacture');
    });

    Route::prefix('gestion-stock')->group(function () {
        Route::resource('fournisseur', FournisseurController::class);
        Route::resource('approvisionnement', ApprovisionnementController::class);
    });

    Route::prefix('projets')->group(function () {
        Route::resource('indicateur_projet',IndicateurProjetController::class);
        Route::resource('cadre_resultat_projet',CadreResultatController::class);
        Route::resource('niveau_cadre_resultat',NiveauCadreResultatProjetController::class);
        Route::get('indicateur_projet_edit/{id}',[IndicateurProjetController::class,'edit']);
        Route::PATCH('indicateur_projet_update/{id}',[IndicateurProjetController::class,'update']);
        Route::get('cadre_resultat_projet_edit/{ids}',[CadreResultatController::class,'edit']);
        Route::PATCH('cadre_resultat_projet_update/{ids}',[CadreResultatController::class,'update']);
        Route::resource('plans_analytique',AnalytiqueController::class);
        Route::get('plans_analytique/{ids}',[AnalytiqueController::class,'edit']);
        Route::PATCH('plans_analytique/{ids}',[AnalytiqueController::class,'update']);
        Route::resource('niveaux_plan_analytique',NiveauAnalytiqueController::class);
        Route::get('niveaux_plan_analytique_edit/{ids}',[NiveauAnalytiqueController::class,'edit']);
        Route::PATCH('niveaux_plan_analytique_update/{ids}',[NiveauAnalytiqueController::class,'update']);
    });

    Route::prefix('parametrage')->group(function () {
     //   Route::resource('modules', ModulesController::class);
      //  Route::resource('profils', ProfileController::class);
      //  Route::put('/user/{user}/reset-password/', [UsersController::class, 'reset_password'])->name('user.reset_password');
      //  Route::resource('users', UsersController::class);
        Route::resource('produit', ProduitController::class);
        Route::resource('partenaire', PartenaireController::class);
        Route::resource('programme',ProgrammeController::class);
        Route::resource('projet',ProjetController::class);
        Route::resource('localite',LocaliteController::class);
        Route::resource('region',RegionController::class);
        Route::resource('departement',DepartementController::class);
        Route::resource('prefecture',SousPrefectureController::class);
        Route::resource('village',VillageController::class);
        Route::resource('fonction',FonctionController::class);
        Route::PATCH('fonc_update/{id}',[FonctionController::class,'update']);
        Route::get('fonc_edit/{id}',[FonctionController::class,'edit']);
        Route::resource('categorie',CategorieDepenseController::class);
        Route::PATCH('cat_update/{id}',[CategorieDepenseController::class,'update']);
        Route::get('cat_edit/{id}',[CategorieDepenseController::class,'edit']);
        Route::resource('unite',UniteIndicateurController::class);
        Route::PATCH('unit_update/{id}',[UniteIndicateurController::class,'update']);
        Route::get('unit_edit/{id}',[UniteIndicateurController::class,'edit']);
        Route::resource('thematique',ThematiqueController::class);
        Route::PATCH('thema_update/{id}',[ThematiqueController::class,'update']);
        Route::get('thema_edit/{id}',[ThematiqueController::class,'edit']);
        Route::resource('autres',AutreParametrageController::class);
        Route::resource('type',TypePartenaireController::class);
        Route::PATCH('part_update/{id}',[TypePartenaireController::class,'update']);
        Route::get('part_edit/{id}',[TypePartenaireController::class,'edit']);
        Route::resource('type_programme',TypeProgrammeController::class);
        Route::PATCH('prog_update/{id}',[TypeProgrammeController::class,'update']);
        Route::get('prog_edit/{id}',[TypeProgrammeController::class,'edit']);
        Route::resource('projet_user',ProjetUserController::class);
        Route::resource('niveaulocalite',NiveauLocaliteController::class);

        Route::get('localite_edit/{ids}',[LocaliteController::class,'edit']);
        Route::PATCH('localite_update/{ids}',[LocaliteController::class,'update']);

        Route::get('niveaulocalite_edit/{ids}',[NiveauLocaliteController::class,'edit']);
        Route::PATCH('niveaulocalite_update/{ids}',[NiveauLocaliteController::class,'update']);
        //Route::resource('plan_analytique',PlanAnalytiqueController::class);
        // Route::get('plan_analytique_edit/{ids}',[PlanAnalytiqueController::class,'edit']);
        // Route::PATCH('plan_analytique_update/{ids}',[PlanAnalytiqueController::class,'update']);
        // Route::resource('niveau_plan_analytique',NiveauPlanAnalytiqueController::class);
        Route::get('projet_edit/{ids}',[ProjetController::class,'edit']);
        Route::PATCH('projet_update/{ids}',[ProjetController::class,'update']);
        Route::get('programme_edit/{ids}',[ProgrammeController::class,'edit']);
        Route::PATCH('programme_update/{ids}',[ProgrammeController::class,'update']);
    });

        Route::prefix('cadre_resultat')->group(function () {
        Route::resource('cadre_logique',CadreLogiqueController::class);
        Route::resource('niveau_cadre_logique',NiveauCadreLogiqueController::class);
        Route::resource('type_cadre_logique',TypeCadreLogiqueController::class);
        Route::resource('indicateur_cs',IndicateurCSController::class);
       // Route::resource('indicateur_projet',IndicateurProjetController::class);
       // Route::resource('cadre_resultat_projet',CadreResultatController::class);
        Route::resource('niveau_cadre_resultat',NiveauCadreResultatProjetController::class);
       // Route::get('indicateur_projet_edit/{id}',[IndicateurProjetController::class,'edit']);
        //Route::PATCH('indicateur_projet_update/{id}',[IndicateurProjetController::class,'update']);
        Route::get('cadre_logique_edit/{ids}',[CadreLogiqueController::class,'edit']);
        Route::PATCH('cadre_logique_update/{ids}',[CadreLogiqueController::class,'update']);
      //  Route::get('cadre_resultat_projet_edit/{ids}',[CadreResultatController::class,'edit']);
     //   Route::PATCH('cadre_resultat_projet_update/{ids}',[CadreResultatController::class,'update']);
        Route::get('indicateur_cs_edit/{ids}',[IndicateurCSController::class,'edit']);
        Route::PATCH('indicateur_cs_update/{ids}',[IndicateurCSController::class,'update']);
        Route::resource('plan_analytique',PlanAnalytiqueController::class);
        Route::get('plan_analytique_edit/{ids}',[PlanAnalytiqueController::class,'edit']);
        Route::PATCH('plan_analytique_update/{ids}',[PlanAnalytiqueController::class,'update']);
        Route::resource('niveau_plan_analytique',NiveauPlanAnalytiqueController::class);

        Route::get('niveau_plan_analytique_edit/{ids}',[NiveauPlanAnalytiqueController::class,'edit']);
        Route::PATCH('niveau_plan_analytique_update/{ids}',[NiveauPlanAnalytiqueController::class,'update']);

        Route::get('niveau_cadre_logique_edit/{ids}',[NiveauCadreLogiqueController::class,'edit']);
        Route::PATCH('niveau_cadre_logique_update/{ids}',[NiveauCadreLogiqueController::class,'update']);

        Route::get('type_cadre_logique_edit/{ids}',[TypeCadreLogiqueController::class,'edit']);
        Route::PATCH('type_cadre_logique_update/{ids}',[TypeCadreLogiqueController::class,'update']);

        Route::get('niveau_cadre_resultat_edit/{ids}',[NiveauCadreResultatProjetController::class,'edit']);
        Route::PATCH('niveau_cadre_resultat_update/{ids}',[NiveauCadreResultatProjetController::class,'update']);

    });
    Route::prefix('programation')->group(function () {
        Route::resource('convention', ConventionController::class);
        Route::get('convention_edit/{ids}',[ConventionController::class,'edit']);
        Route::PATCH('convention_update/{ids}',[ConventionController::class,'update']);
        Route::resource('convention_resultat', ConventionResultatController::class);
        Route::get('convention_resultat_edit/{ids}',[ConventionResultatController::class,'edit']);
        Route::PATCH('convention_resultat_update/{ids}',[ConventionResultatController::class,'update']);
        Route::resource('type_activite', TypeActiviteController::class);
        Route::get('type_activite_edit/{ids}',[TypeActiviteController::class,'edit']);
        Route::PATCH('type_activite_update/{ids}',[TypeActiviteController::class,'update']);

        Route::resource('ptba_tache', PTBATacheController::class);
        Route::get('ptba_tache_edit/{ids}',[PTBATacheController::class,'edit']);
        Route::PATCH('ptba_tache_update/{ids}',[PTBATacheController::class,'update']);
        Route::PATCH('ptba_tache_planification_update/{ids}',[PTBATacheController::class,'update_planification']);
        Route::resource('convention_activite', ConventionActiviteController::class);
        Route::get('convention_activite_edit/{ids}',[ConventionActiviteController::class,'edit']);
        Route::PATCH('convention_activite_update/{ids}',[ConventionActiviteController::class,'update']);
        Route::resource('ptba', PTBAController::class);
        Route::get('ptba_edit/{ids}',[PTBAController::class,'edit']);
        Route::PATCH('ptba_update/{ids}',[PTBAController::class,'update']);

        Route::resource('ptba_indicateur', PTBAIndicateurController::class);
        Route::get('ptba_indicateur_edit/{ids}',[PTBAIndicateurController::class,'edit']);
        Route::PATCH('ptba_indicateur_update/{ids}',[PTBAIndicateurController::class,'update']);

        Route::resource('ptba_cout', PTBACoutController::class);
        Route::get('ptba_cout_edit/{ids}',[PTBACoutController::class,'edit']);
        Route::PATCH('ptba_cout_update/{ids}',[PTBACoutController::class,'update']);
        Route::resource('recommandation', RecommandationController::class);
        Route::get('recommandation_edit/{ids}',[RecommandationController::class,'edit']);
        Route::PATCH('recommandation_update/{ids}',[RecommandationController::class,'update']);

        Route::resource('recommandation_action', RecommandationActionController::class);
        Route::get('recommandation_action_edit/{ids}',[RecommandationActionController::class,'edit']);
        Route::PATCH('recommandation_action_update/{ids}',[RecommandationActionController::class,'update']);
      //  Route::post('ajouter-convention/{vente}', [ConventionController::class, 'ajouterConvention'])->name('convention.resultat');
    });

    Route::prefix('suivi_resultat')->group(function () {
        Route::resource('suivi_ptba', SuiviPRBAController::class);
        Route::get('suivi_ptba_edit/{ids}',[SuiviPRBAController::class,'edit']);
        Route::PATCH('suivi_ptba_update/{ids}',[SuiviPRBAController::class,'update']);

        Route::resource('resultat_attendu', ResultatAttenduController::class);
        Route::get('resultat_attendu_edit/{ids}',[ResultatAttenduController::class,'edit']);
        Route::PATCH('resultat_attendu_update/{ids}',[ResultatAttenduController::class,'update']);

        Route::resource('observation_ptba', ObservationPTBAController::class);
        Route::get('observation_ptba_edit/{ids}',[ObservationPTBAController::class,'edit']);
        Route::PATCH('observation_ptba_update/{ids}',[ObservationPTBAController::class,'update']);

        Route::resource('suivi_tache_ptba', SuiviTachePRBAController::class);
        Route::get('suivi_tache_ptba_edit/{ids}',[SuiviTachePRBAController::class,'edit']);
        Route::PATCH('suivi_tache_ptba_update/{ids}',[SuiviTachePRBAController::class,'update']);
        Route::put('modif',[SuiviTachePRBAController::class,'modifier'])->name('modifier');

        Route::resource('suivi_indicateur_ptba', SuiviIndicateurPRBAController::class);
        Route::get('suivi_indicateur_ptba_edit/{ids}',[SuiviIndicateurPRBAController::class,'edit']);
        Route::PATCH('suivi_indicateur_ptba_update/{ids}',[SuiviIndicateurPRBAController::class,'update']);

         Route::resource('suivi_indicateur_cs', SuiviIndicateurCSController::class);
        Route::get('suivi_indicateur_cs_edit/{ids}',[SuiviIndicateurCSController::class,'edit']);
        Route::get('suivi_indicateur_cs_suivi/{ids}',[SuiviIndicateurCSController::class,'suivi'])->name('suivi_indicateur_cs.CsSuivi');
        Route::PATCH('suivi_indicateur_cs_update/{ids}',[SuiviIndicateurCSController::class,'update']);

        Route::resource('suivi_indicateur_projet', SuiviIndicateurProjetController::class);
        Route::get('suivi_indicateur_projet_edit/{ids}',[SuiviIndicateurProjetController::class,'edit']);
        Route::get('suivi_indicateur_projet_suivi/{ids}',[SuiviIndicateurProjetController::class,'suivi'])->name('suivi_indicateur_projet.PSuivi');
        Route::PATCH('suivi_indicateur_projet_update/{ids}',[SuiviIndicateurProjetController::class,'update']);

        Route::resource('suivi_indicateur_pp', SuiviIndicateurPPController::class);
        Route::get('suivi_indicateur_pp_edit/{ids}',[SuiviIndicateurPPController::class,'edit']);
        Route::PATCH('suivi_indicateur_pp_update/{ids}',[SuiviIndicateurPPController::class,'update']);

        Route::resource('classeur', ClasseurController::class);
        Route::get('classeur_edit/{ids}',[ClasseurController::class,'edit']);
        Route::PATCH('classeur_update/{ids}',[ClasseurController::class,'update']);
        Route::post('storeData', [ClasseurController::class, 'storeData'])->name('storeData');
        Route::resource('feuille', FeuilleController::class);
        Route::get('feuille_edit/{ids}',[FeuilleController::class,'edit']);
        Route::PATCH('feuille_update/{ids}',[FeuilleController::class,'update']);
        Route::get('classeur_view/{ids}',[ClasseurController::class,'view'])->name('classeur.view');
        Route::delete('classeur/{id}/{table}',[ClasseurController::class,'supprimer'])->name('classeur.supprimer');
        Route::get('data_edition/{id}/{table}',[ClasseurController::class,'edition'])->name('classeur.edition');
        Route::PATCH('feuille_view/{ids}',[FeuilleController::class,'editFeuille'])->name('feuilles.update');
        Route::get('feuille_delete/{id}', [ClasseurController::class, 'supprimerFeuille'])->name('feuille_delete');
        Route::post('colonne_delete', [ClasseurController::class, 'supprimerColonne'])->name('colonne_delete');
        Route::post('colonne_update', [ClasseurController::class, 'modifierColonne'])->name('colonne_update');
        Route::post('add_colonne', [ClasseurController::class, 'addColumnsToTable'])->name('ajout_colonne');
        Route::PATCH('data_update/{id}/{table}',[ClasseurController::class,'modification'])->name('classeur.modification');

     });
     Route::prefix('etat_rapport')->group(function () {
        Route::resource('etat_ptba', EtatPTBAController::class);
        Route::resource('etat_suivi_resultat', EtatSuiviResultatController::class);
        Route::resource('rapport_indicateur', RapportIndicateurController::class);


     });

        Route::prefix('rapport_dynamique')->group(function () {
        Route::get('colonne_get/{id_c}', [rapport_dynamique::class, 'get_colonne']);
        Route::get('feuille_get/{id_f}', [rapport_dynamique::class, 'get_feuille']);
        Route::post('Add_rapport', [rapport_dynamique::class, 'addRapport'])->name('ajout_rapport');
        Route::get('view/{id}', [rapport_dynamique::class, 'show'])->name('info.rapport');
        Route::resource('rapport_dynamique', rapport_dynamique::class);
        // Route::resource('fichier', fichierController::class);
    });

     Route::prefix('documentation')->group(function () {
        Route::resource('dossier', DossierController::class);
        // Route::get('destroy', [DossierController::class, 'destroyfile'])->name('file.destroy');
        Route::PATCH('dossier_update/{id}',[DossierController::class,'update']);
        Route::get('dossier_edit/{id}',[DossierController::class,'edit']);
        Route::post('/create_dossier', [DossierController::class, 'store'])->name('create.dossier');
        Route::post('/create_fichier', [DossierController::class, 'add_fichier'])->name('create.fichier');
        Route::resource('fichier', fichierController::class);
        Route::PATCH('update_file/{id}',[fichierController::class,'updates']);
        Route::PATCH('fichier_update/{id}',[fichierController::class,'update']);
        Route::get('fichier_edit/{id}',[fichierController::class,'edit']);
        Route::resource('GroupeUser', GroupeUser::class);
        Route::get('/download/{filename}', [fichierController::class, 'download'])->name('download');
        Route::PATCH('grp_update/{id}',[GroupeUser::class,'update']);
        Route::get('grp_edit/{id}',[GroupeUser::class,'edit']);
        Route::resource('tache', tacheController::class);
        Route::PATCH('tache_update/{id}',[tacheController::class,'update']);
        Route::get('tache_edit/{id}',[tacheController::class,'edit']);

    });
    Route::resource('depense', DepenseController::class);
    Route::resource('rapport', RapportController::class);
});
// ADMINISTRATION ROUTES
