<?php  

	class Photo{
		private $id_photo;
		private $date_photo;
		private $description_photo;
		private $image;
		private $photo_une;
		private $id_event;


		public function __construct($id_photo, $date_photo, $description_photo, $image, $photo_une, $id_event){
			$this->id_photo = $id_photo;
			$this->date_photo = $date_photo;
			$this->description_photo = $description_photo;
			$this->image = $image;
			$this->photo_une = $photo_une;
			$this->id_event = $id_event;
		}


		public function getIdPhoto(){
			return $this->id_photo;
		}

		public function getDatePhoto(){
			return $this->date_photo;
		}

		public function getDescriptionPhoto(){
			return $this->description_photo;
		}

		public function getImage(){
			return $this->image;
		}

		public function getPhotoUne(){
			return $this->photo_une;
		}

		public function getIdEvent(){
			return $this->id_event;
		}



		public function setIdPhoto($id_photo){
			$this->id_photo = $id_photo;
		}

		public function setDatePhoto($date_photo){
			$this->date_photo = $date_photo;
		}

		public function setDescriptionPhoto($description_photo){
			$this->description_photo = $description_photo;
		}

		public function setImage($image){
			$this->image = $image;
		}

		public function setPhotoUne($photo_une){
			$this->photo_une = $photo_une;
		}

		public function setIdEvent($id_event){
			$this->id_event = $id_event;
		}


	}


?>




