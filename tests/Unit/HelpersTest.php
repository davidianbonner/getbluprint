<?php

namespace Bluprint\Tests\Unit;

use Mockery;
use Bluprint\Tests\TestCase;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Lang;

class HelpersTest extends TestCase
{
    /** @test */
    function it_can_return_a_carbon_instance()
    {
        $this->assertInstanceOf(Carbon::class, carbon());
    }

    /** @test */
    function it_can_return_a_bluprint_config_value()
    {
        config()->set('bluprint.foo', 'bar');
        $this->assertEquals('bar', bluprint('foo'));
    }

    /** @test */
    function it_can_translate_lines_through_markdown()
    {
        $mock = Mockery::mock(\Illuminate\Translation\Translator::class);
        $this->app->instance('translator', $mock);

        $mock->shouldReceive('trans')
            ->once()
            ->with('app.debug.test', [], null)
            ->andReturn('# Foo Bar');

        $this->assertEquals(
            "<h1>Foo Bar</h1>\n", markdownTrans('app.debug.test')
        );
    }

    /** @test */
    function it_can_encode_and_decode_ids()
    {
        $expected = 10;

        $this->assertEquals(
            $expected, decodeId(encodeId($expected))
        );
    }
}
