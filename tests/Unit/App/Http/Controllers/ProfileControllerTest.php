<?php

namespace Http\Controllers;

use App\Http\Controllers\ProfileController;
use PHPUnit\Framework\TestCase;

class ProfileControllerTest extends TestCase
{
    //testRoleCheck
    public function testRoleCheckU0001()
    {
        self::assertEquals(true, ProfileController::roleCheck('admin'));
    }


    public function testRoleCheckU0002()
    {
        self::assertEquals(false, ProfileController::roleCheck('user'));
    }

}
