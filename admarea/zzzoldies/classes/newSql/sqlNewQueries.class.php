<?php
namespace newSql;
use DbConnection\DbhPdoConnect as DbhPdoConnect;
use PDO;

class sqlNewQueries extends Database{


		protected function newRead($table, $query_params, $query_rules){
			try {
			  // query params
			if ($query_params) {
			    foreach ($query_params as $key =>$value) {
			    if(!next( $query_params ) ) {
			      $separator = '';
			    }else{
			      $separator = 'AND ';
			    }
			    $params[] =  $key.' = :'.$key.' '.$separator;
			    }
			    $params_pattern = 'WHERE '.implode('', $params);
			} else{
				$params_pattern = '';
			}
			  // query params


				$sql = "SELECT * FROM $table $params_pattern $query_rules";
				// show($sql); exit();
				$stm = $this->connect()->prepare($sql);
						// binding
						if ($query_params) {
						  // params values
						    foreach ($query_params as $key =>$value) {
						      // echo $key .' '. $value.'<br>';
									$stm->bindValue(':'.$key, $value);
						    }
						  //
						}
						// binding


				$stm->execute();
				$row = $stm->fetchAll(PDO::FETCH_ASSOC);
				$return = $row;
					} catch (\PDOException $e) {
						$return = false;
						$_SESSION['db-error'] = "Błąd odczytu bazy danych";
					}
			return $return;

		}// newRead


				protected function newWrite($table, $query_params){
			try {
				$query_fields = array_keys($query_params);
				$query_fields =  implode(', ', $query_fields);
				$query_vals= array_keys($query_params);
				array_walk($query_vals,create_function('&$v,$k', '$v = ":$v";'));
				$query_vals = implode(', ', $query_vals);
				$sql = "INSERT INTO $table ($query_fields) VALUES ($query_vals)";
				$stm = $this->connect()->prepare($sql);

						// binding
						if ($query_params) {
						  // params values
						    foreach ($query_params as $key =>$value) {
									$stm->bindValue(':'.$key, $value);
						    }
						  //
						}
						// binding
				$stm->execute();
				$result= true;
					} catch (\PDOException $e) {
				$_SESSION['db-error'] = "Błąd bazy danych";
				$result= false;
					}
			return $result;

		}// one

	protected function newUpdate($table, $query_set, $query_where){

		$query_fields= array_keys($query_set);
		array_walk($query_fields,create_function('&$v,$k', '$v = "$v = :$v";'));
		$query_fields = implode(', ', $query_fields);
		foreach ($query_where as $key =>$value) {
			if(!next( $query_where ) ) {
				$separator = '';
				}else{
				$separator = 'AND ';
			    }
				$where[] =  $key.' = :'.$key.' '.$separator;
			    }
		$where_pattern = 'WHERE '.implode('', $where);
		$bind_array = array_merge($query_set,$query_where);

		// print_r($bind_array);
		// exit();
		// do query
	    try {
	    $sql = "UPDATE $table SET $query_fields $where_pattern";
		$stm = $this->connect()->prepare($sql);
		// this is binding
		foreach ($bind_array as $key => $value) {
	    $stm->bindValue(':'.$key, $value);
		}
		$stm->execute();
		// this is binding
	    $stm = null;
	    $result = true;
		return $result;

	  } catch (\PDOException $e) {
	    $stm = null;
	    $result = false;
		return $result;
		$_SESSION['db-error'] = "Błąd bazy danych";

	    }
		// do query


	}//newUpdate

}