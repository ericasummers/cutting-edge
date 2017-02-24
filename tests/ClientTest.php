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

    class ClientTest extends PHPUnit_Framework_TestCase
    {

        function test_construct()
        {
            $name = "Jenny Crazy-Hair";
            $phone_number = 5035567890;
            $specialty_id = 1;
            $new_client = new Client($name, $phone_number, $specialty_id);

            $result = $new_client->getName();

            $this->assertEquals($name, $result);
        }

    }


?>
