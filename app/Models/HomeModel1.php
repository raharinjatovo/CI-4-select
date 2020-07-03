<?php

/**
 *
 */
 namespace App\Models;
 use CodeIgniter\Model;
class HomeModel1 extends Model
{
  protected $table = 'locate';


  public function locate($value='')
  {
        //  $session = session();

        return $this->select('geoId')


              ->select("lon")
              ->select("lat")
              

              ->where('geoId',$value)


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
