<?php

Class adm_standard_model extends Queries

{
	public $return;
    public function __construct(){
	$this->return = $return;
	}

	function deleteRecord($table, $id)
	{		
		$result = $this->newDeleteFromTable($table, $id);

		return $result;
	}//createContestTable

	function updateArticle($POST)
	{		
				$query_set = $POST['query_set'];
				$query_where = $POST['query_where'];
				$table = $POST['table'];
				$result = $this->newUpdate($table, $query_set, $query_where);
		return $result;
	}//updateContest



		function selectCategoryArticle($data)
	{

		$table = $data['table'];
		$query_params = array(
			"id" => $data['id']
		);
		$query_rules ='';
		$articles_listing = $this->newRead($table, $query_params, $query_rules);

		return $articles_listing;

	}

		function selectCategoryForTemplate($data)
	{

		$table = $data['table'];
		$query_params = $data['query_params'] ;
		$query_rules ='';
		$articles_listing = $this->newRead($table, $query_params, $query_rules);

		return $articles_listing;

	}


		function selectTemplate($data)
	{

		$table = 'templates';
		$query_params = array(
			"name" => $data['template_name']
		);
		$query_rules ='';
		$articles_listing = $this->newRead($table, $query_params, $query_rules);

		return $articles_listing;

	}
		function selectIndexTemplate($data)
	{

		$table = 'index_templates';
		$query_params = array(
			"name" => $data['index_template_name']
		);
		$query_rules ='';
		$articles_listing = $this->newRead($table, $query_params, $query_rules);

		return $articles_listing;

	}



		function selectSubCategoryArticles($data)
	{

		$table = $data['table'];
		$query_params = array(
			"subcategory" => $data['subcategory']
		);
		$query_rules ='ORDER BY custom_order ASC';
		$articles_listing = $this->newRead($table, $query_params, $query_rules);

		return $articles_listing;

	}
		function selectCategoryArticles($data)
	{

		$table = $data['table'];
		$query_params = '';
		$query_rules ='ORDER BY custom_order ASC';
		$articles_listing = $this->newRead($table, $query_params, $query_rules);

		return $articles_listing;

	}

	function addArticle($data)
	{
		// do read for highest custom order val
		$table = $data['table'];
		$query_params = '';
		$query_rules ='';
		$articles_listing = $this->newRead($table, $query_params, $query_rules);
		$result = $articles_listing;
		if (!empty($result)) {
			foreach ($result as $key => $value) {
				$custom_order_values[] = $value['custom_order'];
			}
				$max_val = max($custom_order_values);
				$custom_order = $max_val + 1;
		} else{
			$custom_order =  1;
		}

		// do read for highest custom order val
				$category = $data['table'];
				$subcategory = $data['subcategory'];
				$query_params = array(
				"custom_order" => $custom_order,
				"category" => $category,
				"subcategory" => $subcategory,
				"header" => 'Nowy bez nazwy',
				"has_image" => 'on'
				);
				$table = $data['table'];
				$result = $this->newWriteLastInsert($table, $query_params);

				if (!$result) {
				$_SESSION['adm_error'] = "Hmmm...<br>coś poszło nie tak<br>addArticle";
				} else{
					if (!empty($subcategory)) {
						header("Location:/adm_standard/$table/$subcategory/$result");
					} else{
						header("Location:/adm_standard/$table/$result");
					}

				}

		return $result;
	}//addArticle





}
