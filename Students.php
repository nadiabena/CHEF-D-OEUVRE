<?php 

	class Students{
		private $idStudent;
		private $prenom;
		private $nom;
		private $datenaissance;
		private $genre;
		private $school;
		private $email;

		public function __construct($idStudent, $prenom, $nom, $datenaissance, $genre, $school, $email){
			$this->idStudent = $idStudent;
			$this->prenom = $prenom;
			$this->nom = $nom;
			$this->datenaissance = $datenaissance;
 			$this->genre = $genre;
			$this->school = $school;
			$this->email = $email;
		}

		public function getIdStudent(){
			return $this->idStudent;
		}

		public function getPrenom(){
			return $this->prenom;
		}

		public function getNom(){
			return $this->nom;
		}

		public function getDateNaissance(){
			return $this->datenaissance;
		}

		public function getGenre(){
			return $this->genre;
		}

		public function getSchool(){
			return $this->school;
		}	

		public function getEmail(){
			return $this->email;
		}


		public function setIdStudent($idStudent){
			$this->idStudent = $idStudent;
		}

		public function setPrenom($prenom){
			$this->prenom = $prenom;
		}

		public function setNom($nom){
			$this->nom = $nom;
		}

		public function setDateNaissance($datenaissance){
			$this->datenaissance = $datenaissance;
		}

		public function setGenre($genre){
			$this->genre = $genre;
		}

		public function setSchool($school){
			$this->school = $school;
		}

		public function setEmail($email){
			$this->email = $email;
		}

	}

 ?>

