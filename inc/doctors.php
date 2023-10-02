<?php

class Doctor{

    private $id;
    private $name;
    private $surname;
    private $specialty_id;
    private $location_id;
    private $hidden;


    function __construct($id, $name, $surname, $specialty_id, $location_id, $hidden) {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->specialty_id = $specialty_id;
        $this->location_id = $location_id;
        $this->hidden = $hidden;
    }
    
    /*public function CrearDoctor() {
        include '../connect.php'

        //$connexioDB = conn();
    }
*/
}

?>
