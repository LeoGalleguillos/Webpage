<?php
namespace LeoGalleguillos\WebpageTest\Model\Service\Webpage;

use LeoGalleguillos\Webpage\Model\Entity as WebpageEntity;
use LeoGalleguillos\Webpage\Model\Factory as WebpageFactory;
use LeoGalleguillos\Webpage\Model\Service as WebpageService;
use PHPUnit\Framework\TestCase;

class HtmlTest extends TestCase
{
    protected function setUp()
    {
        $this->htmlService = new WebpageService\Webpage\Html();
    }

    public function testGetHtmlFromUrl()
    {
        $this->markTestSkipped('Skip getting HTML from URL.');

        $this->assertTrue(
            is_string($this->htmlService->getHtmlFromUrl('https://imgur.com/'))
        );
    }
}
