<?php 
    class Modele {
        private $unPDO ;
        
        public function __construct(){
            try{
                $this->unPDO = new PDO('mysql:host=localhost;dbname=auto_ecole_24', 'root', '');
            }
            catch(PDOException $exp)
            {
                echo"Erreur connexion :".$exp->getMessage();
            }
        }
 

        public function verifConnexion ($email, $mdp){
            //$requete = "select * from moniteur where email = :email and mdp = :mdp ;";
            $requete = "select * from USER where EMAIL = :EMAIL and MDP = :MDP ;";
            $donnees = array(":EMAIL"=>$email,":MDP"=>$mdp);
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
            $unUser = $select->fetch();
            return $unUser;
        }


        
        /*public function selectAllUsers(){
			$requete ="select * from USER ;" ;
			$select = $this->unPDO->prepare ($requete); 
			$select->execute (); 
			return $select->fetchAll();  
		}*/
        public function insertUser($tab) {
            // Vérifier si un fichier a été téléchargé
            if(isset($_FILES['PHOTO'])) {
                if(!empty($tab['NOM'])) {
                    if(!empty($tab['PRENOM'])) {
                        if(!empty($tab['EMAIL'])) {
                            if(!empty($tab['MDP'])) {
                                if(!empty($tab['MDP2'])) {
                                    if(($tab['MDP'])===($tab['MDP2'])) {
                                        $img_moniteur = $_FILES['PHOTO']['name']; // Nom de l'image téléchargée
                                        $img_tmp_path = $_FILES['PHOTO']['tmp_name']; // Chemin temporaire de l'image téléchargée
                                        $img_destination = "imgsql/" . $img_moniteur; // Chemin de destination où l'image sera sauvegardée
                                    
                                        // Déplacer l'image téléchargée vers le dossier de destination
                                        if(move_uploaded_file($img_tmp_path, $img_destination)) {
                                            // Requête d'insertion avec des paramètres nommés
                                            $requete = "INSERT INTO USER VALUES (NULL, :PHOTO, :NOM, :PRENOM, :EMAIL, :MDP, :type_user, :NUMERO_TELEPHONE)";
                                            // Données à insérer dans la base de données
                                            $donnees = array(
                                                ":PHOTO" => $img_destination,
                                                ":NOM" => $tab['NOM'],
                                                ":PRENOM" => $tab['PRENOM'],
                                                ":EMAIL" => $tab['EMAIL'],
                                                ":MDP" => $tab['MDP'],
                                                ":type_user" => $tab['type_user'],
                                                ":NUMERO_TELEPHONE" => $tab['NUMERO_TELEPHONE']
                                            );
                                            // Préparation de la requête
                                            $select = $this->unPDO->prepare($requete);
                                            // Exécution de la requête avec les données fournies
                                            if($select->execute($donnees)) {
                                                echo "Moniteur inséré avec succès.";
                                            } else {
                                                echo "Erreur lors de l'insertion du moniteur.";
                                            }
                                        } else { echo "Erreur lors du téléchargement de l'image.";}
                                    } else { echo "Les 2 champ MDP doit etre identique.";}
                                } else { echo "Veuillez retapez le MDP SVP.";}
                            } else { echo "Le champ MDP est vide ou non défini.";}
                        } else { echo "Le champ EMAIL est vide ou non défini.";}
                    } else { echo "Le champ PRENOM est vide ou non défini.";}
                } else {echo "Le champ NOM est vide ou non défini.";}
            } else {echo "Le champ PHOTO est vide ou non défini.";}
        }
        public function selectWhereUsers($iduser){
            $requete="select * from USER where IDUSER=:IDUSER;";
            $donnees =array(":IDUSER"=>$iduser);
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
            $UnUser = $select->fetch();
            return $UnUser;
        }/**/
        public function updateUser($tab){
            $img_vehicule = $_FILES['PHOTO']['name']; // Nom de l'image téléchargée
                $img_tmp_path = $_FILES['PHOTO']['tmp_name']; // Chemin temporaire de l'image téléchargée
                $img_destination = "imgsql/". $img_vehicule; // Chemin de destination où l'image sera sauvegardée
        
                // Déplacer l'image téléchargée vers le dossier de destination
                move_uploaded_file($img_tmp_path, $img_destination);
            $requete ="update USER set PHOTO=:PHOTO, NOM=:NOM, PRENOM=:PRENOM, EMAIL=:EMAIL, MDP=:MDP, type_user=:type_user, NUMERO_TELEPHONE=:NUMERO_TELEPHONE where IDUSER=:IDUSER;" ;
            $donnees=array(
                            ":PHOTO" => $img_destination,
                            ":NOM"=>$tab['NOM'], 
                            ":PRENOM"=>$tab['PRENOM'], 
                            ":EMAIL"=>$tab['EMAIL'],
                            ":MDP"=>$tab['MDP'],
                            ":type_user"=>$tab['type_user'], 
                            ":NUMERO_TELEPHONE"=>$tab['NUMERO_TELEPHONE'],
                            ":IDUSER"=>$tab['IDUSER']
            );
            $select = $this->unPDO->prepare ($requete); 
            $select->execute ($donnees); 
        }/**/
        /******************* Gestion des moniteurs **************************/
        public function selectAllMoniteurs(){
			$requete ="select * from MONITEUR ;" ;
			$select = $this->unPDO->prepare ($requete); 
			$select->execute (); 
			return $select->fetchAll();  
		}

		public function searchAllMoniteurs($filtre){
			$requete ="select * from MONITEUR 
            where NOM like :filtre or PRENOM like :filtre or EMAIL like :filtre or MDP like :filtre or type_user like :filtre or NUMERO_TELEPHONE like :filtre  ; " ;
			$donnees=array(":filtre"=> "%".$filtre."%");
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
			return $select->fetchAll();  
		}

        public function insertMoniteur($tab) {
            // Vérifier si un fichier a été téléchargé
            if(isset($_FILES['PHOTO'])) {
                if(!empty($tab['NOM'])) {
                    if(!empty($tab['PRENOM'])) {
                        if(!empty($tab['EMAIL'])) {
                            if(!empty($tab['MDP'])) {
                                if(!empty($tab['MDP2'])) {
                                    if(($tab['MDP'])===($tab['MDP2'])) {
                                        $img_moniteur = $_FILES['PHOTO']['name']; // Nom de l'image téléchargée
                                        $img_tmp_path = $_FILES['PHOTO']['tmp_name']; // Chemin temporaire de l'image téléchargée
                                        $img_destination = "imgsql/" . $img_moniteur; // Chemin de destination où l'image sera sauvegardée
                                    
                                        // Déplacer l'image téléchargée vers le dossier de destination
                                        if(move_uploaded_file($img_tmp_path, $img_destination)) {
                                            // Requête d'insertion avec des paramètres nommés
                                            $requete = "INSERT INTO MONITEUR VALUES (NULL, :PHOTO, :NOM, :PRENOM, :EMAIL, :MDP, :type_user, :NUMERO_TELEPHONE)";
                                            // Données à insérer dans la base de données
                                            $donnees = array(
                                                ":PHOTO" => $img_destination,
                                                ":NOM" => $tab['NOM'],
                                                ":PRENOM" => $tab['PRENOM'],
                                                ":EMAIL" => $tab['EMAIL'],
                                                ":MDP" => $tab['MDP'],
                                                ":type_user" => $tab['type_user'],
                                                ":NUMERO_TELEPHONE" => $tab['NUMERO_TELEPHONE']
                                            );
                                            // Préparation de la requête
                                            $select = $this->unPDO->prepare($requete);
                                            // Exécution de la requête avec les données fournies
                                            if($select->execute($donnees)) {
                                                echo "Moniteur inséré avec succès.";
                                            } else {
                                                echo "Erreur lors de l'insertion du moniteur.";
                                            }
                                        } else { echo "Erreur lors du téléchargement de l'image.";}
                                    } else { echo "Les 2 champ MDP doit etre identique.";}
                                } else { echo "Veuillez retapez le MDP SVP.";}
                            } else { echo "Le champ MDP est vide ou non défini.";}
                        } else { echo "Le champ EMAIL est vide ou non défini.";}
                    } else { echo "Le champ PRENOM est vide ou non défini.";}
                } else {echo "Le champ NOM est vide ou non défini.";}
            } else {echo "Le champ PHOTO est vide ou non défini.";}
        }
        
        
        

		public function deleteMoniteur ($idmoniteur){
			$requete ="delete from MONITEUR where IDUSER = :IDUSER ; " ;
			$donnees =array(":IDUSER"=>$idmoniteur);
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
		}

        public function selectWhereMoniteurs($idmoniteur){
            $requete="select * from MONITEUR where IDUSER=:IDUSER;";
            $donnees =array(":IDUSER"=>$idmoniteur);
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
            $UnMoniteur = $select->fetch();
            return $UnMoniteur;
        }

        public function updateMoniteur($tab){
            $img_vehicule = $_FILES['PHOTO']['name']; // Nom de l'image téléchargée
                $img_tmp_path = $_FILES['PHOTO']['tmp_name']; // Chemin temporaire de l'image téléchargée
                $img_destination = "imgsql/". $img_vehicule; // Chemin de destination où l'image sera sauvegardée
        
                // Déplacer l'image téléchargée vers le dossier de destination
                move_uploaded_file($img_tmp_path, $img_destination);

            $requete ="update MONITEUR set PHOTO=:PHOTO, NOM=:NOM, PRENOM=:PRENOM, EMAIL=:EMAIL, MDP=:MDP, type_user=:type_user, NUMERO_TELEPHONE=:NUMERO_TELEPHONE where IDUSER=:IDUSER;" ;
            $donnees=array(
                            ":PHOTO" => $img_destination,
                            ":NOM"=>$tab['NOM'], 
                            ":PRENOM"=>$tab['PRENOM'], 
                            ":EMAIL"=>$tab['EMAIL'],
                            ":MDP"=>$tab['MDP'],
                            ":type_user"=>$tab['type_user'], 
                            ":NUMERO_TELEPHONE"=>$tab['NUMERO_TELEPHONE'],
                            ":IDUSER"=>$tab['IDUSER']
            );
            $select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
        }

        public function countMoniteurs(){
            $requete="select count(*) as nb from MONITEUR ;";
            $select=$this->unPDO->prepare($requete);
            $select->execute ();
            return $select->fetch();
        }

        /******************* Gestion des candidats **************************/
        public function selectAllCandidats(){
			$requete ="select * from candidat ;" ;
			$select = $this->unPDO->prepare ($requete); 
			$select->execute (); 
			return $select->fetchAll();  
		}

		public function searchAllCandidats($filtre){
			$requete ="select * from candidat 
					where NOM like :filtre or PRENOM like :filtre or EMAIL like :filtre or MDP like :filtre or type_user like :filtre or NUMERO_TELEPHONE like :filtre  ; " ;
			$donnees=array(":filtre"=> "%".$filtre."%");
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
			return $select->fetchAll();  
		}

		public function insertCandidat($tab) {
            // Vérifier si un fichier a été téléchargé
            if(isset($_FILES['PHOTO'])) {
                if(!empty($tab['NOM'])) {
                    if(!empty($tab['PRENOM'])) {
                        if(!empty($tab['EMAIL'])) {
                            if(!empty($tab['MDP'])) {
                                if(!empty($tab['MDP2'])) {
                                    if(($tab['MDP'])===($tab['MDP2'])) {
                                        $img_candidat = $_FILES['PHOTO']['name']; // Nom de l'image téléchargée
                                        $img_tmp_path = $_FILES['PHOTO']['tmp_name']; // Chemin temporaire de l'image téléchargée
                                        $img_destination = "images/imgsql/" . $img_candidat; // Chemin de destination où l'image sera sauvegardée
                                        
                                        // Déplacer l'image téléchargée vers le dossier de destination
                                        if(move_uploaded_file($img_tmp_path, $img_destination)) {
                                            // Requête d'insertion avec des paramètres nommés
                                            $requete = "INSERT INTO CANDIDAT (PHOTO, NOM, PRENOM, EMAIL, MDP, type_user, NUMERO_TELEPHONE) VALUES (:PHOTO, :NOM, :PRENOM, :EMAIL, :MDP, :type_user, :NUMERO_TELEPHONE)";
                                            // Données à insérer dans la base de données
                                            $donnees = array(
                                                ":PHOTO" => $img_destination,
                                                ":NOM" => $tab['NOM'],
                                                ":PRENOM" => $tab['PRENOM'],
                                                ":EMAIL" => $tab['EMAIL'],
                                                ":MDP" => $tab['MDP'],
                                                ":type_user" => $tab['type_user'],
                                                ":NUMERO_TELEPHONE" => $tab['NUMERO_TELEPHONE']
                                            );
                                            // Préparation de la requête
                                            $select = $this->unPDO->prepare($requete);
                                            // Exécution de la requête avec les données fournies
                                            if($select->execute($donnees)) {
                                                echo "Candidat inséré avec succès.";
                                            } else {
                                                echo "Erreur lors de l'insertion du candidat.";
                                            }
                                        } else {echo "Erreur lors du téléchargement de l'image.";}
                                    } else { echo "Les 2 champ MDP doit etre identique.";}
                                } else { echo "Veuillez retapez le MDP SVP.";}
                            } else { echo "Le champ MDP est vide ou non défini.";}
                        } else { echo "Le champ EMAIL est vide ou non défini.";}
                    } else { echo "Le champ PRENOM est vide ou non défini.";}
                } else {echo "Le champ NOM est vide ou non défini.";}
            } else {echo "Le champ PHOTO est vide ou non défini.";}
        }
        
        
        

		public function deleteCandidats ($idcandidat){
			$requete ="delete from CANDIDAT where IDUSER = :IDUSER ; " ;
			$donnees =array(":IDUSER"=>$idcandidat);
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
		}

        public function selectWhereCandidats($idcandidat){
            $requete="select * from CANDIDAT where IDUSER=:IDUSER;";
            $donnees =array(":IDUSER"=>$idcandidat);
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
            $UnCandidat = $select->fetch();
            return $UnCandidat;
        }

        public function updateCandidat($tab){
            $img_vehicule = $_FILES['PHOTO']['name']; // Nom de l'image téléchargée
                $img_tmp_path = $_FILES['PHOTO']['tmp_name']; // Chemin temporaire de l'image téléchargée
                $img_destination = "imgsql/". $img_vehicule; // Chemin de destination où l'image sera sauvegardée
        
                // Déplacer l'image téléchargée vers le dossier de destination
                move_uploaded_file($img_tmp_path, $img_destination);

            $requete ="update CANDIDAT set PHOTO=:PHOTO, NOM=:NOM, PRENOM=:PRENOM, EMAIL=:EMAIL, MDP=:MDP, type_user=:type_user, NUMERO_TELEPHONE=:NUMERO_TELEPHONE where IDUSER=:IDUSER;" ;
            $donnees=array(
                ":PHOTO" => $img_destination,
                ":NOM"=>$tab['NOM'], 
                ":PRENOM"=>$tab['PRENOM'], 
                ":EMAIL"=>$tab['EMAIL'],
                ":MDP"=>$tab['MDP'],
                ":type_user"=>$tab['type_user'], 
                ":NUMERO_TELEPHONE"=>$tab['NUMERO_TELEPHONE'],
                ":IDUSER"=>$tab['IDUSER']
            );
            $select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
        }

        public function countCandidats(){
            $requete="select count(*) as nb from CANDIDAT ;";
            $select=$this->unPDO->prepare($requete);
            $select->execute ();
            return $select->fetch();
        }

        /******************* Gestion des cours **************************/
        public function selectAllLecons(){
			$requete ="select * from LECONS ;" ;
			$select = $this->unPDO->prepare ($requete); 
			$select->execute (); 
			return $select->fetchAll();  
		}

		public function searchAllLecons($filtre){
            $requete = "SELECT * FROM LECONS 
                        WHERE TYPE_DE_LECON LIKE :filtre 
                        OR DESCRIPTION LIKE :filtre 
                        OR TITRE LIKE :filtre";
            $donnees = array(":filtre" => "%" . $filtre . "%");
            $select = $this->unPDO->prepare($requete); 
            $select->execute($donnees); 
            return $select->fetchAll();  
        }
        

        public function insertLecon ($tab){
            $requete ="INSERT INTO LECONS VALUES (NULL, :TYPE_DE_LECON, :DESCRIPTION, :TITRE);" ;
            $donnees =array(
                ":TYPE_DE_LECON" => $tab['TYPE_DE_LECON'],
                ":DESCRIPTION" => $tab['DESCRIPTION'],
                ":TITRE" => $tab['TITRE']
            );
            $select = $this->unPDO->prepare ($requete); 
            $select->execute ($donnees); 
        }
        
		public function deleteLecon ($idlecon){
			$requete ="delete from LECONS where IDLECON = :IDLECON ; " ;
			$donnees =array(":IDLECON"=>$idlecon);
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
		}

        public function selectWhereLecons($idlecon){
            $requete="select * from LECONS where IDLECON=:IDLECON;";
            $donnees =array(":IDLECON"=>$idlecon);
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
            $UneLecon = $select->fetch();
            return $UneLecon;
        }

        public function updateLecon($tab){
            $requete ="update LECONS set TYPE_DE_LECON =:TYPE_DE_LECON , DESCRIPTION=:DESCRIPTION, TITRE=:TITRE where IDLECON=:IDLECON;" ;
            $donnees=array(
                            ":TYPE_DE_LECON"=>$tab['TYPE_DE_LECON'], 
                            ":DESCRIPTION"=>$tab['DESCRIPTION'], 
                            ":TITRE"=>$tab['TITRE'],
                            ":IDLECON"=>$tab['IDLECON']
            );
            $select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
        }

        public function countLecons(){
            $requete="select count(*) as nb from LECONS ;";
            $select=$this->unPDO->prepare($requete);
            $select->execute ();
            return $select->fetch();
        }

        /******************* Gestion des vehicule **************************/
        public function selectAllVehicules(){
			$requete ="select * from VEHICULE;" ;
			$select = $this->unPDO->prepare ($requete); 
			$select->execute (); 
			return $select->fetchAll();  
		}

		public function searchAllVehicules($filtre){
			$requete ="select * from VEHICULE 
					where MARQUE like :filtre or MODELE like :filtre or IMMATRICULATION like :filtre  ; " ;
			$donnees=array(":filtre"=> "%".$filtre."%");
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
			return $select->fetchAll();  
		}

        public function insertVehicule($tab){
            if(isset($_FILES['IMGVEHICULE'])) {
                $img_vehicule = $_FILES['IMGVEHICULE']['name']; // Nom de l'image téléchargée
                $img_tmp_path = $_FILES['IMGVEHICULE']['tmp_name']; // Chemin temporaire de l'image téléchargée
                $img_destination = "imgsql/". $img_vehicule; // Chemin de destination où l'image sera sauvegardée
        
                // Déplacer l'image téléchargée vers le dossier de destination
                move_uploaded_file($img_tmp_path, $img_destination);
        
                // Insérer les données dans la base de données
                $requete = "INSERT INTO VEHICULE (IMGVEHICULE, MARQUE, MODELE, IMMATRICULATION) VALUES (:IMGVEHICULE, :MARQUE, :MODELE, :IMMATRICULATION)";
                $donnees = array(
                    ":IMGVEHICULE" => $img_destination, // Chemin de l'image dans le serveur
                    ":MARQUE" => $tab['MARQUE'],
                    ":MODELE" => $tab['MODELE'],
                    ":IMMATRICULATION" => $tab['IMMATRICULATION']
                );
                $select = $this->unPDO->prepare($requete); 
                $select->execute($donnees); 
            } else {
                echo "Le champ IMGVEHICULE est vide ou non défini.";
            }
        }
        
        
		public function deleteVehicule ($idvehicule){
			$requete ="delete from VEHICULE where IDVEHICULE = :IDVEHICULE ; " ;
			$donnees =array(":IDVEHICULE"=>$idvehicule);
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
		}

        public function selectWhereVehicules($idvehicule){
            $requete="select * from VEHICULE where IDVEHICULE=:IDVEHICULE;";
            $donnees =array(":IDVEHICULE"=>$idvehicule);
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
            $UnVehicule = $select->fetch();
            return $UnVehicule;
        }

        public function updateVehicule($tab){
            $img_vehicule = $_FILES['IMGVEHICULE']['name']; // Nom de l'image téléchargée
                $img_tmp_path = $_FILES['IMGVEHICULE']['tmp_name']; // Chemin temporaire de l'image téléchargée
                $img_destination = "imgsql/". $img_vehicule; // Chemin de destination où l'image sera sauvegardée
        
                // Déplacer l'image téléchargée vers le dossier de destination
                move_uploaded_file($img_tmp_path, $img_destination);

            $requete ="update VEHICULE set IMGVEHICULE=:IMGVEHICULE, MARQUE =:MARQUE , MODELE=:MODELE, IMMATRICULATION=:IMMATRICULATION where IDVEHICULE=:IDVEHICULE;" ;
            $donnees=array(
                            ":IMGVEHICULE" => $img_destination, // Chemin de l'image dans le serveur
                            ":MARQUE"=>$tab['MARQUE'], 
                            ":MODELE"=>$tab['MODELE'], 
                            ":IMMATRICULATION"=>$tab['IMMATRICULATION'],
                            ":IDVEHICULE"=>$tab['IDVEHICULE']
            );
            $select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
        }

        public function countVehicules(){
            $requete="select count(*) as nb from VEHICULE ;";
            $select=$this->unPDO->prepare($requete);
            $select->execute ();
            return $select->fetch();
        }

        /******************* Gestion des examens **************************/
        public function selectAllExamens(){
			$requete ="select * from EXAMENS;" ;
			$select = $this->unPDO->prepare ($requete); 
			$select->execute (); 
			return $select->fetchAll();  
		}

		public function searchAllExamens($filtre){
			$requete ="select * from EXAMENS 
					where DATE_ET_HEURE_D_EXAMEN like :filtre or VEHICULE like :filtre or TYPE_DE_PERMIS like :filtre ; " ;
			$donnees=array(":filtre"=> "%".$filtre."%");
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
			return $select->fetchAll();  
		}

        public function insertExamen ($tab){
            $requete = "INSERT INTO EXAMENS (DATE_ET_HEURE_D_EXAMEN, VEHICULE, TYPE_DE_PERMIS) VALUES (:DATE_ET_HEURE_D_EXAMEN, :VEHICULE, :TYPE_DE_PERMIS)";
            $donnees = array(
                ":DATE_ET_HEURE_D_EXAMEN" => $tab['DATE_ET_HEURE_D_EXAMEN'],
                ":VEHICULE" => $tab['VEHICULE'],
                ":TYPE_DE_PERMIS" => $tab['TYPE_DE_PERMIS']
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
        }
		public function deleteExamen ($idexamen){
			$requete ="delete from EXAMENS where IDEXAMEN = :IDEXAMEN ; " ;
			$donnees =array(":IDEXAMEN"=>$idexamen);
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
		}

        public function selectWhereExamens($idexamen){
            $requete="select * from EXAMENS where IDEXAMEN=:IDEXAMEN;";
            $donnees =array(":IDEXAMEN"=>$idexamen);
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
            $UnExamen = $select->fetch();
            return $UnExamen;
        }

        public function updateExamen($tab){
            $requete ="update EXAMENS set DATE_ET_HEURE_D_EXAMEN =:DATE_ET_HEURE_D_EXAMEN , VEHICULE=:VEHICULE, TYPE_DE_PERMIS=:TYPE_DE_PERMIS where IDEXAMEN=:IDEXAMEN;" ;
            $donnees=array(
                            ":DATE_ET_HEURE_D_EXAMEN"=>$tab['DATE_ET_HEURE_D_EXAMEN'], 
                            ":VEHICULE"=>$tab['VEHICULE'], 
                            ":TYPE_DE_PERMIS"=>$tab['TYPE_DE_PERMIS'],
                            ":IDEXAMEN"=>$tab['IDEXAMEN']
            );
            $select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
        }

        public function countExamens(){
            $requete="select count(*) as nb from EXAMENS ;";
            $select=$this->unPDO->prepare($requete);
            $select->execute ();
            return $select->fetch();
        }
        /******************* Gestion des plannings **************************/
        public function selectAllPlannings(){
			$requete ="select * from PLANNINGS;" ;
			$select = $this->unPDO->prepare ($requete); 
			$select->execute (); 
			return $select->fetchAll();  
		}

		public function searchAllPlannings($filtre){
			$requete ="select * from PLANNINGS 
					where IDLECON like :filtre or IDUSER_1 like :filtre or DATEHEURDEBUR like :filtre or IDUSER_2 like :filtre or DATEFINHEUR like :filtre or ETAT like :filtre  ; " ;
			$donnees=array(":filtre"=> "%".$filtre."%");
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
			return $select->fetchAll();  
		}

        public function insertPlanning($tab){
            $requete = "INSERT INTO PLANNINGS (IDLECON, IDUSER_1, DATEHEURDEBUR, IDUSER_2, DATEFINHEUR, ETAT) VALUES (:IDLECON, :IDUSER_1, :DATEHEURDEBUR, :IDUSER_2, :DATEFINHEUR, :ETAT)";
            $donnees = array(
                ":IDLECON" => $tab['IDLECON'],
                ":IDUSER_1" => $tab['IDUSER_1'],
                ":DATEHEURDEBUR" => $tab['DATEHEURDEBUR'],
                ":IDUSER_2" => $tab['IDUSER_2'],
                ":DATEFINHEUR" => $tab['DATEFINHEUR'],
                ":ETAT" => $tab['ETAT']
            );
            $select = $this->unPDO->prepare($requete);
            $select->execute($donnees);
        }
        
        
		public function deletePlanning ($idplanning){
			$requete ="delete from PLANNINGS where IDPLANNING = :IDPLANNING ; " ;
			$donnees =array(":IDPLANNING"=>$idplanning);
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
		}

        public function selectWherePlannings($idplanning){
            $requete="select * from PLANNINGS where IDPLANNING=:IDPLANNING;";
            $donnees =array(":IDPLANNING"=>$idplanning);
			$select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
            $UnPlanning = $select->fetch();
            return $UnPlanning;
        }

        public function updatePlanning($tab){
            $requete ="update PLANNINGS set IDLECON =:IDLECON , IDUSER_1=:IDUSER_1, DATEHEURDEBUR=:DATEHEURDEBUR, IDUSER_2=:IDUSER_2, DATEFINHEUR=:DATEFINHEUR, ETAT=:ETAT where IDPLANNING=:IDPLANNING;" ;
            $donnees=array(
                ":IDLECON" => $tab['IDLECON'],
                ":IDUSER_1" => $tab['IDUSER_1'],
                ":DATEHEURDEBUR" => $tab['DATEHEURDEBUR'],
                ":IDUSER_2" => $tab['IDUSER_2'],
                ":DATEFINHEUR" => $tab['DATEFINHEUR'],
                ":ETAT" => $tab['ETAT'],
                ":IDPLANNING" => $tab['IDPLANNING']
            );
            $select = $this->unPDO->prepare ($requete); 
			$select->execute ($donnees); 
        }

        public function countPlannings(){
            $requete="select count(*) as nb from PLANNINGS ;";
            $select=$this->unPDO->prepare($requete);
            $select->execute ();
            return $select->fetch();
        }

    }
?>