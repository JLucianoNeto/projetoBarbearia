<?php 



class HomeController{
   
    public function __construct()
    {    }
    #esses metodos podem ser derivados de hearança
    public function index(){
        header('location:view/home/homepage.php');
    }
    


}

?>