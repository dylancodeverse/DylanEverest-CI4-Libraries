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

                $model = new $modelClass($this->db);

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

    public function do_delete($refIds)
    {
        if (empty($this->models) || empty($refIds)) {
            return false;
        }
    
        $this->db->transStart(); // Démarrez une transaction
    
        try {
            foreach ($this->models as $modelClass) {
                $model = new $modelClass($this->db);
    
                // Appelez la méthode doDelete de la classe de base CodeIgniter\Model
                echo $refIds[$model->primaryKey];
                echo $model->table;

                $result = $model->delete($refIds[$model->primaryKey]);
                echo '
                ';
                echo $result ;
                echo ' ';
                // Vérifiez si la suppression a réussi
                if (!$result) {
                    // La suppression a échoué pour cet enregistrement, annulez la transaction

                    $this->db->transRollback();
                    return false;
                }
            }
    
            $this->db->transComplete(); // Terminez la transaction

    
            if ($this->db->transStatus() === false) {
                // La transaction a échoué, retournez false
                return false;
            }
    
            return true;
        } catch (\Exception $e) {
            // Une exception s'est produite, annulez la transaction
            echo $e ;
            $this->db->transRollback();
            return false;
        }
    }
    
    
    
}
