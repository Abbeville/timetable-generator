<?php

class settings extends controller {

   function __construct() {
      parent::__construct();
      $this->loadmodel("settings");
        define("manager", "settings");
   }

   public function index() {
       
         $this->settings_home();
     
   }

  
   public function settings_home() {
          $this->view->curr_settings=$this->model->curr_settings();
          $this->view->all_sessions=$this->model->all_sesions();
          $this->view->all_terms=$this->model->all_terms();
         
      $this->view->render("settings/index", TRUE);
   }
   public function switchcalender() {
          $this->view->curr_settings=$this->model->curr_settings();
          $this->view->all_sessions=$this->model->all_sesions();
          $this->view->all_terms=$this->model->all_terms();
         
      $this->view->render("settings/switch", TRUE);
   }

   public function save2() {
        $this->model->save2();
   } 
   public function save() {
        $this->model->save();
   } 
   public function switchs() {
        $this->model->switchs();
   } 

   public function type_to_id() {
        $this->model->type_to_id();
   } 

  
}
