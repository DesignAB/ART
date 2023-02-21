<nav class="navbar navbar-expand-lg navbar-position pb-4 pb-md-2">
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
         <div class="collapse navbar-collapse ms-auto" id="main_nav">
            <ul class="navbar-nav p-3 p-md-0 ms-auto">
               <!-- simple link -->
               <li class="nav-item"> <a class="nav-link active" href="/">HOME</a> </li>
               <!-- simple link -->

               <?php if (!empty(CAT_DATA)):?>
                  <?php foreach (CAT_DATA as $key => $value):?>

               <!-- with subcategory -->
               <?php if ($value["subcategory"] == 'on'): $leave = $value["category"];?>

                  <?php foreach (leaveSubcategory($leave) as $key => $value):?>

                  <?php endforeach; //foreach (leaveSubcategory($leave)?>

                  
               <?php endif; // == 'on'): $leave = $value["category"];?>
               <!-- with subcategory -->


               <!-- simple link -->
               <li class="nav-item"> <a class="nav-link active" href="/"><?=$value["display_name"];?></a> </li>
               <!-- simple link -->

                  <?php endforeach; //foreach (CAT_DATA?>
               <?php endif; //!empty(CAT_DATA)?>

               <!-- Mega Menu -->
               <li class="nav-item dropdown ktm-mega-menu ">
                  <a class="nav-link" href="/" data-bs-toggle="dropdown">Mega <span class=nav-icon></span></a>

                  <div class="dropdown-menu mega-menu p-3 border-0 px-5">
                     <span>
                     a ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                     </span>
                  </div>
               </li>
               <!-- Mega Menu -->


               <!-- Mega Menu -->
               <li class="nav-item dropdown ktm-mega-menu ">
                  <a class="nav-link" href="/" data-bs-toggle="dropdown">Mega 2<span class=nav-icon></span></a>

                  <!-- Mega Menu -->
                  <div class="dropdown-menu mega-menu p-3 border-0 px-5">
                     <span>
                     B ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                     </span>
                  </div>
               </li>
               <!-- Mega Menu -->



            </ul>


         </div>


     </div>


</nav>
<div class="bottom-navbar-margin d-none d-md-block"></div>