<?php

$currentpage = $_SERVER['REQUEST_URI'];
if($currentpage=="/" || $currentpage=="/index.php" || $currentpage=="/index" || $currentpage=="" || $currentpage=="#" ) 
  { 
    $css = 'bootstrap5.css'; 
    } else{
    $css = 'bootstrap5.css'; 

    }
?>
<link href="<?=TEMPLATE_FOLDER?>/assets/css/<?=$css;?>" rel="stylesheet" media="screen">
<!-- <link rel="preload" href="<?=TEMPLATE_FOLDER?>/assets/css/custom.css?<?php echo $token?>" as="style">
<link href="<?=TEMPLATE_FOLDER?>/assets/css/custom-styles.css?<?=random_token(5);?>" rel="stylesheet" media="screen">
 -->
<style>

@font-face {
  font-family: "WebsiteFont";
  src: url(<?=FONTFILE;?>) format("truetype");
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
/*34 ART*/
/*                   roots                   */
:root {
  --hamburger-width: 30px;
  --lead-color-rgb: 237, 26, 59; /*red color*/
  --lead-black-rgb: 0, 0, 0;
  --lead-white-rgb: 255, 255, 255;
  --lead-blue-rgb: 34, 61, 97;
  --34-art-dark:  #837a7d;
  --34-art-light:  #fefcfc;
}

/*NEW DEFINED COLORS*/

/* colors*/

.btn-01 {
  --bs-btn-color: #fff;
  --bs-btn-bg: rgba(var(--lead-color-1), 1);
  --bs-btn-border-color: rgba(var(--lead-color-1), 1);
  --bs-btn-hover-color: #fff;
  --bs-btn-hover-bg: rgba(var(--lead-color-1), .8);
  --bs-btn-hover-border-color: rgba(var(--lead-color-1), .8);
  --bs-btn-focus-shadow-rgb: 49, 132, 253;
  --bs-btn-active-color: #fff;
  --bs-btn-active-bg: #0a58ca;
  --bs-btn-active-border-color: #0a53be;
  --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
  --bs-btn-disabled-color: #fff;
  --bs-btn-disabled-bg: rgba(var(--lead-color-1), .8);
  --bs-btn-disabled-border-color: rgba(var(--lead-color-1), .8);
}
.btn-02 {
  --bs-btn-color: #fff;
  --bs-btn-bg: rgba(var(--lead-color-2), 1);
  --bs-btn-border-color: rgba(var(--lead-color-2), 1);
  --bs-btn-hover-color: #fff;
  --bs-btn-hover-bg: rgba(var(--lead-color-2), .8);
  --bs-btn-hover-border-color: rgba(var(--lead-color-2), .8);
  --bs-btn-focus-shadow-rgb: 49, 132, 253;
  --bs-btn-active-color: #fff;
  --bs-btn-active-bg: #0a58ca;
  --bs-btn-active-border-color: #0a53be;
  --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
  --bs-btn-disabled-color: #fff;
  --bs-btn-disabled-bg: rgba(var(--lead-color-2), .8);
  --bs-btn-disabled-border-color: rgba(var(--lead-color-2), .8);
}
.btn-03 {
  --bs-btn-color: #fff;
  --bs-btn-bg: rgba(var(--lead-color-3), 1);
  --bs-btn-border-color: rgba(var(--lead-color-3), 1);
  --bs-btn-hover-color: #fff;
  --bs-btn-hover-bg: rgba(var(--lead-color-3), .8);
  --bs-btn-hover-border-color: rgba(var(--lead-color-3), .8);
  --bs-btn-focus-shadow-rgb: 49, 132, 253;
  --bs-btn-active-color: #fff;
  --bs-btn-active-bg: #0a58ca;
  --bs-btn-active-border-color: #0a53be;
  --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
  --bs-btn-disabled-color: #fff;
  --bs-btn-disabled-bg: rgba(var(--lead-color-3), .8);
  --bs-btn-disabled-border-color: rgba(var(--lead-color-3), .8);
}
.btn-04 {
  --bs-btn-color: #fff;
  --bs-btn-bg: rgba(var(--lead-color-4), 1);
  --bs-btn-border-color: rgba(var(--lead-color-4), 1);
  --bs-btn-hover-color: #fff;
  --bs-btn-hover-bg: rgba(var(--lead-color-4), .8);
  --bs-btn-hover-border-color: rgba(var(--lead-color-4), .8);
  --bs-btn-focus-shadow-rgb: 49, 132, 253;
  --bs-btn-active-color: #fff;
  --bs-btn-active-bg: #0a58ca;
  --bs-btn-active-border-color: #0a53be;
  --bs-btn-active-shadow: inset 0 3px 5px rgba(0, 0, 0, 0.125);
  --bs-btn-disabled-color: #fff;
  --bs-btn-disabled-bg: rgba(var(--lead-color-4), .8);
  --bs-btn-disabled-border-color: rgba(var(--lead-color-4), .8);
}
.body-bg{
background: rgb(2,0,36);
background: linear-gradient(140deg, rgba(var(--body_bg_start),1) 0%, rgba(var(--body_bg_middle),1) 50%, rgba(var(--body_bg_end),1) 100%);
}

.bg-01 {
  background: rgba(var(--lead-color-1), 1);
  background-color: rgba(var(--lead-color-1), 1) !important;
}
.bg-02 {
  background: rgba(var(--lead-color-2), 1);
  background-color: rgba(var(--lead-color-2), 1) !important;
}
.bg-03 {
  background: rgba(var(--lead-color-3), 1);
  background-color: rgba(var(--lead-color-3), 1) !important;
}
.bg-04 {
  background: rgba(var(--lead-color-4), 1);
  background-color: rgba(var(--lead-color-4), 1) !important;
}

.color-01 {
  color: rgba(var(--lead-color-1), 1) !important;
}
.color-02 {
  color: rgba(var(--lead-color-2), 1) !important;
}
.color-03 {
  color: rgba(var(--lead-color-3), 1) !important;
}
.color-04 {
  color: rgba(var(--lead-color-4), 1) !important;
}



/*NEW DEFINED COLORS*/


/*                   roots                   */
.bg1{
  background-color: rgba(var(--lead-color-rgb), 1.0);
  transition: all .5s;
}
.bg2{
  background-color: rgba(var(--lead-color-rgb), .4);
  transition: all .5s;
}
.bg3{
  background-color: black;
  transition: all .5s;
}
.bg4{
  background-color: grey;
  transition: all .5s;
}

.bg-blue{
   background-color: rgba(var(--lead-blue-rgb), .3);
 
}
.bg-blue-100{
   background-color: rgba(var(--lead-blue-rgb), .7);
 
}

.art34-col{
  color: #837a7d;
}
.art34-white{
  color: #fefcfc;
}
/*                   typo                   */

body {
  margin: 0;
  font-family: 'WebsiteFont', sans-serif;
  overflow-x: hidden;
/*  font-size: var(--bs-body-font-size);
  font-weight: var(--bs-body-font-weight);
  color: var(--bs-body-color);
*/

}



a {
  text-decoration: none !important;
}
h1, h2, h3, h4 {
  font-weight: 400;
}
h5, h6 {
  font-weight: 400;
}
p {
    font-family: 'WebsiteFont', sans-serif;
/*font-size: .9rem;
*/  font-weight: 300;

}

/*                   typo                   */

.card, .btn, .btn-sm, .form-control, .card-img, .card-img-overlay {
border-radius: 0;
/*border: none;
*/
}

.navbar-toggler:focus,
.navbar-toggler:active,
.navbar-toggler-icon:focus {
    outline: none;
    box-shadow: none;
}
#kontakt a{
color: var(--34-art-dark);
opacity: 1;
}
#kontakt a:hover{
color: var(--34-art-dark);
opacity: .8;
}

