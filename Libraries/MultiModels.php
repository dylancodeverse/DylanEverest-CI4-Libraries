<?php

namespace App\Libraries;

class MultiModels 
{
    protected $models =array() ;

    protected $db ;

    /*
    *   For complex insertion
    */
    public array $multipleSetModels ;

    public function __construct($modelss=null,string $group )
    {
        $this->models =$modelss;
        
        $this->db = \Config\Database::connect($group);

    }


    public function do_insert($data)
    {

        if (empty($this->models) || empty($data) ) 
        {
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

    
    public function do_multiple_insert(...$data)
    {
        if (empty($this->models) || empty($data) ) 
        {
            return false;
        }


        $this->db->transStart(); // Démarrez une transaction

        try 
        {
            foreach ($data as $oneSetData) 
            {
                foreach ($this->models as $modelClass) 
                {
                    $model = new $modelClass($this->db);

                    $keyValue= $model->insert($oneSetData,true);

                    $pk = $model->primaryKey ;

                    $oneSetData[$pk] =$keyValue ;

                }
            }

            $this->db->transComplete(); // Terminez la transaction

            if ($this->db->transStatus() === false) 
            {

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

    public function do_complex_insert(...$data)
    {

        if (empty($this->models) || empty($data) ) 
        {
            return false;
        }

        $this->db->transStart(); // Démarrez une transaction

        $toExecute = array();

        try 
        {
            foreach ($data as $dataValue) 
            {
                $toExecute = array_merge($toExecute, $dataValue);
                foreach ($this->multipleSetModels as $setModelClass) 
                {

                    foreach ($setModelClass as $modelClass) 
                    {

                        $model = new $modelClass($this->db);

                        $keyValue= $model->insert($toExecute,true);
    
                        $pk = $model->primaryKey ;
    
                        $toExecute[$pk] =$keyValue ;
    
                    }

                }
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
        if (empty($this->models) || empty($refIds)) 
        {
            return false;
        }
    
        $this->db->transStart(); // Démarrez une transaction
    
        try 
        {
            foreach ($this->models as $modelClass) 
            {
                $model = new $modelClass($this->db);
             
                $result = $model->delete($refIds[$model->primaryKey]);
            
                // Vérifiez si la suppression a réussi
                if (!$result) 
                {
                
                    // La suppression a échoué pour cet enregistrement, annulez la transaction
                    $this->db->transRollback();
                
                    return false;
                }
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

            $this->db->transRollback();

            return false;
        }
    }
    
    
    
}
