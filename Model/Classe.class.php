<?php  

	class Classe{
		private $id_classe;
		private $classe;
		private $id_promo;


		public function __construct($id_classe, $classe, $id_promo){
			$this->id_classe = $id_classe;
			$this->classe = $classe;
			$this->id_promo = $id_promo;
		
		}


		public function getIdClasse(){
			return $this->id_classe;
		}

		public function getClasse(){
			return $this->classe;
		}

		public function getIdPromo(){
			return $this->id_promo;
		}



		public function setIdClasse($id_classe){
			$this->id_classe = $id_classe;
		}

		public function setClasse($classe){
			$this->classe = $classe;
		}

		public function setIdPromo($id_promo){
			$this->id_promo = $id_promo;
		}


	}


?>




