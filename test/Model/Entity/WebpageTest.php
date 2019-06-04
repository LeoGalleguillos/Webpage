<?php
namespace LeoGalleguillos\WebpageTest\Model\Entity;

use LeoGalleguillos\Webpage\Model\Entity as WebpageEntity;
use PHPUnit\Framework\TestCase;

class WebpageTest extends TestCase
{
    protected function setUp()
    {
        $this->webpage = new WebpageEntity\Webpage();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            WebpageEntity\Webpage::class,
            $this->webpage
        );
    }

    public function testAttributes()
    {
        $this->assertObjectHasAttribute(
            'htmlEntity',
            $this->webpage
        );
    }
}
