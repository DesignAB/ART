<?php

	// echo $data['adm_f_name']; exit();
  $navbar = $this->loadAdmModel("navbarmodel");
  $navbar_categories = $navbar->navbarCategories($data);



?>

<?php if (in_array('full', $data['adm_rights'])):?>
<div class="offcanvas offcanvas-top" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>

  <div class="offcanvas-body">
  	<?php if (in_array('full', $data['adm_rights'])):?>
	<a class="btn btn-sm btn-success" href="/adm_design">design</a>
	<a class="btn btn-sm btn-primary" href="/adm_categories">kategorie</a>
	<a class="btn btn-sm btn-primary" href="/adm_templates">Templatki</a>
	<a class="btn btn-sm btn-primary" href="/adm_footer">footer</a>
	<a class="btn btn-sm btn-danger" href="/adm_options">konfiguracja</a>
	<a class="btn btn-sm btn-danger" href="/adm_users">administratorzy</a>

	<?php endif;?>
	<?php if (in_array('creator', $data['adm_rights'])):?>

	<?php endif;?>

  </div>
</div>
<?php endif;?>

<div class="container-fluid mb-3 sticky-top">
	<div class="row align-items-center justify-content-center">

		<!-- main nav-->
		<div class="col-12 mb-3 shadow bg-white">
			
			<nav class="navbar navbar-expand-md admin-navbar">
			  <div class="container-fluid">
			    <a class="navbar-brand" href="/admdashboard">HOME</a>
			    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			      <span class="navbar-toggler-icon"></span>
			    </button>
			    <div class="collapse navbar-collapse" id="navbarNavDropdown">
			      <ul class="navbar-nav">

					<?php if (!empty($navbar_categories)):?>	
					<?php foreach ($navbar_categories as $key => $value):?>

					<?php if (empty($value['subcategory'])):?>	
			        <li class="nav-item">
			          <a class="nav-link" href="/<?=$value['editor'];?>"><?=$value['category_display'];?></a>
			        </li>
					<?php endif;?>

					<!-- with subcats-->
					<?php if (!empty($value['subcategory'])):
					$navbar_subcategories = $navbar->navbarSubCategories($value['category']);
					?>	


			        <li class="nav-item dropdown">
			          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			            <?=$value['category_display'];?>
			          </a>
			          <ul class="dropdown-menu">
					<?php if (!empty($navbar_subcategories)):?>
					<?php foreach ($navbar_subcategories as $subkey => $subvalue):?>
					<li><a class="dropdown-item" href="/<?=$value['editor'];?>/<?=$subvalue['subcategory'];?>"><?=$subvalue['subcategory_display'];?></a></li>

					<?php endforeach; // navbar_subcategories?>
					<?php endif; // !empty navbar_subcategories?>
			          </ul>
			        </li>

					<?php endif; // !empty($value['subcategory']?>

					<!-- with subcats-->


					<?php endforeach;?>
					<?php endif;?>

			      </ul>

						<span class="ms-auto navbar-text">
						<?php if (in_array('advanced', $data['adm_rights'])):?>

						<a class="ms-3"href="adm_me/<?= $data['adm_id'];?>">
						  ja admin
						</a>
						<?php endif;?>



						<?php if (in_array('full', $data['adm_rights'])):?>
						<a class="ms-3 btn btn-sm btn-primary text-white" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">
						  Opcje zaawansowane
						</a>
						<?php endif;?>
						<a class="ms-3 btn btn-sm btn-success text-white"href="adm_logout">
						  wyloguj
						</a>


						</span>


			    </div>
			  </div>
			</nav>

		</div>
		<!-- main nav-->


	</div>
</div>