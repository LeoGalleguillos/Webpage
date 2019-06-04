<?php
namespace LeoGalleguillos\WebpageTest\Model\Service\Webpage;

use LeoGalleguillos\Webpage\Model\Entity as WebpageEntity;
use LeoGalleguillos\Webpage\Model\Factory as WebpageFactory;
use LeoGalleguillos\Webpage\Model\Service as WebpageService;
use LeoGalleguillos\Webpage\Model\Table as WebpageTable;
use PHPUnit\Framework\TestCase;

class WebpagesTest extends TestCase
{
    protected function setUp()
    {
        $this->webpageFactoryMock = $this->createMock(
            WebpageFactory\Webpage::class
        );
        $this->webpageTableMock = $this->createMock(
            WebpageTable\Webpage::class
        );
        $this->webpagesService = new WebpageService\Webpage\Webpages(
            $this->webpageFactoryMock,
            $this->webpageTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            WebpageService\Webpage\Webpages::class,
            $this->webpagesService
        );
    }
}
