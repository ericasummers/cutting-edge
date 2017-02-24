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
            $this->name = (string) $new_name;
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

        function update($new_name, $new_specialty)
        {
            $GLOBALS['DB']->exec("UPDATE stylists SET name = '{$new_name}', specialty = '{$new_specialty}' WHERE id = {$this->getId()};");
            $this->setName($new_name);
            $this->setSpecialty($new_specialty);
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

        static function find($search_id)
        {
            $found_stylist = null;
            $all_stylists = Stylist::getAll();
            foreach($all_stylists as $stylist) {
                if ($stylist->getId() == $search_id) {
                    $found_stylist = $stylist;
                }
            }
            return $found_stylist;
        }
    }



?>