/*!
 * Hamburgers
 * @description Tasty CSS-animated hamburgers
 * @author Jonathan Suh @jonsuh
 * @site https://jonsuh.com/hamburgers
 * @link https://github.com/jonsuh/hamburgers
 */
.hamburger {
  padding: 5px 5px;
  display: inline-block;
  cursor: pointer;
  transition-property: opacity, filter;
  transition-duration: 0.15s;
  transition-timing-function: linear;
  font: inherit;
  color: inherit;
  text-transform: none;
  background-color: transparent;
  border: 0;
  margin: 0;
  overflow: visible; 
}
  .hamburger:hover {
    opacity: 0.7; 
 }
  .hamburger.is-active:hover {
    opacity: 0.7; }
  .hamburger.is-active .hamburger-inner,
  .hamburger.is-active .hamburger-inner::before,
  .hamburger.is-active .hamburger-inner::after {
  /*  background-color: teal; COLOR ON ACTIVE STATE*/
 } 

.hamburger-box {
  width: var(--hamburger-width);
  height: 24px;
  display: inline-block;
  position: relative; 

}

.hamburger-inner {
  display: block;
  top: 50%;
  margin-top: -2px; }

  .hamburger-inner, .hamburger-inner::before, .hamburger-inner::after {
  width: var(--hamburger-width);
    height: 3px;
    background-color: rgba(var(--lead-color-rgb), 1.0); /*hamb color*/
    border-radius: 3px;
    position: absolute;
    transition-property: transform;
    transition-duration: 0.5s;
    transition-timing-function: ease;
 }
  .hamburger-inner.scrolled, .hamburger-inner.scrolled::before, .hamburger-inner.scrolled::after {
    background-color: white; /*hamb color*/
 }


  .hamburger-inner::before, .hamburger-inner::after {
    content: "";
    display: block; 
 }
  .hamburger-inner::before {
    top: -10px; }
  .hamburger-inner::after {
    bottom: -10px; }

