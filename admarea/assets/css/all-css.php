<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

<!-- <link href="admarea/assets/css/bootstrap5.css" rel="stylesheet">
 -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

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
@font-face {
  font-family: "bootstrap-icons";
  src: url("admarea/assets/fonts/bootstrap-icons.woff2") format("woff2");
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
.admin-navbar .nav-link{
font-size: .8rem !important;
}

</style>

<link href="admarea/assets/css/custom.css?<?=random_token(4);?>" rel="stylesheet">
<link href="admarea/assets/css/bootstrap-icons.css" rel="stylesheet">
