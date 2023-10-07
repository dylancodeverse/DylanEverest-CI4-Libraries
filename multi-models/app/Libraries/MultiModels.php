<?php

class MulitModels 
{
    protected $models =array() ;
    protected $db ;

    public function __construct($modelss=null,string $group )
    {
        if (!empty($models)) 
        {
            $this->models = $models;
        }
        
        $db = \Config\Database::connect($group);

    }


    public function do_insert($data, $tables = null)
    {
        if (empty($this->models) || empty($data) || empty($tables)) 
        {
            return false;
        }

        if (!is_array($tables)) 
        {
            $tables = array($tables);
        }

        if (count($tables) !== count($this->models)) 
        {
            // Assurez-vous que le nombre de tables correspond au nombre de modèles
            return false;
        }

        $this->db->transStart(); // Démarrez une transaction

        try 
        {
            foreach ($this->models as $key => $modelClass) 
            {
                $table = $tables[$key];

                // Instanciez le modèle avec l'instance de la base de données
                $model = new $modelClass($this->db);

                // Insérez les données dans la table spécifiée pour chaque modèle
                $model->insert($table, $data);
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
