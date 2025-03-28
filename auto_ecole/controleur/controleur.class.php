<?php 
    require_once("modele/modele.class.php");
    class Controleur {
        private $unModele ;

        public function __construct(){
            $this->unModele = new Modele ();
        }


        public function verifConnexion($email, $mdp){
            return $this->unModele->verifConnexion($email, $mdp);
        }

        /*public function selectAllUsers(){
            return $this->unModele->selectAllUsers(); 
		}*/
        public function selectWhereUsers($iduser){
            return $this->unModele->selectWhereUsers($iduser);
        }
        public function updateUser($tab){
            $this->unModele->updateUser($tab);
        }/**/
        
        

        public function selectAllMoniteurs(){
            return $this->unModele->selectAllMoniteurs();
        }

        public function searchAllMoniteurs ($filtre){
            return $this->unModele->searchAllMoniteurs ($filtre);
        }

        public function insertMoniteur ($tab){
            $this->unModele->insertMoniteur ($tab);
        }

        public function deleteMoniteur ($idmoniteur){
            $this->unModele->deleteMoniteur ($idmoniteur);
        }

        public function selectWhereMoniteurs($idmoniteur){
            return $this->unModele->selectWhereMoniteurs($idmoniteur);
        }

        public function updateMoniteur($tab){
            $this->unModele->updateMoniteur($tab);
        }

        public function countMoniteurs(){
            return $this->unModele->countMoniteurs();
        }  

        /******************* Gestion des candidats **************************/
        public function selectAllCandidats(){
			return $this->unModele->selectAllCandidats();  
		}

		public function searchAllCandidats($filtre){
			return $this->unModele->searchAllCandidats ($filtre); 
		}

		public function insertCandidat ($tab){
			$this->unModele->insertCandidat ($tab);
		}

		public function deleteCandidats ($idcandidat){
			$this->unModele->deleteCandidats ($idcandidat);
		}

        public function selectWhereCandidats($idcandidat){
            return $this->unModele->selectWhereCandidats($idcandidat);
        }

        public function updateCandidat($tab){
            $this->unModele->updateCandidat($tab);
        }

        public function countCandidats(){
            return $this->unModele->countCandidats();
        }

        /******************* Gestion des cours **************************/
        public function selectAllLecons(){
			return $this->unModele->selectAllLecons(); 
		}

		public function searchAllLecons($filtre){
			return $this->unModele->searchAllLecons($filtre); 
		}

        public function insertLecon ($tab){
			$this->unModele->insertLecon ($tab);
		}
        
        public function deleteLecon ($idlecon){
			$this->unModele->deleteLecon ($idlecon); 
		}

        public function selectWhereLecons($idlecon){
            return $this->unModele->selectWhereLecons($idlecon);
        }

        public function updateLecon($tab){
            $this->unModele->updateLecon($tab); 
        }

        public function countLecons(){
            return $this->unModele->countLecons();
        }

        /******************* Gestion des vehicule **************************/
        public function selectAllVehicules(){
			return $this->unModele->selectAllVehicules();  
		}

		public function searchAllVehicules($filtre){
			return $this->unModele->searchAllVehicules($filtre);   
		}

        public function insertVehicule ($tab){
			$this->unModele->insertVehicule ($tab);
		}
		public function deleteVehicule ($idvehicule){
			$this->unModele->deleteVehicule ($idvehicule); 
		}

        public function selectWhereVehicules($idvehicule){
            return $this->unModele->selectWhereVehicules($idvehicule);
        }

        public function updateVehicule($tab){
            $this->unModele->updateVehicule($tab); 
        }

        public function countVehicules(){
            return $this->unModele->countVehicules();
        }

        /******************* Gestion des examens **************************/
        public function selectAllExamens(){
			return $this->unModele->selectAllExamens();  
		}

		public function searchAllExamens($filtre){
			return $this->unModele->searchAllExamens($filtre);   
		}

        public function insertExamen ($tab){
			$this->unModele->insertExamen ($tab);
		}
		public function deleteExamen ($idexamen){
			$this->unModele->deleteExamen ($idexamen);
		}

        public function selectWhereExamens($idexamen){
            return $this->unModele->selectWhereExamens($idexamen);
        }

        public function updateExamen($tab){
            $this->unModele->updateExamen($tab); 
        }

        public function countExamens(){
            return $this->unModele->countExamens();
        }

        /******************* Gestion des plannings **************************/
        public function selectAllPlannings(){
			return $this->unModele->selectAllPlannings();
		}

		public function searchAllPlannings($filtre){
			return $this->unModele->searchAllPlannings($filtre);
		}

        public function insertPlanning ($tab){
			$this->unModele->insertPlanning($tab);
		}
		public function deletePlanning ($idplanning){
			$this->unModele->deletePlanning($idplanning);
		}

        public function selectWherePlannings($idplanning){
            return $this->unModele->selectWherePlannings($idplanning);
        }

        public function updatePlanning($tab){
            $this->unModele->updatePlanning($tab);
        }

        public function countPlannings(){
            return $this->unModele->countPlannings();
        }

    }
?>