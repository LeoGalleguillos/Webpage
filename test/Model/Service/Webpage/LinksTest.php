<?php
namespace LeoGalleguillos\WebpageTest\Model\Service\Webpage;

use LeoGalleguillos\Html\Model\Entity as HtmlEntity;
use LeoGalleguillos\Webpage\Model\Entity as WebpageEntity;
use LeoGalleguillos\Webpage\Model\Factory as WebpageFactory;
use LeoGalleguillos\Webpage\Model\Service as WebpageService;
use PHPUnit\Framework\TestCase;

class LinksTest extends TestCase
{
    protected function setUp()
    {
        $this->linksService = new WebpageService\Webpage\Links();
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            WebpageService\Webpage\Links::class,
            $this->linksService
        );
    }

    public function testGetLinks()
    {
        $htmlEntity = new HtmlEntity\Html();

        $webpageEntity = new WebpageEntity\Webpage();
        $webpageEntity->setHtmlEntity($htmlEntity);

        $htmlEntity->setString('wow');
        $this->assertSame(
            [],
            $this->linksService->getLinks($webpageEntity)
        );

        $htmlEntity->setString('<a href="/root/relative/path">wow</a>');
        $this->assertSame(
            [],
            $this->linksService->getLinks($webpageEntity)
        );

        $htmlEntity->setString('<a href="https://www.example.com/path">wow</a>');
        $this->assertSame(
            ['https://www.example.com/path'],
            $this->linksService->getLinks($webpageEntity)
        );
    }
}
