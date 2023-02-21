<?php
$length=250;
$meta_desc = strip_tags(str_short($data['event']['artist_description'], $length, $lastLength = 0, $symbol = '...'));
$meta_image = WEBSITE_ADDRESS.'/'.MAIN_TEMPLATE.'/images/events/'.$data['event']['uploaded_image'];
?>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, height=device-height,  initial-scale=1.0, user-scalable=no, user-scalable=0"/>
<base href="<?=WEBSITE_ADDRESS?>">
<meta name="title" content="<?=$data['event']['header'];?>"/>
<meta name="description" content="<?=$meta_desc;?>"/>

<meta property="og:url" content="<?=WEBSITE_ADDRESS.$_SERVER['REQUEST_URI']?>" />
<meta property="og:type" content="website" />
<meta property="og:title" content="<?=$data['event']['header'];?>" />
<meta property="og:description" content="<?=$meta_desc;?>" />
<meta property="og:image" content="<?=$meta_image;?>" />
<link rel="apple-touch-icon" sizes="180x180" href="<?=MAIN_TEMPLATE;?>/images/fav/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="<?=MAIN_TEMPLATE;?>/images/fav/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="<?=MAIN_TEMPLATE;?>/images/fav/favicon-16x16.png">
<link rel="mask-icon" href="<?=MAIN_TEMPLATE;?>/images/fav/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">
