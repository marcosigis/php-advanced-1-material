<?php

require_once 'config.php';
require __DIR__ . '/src/models/recipe-model.php';
require __DIR__ . '/src/views/form.php';



if ($_SERVER["REQUEST_METHOD"] === 'POST') {

    $title = trim($_POST['title']); 
    $description = trim($_POST['description']);
    $errors[] = "";

    if (empty($_POST["title"]) || (trim($_POST['title']) === '' )) {
        $errors[] = "Title is required";
        } elseif(strlen($_POST["title"]) > 100){
          $errors[] = "The title must be max 100 characters";
        } elseif(strlen($_POST["title"]) < 2){
          $errors[] = "The title must be longer than 1 character.";
        } else {
        $title = clean_input($_POST["title"]);
        }
        $recipe[] = $title;

        if (empty($_POST["description"]) || (trim($_POST['description']) === '' )) {
            $errors[] = "Description is required";
            } elseif(strlen($_POST["description"]) > 1000){
              $errors[] = "The description must be max 1000 characters";
            } elseif(strlen($_POST["description"]) < 2){
              $errors[] = "The description must be longer than 1 character.";
            } else {
            $description = clean_input($_POST["description"]);
            }
            $recipe[] = $description;

       //     $recipe = /* les données nettoyées de $_POST */

var_dump($recipe);
var_dump($errors);
saveRecipe($recipe);


    // if (empty($errors)) {
    //     saveRecipe($recipe);
    //     header('Location: /');
    // }
}


function clean_input($data) {
    $data = trim($data);
    $data = htmlentities($data);
    return $data;
  }
