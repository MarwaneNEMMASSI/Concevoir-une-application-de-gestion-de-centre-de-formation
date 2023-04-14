// Afficher toutes les sessions qui ne se chevauchent pas avec une session donnèe
SELECT * FROM `session` WHERE Date_debut>= (SELECT Date_fin FROM `session` WHERE ID_session = 4) OR Date_fin <= (SELECT Date_debut FROM `session` WHERE ID_session = 4)


//Afficher les sessions de formation à venir avec des places encore disponibles
SELECT * FROM `session` WHERE Etat = "en cours d'inscri" AND Nbr_places_max < 30


//Afficher le nombre des inscrits par session de formation
SELECT Count(*) FROM `apprenant_session` WHERE ID_session = 2;


//Afficher l'historique des sessions de formation d'un apprenant donné
SELECT * FROM `session` WHERE ID_session = (SELECT ID_session FROM `apprenant_session` WHERE ID_apprenant = 1);



//Afficher la liste des sessions qui sont affectées à un formateur donné, triées par date de début
SELECT * FROM `session` WHERE ID_formateur = 2 ORDER BY Date_debut


//Afficher la liste des apprenants d'une session donnée d'un formateur donné


//Afficher lhistorique des sessions de formation dun formateur donné
SELECT * FROM `session` WHERE ID_formateur = 2


//Afficher les formateurs qui sont disponibles entre 2 dates



//Afficher toutes les sessions d\une formation donnée
SELECT * FROM `session` WHERE ID_formation = 1




//Afficher le nombre total des sessions par cétegorie de formation
SELECT Count(*) FROM `session` WHERE ID_formation IN (SELECT ID_formation FROM `formation` WHERE Categorie = "Bureautique");




//Afficher le nombre total des inscrits par catégorie formation
SELECT Count(*) FROM `apprenant_session` WHERE ID_session IN (SELECT ID_session FROM `session` WHERE ID_formation IN (SELECT ID_formation FROM `formation` WHERE Categorie = "Bureautique"));

