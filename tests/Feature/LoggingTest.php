<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class LoggingTest extends TestCase
{
    public function testLog()
    {
        Log::info("This is Log from testLog");
        Log::warning("This is Log from testLog");
        Log::error("This is Log from testLog");
        Log::critical("This is Log from testLog");

        self::assertTrue(true);
    }

    public function testContext()
    {
        Log::info('This is an log info from testContext', ['user' => 'fauzan']);

        self::assertTrue(true);
    }

    public function testChannel()
    {
        $slackLogger = Log::channel('slack');
        $slackLogger->error('This is an error log just in slack');
        // just sent error to slack channel, not else
        Log::error("ini adalah error ke semua channel");
        self::assertTrue(true);
    }
}
