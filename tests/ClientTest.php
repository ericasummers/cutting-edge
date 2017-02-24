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
        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }

        function test_construct()
        {
            $name = "Jenny Crazy-Hair";
            $phone_number = 5035567890;
            $stylist_id = 1;
            $new_client = new Client($name, $phone_number, $stylist_id);

            $result = $new_client->getName();

            $this->assertEquals($name, $result);
        }

        function test_saveAndGetAll()
        {
            $name = "Jenny Crazy-Hair";
            $phone_number = '5035567890';
            $stylist_id = '1';
            $new_client = new Client($name, $phone_number, $stylist_id);
            $new_client->save();

            $name2 = "Max Messy";
            $phone_number2 = '5031212121';
            $stylist_id2 = '2';
            $new_client2 = new Client($name2, $phone_number2, $stylist_id2);
            $new_client2->save();

            $result = Client::getAll();

            $this->assertEquals([$new_client, $new_client2], $result);
        }

        function test_find()
        {
            $name = "Jenny Crazy-Hair";
            $phone_number = '5035567890';
            $stylist_id = '1';
            $new_client = new Client($name, $phone_number, $stylist_id);
            $new_client->save();

            $name2 = "Max Messy";
            $phone_number2 = '5031212121';
            $stylist_id2 = '2';
            $new_client2 = new Client($name2, $phone_number2, $stylist_id2);
            $new_client2->save();

            $result = Client::find($new_client->getId());

            $this->assertEquals($new_client, $result);
        }

        function test_update()
        {
            $name = "Jenny Crazy-Hair";
            $phone_number = '5035567890';
            $stylist_id = '1';
            $new_client = new Client($name, $phone_number, $stylist_id);
            $new_client->save();

            $new_name = "Jenny Wild-Hair";

            $new_client->update($new_name, $phone_number, $stylist_id);

            $this->assertEquals("Jenny Wild-Hair", $new_client->getName());
        }

        function test_delete()
        {
            $name = "Jenny Crazy-Hair";
            $phone_number = '5035567890';
            $stylist_id = '1';
            $new_client = new Client($name, $phone_number, $stylist_id);
            $new_client->save();

            $name2 = "Max Messy";
            $phone_number2 = '5031212121';
            $stylist_id2 = '2';
            $new_client2 = new Client($name2, $phone_number2, $stylist_id2);
            $new_client2->save();

            $new_client->delete();

            $this->assertEquals([$new_client2], Client::getAll());
        }

    }


?>
