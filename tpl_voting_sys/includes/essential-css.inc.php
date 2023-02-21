<?php
$token = random_token(5);

?>
<link rel="preload" href="<?=TEMPLATE_FOLDER?>/assets/css/bootstrap5.css" as="style">
<link href="<?=TEMPLATE_FOLDER?>/assets/css/bootstrap5.css" rel="stylesheet">
<?php

?>
<style>
@font-face {
  font-family: "WebsiteFont";
  src: url(<?php echo FONTFILE;?>) format("truetype");
  font-style: normal;
    font-display: swap;
}
@font-face {
  font-family: "WebsiteHeadingFont";
  src: url(<?php echo HEADINGFONTFILE;?>) format("truetype");
  font-style: normal;
    font-display: swap;

}


</style>
<!-- <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;500;900&display=swap" rel="stylesheet">
 -->
<link rel="preload" href="<?=TEMPLATE_FOLDER?>/assets/css/custom.css?<?php echo $token?>" as="style">
<link href="<?=TEMPLATE_FOLDER?>/assets/css/custom.css?<?php echo $token?>" rel="stylesheet">
