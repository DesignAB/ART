
<nav id="navbar1" class="navbar fixed-top bg-blue main-navi shadow-sm" style="transition: all 1s;">

  <div class="container-fluid text-right">

    <a class="navbar-brand" href="">
      <img src="{IMGFOLDER}logo-white.png" alt="">
    </a>

<button class="navbar-toggler hamburger hamburger--collapse ms-0" type="button"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
  <span class="hamburger-box">
    <span class="hamburger-inner"></span>
  </span>
</button>


    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" data-bs-backdrop="false">

      <div class="offcanvas-header px-0"> <!-- added px-0-->
        <h5 class="offcanvas-title ps-4" id="offcanvasNavbarLabel">MENU!</h5>
        <button type="button" class="btn-close text-reset me-2" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>


      <div class="offcanvas-body menu px-0"> <!-- added px-0-->
        <ul class="navbar-nav justify-content-end flex-grow-1"> <!--  removed pe-3-->
          <li class="nav-item mt-1 px-4" style="position: relative;">
            <a class="nav-link effect" href="https://34art.pl/adriaart" target="_blank">wydarzenia z polski</a>
          </li>


   {if !empty(CAT_DATA)}
     {foreach from=CAT_DATA key=key item=value name=offcancas_navi}
      {if $value.menuable == 'on'}
          <li class="nav-item mt-1 px-4" style="position: relative;">
            <a class="nav-link effect" href="/{$value.category}">{$value.display_name}</a>
          </li>

      {/if}
      {/foreach}
    {/if}
        </ul>
      </div> <!-- offcanvas body-->


    </div><!-- offcanvas -->

  </div> <!-- container-fluid-->
</nav>