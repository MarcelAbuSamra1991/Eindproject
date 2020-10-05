<?php
session_start();
function SuccessMessage(){
  if(isset($_SESSION["SuccessMessage"])){
        $Output ='<div class="alert alert-secondary" role="alert">';
        $Output.= '<h3 class="text-success">'.htmlentities($_SESSION["SuccessMessage"]).'</h3>';
        $Output.= "</div>";

        $_SESSION["SuccessMessage"] = null;
        return $Output;
  }
}
  function ErrorMessage(){
    if(isset($_SESSION["ErrorMessage"])){
      $Output= '<div class="alert alert-secondary" role="alert">';
      $Output.= '<h3 class="text-danger">'.htmlentities($_SESSION["ErrorMessage"]).'</h3>';
      $Output.= "</div>";

      $_SESSION["ErrorMessage"] = null;
      return $Output;
    }
  }
 ?>