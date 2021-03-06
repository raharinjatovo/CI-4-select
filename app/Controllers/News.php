<?php namespace App\Controllers;
use App\Models\NewsModel;
use CodeIgniter\Controller;

class News extends Controller
{
  public function index()
{
  $model = new NewsModel();

  $data = [
          'news'  => $model->getNews(),
          'title' => 'News archive',
  ];

  echo view('templates/header', $data);
  echo view('news/overview', $data);
  echo view('templates/footer');
  echo view('covid/select');

}

public function view($slug = NULL)
{
  $model = new NewsModel();

  $data['news'] = $model->getNews($slug);

  if (empty($data['news']))
  {
          throw new \CodeIgniter\Exceptions\PageNotFoundException('Cannot find the news item: '. $slug);
  }

  $data['title'] = $data['news']['title'];

  echo view('templates/header', $data);
  echo view('news/view', $data);
  echo view('templates/footer');
}
public function create()
{
    helper('form');
    $model = new NewsModel();

    if (! $this->validate([
        'title' => 'required|min_length[3]|max_length[255]',
        'body'  => 'required'
    ]))
    {
        echo view('templates/header', ['title' => 'Create a news item']);
        echo view('news/create');
        echo view('templates/footer');

    }
    else
    {
        $model->save([
            'mail' => $this->request->getVar('title'),
            'password'  => url_title($this->request->getVar('title')),
            'first_name'  => $this->request->getVar('body'),
        ]);
        echo view('news/success');
    }
}
}
?>
