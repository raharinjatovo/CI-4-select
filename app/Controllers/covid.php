<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\CovidModel;

    class covid extends Controller {

    public function index()
    {


      $model = new CovidModel();


      $data = [
              'geo_dist'  => $model->getNews(),
              'countriesAndTerritories' => 'an',
      ];
    //  In controller
    //  $data = Model("CovidModel")->Function1();

      // echo view('templates/header', $data);
      // echo view('news/overview', $data);
      //echo view('templates/footer');
      echo view('covid/select',$data);
    }
    public function world($value='')
    {

           $model = new CovidModel();


           $data = [
                   'geo_dist'  => $model->bycontinent($this->request->getVar('title'),$this->request->getVar('james'),$this->request->getVar('filter'),$this->request->getVar('date'),$this->request->getVar('month'),$this->request->getVar('continent')),
                   'countriesAndTerritories' => 'an',
           ];
         //  In controller
         //  $data = Model("CovidModel")->Function1();

           // echo view('templates/header', $data);
           // echo view('news/overview', $data);
           //echo view('templates/footer');
           echo view('covid/continent',$data);
    }
     public function bonjour($value = '')
     {
       echo "string";

     }
     public function hello($value = '')
     {


       $model = new CovidModel();


       $data = [
               'geo_dist'  => $model->bycontinent($value),
               'countriesAndTerritories' => 'an',
       ];
     //  In controller
     //  $data = Model("CovidModel")->Function1();

       // echo view('templates/header', $data);
       // echo view('news/overview', $data);
       //echo view('templates/footer');
       echo view('covid/continent',$data);
     }




    }
?>
