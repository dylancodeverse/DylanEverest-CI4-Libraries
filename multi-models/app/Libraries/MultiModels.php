<?php

namespace App\Libraries;

class MultiModels 
{
    protected $models =array() ;

    protected $db ;


    public function __construct($modelss=null,string $group )
    {
        $this->models =$modelss;
        
        $this->db = \Config\Database::connect($group);

    }


    public function do_insert($data)
    {

        if (empty($this->models) || empty($data) ) 
        {
            var_dump($this->models);
            return false;
        }


        $this->db->transStart(); // Démarrez une transaction

        try 
        {

            foreach ($this->models as $modelClass) 
            {
                // Instanciez le modèle avec l'instance de la base de données
                var_dump($data);
                echo 'tay';
                echo'';
                $model = new $modelClass($this->db);
                // Insérez les données dans la table spécifiée pour chaque modèle
                $keyValue= $model->insert($data,true);

                $pk = $model->primaryKey ;

                $data[$pk] =$keyValue ;

                

            }

            $this->db->transComplete(); // Terminez la transaction

            if ($this->db->transStatus() === false) 
            {
                // La transaction a échoué, retournez false
                return false;
            }

            return true;
        } 
        catch (\Exception $e) 
        {
            // Une exception s'est produite, annulez la transaction
            $this->db->transRollback();
        
            return false;
        
        }
    }





    
    public function do_select()
    {

    }

    public function do_delete()
    {

    }
    
}
