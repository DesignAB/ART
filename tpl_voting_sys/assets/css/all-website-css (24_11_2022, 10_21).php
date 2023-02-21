
<link href="<?=TEMPLATE_FOLDER?>/assets/css/bootstrap5.css" rel="stylesheet" media="screen">
<link rel="preload" href="<?=TEMPLATE_FOLDER?>/assets/css/custom.css?<?php echo $token?>" as="style">
<style>

@font-face {
  font-family: "WebsiteFont";
  src: url(<?=FONTFILE;?>) format("truetype");
  font-style: normal;
  font-display: swap;

}
@font-face {
  font-family: "WebsiteHeadingFont";
  src: url(<?=HEADINGFONTFILE;?>) format("truetype");
  font-style: normal;
  font-display: swap;

}


@font-face {
  font-family: "bootstrap-icons";
  src: url("<?=TEMPLATE_FOLDER.'/assets/css/bootstrap-fonts/bootstrap-icons.woff2';?>") format("woff2");
    font-display: swap;

}

:root {
/*  --lead-color-light-1: 150,206,180;
  --lead-color-light-2: 255,238,173;
  --lead-color-light-3: 255,111,105;
*/
  --lead-color-1: <?=lead_color_1;?>;
  --lead-color-2: <?=lead_color_2;?>;
  --lead-color-3: <?=lead_color_3;?>;
  --lead-color-4: <?=lead_color_4;?>;
  --lead-light-heading-color: <?=light_heading_color;?>;
  --lead-light-text-color: <?=light_text_color;?>;
  --lead-dark-heading-color: <?=dark_heading_color;?>;
  --lead-dark-text-color: <?=dark_text_color;?>;

  --navi_background_color: <?=navi_background_color;?>;
  --navi_text_color: <?=navi_text_color;?>;
  --footer_background_color: <?=footer_background_color;?>;
  --footer_text_color: <?=footer_text_color;?>;

  --body_bg_start: <?=body_bg_start;?>;
  --body_bg_middle: <?=body_bg_middle;?>;
  --body_bg_end: <?=body_bg_end;?>;

}


</style>

<link href="<?=TEMPLATE_FOLDER?>/assets/css/custom-styles.css?<?=random_token(5);?>" rel="stylesheet" media="screen">
