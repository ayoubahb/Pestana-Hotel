<?php
  class PersonController{

    public function addPerson($id){
      if(isset($_POST['submit'])){
        for ($i=0; $i < $_POST['num-person']; $i++) { 
          $data = array(
          'reserv_id' => $id,
          'f_name'    => $_POST['fperson'.($i+1).''],
          'l_name'    => $_POST['lperson'.($i+1).''],
          'dob'       => $_POST['dperson'.($i+1).'']
          );
        
          $result = Person::add($data);
          if ($result!=='ok') {
            return $result;
          }
        }
        return 'ok';
      }
    }
    public function getPerson($id){
      $result = Person::get($id);
      return $result;
    }
    public function deletePerson($data){
      $result = Person::delete($data['id']);
      if ($result === 'ok') {
        return true;
      }else{
        return false;
      }
    }

  }