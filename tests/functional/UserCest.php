<?php

namespace App\Tests\Functional;

use App\Tests\FunctionalTester;

class UserCest
{
    public function testRegisterUser(FunctionalTester $I)
    {
        $userData = [
            'email' => 'test@example.com',
            'name' => 'Test User',
            'password' => 'password123'
        ];

        $I->sendPOST('/api/users', $userData);
        $I->seeResponseCodeIs(201);
        $I->seeResponseIsJson();
        $I->seeResponseContainsJson([
            'email' => 'test@example.com',
            'name' => 'Test User'
        ]);
        $I->dontSeeResponseContainsJson(['password' => 'password123']);
    }

    public function testRegisterUserWithInvalidData(FunctionalTester $I)
    {
        $userData = [
            'email' => 'invalid-email',
            'name' => '',
            'password' => '123'
        ];

        $I->sendPOST('/api/users', $userData);
        $I->seeResponseCodeIs(400);
        $I->seeResponseIsJson();
        $I->seeResponseMatchesJsonType(['errors' => 'array']);
    }

    public function testRegisterUserWithExistingEmail(FunctionalTester $I)
    {
        // First registration
        $userData = [
            'email' => 'existing@example.com',
            'name' => 'Test User',
            'password' => 'password123'
        ];

        $I->sendPOST('/api/users', $userData);
        $I->seeResponseCodeIs(201);

        // Second registration with same email
        $I->sendPOST('/api/users', $userData);
        $I->seeResponseCodeIs(409);
        $I->seeResponseContainsJson(['error' => 'User with this email already exists']);
    }
} 