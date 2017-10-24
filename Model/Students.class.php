<?php 

	class Students{
		private $idStudent;
		private $prenom;
		private $nom;
		private $datenaissance;
		private $genre;
		private $school;
		private $password_students;
		private $email_students;
		private $register;
		private $promo;
		private $id_classe;


		public function __construct($idStudent, $prenom, $nom, $datenaissance, $genre, $school, $password_students,
		 							$email_students, $register, $promo, $id_classe){
			$this->idStudent = $idStudent;
			$this->prenom = $prenom;
			$this->nom = $nom;
			$this->datenaissance = $datenaissance;
 			$this->genre = $genre;
			$this->school = $school;
			$this->password_students = $password_students;
			$this->email_students = $email_students;
			$this->register = $register;
			$this->promo = $promo;
			$this->id_classe = $id_classe; 
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

		public function getPasswordStudents(){
			return $this->password_students;
		}

		public function getEmailStudents(){
			return $this->email;
		}

		public function getRegister(){
			return $this->register;
		}	

		public function getPromo(){
			return $this->promo;
		}

		public function getIdClasse(){
			return $this->id_classe;
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

		public function setPasswordStudents($password_students){
			$this->password_students = $password_students;
		}

		public function setEmailStudents($email_students){
			$this->email_students = $email_students;
		}

		public function setRegister($register){
			$this->register = $register;
		}

		public function setPromo($promo){
			$this->promo = $promo;
		}

		public function setIdClasse($id_classe){
			$this->id_classe = $id_classe;
		}

	}

 ?>

