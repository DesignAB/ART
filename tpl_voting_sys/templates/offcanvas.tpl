<nav class="navbar navbar-position pb-4 pb-md-2 offcanvas-menu">
  <div class="navbar-overlay navbar-bg d-md-none"></div>

  <div class="container-fluid" style="z-index: 2;">
    <a class="navbar-brand ms-md-3" href="/">
    <img src="{IMGFOLDER}brand.jpg" class="navbar-brand-image shadow" alt="...">
    </a>

    <?php if (isset($_SESSION[WEBSITE_NAME.'_u_id'])):?>
      <span class="navbar-text ms-auto px-2">
        <a href="/userdashboard" aria-label="Strefa użytkownika">
        <?='HELLO '.$_SESSION[WEBSITE_NAME.'_user_name']?>
        </a>
      </span>
    <?php endif;?>
        
    <button class="navbar-toggler navbar-bg border-0" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">

<i class="bi bi-dash-lg my-0 py-0" style="line-height: .3rem;"></i>
<p class="my-0 py-0">MENU</p>

    </button>

    <div class="offcanvas offcanvas-bg offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" data-bs-backdrop="false" data-bs-scroll="true">

      <div class="offcanvas-header order-1 order-lg-0">
        <h5 class="offcanvas-title" id="offcanvasRightLabel">MENU</h5>
        <button type="button" class="navbar-toggler border-0" data-bs-dismiss="offcanvas" aria-label="Close"><i class="bi bi-x-circle"></i>
        </button>
      </div>

      <div class="offcanvas-body d-flex align-items-end align-items-md-start order-0 order-lg-1">

      <ul class="navbar-nav ms-auto me-md-5 text-center text-md-start w-100">

   {if !empty(CAT_DATA)}
     {foreach from=CAT_DATA key=key item=value name=offcancas_navi}
      {if $value.menuable == 'on'}


        {if empty($value.subcategory)}
        <li class="nav-item py-">
          <a class="nav-link main py-0 pb-1" aria-current="page" href="/{$value.category}"><span class="mb-1 p-0">{$value.display_name}</span></a>
        </li>
        {/if}

          {if $value.subcategory == 'on'}
          {$leave = $value.category|leaveSubcategory}
          <li class="nav-item py-">
            <p class="nav-link main py-0 pb-1" aria-current="page" ><span class="mb-1 p-0">{$value.display_name}</span></p>
          </li>
          {foreach from=$leave key=subkey item=sub_value name=suboffcancas_navi}
              {if $sub_value.menuable == 'on'}
                <li class="nav-item my-0 py-1 ">
                  <a class="nav-link sub py-0" aria-current="page" href="/{$sub_value.category}/{$sub_value.subcategory}">{$sub_value.subcategory_display}</a>
                </li>
              {/if}
            {/foreach}


          {/if}{** if $value.subcategory == 'on' **}


          <hr>



      {/if}
    {/foreach}
  {/if}

    {if empty($smarty.session.{$user_session})}
        <li class="nav-item">
          <a class="nav-link" href="userregister">zarejestruj się</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="userlogin">zaloguj</a>
        </li>
    {/if}

    {if !empty($smarty.session.{$user_session})}

        <li class="nav-item">
      <form method="POST" enctype="multipart/form-data">
        <input type="hidden" id="important" class="form-control form-control-sm" name="log_out">
        <button id="" class="no-button">wyloguj</button>
      </form>

        </li>
    {/if}



<!--         <li class="nav-item">
          <a class="nav-link language" href="#" lang="en">eng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link language" href="#" lang="pl">pl</a>
        </li>
 -->
      </ul>


      </div><!-- offcanvas body-->



        <div class="offcanvas-overlay offcanvas-bg" style="z-index: -1;"></div>

    </div>


  </div>
</nav>
<div class="bottom-navbar-margin d-none d-md-block"></div>