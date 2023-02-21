<?php 
	$POST['query_params'] = array(
			"active" => "on"
		);
		$categories = $data['sitemap']->allCategories($POST);

$today = date("Y-m-d").'T'.date("H:i+s").':00';
// print_r(WEBSITE_ADDRESS);

header("Content-Type: application/xml; charset=UTF-8");
echo '<?xml version="1.0" encoding="UTF-8"?>'.PHP_EOL;
echo '<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'.PHP_EOL;
	echo '<url>'.PHP_EOL;
	echo '<loc>'.WEBSITE_ADDRESS.'</loc>'.PHP_EOL;
	echo '<lastmod>'.$today.'</lastmod>'.PHP_EOL;
	echo '<priority>0.80</priority>'.PHP_EOL;
	echo '</url>'.PHP_EOL;


foreach ($categories as $key => $value) {
// first subcat or not
	if ($value['subcategory'] == 'on') {
		$POST['query_params'] = array(
			"active" => "on",
			"category" => $value['category'],
		);
		$subcategories = $data['sitemap']->allSubcategories($POST);
		foreach ($subcategories as $key => $subvalue) {
		echo '<url>'.PHP_EOL;
		echo '<loc>'.WEBSITE_ADDRESS.'/'.humanize_category($subvalue['subcategory']).'</loc>'.PHP_EOL;
		echo '<lastmod>'.$today.'</lastmod>'.PHP_EOL;
		echo '<priority>0.80</priority>'.PHP_EOL;
		echo '</url>'.PHP_EOL;
		$POST['query_params'] = array(
			"active" => "on",
			"subcategory" => $subvalue['subcategory']
		);
		$POST['table'] = $value['category'];
		$articles = $data['sitemap']->allArticles($POST);
		foreach ($articles as $key => $artvalue) {
		echo '<url>'.PHP_EOL;
		echo '<loc>'.WEBSITE_ADDRESS.'/'.humanize_category($value['category']).'/'.humanize_category($subvalue['subcategory']).'/'.createLinkForMe($artvalue['header']).'/'.$artvalue['id'].'</loc>'.PHP_EOL;
		echo '<lastmod>'.$today.'</lastmod>'.PHP_EOL;
		echo '<priority>0.80</priority>'.PHP_EOL;
		echo '</url>'.PHP_EOL;
		}// foreach ($articles as $key => $artvalue)

		}// foreach ($subcategories as $key => $subvalue)

	} else{
		echo '<url>'.PHP_EOL;
		echo '<loc>'.WEBSITE_ADDRESS.'/'.humanize_category($value['category']).'</loc>'.PHP_EOL;
		echo '<lastmod>'.$today.'</lastmod>'.PHP_EOL;
		echo '<priority>0.80</priority>'.PHP_EOL;
		echo '</url>'.PHP_EOL;
		// modular or standard
		if ($value['modular'] == 'standard') {
			$POST['query_params'] = array(
				"active" => "on"
			);
			$POST['table'] = $value['category'];
			$articles = $data['sitemap']->allArticles($POST);
			foreach ($articles as $key => $artvalue) {
				echo '<url>'.PHP_EOL;
				echo '<loc>'.WEBSITE_ADDRESS.'/'.humanize_category($value['category']).'/'.createLinkForMe($artvalue['header']).'/'.$artvalue['id'].'</loc>'.PHP_EOL;
				echo '<lastmod>'.$today.'</lastmod>'.PHP_EOL;
				echo '<priority>0.80</priority>'.PHP_EOL;
				echo '</url>'.PHP_EOL;
			} // foreach ($articles as $key => $artvalue)

		} else{
			if ($value['category'] == 'events') {
			$POST['query_params'] = array(
				"active" => "on"
			);
			$events = $data['sitemap']->allEvents($POST);
				foreach ($events as $key => $eventvalue) {
					echo '<url>'.PHP_EOL;
					echo '<loc>'.WEBSITE_ADDRESS.'/event/'.createLinkForMe($eventvalue['artist_name']).'/'.$eventvalue['event_id'].'</loc>'.PHP_EOL;
					echo '<lastmod>'.$today.'</lastmod>'.PHP_EOL;
					echo '<priority>0.80</priority>'.PHP_EOL;
					echo '</url>'.PHP_EOL;
				}//foreach ($events as $key => $eventvalue)
			} //if ($value['category'] == 'events'

			if ($value['category'] == 'contests') {
			$POST['query_params'] = array(
				"active" => "on"
			);
			$contests = $data['sitemap']->allContests($POST);
				foreach ($contests as $key => $contestvalue) {
					echo '<url>'.PHP_EOL;
					echo '<loc>'.WEBSITE_ADDRESS.'/contestdetails/'.$contestvalue['id'].'</loc>'.PHP_EOL;
					echo '<lastmod>'.$today.'</lastmod>'.PHP_EOL;
					echo '<priority>0.80</priority>'.PHP_EOL;
					echo '</url>'.PHP_EOL;

				}//foreach ($events as $key => $eventvalue)
			} //if ($value['category'] == 'contests'



		}
		// modular or standard

	}

}// foreach ($categories as $key => $value






echo '</urlset>'.PHP_EOL;

?>