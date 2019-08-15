<?php 

class HookTestCest
{
    public function tryToTest(UnitTester $I)
    {
        $user = new UserModel();
        $user->name = "Pooya";
        $user->email = "test@mail.com";
        $user->password = "123456";

        $I->assertEquals("123456", $user->password);
        $user->find();
        $I->assertEquals("123456", $user->password);

        UserModel::on('before.find', function($data){ /* do something you want... */ });
        UserModel::on('after.find', function($data){ $data->target->password = "********"; });
        UserModel::on('after.save', function($data){ /* add log for error... */ });

        $user->find();
        $I->assertEquals("********", $user->password);
    }
}