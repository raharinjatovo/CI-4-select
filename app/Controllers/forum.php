<?php
namespace App\Controllers;
use CodeIgniter\Controller;
class forum extends Controller
{
  public function index()
   {
    return $this->acceuil();

    }
     public function bonjour($pseudo = '')
     {
       echo 'Salut à toi : ' . $pseudo;
     }
     public function manger($plat = '', $boisson = '')
      {  echo 'Voici votre menu : <br />';
         echo urldecode($plat) . '<br />';
          echo urldecode($boisson) . '<br />';
           echo 'Bon appétit !';
      }
  public function acceuil()
  {
    $data = array();
    $data['pseudo'] = 'Arthur';
    $data['email'] = 'email@ndd.fr';
    $data['en_ligne'] = true;
    // Maintenant, les variables sont disponibles dans la vue
    return view('pejy', $data);


  }
}
?>
