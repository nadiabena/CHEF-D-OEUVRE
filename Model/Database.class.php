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
		 * Select toutes les classes
		 */
		public function select_classes(){
			$query_classes = "SELECT * 
							  FROM classe";
			$liste_classes = $this->bdd->query($query_classes);

			$tableau_classes = [];
			if($liste_classes->rowcount()!=0){
				while($donnees = $liste_classes->fetch()){
					$tableau_classes[] = new Classe($donnees->id_classe, $donnees->classe, $donnees->id_promo); 
					//$donnees['id_classe']
				}
			}
			return $tableau_classes;
		}

		/**
		 * [select_classe_by_id description]
		 * @return [type] [description]
		 */
		public function select_classe_by_id($id){
			$query_classe_by_id = "SELECT * 
								   FROM classe 
								   WHERE id_classe = $id";

			$classe = $this->bdd->query($query_classe_by_id)->fetch();

			return new Classe($classe['id_classe'], $classe['classe'], $classe['id_promo']); //$classe->id_classe
		}

		/**
		 * 
		 */
		public function update_classe(id_classe, classe, id_promo){
			$query = "UPDATE classe
					  SET id_classe =".$this->bdd->id_classe.
					  	" ,classe=". $this->bdd->classe .
					  	" , id_promo =". $this->bdd->id_promo.
					" WHERE id_classe = ".$this->bdd->id;

			return $this->bdd->prepare($query);
		}

		/**
		 * [delete_classe description]
		 * @param  [type] $id [description]
		 * @return [type]     [description]
		 */
		public function delete_classe($id){
			$query = "DELETE 
					  FROM classe 
					  WHERE id_classe = ".$id;

			return $this->bdd->prepare($query)->execute();
		}

		/**
		 * [insert_classe description]
		 * @return [type] [description]
		 */
		public function insert_classe($classe, $id_promo){
			$query = "INSERT INTO classe (classe, id_promo)
					  VALUES (".$bdd->quote($classe).", ". $id_promo.")";

			return $this->bdd->prepare($query)->execute();
		}


		/**
		 * Select toutes les photos à la UNE
		 * Seulement 4 photos peuvent être mise à la UNE
		 * @return [type] [description]
		 */
		public function select_photos_une(){
			$query_photos = 'SELECT *
							 FROM photos
							 WHERE photo_une = 1
							 LIMIT 4';

			$resultat = $this->bdd->query($query_photos);

		}



	}

?>

	

	