<?php

/**
 *
 */
 namespace App\Models;
 use CodeIgniter\Model;
class HomeModel extends Model
{
  protected $table = 'login';
  protected $allowedFields = ['id_user','mail', 'password', 'first_name','last_name','picture'];

  public function upname($id='',$first_name='',$last_name)
  {
    return $this->set('first_name',$first_name)
                ->set('last_name',$last_name)





          ->where('id_user',$id)
          ->update();



  }
  public function uppass($id='',$password)
  {
    return $this->set('password',$password)






          ->where('id_user',$id)
          ->update();



  }
  public function login(string $pseudo='',string $password='')
  {
        //  $session = session();

        return $this->select('mail')


              ->select("first_name")
              ->select("id_user")
              ->select("last_name")
              ->select("password")
              ->select("picture")

              ->where('mail',$pseudo)


              ->findAll();



  }
  public function mail($value='')
  {
    return $this->select('mail')


          ->where('mail',$value)


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
