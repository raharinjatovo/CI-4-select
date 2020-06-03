<?php
defined('BASEPATH') OR exit('No direct script access allowed');
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\ajaxsearch_model;
class Ajaxsearch extends Controller {

 function index()
 {
  return view('ajaxsearch');
 }

 function fetch()
 {
  $output = '';
  $query = '';
  $model = new Ajaxsearch_model();

  if($this->input->post('query'))
  {
   $query = $this->input->post('query');
  }
  $data = $model->fetch_data($query);
  $output .= '
  <div class="table-responsive">
     <table class="table table-bordered table-striped">
      <tr>
       <th>Customer Name</th>
       <th>Address</th>
       <th>City</th>
       <th>Postal Code</th>
       <th>Country</th>
      </tr>
  ';
  if($data->num_rows() > 0)
  {
   foreach($data->result() as $row)
   {
    $output .= '
      <tr>
       <td>'.$row->day.'</td>
       <td>'.$row->countriesAndTerritories.'</td>
       <td>'.$row->continentExp.'</td>
       <td>'.$row->geoId.'</td>
       <td>'.$row->cases.'</td>
      </tr>
    ';
   }
  }
  else
  {
   $output .= '<tr>
       <td colspan="5">No Data Found</td>
      </tr>';
  }
  $output .= '</table>';
  echo $output;
 }

}

?>
