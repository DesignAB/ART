<?php
namespace SqlQueries;
class sqlAdmCategoriesController extends sqlAdmCategories{

    public $categories_array;
    // public function __construct(){
    //   $this->categories_row;
    // }


    public function categoriesArray(){
      $categories_row = $this->allCategories();
      $categories_array = array();
      foreach ($categories_row as $key) {
        $categories_array[$key['display_name']] = $key['name'];
      }

      return $categories_array;
    }// CheckUserCookies






}// class ends
