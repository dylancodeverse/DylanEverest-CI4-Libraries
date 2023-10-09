<?
namespace App\Libraries;

class DataFormPrepa
{

    protected $method = 'POST';

    public function __construct ($haha) {
        echo 'huhu';   
    }
    public function vi ()
    {
        return view("dataForm");
    }
    public function getDataForm ()
    {
        echo $_POST ;
    }
}