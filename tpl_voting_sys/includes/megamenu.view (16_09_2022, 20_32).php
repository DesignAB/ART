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
         <div class="collapse navbar-collapse" id="main_nav">
            <ul class="navbar-nav p-3 p-md-0">
               <li class="nav-item"> <a class="nav-link active" href="#">homek</a> </li>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Pages </a>
                  
                  <!-- Dropdown -->
                  <ul class="dropdown-menu">
                     <li><a class="dropdown-item" href="#">About Us </a></li>
                     <!-- Dropdown Megasubmenu -->
                     <li>
                        <a class="dropdown-item" href="#"> Dropdown Content<strong class="float-end"><i class="bi bi-caret-down"></i></strong> </a>
                        <div class="submenu dropdown-menu mega-submenu p-3">
                           <span>
                           A ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                           </span>
                        </div>
                     </li>
                     <li><a class="dropdown-item" href="#">Login </a></li>
                  </ul>
               </li>


               <!-- Mega Menu -->
               <li class="nav-item dropdown ktm-mega-menu ">
                  <a class="nav-link bg-danger" href="#" data-bs-toggle="dropdown">Mega Menu <i class="bi bi-caret-down float-end bg-primary"></i></a>
                  <!-- Mega Menu -->
                  <div class="dropdown-menu mega-menu p-3 border-0">
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