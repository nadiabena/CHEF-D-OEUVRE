<?php  

	class Promo{
		private $id_promo;
		private $promo;


		public function __construct($id_promo, $promo){
			$this->id_promo = $id_promo;
			$this->promo = $promo;
		}


		public function getIdPromo(){
			return $this->id_promo;
		}

		public function getPromo(){
			return $this->promo;
		}



		public function setIdPromo($id_promo){
			$this->id_promo = $id_promo;
		}

		public function setPromo($promo){
			$this->promo = $promo;
		}

	}

?>

