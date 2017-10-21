<?php  

	class User{
		private $id_user;
		private $nom_user;
		private $prenom_user;
		private $datenaissance_user;
		private $email_user;
		private $login_user;
		private $password_user;
		private $statut_user;

		public function __construct($id_user, $nom_user, $prenom_user, $datenaissance_user, $email_user, $login_user, $password_user, $statut_user){
			$this->id_user = $id_user;
			$this->nom_user = $nom_user; 
			$this->prenom_user = $prenom_user;
			$this->datenaissance_user = $datenaissance_user;
			$this->email_user = $email_user;
			$this->login_user = $login_user;
			$this->password_user =$password_user;
			$this->statut_user = $statut_user;
		}

		public function getIdUser(){
			return $this->id_user;
		}

		public function getNomUser(){
			return $this->nom_user;
		}

		public function getPrenomUser(){
			return $this->prenom_user;
		}

		public function getDateNaissanceUser(){
			return $this->datenaissance_user;
		}

		public function getEmailUser(){
			return $this->email_user;
		}

		public function getLoginUser(){
			return $this->login_user;
		}

		public function getPasswordUser(){
			return $this->password_user;
		}

		public function getStatutUser(){
			return $this->statut_user;
		}


		public function setIdUser($id_user){
			$this->id_user = $id_user;
		}

		public function setNomUser($nom_user){
			$this->nom_user = $nom_user;
		}

		public function setPrenomUser($prenom_user){
			$this->prenom_user = $prenom_user;
		}

		public function setDateNaissanceUser($datenaissance_user){
			$this->datenaissance_user = $datenaissance_user;
		}

		public function setEmailUser($email_user){
			$this->email_user = $email_user;
		}

		public function setLoginUser($login_user){
			$this->login_user = $login_user;
		}

		public function setPasswordUser($password_user){
			$this->password_user = $password_user;
		}

		public function setStatutUser($statut_user){
			$this->statut_user = $statut_user;
		} 

	}

?>


