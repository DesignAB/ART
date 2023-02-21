<nav class="navbar navbar-expand-lg navbar-position pb-4 pb-md-2 simple shadow">
  <div class="navbar-overlay navbar-bg"></div>

     <div class="container-fluid" style="z-index: 2;">
       <a class="navbar-brand ms-md-3" href="/">
       <img src="<?=IMGFOLDER?>brand.jpg" class="navbar-brand-image shadow" alt="...">
       </a>

       <?php if (isset($_SESSION[WEBSITE_NAME.'_u_id'])):?>
         <span class="navbar-text ms-auto px-2">
           <a href="/userdashboard">
           <?='HELLO '.$_SESSION[WEBSITE_NAME.'_user_name']?>
           </a>
         </span>
       <?php endif;?>
           
       <button class="navbar-toggler navbar-bg border-0" data-bs-toggle="collapse" data-bs-target="#main_nav">

   <i class="bi bi-dash-lg my-0 py-0" style="line-height: .3rem;"></i>
   <p class="my-0 py-0">MENU</p>

       </button>

  <!-- Nav Links -->
         <div class="collapse navbar-collapse ms-auto pe-3" id="main_nav">
            <ul class="navbar-nav p-3 p-md-0 ms-auto">
               <!-- simple link -->
               <li class="nav-item main"> <a class="nav-link" href="/">HOMe</a> </li>
               <!-- simple link -->

               <?php if (!empty(CAT_DATA)):?>
                  <?php foreach (CAT_DATA as $key => $value):?>

               <!-- with subcategory -->
               <?php if ($value["subcategory"] == 'on' && $value["menuable"] =='on'): $leave = $value["category"];?>
               <!-- Mega Menu -->
               <li class="nav-item main dropdown ">
                  <a class="nav-link" href="/" data-bs-toggle="dropdown"><?=$value["display_name"];?><span class="nav-icon ms-1"></span></a>
                  <ul class="dropdown-menu p-0 border-0 px-2 mt-0 navbar-bg shadow text-start">

                  <?php foreach (leaveSubcategory($leave) as $key => $value):?>
                     <?php if ($value["menuable"] == 'on'):?>
            <li class="m-0"><a class="dropdown-item nav-link py-2" aria-current="page" href=""><strong><?=$value["subcategory_display"];?></strong></a></li>


                     <?php endif; // ($value["menuable"] ;?>


                  <?php endforeach; //foreach (leaveSubcategory($leave)?>

                  </ul><!-- dropdown ends-->
               </li>
               <!-- Mega Menu -->

               <?php endif; // == 'on'): $leave = $value["category"];?>
               <!-- with subcategory -->
               <?php if ($value["subcategory"] == '' && $value["menuable"] =='on'):?>
               <!-- simple link -->
               <li class="nav-item main "> <a class="nav-link" href="/"><?=$value["display_name"];?></a> </li>
               <!-- simple link -->

               <?php endif;?>


                  <?php endforeach; //foreach (CAT_DATA?>
               <?php endif; //!empty(CAT_DATA)?>


            </ul>


         </div>


     </div>


</nav>
<div class="bottom-navbar-margin d-none d-md-block"></div>