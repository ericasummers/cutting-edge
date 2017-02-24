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

        function delete()
        {
            $GLOBALS['DB']->exec("DELETE FROM stylists WHERE id = {$this->getId()};");
            $GLOBALS['DB']->exec("DELETE FROM clients WHERE stylist_id = {$this->getId()};");
        }

        function getClients()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients WHERE stylist_id = {$this->getId()};");
            $stylist_clients = array();
            foreach($returned_clients as $client) {
                $name = $client['name'];
                $id = $client['id'];
                $phone_number = $client['phone_number'];
                $stylist_id = $client['stylist_id'];
                $new_client = new Client($name, $phone_number, $stylist_id, $id);
                array_push($stylist_clients, $new_client);
            }
            return $stylist_clients;
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
