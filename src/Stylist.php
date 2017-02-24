<?php
    class Stylist
    {
        private $name;
        private $specialty;
        private $id;

        function __construct($new_name, $new_specialty, $id = null)
        {
            $this->name = $new_name;
            $this->specialty = $new_specialty;
            $this->id = $id;
        }

        function getId()
        {
            return $this->id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->id = (string) $new_name;
        }

        function getSpecialty()
        {
            return $this->specialty;
        }

        function setSpecialty($new_specialty)
        {
            $this->specialty = (string) $new_specialty;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO stylists (name, specialty) VALUES ('{$this->getName()}', '{$this->getSpecialty()}');");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_stylists = $GLOBALS['DB']->query("SELECT * FROM stylists ORDER BY name;");
            $all_stylists = array();
            foreach($returned_stylists as $stylist) {
                $name = $stylist['name'];
                $specialty = $stylist['specialty'];
                $id = $stylist['id'];
                $new_stylist = new Stylist($name, $specialty, $id);
                array_push($all_stylists, $new_stylist);
            }
            return $all_stylists;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists;");
        }
    }



?>
