
<nav id="navbar1" class="navbar sticky-top bg-blue main-navi shadow-sm" style="transition: all 1s;">

  <div class="container-fluid text-center">

    <a class="navbar-brand" href="">
      <img src="{IMGFOLDER}logo-white.png" alt="">
    </a>
    <h5 class="text-white">Jesteście Państwo na stronie naszego Partnera</h5>
<button class="navbar-toggler hamburger hamburger--collapse ms-0" type="button"  data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
  <span class="hamburger-box">
    <span class="hamburger-inner"></span>
  </span>
</button>


    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" data-bs-backdrop="false">

      <div class="offcanvas-header px-0"> <!-- added px-0-->
        <h5 class="offcanvas-title ps-4" id="offcanvasNavbarLabel">MENU</h5>
        <button type="button" class="btn-close text-reset me-2" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>


      <div class="offcanvas-body menu px-0 text-start"> <!-- added px-0-->
        <ul class="navbar-nav justify-content-end flex-grow-1"> <!--  removed pe-3-->
   {if !empty(CAT_DATA)}
     {foreach from=CAT_DATA key=key item=value name=offcancas_navi}
      {if $value.menuable == 'on'}
        {if empty($value.subcategory)}
          <li class="nav-item mt-1 px-4" style="position: relative;">
            <a class="nav-link effect" href="/{$value.category}">{$value.display_name}</a>
          </li>
          {else}
          {* this is dropdown if cat has subcats *}
          <li class="drop nav-item mt-1 px-4 position-relative ">
            <a class="nav-link" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {$value.display_name}
            </a>
            <ul class="dropdown-menu border-0 rounded-0 position-relative">
            {foreach from=SUBCAT_DATA key=subkey item=subvalue name=offcancas_navi_sub}
            {if $subvalue.category == $value.category}
            {if $subvalue.menuable == on}
              <li class="mb-2"><a class="drop-link" href="/{$value.category}/{$subvalue.subcategory}">{$subvalue.subcategory_display}</a></li>
            {/if}
            {/if}
            {/foreach}
            </ul>
          </li>
          {* this is dropdown if cat has subcats *}


          {/if} {* if empty($value.subcategory) *}

      {/if}{* if menuable on*}
      {/foreach}
    {/if}
        </ul>
      </div> <!-- offcanvas body-->


    </div><!-- offcanvas -->

  </div> <!-- container-fluid-->
</nav>