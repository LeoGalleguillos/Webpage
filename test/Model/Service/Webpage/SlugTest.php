<?php
namespace LeoGalleguillos\WebpageTest\Model\Service\Webpage;

use LeoGalleguillos\String\Model\Service as StringService;
use LeoGalleguillos\Webpage\Model\Entity as WebpageEntity;
use LeoGalleguillos\Webpage\Model\Factory as WebpageFactory;
use LeoGalleguillos\Webpage\Model\Service as WebpageService;
use PHPUnit\Framework\TestCase;

class SlugTest extends TestCase
{
    protected function setUp()
    {
        $this->slugService = new WebpageService\Webpage\Slug(
            new StringService\UrlFriendly()
        );
    }

    public function testGetSlug()
    {
        $webpageEntity = new WebpageEntity\Webpage();
        $webpageEntity->setTitle('This is the title.');
        $this->assertSame(
            'This-is-the-title',
            $this->slugService->getSlug($webpageEntity)
        );
    }
}
