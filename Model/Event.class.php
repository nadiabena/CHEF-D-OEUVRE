<?php  

	class Event{
		private $id_event;
		private $description_event;
		

		public function __construct($id_event, $description_event){
			$this->id_event = $id_event;
			$this->description_event = $description_event;
		}


		public function getIdEvent(){
			return $this->id_event;
		}

		public function getDescriptionEvent(){
			return $this->description_event;
		}



		public function setIdEvent($id_event){
			$this->id_event = $id_event;
		}

		public function setDescriptionEvent($description_event){
			$this->description_event = $description_event;
		}

	}


?>




