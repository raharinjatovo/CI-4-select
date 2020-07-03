<?php

/**
 *
 */
 namespace App\Models;
 use CodeIgniter\Model;
class SelectModel extends Model
{
  protected $table = 'geo_dist';


  public function login(string $pseudo='',string $password='')
  {
        //  $session = session();

        return $this->select('mail')


              ->select("first_name")
              ->select("last_name")
              ->select("password")

              ->where('mail',$pseudo)


              ->findAll();



  }
  public function fetch($value='')
  {
    return $this->select('mail')


          ->select("first_name")
          ->select("last_name")
          ->select("password")

          ->where('mail',$pseudo)


          ->findAll();
  }
}


 ?>
