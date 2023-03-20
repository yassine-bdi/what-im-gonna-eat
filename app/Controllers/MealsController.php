<?php

namespace App\Controllers;

use App\Models\Meal;
use App\Validation\Validator;
use DateTime;
use PDOException;

class MealsController extends Controller
{

    public function showMeals()
    {
        $meals = (new Meal($this->getDB()))->all();
        return $this->view('meals.meals', compact('meals'), 'layout');
    }

    public function addMeal()
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'name' => ['required'],
            'type' => ['required'],
            'meal' => ['required'],
        ]);

        if ($errors) {
            header('Location: /atba9?errors=' . implode(":", $errors));
            exit;
        }

        if (isset($_POST['add'])) {
            unset($_POST['add']);
            $meal = new Meal($this->getDB());
            try {
                $meal->create($_POST);
            } catch (PDOException $e) {
                echo "error : {$e}";
            }
            return header('Location: /atba9?addsuccess=1');
        }
    }

    public function editMeal(int $id)
    {
        $validator = new Validator($_POST);
        $errors = $validator->validate([
            'name' => ['required', 'max:60'],
        ]);

        if ($errors) {
            header('Location: /atba9?errors=' . $errors['name'][0]);
            exit;
        }

        if (isset($_POST['name'])) {
            $meal = new Meal($this->getDB());
            try {
                $meal->update($id, $_POST);
            } catch (PDOException $e) {
                echo "error : {$e}";
            }
            return header('Location: /atba9?updatesuccess=1');
        }
    }

    public function deleteMeal($id) 
    {
        $meal = new Meal($this->getDB()); 
        try {
            $meal->destroy($id);
        } catch (PDOException $e) {
            echo "error : {$e}";
        }

        return header('Location: /atba9?deletesuccess=1');
    }

    public function decide() 
    {   $meal = new Meal($this->getDB()); 
        $decision = $meal->decide($_POST);
        $meals = $meal->Count(); 
        
        return $this->view('dashboard.dashboard',compact(['decision','meals']),'layout'); 
    }

}