/*
   * Collapse
   */
.hamburger--collapse .hamburger-inner {
  top: auto;
  bottom: 0;
  transition-duration: 0.13s;
  transition-delay: 0.13s;
  transition-timing-function: cubic-bezier(0.55, 0.055, 0.675, 0.19); }
  .hamburger--collapse .hamburger-inner::after {
    top: -20px;
    transition: top 0.2s 0.2s cubic-bezier(0.33333, 0.66667, 0.66667, 1), opacity 0.1s linear; }
  .hamburger--collapse .hamburger-inner::before {
    transition: top 0.12s 0.2s cubic-bezier(0.33333, 0.66667, 0.66667, 1), transform 0.13s cubic-bezier(0.55, 0.055, 0.675, 0.19); }

.hamburger--collapse.is-active .hamburger-inner {
  transform: translate3d(0, -10px, 0) rotate(-45deg);
  transition-delay: 0.22s;
  transition-timing-function: cubic-bezier(0.215, 0.61, 0.355, 1); }
  .hamburger--collapse.is-active .hamburger-inner::after {
    top: 0;
    opacity: 0;
    transition: top 0.2s cubic-bezier(0.33333, 0, 0.66667, 0.33333), opacity 0.1s 0.22s linear; }
  .hamburger--collapse.is-active .hamburger-inner::before {
    top: 0;
    transform: rotate(-90deg);
    transition: top 0.1s 0.16s cubic-bezier(0.33333, 0, 0.66667, 0.33333), transform 0.13s 0.25s cubic-bezier(0.215, 0.61, 0.355, 1); }




/*••••••••••••••••••••••• INDEX ONLY •••••••••••••••••••••••*/

.sortable__nav{
  display: flex;
  justify-content: center;
  margin-bottom: 20px;
}
.nav__link{
  padding: 0 20px 4px;
  color: grey;
  font-size: 1rem;
  font-weight: 300;
  display: block;
  border-bottom: 2px solid transparent;
  text-transform: uppercase;
  cursor: pointer;
  transition: all .3s;
}
.nav__link:hover{

  color: black;
  transition: all .3s;

}
.nav__link.active{
  border-color: red;
}
/*ISLODE OVERALL ends*/

/*.item .card{
   height: 300px;
}
*/
.item .card .custom-card-img-overlay{
display: none;
}
.item .card:hover .custom-card-img-overlay{
display: none;
}

.item .card .custom-card-img-overlay-full{
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  transform: translateX(0%);
  transition: all .3s;
  background-color: rgba(var(--lead-color-rgb), .8);
  transition-delay: 0s;
}

/*.item .card:hover .custom-card-img-overlay-full{
  transform: translateX(0%);
  transition-delay: .1s;
}
*/
@media (min-width: 992px) {
.item .card .custom-card-img-overlay{
  display: block;
  position: absolute;
  right: 0;
  bottom: 0;
  left: 0;
  padding: 1rem;
  transform: translateX(0);
  transition: all .3s;
  background-color: rgba(var(--lead-color-rgb), .7);
  transition-delay: .1s;
}
.item .card:hover .custom-card-img-overlay{
  display: block;
  transform: translateX(100%);
  transition-delay: 0s;
}

.item .card .custom-card-img-overlay-full{

  transform: translateX(-100%);

}

.item .card:hover .custom-card-img-overlay-full{
  transform: translateX(0%);
  transition-delay: .1s;
}


}/*min-width: 992px*/


.index-card .btn{
border: 1px solid #FFFFFF;
}

.index-card{
border: none;
transition: all .3s;
}
.index-card:hover.shadow {
  box-shadow: .2rem 0.5rem 1rem rgba(0, 0, 0, 0.5) !important;
}
.index-card img {
transition: all .5s;
}
.index-card:hover img {
transform: scale(1.03); !important;
}

.carousel, .carousel-item{
height: calc(100vh - 50px) ;
overflow: hidden;
}

.carousel-image-overlay{
color: white;
position: absolute; 
bottom: 0; 
left:0; 
min-height: 25%; 
width:100%; 

}


