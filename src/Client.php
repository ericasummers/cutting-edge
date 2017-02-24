<?php
    class Client
    {
        private $name;
        private $phone_number;
        private $stylist_id;
        private $id;

        function __construct($name, $phone_number, $stylist_id, $id = null)
        {
            $this->name = $name;
            $this->phone_number = $phone_number;
            $this->stylist_id = $stylist_id;
            $this->id = $id;
        }

        function getName()
        {
            return $this->name;
        }

        function setName($new_name)
        {
            $this->name = (string) $new_name;
        }

        function getPhoneNumber()
        {
            return $this->phone_number;
        }

        function setPhoneNumber($new_phone_number)
        {
            $this->phone_number = (int) $new_phone_number;
        }

        function getStylistId()
        {
            return $this->stylist_id;
        }

        function setStylistId($new_stylist_id)
        {
            $this->stylist_id = (int) $new_stylist_id;
        }

        function getId()
        {
            return $this->id;
        }

        function save()
        {
            $GLOBALS['DB']->exec("INSERT INTO clients (name, phone_number, stylist_id) VALUES ('{$this->getName()}', {$this->getPhoneNumber()}, {$this->getStylistId()});");
            $this->id = $GLOBALS['DB']->lastInsertId();
        }

        static function getAll()
        {
            $returned_clients = $GLOBALS['DB']->query("SELECT * FROM clients ORDER BY name;");
            $all_clients = array();
            foreach($returned_clients as $client) {
                $name = $client['name'];
                $phone_number = $client['phone_number'];
                $stylist_id = $client['stylist_id'];
                $id = $client['id'];
                $new_client = new Client($name, $phone_number, $stylist_id, $id);
                array_push($all_clients, $new_client);
            }
            return $all_clients;
        }

        static function deleteAll()
        {
            $GLOBALS['DB']->exec("DELETE FROM clients;");
        }

        static function find($search_id)
        {
            $found_client = null;
            $all_clients = Client::getAll();
            foreach($all_clients as $client) {
                if ($client->getId() == $search_id) {
                    $found_client = $client;
                }
            }
            return $found_client;
        }
    }



?>
