<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\ProductModel;
use App\Libraries\MultiModels;
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
        ];

        $productData = [
            'product_name' => 'Example Product',
            'price' => 19.99,
        ];

        // Tableaux de noms de tables correspondant aux modèles
        $tables = ['users', 'products'];

        // Chargez la classe MultiModels avec les modèles correspondants
        $models = [
            UserModel::class,
            ProductModel::class,
        ];

        $multiModels = new MultiModels($models ,"default");

        // // Insérez les données dans les tables correspondantes en une seule transaction
        $result = $multiModels->do_insert([$userData, $productData], $tables);

        if ($result) {
            echo "Les données ont été insérées avec succès dans les tables.";
        } else {
            echo "Une erreur s'est produite lors de l'insertion des données.";
        }
    }
}
