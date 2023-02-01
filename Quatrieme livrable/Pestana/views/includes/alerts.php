<?php

if(isset($_COOKIE['success'])){
  echo '<div class="alert alert-success w-100">'.$_COOKIE['success'].'</div>';
}
if(isset($_COOKIE['error'])){
  echo '<div class="alert alert-danger w-100 position-relative mt-3" style="z-index: 10;">'.$_COOKIE['error'].'</div>';

}
if(isset($_COOKIE['info'])){
  echo '<div class="alert alert-info w-100 position-relative mt-3" style="z-index: 10;">'.$_COOKIE['info'].'</div>';

}

?>
