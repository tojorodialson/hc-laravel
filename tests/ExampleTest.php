<?php

namespace Codise\Hclaravel\Tests;

use Orchestra\Testbench\TestCase;
use Codise\Hclaravel\HcaptchaServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [HcaptchaServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
