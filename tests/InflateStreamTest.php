<?php
namespace GuzzleHttp\Tests\Psr7;

use GuzzleHttp\Psr7;
use GuzzleHttp\Psr7\InflateStream;

class InflateStreamtest extends \PHPUnit_Framework_TestCase
{
    public function testInflatesStreams()
    {
        $content = gzencode('test');
        $a = Psr7\stream_for($content);
        $b = new InflateStream($a);
        $this->assertEquals('test', (string) $b);
    }

    public function testReadInflatedStreams()
    {
    	$content = fopen(__DIR__.'/InflateStreamTestData.txt.gz', 'rb');
        $a = Psr7\stream_for($content);
        $b = new InflateStream($a);
        $this->assertEquals('Nulla voluptate qui consectetur cillum consectetur.', $b->read(51));
    }
}
