<?php 

	class Datebase{
		private $bdd;




		private function __construct(){
			try{
				$this->_db = new PDO('mysql:host=localhost;dbname=my_upload;charset=utf8', 'root', 'user');

				$this->_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$this->_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
			}catch(PDOException $e){
				die('Erreur : '. $e->getMessage());
			}
		}

		/**
		 * Selet toutes les photos à la UNE
		 * @return [type] [description]
		 */
		/*public function select_photos_une(){
			$query_photos = 'SELECT *
							 FROM photos
							 WHERE photo_une = 1
							 ORDER BY date_photo ASC';
			$resultat = $this->bdd->query($query_photos);
			$tab = array();
			if($resultat->rowcount()!=0){


			}

			return $tab;
		} */


	public function select_all_assoc__name($keyword){
		$query = 'SELECT assoc_id, assoc_name FROM associations WHERE assoc_name LIKE '.$this->_db->quote($keyword.'%').'LIMIT 0,5';
		$result = $this->_db->query($query);
		$tab = array();
		if($result->rowcount()!=0){
			while ($row = $result->fetch()) {
				$tab[] = $row;
			}
		}
		return $tab;
	}






	}

?>
