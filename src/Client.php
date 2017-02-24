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

        function save()
        {

        }

        static function getAll()
        {
            
        }
    }



?>