@media (min-width: 992px) { 
.carousel-image-overlay{
position: absolute; 
bottom: 25%; 
left: 25%; 
right: 25%; 
min-height: 50%; 
width:50%; 
}

 }/*min-width: 992px*/

/*••••••••••••••••••••••• INDEX ONLY ends •••••••••••••••••••••••*/

/*•••••••••••••••••••••••• OFFCANVAS ••••••••••••••••••••••••*/
.offcanvas-backdrop {
  background-color: rgba(var(--lead-color-rgb), 1.0);
}
.offcanvas-backdrop.fade {
  opacity: 0;
}
.offcanvas-backdrop.show {
  opacity: .3;
}

.main-navi .offcanvas .nav-item a{
  text-transform: uppercase;
  color: rgba(var(--lead-black-rgb), .4);
  transition: all .5s;
  pointer-events: all;
}
.main-navi .offcanvas .nav-item a:hover{
  text-transform: uppercase;
  color: rgba(var(--lead-white-rgb), .8);
}
.nav-link.effect::before{
  position: absolute; top: 0; left: 0;
  height: 100%; width: 2px;
  content: '';
  background: rgba(var(--lead-color-rgb), .3);
    z-index: -1;
    pointer-events: auto;
transition: all .5s;
}
 .nav-link.effect:hover::before{
  position: absolute; top: 0; left: 0;
  height: 100%; width: 100%;
  content: '';
  background: rgba(var(--lead-color-rgb), 1);
    z-index: -1;
    pointer-events: auto;

}


/*••••••••••••••••••••••• event details •••••••••••••••••••••••*/

.similar-card {
cursor: pointer;
transition: all .3s;
}
.similar-card:hover.shadow {
  box-shadow: .2rem 0.5rem 1rem rgba(0, 0, 0, 0.30) !important;
}
.heading{
  position: relative;
  margin-bottom: 2rem;
}
.similar-card .card-footer{
transition: all .3s;
border-color: white;
}

.heading-effect{
  background: rgba(var(--lead-color-rgb), .8);
transition: all .5s;
height: 1px;
    width: 0%;

}
.heading-effect p{
  line-height: 1px;
font-size: 3rem;
color: rgba(var(--lead-black-rgb), .3);
background-color: white !important;
width: 3rem;
}

.transparent-input { background: tranparent !important; }

/*                   AOS                   */
    [data-aos="aos-shadow"] {
              /* h  v   b     s*/
    box-shadow: 8px 8px 7px -9px rgba(66, 68, 90, 0);
    }

    [data-aos="aos-shadow"].aos-animate {
    box-shadow: 8px 8px 7px -5px rgba(66, 68, 90, .6);

    }
    [data-aos="aos-heading"] {
    width: 0%;
    }

    [data-aos="aos-heading"].aos-animate {
    width: 50%;
    }

    [data-aos="aos-heading-dot"] {
    opacity: 0;
    }

    [data-aos="aos-heading-dot"].aos-animate {
    opacity: 1;
    }
    [data-aos="aos-heading-h1"] {
    opacity: .5;
    }

    [data-aos="aos-heading-h1"].aos-animate {
    opacity: .7;
    }
.form-control{
  border-top: none;
  border-left: none;
  border-right: none;
/*  border-bottom: none;
*/
}
.form-control:focus{
    border-color: tomato;
    border-width: 2px;
/*    -webkit-box-shadow: none;
    box-shadow: none;
*/
    box-shadow: 8px 8px 7px -9px rgba(66, 68, 90, 0.3);
    -webkit-box-shadow: 8px 8px 7px -9px rgba(66, 68, 90, .3);

}

::-webkit-resizer {
  border: none;
  background: transparent;
  outline: none;
}

.tomato-color{
  color:  tomato !important;
}
.custom-checkbox{
  background-color:black;
}


.main-footer h2{
  text-transform: uppercase;

}
.main-footer h4{
  text-transform: uppercase;
  color: #837a7d;
  transition: all .4s;
}
.main-footer h4:hover{
  color: #fefcfc;
}
.main-footer p{
font-size: 1.1rem !important;
}
.footer-button{
  background-color: #837a7d;
}
.footer-button:hover{
  background-color: #837a7d !important;
}
.footer-button:disabled{
  background-color: #837a7d !important;
  border-color: #837a7d !important;
  opacity: .7 !important;
}

.main-footer .p-link{
color: #fefcfc;
transition: all .4s;
}
.main-footer .p-link:hover{
color: #837a7d;

}

.main-footer .socials-item{
position: relative;
opacity: 1;
transition: all .4s;
}

.main-footer .socials-item:hover{

opacity: .5;

}

</style>

