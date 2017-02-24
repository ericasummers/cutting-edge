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
        protected function tearDown()
        {
            Stylist::deleteAll();
            Client::deleteAll();
        }

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

        function test_find()
        {
            $name = "Bobby Brows";
            $specialty = "bowl cuts";
            $new_stylist = new Stylist($name, $specialty);
            $new_stylist->save();

            $name2 = "Pamela Perm";
            $specialty2 = "perms and curls";
            $new_stylist2 = new Stylist($name2, $specialty2);
            $new_stylist2->save();

            $result = Stylist::find($new_stylist->getId());

            $this->assertEquals($result, $new_stylist);
        }

        function test_update()
        {
            $name = "Bobby Brows";
            $specialty = "bowl cuts";
            $new_stylist = new Stylist($name, $specialty);
            $new_stylist->save();

            $new_name = "Betsy Brows";

            $new_stylist->update($new_name, $specialty);

            $this->assertEquals("Betsy Brows", $new_stylist->getName());
        }

        function test_delete()
        {
            $name = "Bobby Brows";
            $specialty = "bowl cuts";
            $new_stylist = new Stylist($name, $specialty);
            $new_stylist->save();

            $name2 = "Pamela Perm";
            $specialty2 = "perms and curls";
            $new_stylist2 = new Stylist($name2, $specialty2);
            $new_stylist2->save();

            $new_stylist->delete();

            $this->assertEquals([$new_stylist2], Stylist::getAll());
        }

        function test_findClients()
        {
            $name = "Bobby Brows";
            $specialty = "bowl cuts";
            $new_stylist = new Stylist($name, $specialty);
            $new_stylist->save();

            $name = "Jenny Crazy-Hair";
            $phone_number = '5035567890';
            $stylist_id = $new_stylist->getId();
            $new_client = new Client($name, $phone_number, $stylist_id);
            $new_client->save();

            $name2 = "Max Messy";
            $phone_number2 = '5031212121';
            $stylist_id2 = '2';
            $new_client2 = new Client($name2, $phone_number2, $stylist_id2);
            $new_client2->save();

            $this->assertEquals([$new_client], $new_stylist->getClients());
        }

    }


?>
