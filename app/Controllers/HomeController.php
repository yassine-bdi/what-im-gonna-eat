<?php 

namespace App\Controllers;

use App\Models\Meal;

class HomeController extends Controller {

    public function showDashboard() 
    {
        $meals = (new Meal ($this->getDB()))->Count(); 
        return $this->view('dashboard.dashboard',compact('meals'),'layout'); 
    }
}