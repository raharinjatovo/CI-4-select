
<?php
namespace App\Models;
use CodeIgniter\Model;
class Ajaxsearch_model extends Model
{
 function fetch_data($query)
 {
  $this->db->select("*");
  $this->db->from("geo_dist");
  if($query != '')
  {
   $this->db->like('day', $query);
   $this->db->or_like('countriesAndTerritories', $query);
   $this->db->or_like('continentExp', $query);
   $this->db->or_like('geoId', $query);
   $this->db->or_like('cases', $query);
  }
  $this->db->order_by('countriesAndTerritories', 'DESC');
  return $this->db->get();
 }
}
?>
