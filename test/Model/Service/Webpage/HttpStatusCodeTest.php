<?php
namespace LeoGalleguillos\WebpageTest\Model\Service\Webpage;

use LeoGalleguillos\Webpage\Model\Entity as WebpageEntity;
use LeoGalleguillos\Webpage\Model\Factory as WebpageFactory;
use LeoGalleguillos\Webpage\Model\Service as WebpageService;
use PHPUnit\Framework\TestCase;

class HttpStatusCodeTest extends TestCase
{
    protected function setUp()
    {
        $this->httpStatusCodeService = new WebpageService\Webpage\HttpStatusCode();
    }

    public function testGetHttpStatusCode()
    {
        $this->markTestSkipped('Skip getting HTTP status codes.');

        $webpageEntity = new WebpageEntity\Webpage();

        $webpageEntity->setUrl('https://www.yahoo.com');
        $this->assertSame(
            200,
            $this->httpStatusCodeService->getHttpStatusCode($webpageEntity)
        );

        $webpageEntity->setUrl('https://www.yahoo.com/does-not-exist');
        $this->assertSame(
            404,
            $this->httpStatusCodeService->getHttpStatusCode($webpageEntity)
        );

        $webpageEntity->setUrl('https://www.asdasdasd.com/timeout');
        $this->assertSame(
            0,
            $this->httpStatusCodeService->getHttpStatusCode($webpageEntity)
        );

        $webpageEntity->setUrl('https://www.reddit.com');
        $this->assertSame(
            200,
            $this->httpStatusCodeService->getHttpStatusCode($webpageEntity)
        );
    }
}
