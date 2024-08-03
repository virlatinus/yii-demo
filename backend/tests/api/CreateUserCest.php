<?php


namespace backend\tests\api;

use backend\tests\ApiTester;

class CreateUserCest
{
    public function _before(ApiTester $I)
    {
    }

    // tests
    public function createUserViaAPI(ApiTester $I)
    {
        //$I->amHttpAuthenticated('service_user', '123456');
        //$I->amBearerAuthenticated();
        $I->haveHttpHeader('api_key', 'special-key');
        //$I->haveHttpHeader('Content-Type', 'application/x-www-form-urlencoded');
        $I->haveHttpHeader('accept', 'application/json');
        $I->haveHttpHeader('content-type', 'application/json');
        $I->sendPostAsJson('/users', [
            'name' => 'davert',
            'email' => 'davert@codeception.com'
        ]);
        //$I->seeResponseCodeIs(200);
        $I->seeResponseCodeIsSuccessful();
        $I->seeResponseIsJson();
        $I->seeResponseContains('{"result":"ok"}');
    }
}
