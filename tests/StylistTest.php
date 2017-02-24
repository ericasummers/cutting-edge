<?php

    /**
    * @backupGlobals disabled
    * backupStaticAttributes disabled
    */

    require_once "src/Client.php";
    require_once "src/Stylist.php";

    $server = 'mysql:host=localhost:3306;dbname=hair_salon_test';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    class StylistTest extends PHPUnit_Framework_TestCase
    {

        function test_construct()
        {
            $name = "Bobby Brows";
            $specialty = "bowl cuts";
            $new_stylist = new Stylist($name, $specialty);

            $result = $new_stylist->getName();

            $this->assertEquals($name, $result);
        }

        function test_saveAndGetAll()
        {
            $name = "Bobby Brows";
            $specialty = "bowl cuts";
            $new_stylist = new Stylist($name, $specialty);
            $new_stylist->save();

            $name2 = "Pamela Perm";
            $specialty2 = "perms and curls";
            $new_stylist2 = new Stylist($name2, $specialty2);
            $new_stylist2->save();

            $result = Stylist::getAll();

            $this->assertEquals([$new_stylist, $new_stylist2], $result);
        }

    }


?>
