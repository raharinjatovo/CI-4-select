<?php
namespace App\Models;
use CodeIgniter\Model;

class CovidModel extends Model
{
  protected $table = 'geo_dist';
  protected  $geold='AF';
  protected $allowedFields = [ 'cases', 'countriesAndTerritories'];

  Protected $primaryKey = "id_covid";



public function bycontinent($title='',$james='',$filter='',$date='',$month='',$country='',$continent='')
{
  if($country!='')
  {

      return $this->select('countriesAndTerritories')

                  ->selectSum("deaths")
                  ->selectSum("cases")

                  ->where('countriesAndTerritories',$country)

                  ->findAll();


    switch ($date) {
      case '':
        // code...
        break;

      default:
      return $this->select('countriesAndTerritories')
                  ->select('dateRep')
                  ->selectSum("deaths")
                  ->selectSum("cases")
                  ->where('dateRep',$date)
                  ->where('countriesAndTerritories',$country)

                  ->findAll();
        break;
    }
    switch ($month) {
      case '':
        // code...
        break;

      default:
      return $this->select('countriesAndTerritories')
                  ->select('month')
                  ->selectSum("deaths")
                  ->selectSum("cases")
                  ->where('month',$month)
                  ->where('countriesAndTerritories',$country)

                  ->findAll();
        break;
    }

  }else
  if ($date!='') {
    if($country!='')
    {
      return $this->select('countriesAndTerritories')
                  ->select('dateRep')
                  ->select("deaths")
                  ->select("cases")
                  ->where('dateRep',$date)
                  ->where('countriesAndTerritories',$country)

                  ->findAll();

    }else
    if($filter!="")
    {

        switch ($filter) {
          case 'cases_desc':
          return $this->select('countriesAndTerritories')
                      ->select('dateRep')
                      ->select("deaths")
                      ->select("cases")
                      ->where('dateRep',$date)
                      ->groupBy('countriesAndTerritories')
                      ->orderBy('cases','desc')
                      ->findAll();
            break;
            case 'deaths_desc':
            return $this->select('countriesAndTerritories')
                        ->select('dateRep')
                        ->select("deaths")
                        ->select("cases")
                        ->where('dateRep',$date)
                        ->groupBy('countriesAndTerritories')
                        ->orderBy('deaths','desc')
                        ->findAll();
              break;
              case 'cases_max':
              return $this->select('countriesAndTerritories')
                          ->select('dateRep')
                          ->select("deaths")
                          ->select("cases")
                          ->where('dateRep',$date)
                          ->groupBy('countriesAndTerritories')
                          ->orderBy('cases','desc')
                          ->findAll(1);
                break;
                case 'cases_min':
                return $this->select('countriesAndTerritories')
                            ->select('dateRep')
                            ->select("deaths")
                            ->select("cases")
                            ->where('dateRep',$date)
                            ->groupBy('countriesAndTerritories')
                            ->orderBy('cases','asc')
                            ->findAll(1);
                  break;
                  case 'deaths_max':
                  return $this->select('countriesAndTerritories')
                              ->select('dateRep')
                              ->select("deaths")
                              ->select("cases")
                              ->where('dateRep',$date)
                              ->groupBy('countriesAndTerritories')
                              ->orderBy('deaths','desc')
                              ->findAll(1);
                    break;
                    case 'deaths_min':
                    return $this->select('countriesAndTerritories')
                                ->select('dateRep')
                                ->select("deaths")
                                ->select("cases")
                                ->where('dateRep',$date)
                                ->groupBy('countriesAndTerritories')
                                ->orderBy('deaths','asc')
                                ->findAll(1);
                      break;

          default:
            // code...
            break;
        }
    }

      return $this->select('countriesAndTerritories')
                  ->select('dateRep')
                  ->selectSum("deaths")
                  ->selectSum("cases")
                  ->where('dateRep',$date)
                  ->groupBy('countriesAndTerritories')

                  ->findAll();



  }
  elseif ($month!='') { //if var mon is choosen
    if($filter!="")
    { // if filter case and deaths is choosen
        switch ($filter) {
          case 'cases_desc':
          return $this->select('countriesAndTerritories')
                      ->select('month')
                      ->selectSum("deaths")
                      ->selectSum("cases")
                      ->where('month',$month)
                      ->groupBy('countriesAndTerritories')
                      ->orderBy('cases','desc')
                      ->findAll();
            break;
            case 'deaths_desc':
            return $this->select('countriesAndTerritories')
                        ->select('month')
                        ->select("deaths")
                        ->select("cases")
                        ->where('month',$month)
                        ->groupBy('countriesAndTerritories')
                        ->orderBy('deaths','desc')
                        ->findAll();
              break;
              case 'cases_max':
              return $this->select('countriesAndTerritories')
                          ->select('month')
                          ->selectSum("deaths")
                          ->selectSum("cases")
                          ->where('month',$month)
                          ->groupBy('countriesAndTerritories')
                          ->orderBy('cases','desc')
                          ->findAll(1);
                break;
                case 'cases_min':
                return $this->select('countriesAndTerritories')
                            ->select('month')
                            ->selectSum("deaths")
                            ->selectSum("cases")
                            ->where('month',$month)
                            ->groupBy('countriesAndTerritories')
                            ->orderBy('cases','asc')
                            ->findAll(1);
                  break;
                  case 'deaths_max':
                  return $this->select('countriesAndTerritories')
                              ->select('month')
                              ->selectSum("deaths")
                              ->selectSum("cases")
                              ->where('month',$month)
                              ->groupBy('countriesAndTerritories')
                              ->orderBy('deaths','desc')
                              ->findAll(1);
                    break;
                    case 'deaths_min':
                    return $this->select('countriesAndTerritories')
                                ->select('month')
                                ->selectSum("deaths")
                                ->select("cases")
                                ->selectSum('month',$month)
                                ->groupBy('countriesAndTerritories')
                                ->orderBy('deaths','asc')
                                ->findAll(1);
                      break;

          default:
            // code...
            break;
        }
    }
    // if filetr is empty
    return $this->select('countriesAndTerritories')
                ->select('month')
                ->selectSum("deaths")
                ->selectSum("cases")
                ->where('month',$month)
                ->groupBy('countriesAndTerritories')

                ->findAll();

  }
  elseif ($continent!='') {
    switch ($continent) {
      case 'continent':
      return $this->select('continentExp')

                  ->selectSum("deaths")
                  ->selectSum("cases")

                  ->groupBy('continentExp')

                  ->findAll();
        break;

      default:
        // code...
        break;
    }
  }
  else
  if($filter!='')
  {


    if($filter=='cases_desc')
      {
        if($title!="")
        {

        }

        return $this->select('countriesAndTerritories')
                    ->select('continentExp')
                    ->select('geoId')
                    ->selectSum("deaths")
                    ->selectSum("cases")
                    ->groupBy("countriesAndTerritories")
                    ->orderBy('cases', 'desc')
                    ->findAll();
      }
      elseif ($filter=='deaths_desc') {
        return $this->select('countriesAndTerritories')
                    ->select('continentExp')
                    ->select('geoId')
                    ->selectSum("deaths")
                    ->selectSum("cases")
                    ->groupBy("countriesAndTerritories")
                    ->orderBy('deaths', 'desc')
                    ->findAll();
      }
      elseif ($filter=='deaths_max') {
        return $this->select('countriesAndTerritories')
                    ->select('continentExp')
                    ->select('geoId')
                    ->selectSum("deaths")

                    ->selectSum("cases")
                    ->groupBy("countriesAndTerritories")
                    ->orderBy('deaths', 'desc')
                    ->findAll(1);
      }elseif ($filter=='deaths_min') {
        return $this->select('countriesAndTerritories')
                    ->select('continentExp')
                    ->select('geoId')
                    ->selectSum("deaths")
                    ->selectSum("cases")
                    ->groupBy("countriesAndTerritories")
                    ->orderBy('deaths', 'asc')
                    ->findAll(1);
      }
      elseif ($filter=='cases_max') {
        return $this->select('countriesAndTerritories')
                    ->select('continentExp')
                    ->select('geoId')
                    ->selectSum("deaths")

                    ->selectSum("cases")
                    ->groupBy("countriesAndTerritories")
                    ->orderBy('cases', 'desc')
                    ->findAll(1);
      }
      elseif ($filter=='cases_min') {
        return $this->select('countriesAndTerritories')
                    ->select('continentExp')
                    ->select('geoId')
                    ->selectSum("deaths")

                    ->selectSum("cases")
                    ->groupBy("countriesAndTerritories")
                    ->orderBy('cases', 'asc')
                    ->findAll(1);
      }
  }
  if($title!=""){

   switch ($title) {
     case 'continent':
     return $this->select('continentExp')
                 ->selectSum("deaths")
                 ->selectSum("cases")

                 ->groupBy("continentExp")
                 ->findAll();
       break;

     default:
       // code...
       break;
   }
    return $this->select('continentExp')
            ->selectSum("deaths")
            ->selectSum("cases")
            ->Where('continentExp',$title)
            ->findAll();

    if ($james!='') {
          return $this->select('continentExp')
                  ->selectSum("deaths")
                  ->selectSum("cases")
                  ->Where('continentExp',$james)
                  ->findAll();
    }

  }
  elseif ($james!='') {
    return $this->select('countriesAndTerritories')

                ->selectSum("deaths")
                ->selectSum("cases")

                ->where('countriesAndTerritories',$james)

                ->findAll();
  }
  else
  if($title=='world')
  {
    return $this
                ->selectSum("deaths")
                ->selectSum("cases")

                ->findAll();

  }
  elseif ($title=='continent') {
    return $this->select('continentExp')
                ->selectSum("deaths")
                ->selectSum("cases")

                ->groupBy("continentExp")
                ->findAll();
  }
    elseif ($title=='continent') {
      return $this->select('continentExp')
                  ->selectSum("deaths")
                  ->selectSum("cases")
                //  ->Where('continentExp',$title)
                  ->groupBy("continentExp")
                  ->findAll();

    }
    else{




    }




}


  public function getNews($cases = false)
{
  if ($cases === false)
  {



        $value='US';
        return $this->select('countriesAndTerritories')
                    ->select('continentExp')
                    ->select('geoId')
                    ->selectSum("deaths")
                    ->selectSum("cases")
                    ->groupBy("countriesAndTerritories")
                    ->findAll();



  }

  return $this->asArray()
               ->where(['cases' => $cases])
               ->first();
}
public function country($value='')
{
  if($value='cases_desc')
  {

    return $this->select('countriesAndTerritories')
                ->select('continentExp')
                ->select('geoId')
                ->selectSum("deaths")
                ->selectSum("cases")
                ->groupBy("countriesAndTerritories")
                ->orderBy('cases', 'desc')
                ->findAll();
  }











}
}
 ?>
