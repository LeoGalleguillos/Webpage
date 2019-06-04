<?php
namespace LeoGalleguillos\WebpageTest\Model\Factory;

use ArrayObject;
use LeoGalleguillos\Html\Model\Entity as HtmlEntity;
use LeoGalleguillos\Webpage\Model\Entity as WebpageEntity;
use LeoGalleguillos\Webpage\Model\Factory as WebpageFactory;
use LeoGalleguillos\Webpage\Model\Service as WebpageService;
use LeoGalleguillos\Webpage\Model\Table as WebpageTable;
use PHPUnit\Framework\TestCase;

class WebpageTest extends TestCase
{
    protected function setUp()
    {
        $this->webpageTableMock = $this->createMock(
            WebpageTable\Webpage::class
        );
        $this->webpageFactory = new WebpageFactory\Webpage(
            $this->webpageTableMock
        );
    }

    public function testInitialize()
    {
        $this->assertInstanceOf(
            WebpageFactory\Webpage::class,
            $this->webpageFactory
        );
    }

    public function testbuildFromArray()
    {
        $arrayObject = [
            'webpage_id' => '1',
            'website_id' => '1',
            'url' => 'url',
            'title' => 'title',
            'html' => 'html',
        ];

        $htmlEntity = new HtmlEntity\Html();
        $htmlEntity->setString($arrayObject['html']);

        $webpageEntity = new WebpageEntity\Webpage();
        $webpageEntity->setHtmlEntity($htmlEntity)
                      ->setTitle($arrayObject['title'])
                      ->setUrl($arrayObject['url'])
                      ->setWebpageId($arrayObject['webpage_id']);
        $this->assertEquals(
            $webpageEntity,
            $this->webpageFactory->buildFromArray($arrayObject)
        );
    }
}
