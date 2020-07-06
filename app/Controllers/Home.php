<?php namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\HomeModel;
use App\Models\NewsModel;
use App\Models\HomeModel1;
use App\Models\CovidModel;
use App\Models\SelectModel;
class Home extends Controller
{
	public function index()
	{
			helper('form');
				 $session = session();
			if ($session->has('name')) {
			return redirect()->to(site_url('CI/public/home/select'));

			}
		 return view('formulaire');

	}
	public function logy(string $mail,string $password,
	string $name,string $last,string $picture)
	{
		$session=session();
		$session->set('name',$name);
	 $session->set('last',$last);
	 $session->set('password',$password);
	 $session->set('email',$mail);
	 $session->set('picture',$picture);
	 if (md5($this->request->getVar('password'))==$password) {
	 		 return redirect()->to(site_url('CI/public/home/select'));

	 }
	 else {
		 $data=['error'=>'<h2><i class="fa fa-warning text-red"></i> Wrong Password </h2>'
	 ];

	 }
		return view('firstlog',$data);

	}
	public function uppass()
	{
		return view('uppass');
	}
	public function confpass()
	{helper('form');
	$session=session();


	if (! $this->validate([
		 'password' => 'required|min_length[3]|max_length[255]',
		 'confirm'  => 'required|min_length[3]|max_length[255]'
	]))
	{
		 //echo view('templates/header', ['title' => 'Create a news item']);
		 return view('confpass',[
			 'validation'=> \Config\Services::validation()
		 ]);

		// echo view('templates/footer');

	}
	else
	{
		if($this->request->getVar('password')!=$this->request->getVar('confirm'))
		{
			$data=['error'=>'Password not match'];
		}
		else {
			$model=new HomeModel();


			 $model->uppass(session()->get('id_user'),md5($this->request->getVar('password')));
		//	$data= $model->login($this->request->getVar('pseudo'),$this->request->getVar('password'));

			return redirect()->to(site_url('CI/public/home/profile?change_password=1'));


		}

			}
	}
	public function check()
	{
		$model= new CovidModel();
		echo "<pre>";
		print_r($model->cases('Madagascar'));
		echo "</pre>";
		// code...
	}
	public function confirm()
	{
		helper('form');
		$session=session();


		if (! $this->validate([
			 'first_name' => 'required|min_length[3]|max_length[255]',
			 'last_name'  => 'required'
		]))
		{
			 //echo view('templates/header', ['title' => 'Create a news item']);
			 return view('confname',[
				 'validation'=> \Config\Services::validation()
			 ]);

			// echo view('templates/footer');

		}
		else
		{
			$model=new HomeModel();

			// $model->update([
			//
			// 		'id_user'  => session()->get('id_user'),
			// 		'first_name'  => $this->request->getVar('first_name'),
			// 		'last_name'  => $this->request->getVar('last_name')
			//
			// ]);
			 $model->upname(session()->get('id_user'),$this->request->getVar('first_name'),
			 $this->request->getVar('last_name'));
		//	$data= $model->login($this->request->getVar('pseudo'),$this->request->getVar('password'));
			$session->set('name',$this->request->getVar('first_name'));
		  $session->set('last',$this->request->getVar('last_name'));
			return redirect()->to(site_url('CI/public/home/profile?change_name=1'));










		}

		//return view('confname');
	}
  public function first()
  {
	$session=session();
		if ($session->has('name')) {
		return redirect()->to(site_url('CI/public/home/select'));

		}


		// $img->move(WRITEPATH.'uploads', "mysary.jpg");
  	return view('create_first');
  }
	public function finder()
	{
			$model = new HomeModel();
			switch (true) {
				case 	(!empty($model->mail('mul@gmail.com'))):
				echo "misy";
					break;

				default:
					// code...
					break;
			}





	}
	public function upname()
	{

	return view('upname');

	}
	public function create()
	{







				$session = session();
				$model = new NewsModel();
			switch (true) {
				case ($session->has('name')):
					 return redirect()->to(site_url('CI/public/home/select'));
					break;

				default:
					// code...
					break;
			}

			helper('form');
			switch (true) {
				case (! $this->validate([

					 'first_name' => 'required|min_length[3]|max_length[20]',
					 'last_name' => 'required|min_length[3]|max_length[20]',
					 'mail'  => 'required',
					 'password'  => 'required'

				])):
				return view('create',[
					'validation'=> \Config\Services::validation()
				]);
					break;


				default:
				$model1 = new HomeModel();
				switch (true) {
					case 	(!empty($model1->mail($this->request->getVar('mail')))):
				return redirect()->to(site_url('CI/public/home/create?mail=1'));
						break;

					default:
					$file = $this->request->getFile('images');


					$filename = '../public/'.$file->getClientName();
					switch (true) {
						case (file_exists($filename)):
						$filename = ''.substr($file->getName(), 0, -4).rand(0,150).'.jpg';
							$file->move(WRITEPATH.'../public',$filename);
							break;

						default:
									$file->move(WRITEPATH.'../public',$file->getName());
							break;
					}

						$model->save([
								'mail' => $this->request->getVar('mail'),
								'password'  => md5($this->request->getVar('password')),
								'first_name'  => $this->request->getVar('first_name'),
								'last_name'  => $this->request->getVar('last_name'),
								'picture'  =>$file->getName()
						]);
						return	$this->logy($this->request->getVar('mail')
						,md5($this->request->getVar('password')),
						$this->request->getVar('first_name'),$this->request->getVar('last_name'),$file->getName());


						break;
				}
						break;
				}


	}

