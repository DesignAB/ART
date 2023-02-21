<?php
class sponsors extends Queries {

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

	function updateSponsor($table, $query_set, $query_where)
	{
		$result = $this->newUpdate($table, $query_set, $query_where);
		return $result;

	}// showAOneSponsors
	function createSponsor($table, $query_params)
	{
		$result = $this->newWriteLastInsert($table, $query_params);
		header("Location:/adm-area/sponsor-details.php?value=$result");

	}// showAOneSponsors

}// class ends
