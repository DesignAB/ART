<?php
class contests extends Queries {

	// function showAllSponsors()
	// {
	// 	$table = "sponsors";
	// 	$query_params = '';
	// 	$query_rules ='';
	// 	$result = $this->newRead($table, $query_params, $query_rules);
	// 	return $result;

	// }// showAllSponsors

	function showOneContest($id)
	{
		$table = "contests";
		$query_params = array(
			"id" => $id
		);
		$query_rules ='';
		$result = $this->newRead($table, $query_params, $query_rules);
		return $result;

	}// showAOneSponsors
	function updateContest($table, $query_set, $query_where)
	{
		$result = $this->newUpdate($table, $query_set, $query_where);

	}// showAOneSponsors

}// class ends