	public function test()
	{
		return view('firstlog');
	}

	//to update profiles
	public function profile()
	{
		$session = session();


 if ($session->has('name')) {

 }
 else {
	 return redirect()->to(site_url('CI/public/home'));

 }

		return view('profile');
	}
	public function long()
	{
		require_once(site_url('CI/public/simple_html_dom.php'));


   $table1 = array();
   $table = array();


   $table2 = array();


$html = file_get_html(site_url('CI/public/index.html'));
foreach($html->find('tr') as $row) {
  $table[] = $row->find('td',0)->plaintext;

      $table2[] = $row->find('td',2)->plaintext;


			echo $table2[array_search('MG', $table)];


}



	}
	public function way()
	{
    //form validation
		helper('form');
		$session=session();
		if ($session->has('name')) {
		return redirect()->to(site_url('CI/public/home/select'));

		}

		if (! $this->validate([
			 'pseudo' => 'required|min_length[3]|max_length[255]',
			 'password'  => 'required'
		]))
		{
			 //echo view('templates/header', ['title' => 'Create a news item']);
			 return view('form',[
				 'validation'=> \Config\Services::validation()
			 ]);

			// echo view('templates/footer');

		}
		else
		{
			$model=new HomeModel();
			$data= $model->login($this->request->getVar('pseudo'),$this->request->getVar('password'));


			 switch ($data[0]['mail']) {
			 	case '':
				$data=['mail'=>'not match'];


					return view('formulaire',$data);
			 		break;

			 	default:
		     if($data[0]['password']==md5($this->request->getVar('password')))
				 {
					 echo $data[0]['picture'];
					return	$this->setsession($this->request->getVar('pseudo'),md5($this->request->getVar('password')),$data[0]['first_name'],$data[0]['last_name'],$data[0]['picture'],$data[0]['id_user']);

				 }
				 else {
				 	$data=['password'=>'worng password'];
					return view('formulaire',$data);

				 }


			 		break;
			 }




			//

		}
		}
    public function maven($value='')
    {
    	echo $value;
    }
		public function select($value='')
		{
			$model = new CovidModel();
			$model1 = new HomeModel1();
			$session=session();
			if ($session->has('name')) {
				$data=[
					'geo_dist'  =>  $model->fetch($value),
					'locate'  =>  $model1->locate(),
					'cas'  =>  $model->cases($value),


					'countriesAndTerritories' => 'an',

				];

				foreach ($model->match($value) as $key ) {
				foreach ($key as $key1 ) {
					$data=[
						'geo_dist'  =>  $model->fetch($value),

						'locate'  =>  $model1->locate($key1),


						'countriesAndTerritories' => 'an',

					];
				}
				}










				return view('vue',$data);

		  }
			else {
          return redirect()->to(site_url('CI/public/home?session=off'));

			}

		}
		public function log(string $pseudo,string $password,
		string $first_name,string $last_name,string $picture)
		{
		 $session = session();

		 $array=[
			 'name'=>$first_name,
			 'password'=>$password,
			 'email'=>$pseudo,
			 'last'=>$last_name
		 ];
		 if($pseudo=='')
		 {
			 //return redirect()->to(site_url('CI/public/home'));

		 }
		 else {
			 $session->set('name',$first_name);
			$session->set('last',$last_name);
	 	  $session->set('password',$password);
	 	  $session->set('email',$array['email']);
	 	  $session->set('picture',$picture);
		 	return view('firstlog');

		 }


		}
	public function setsession(string $pseudo,string $password,
	string $first_name,string $last_name,string $picture,string $id_user)
	{
	 $session = session();

	 $array=[
		 'name'=>$first_name,
		 'id_user'=>$id_user,
		 'password'=>$password,
		 'email'=>$pseudo,
		 'last'=>$last_name,
		 'picture'=>$picture
	 ];
	 if($pseudo=='')
	 {
		 return redirect()->to(site_url('CI/public/home'));

	 }
	 else {
		 $session->set('name',$first_name);
		 $session->set('id_user',$id_user);
		$session->set('last',$last_name);
 	  $session->set('password',$password);
 	  $session->set('email',$array['email']);
 	  $session->set('picture',$picture);
	  var_dump($array);
 		echo '<br><a href="'.site_url('CI/public/home/getsession').'">acceuil</a>';
		return redirect()->to(site_url('CI/public/home/select'));

	 }


	}
	public function getsession()
	{
	//	$this->setsession();
	 $session = session();
	 echo session()->get('name');
	 var_dump($session->has('name'));

  if ($session->has('name')) {
		echo '<br><a href="'.site_url('CI/public/home/sessiondestroy').'">deconnecter</a>';

  }
	else {
		echo '<br><a href="'.site_url('CI/public/home/setsession').'">se connceter</a>';

	}

	echo $session->get('name');
	echo $session->get('password');
	echo $session->get('email');


	}
	public function sessiondestroy()
	{
		$session = session();
		$session->destroy();
		return redirect()->to(site_url('CI/public/home'));

			}

	//--------------------------------------------------------------------

}


?>
