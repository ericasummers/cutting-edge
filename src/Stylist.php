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
    }



?>
