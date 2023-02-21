<?php
class admcookies extends Queries {

	function showAllSponsors()
	{
		$table = "sponsors";
		$query_params = '';
		$query_rules ='';
		$result = $this->newRead($table, $query_params, $query_rules);
		return $result;

	}// showAllSponsors

	function showOneSponsor($id)
	{
		$table = "sponsors";
		$query_params = array(
			"id" => $id
		);
		$query_rules ='';
		$result = $this->newRead($table, $query_params, $query_rules);
		return $result;

	}// showAOneSponsors





	

}// class ends
