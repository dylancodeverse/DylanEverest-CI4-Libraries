<?php

namespace App\Controllers\test;

use App\Libraries\DataFormPrepa;
use App\Models\UserModel;
use App\Models\ProductModel;
use App\Libraries\MultiModels;
use App\Models\OrdersModel;
use CodeIgniter\Controller;

class TestController extends Controller
{
    public function index()
    {
        // Exemple de données à insérer
        $userData = [
            'username' => 'john_doe',
            'email' => 'john@example.com',
            'password' => 'hashed_password',
            'product_name' => 'Example Product',
            'price' => 19.99,
            'order_number'=>'456',
            'order_date' => '2023-06-06'
        ];

        // Chargez la classe MultiModels avec les modèles correspondants
        $models = [
            UserModel::class,
            ProductModel::class,
            OrdersModel::class
        ];

        $multiModels = new MultiModels($models ,"default");

        // // Insérez les données dans les tables correspondantes en une seule transaction
        $result = $multiModels->do_insert($userData);

        
        if ($result) {
            echo "Les données ont été insérées avec succès dans les tables.";
        } else {
            echo "Une erreur s'est produite lors de l'insertion des données.";
        }
    }

    public function newMultiModelsFun2()
    {
        // Exemple de données à insérer
        $userData = [
            'username' => 'super',
            'email' => 'super@example.com',
            'password' => 'anso',
            'product_name' => 'anso Product',
            'price' => 45,
            'order_number'=>'45',
            'order_date' => '2003-02-06'
        ];
        $userData2 = [
            'username' => 'oke',
            'email' => 'oke@example.com',
            'password' => 'oke',
            'product_name' => 'oke Product',
            'price' => 4545,
            'order_number'=>'4545',
            'order_date' => '2003-04-19'
        ];

        // Chargez la classe MultiModels avec les modèles correspondants
        $models = [
            UserModel::class,
            ProductModel::class,
            OrdersModel::class
        ];

        $multiModels = new MultiModels($models ,"default");

        $multiModels->multipleSetModels = [[UserModel::class,ProductModel::class,OrdersModel::class] , 
                                           [ProductModel::class,OrdersModel::class]
                                          ];

        $result = $multiModels->do_complex_insert($userData,$userData2);

        
        if ($result) {
            echo "Les données ont été insérées avec succès dans les tables.";
        } else {
            echo "Une erreur s'est produite lors de l'insertion des données.";
        }
    }
    public function newMultiModelsFun()
    {
        // Exemple de données à insérer
        $userData = [
            'username' => 'dylan',
            'email' => 'john@example.com',
            'password' => 'hashed_password',
        ];

        $userData2 = [
            'username' => 'Misa',
            'email' => 'john@example.com',
            'password' => 'hashed_password',
        ] ;

        // Chargez la classe MultiModels avec les modèles correspondants
        $models = [
            UserModel::class,
        ];

        $multiModels = new MultiModels($models ,"default");

        // // Insérez les données dans les tables correspondantes en une seule transaction
        $result = $multiModels->do_multiple_insert($userData ,$userData2);

        
        if ($result) {
            echo "Les données ont été insérées avec succès dans les tables.";
        } else {
            echo "Une erreur s'est produite lors de l'insertion des données.";
        }   
    }

    public function delete ()
    {
        $refIdsToDelete = [
            'orders_id' => 4,
            'products_id' => 19,
            'user_id' => 19
        ];

        $models = [
            OrdersModel::class,
            ProductModel::class,
            UserModel::class,
        ];

        $multiModels = new MultiModels($models ,"default");

                // // Insérez les données dans les tables correspondantes en une seule transaction
                $result = $multiModels->do_delete($refIdsToDelete);

        
                if ($result) {
                    echo "Les données ont été supp avec succès dans les tables.";
                } else {
                    echo "Une erreur s'est produite lors de la' supp des données.";
                }

    }

    public function testDATA()
    {
        

        $dataF= new DataFormPrepa();

        $dataF->getDataForm('post');
    }
    public function loadView()
    {
        return view('dataForm');
    }
}
