<?php
namespace LeoGalleguillos\WebpageTest\Model\Service\Webpage;

use LeoGalleguillos\Webpage\Model\Entity as WebpageEntity;
use LeoGalleguillos\Webpage\Model\Factory as WebpageFactory;
use LeoGalleguillos\Webpage\Model\Service as WebpageService;
use LeoGalleguillos\Webpage\Model\Table as WebpageTable;
use PHPUnit\Framework\TestCase;

class WasCurledRecentlyTest extends TestCase
{
    protected function setUp()
    {
        $this->httpStatusCodeLogTableMock = $this->createMock(
            WebpageTable\UrlHttpStatusCodeLog::class
        );
        $this->wasCurledRecentlyService = new WebpageService\Webpage\Url\WasCurledRecently(
            $this->httpStatusCodeLogTableMock
        );
    }

    public function testWasCurledRecently()
    {
        $this->httpStatusCodeLogTableMock->method('selectCountWhereUrl')->will($this->onConsecutiveCalls(0, 1, 0, 2));

        $this->assertFalse(
            $this->wasCurledRecentlyService->wasCurledRecently('https://www.yahoo.com')
        );
        $this->assertTrue(
            $this->wasCurledRecentlyService->wasCurledRecently('https://www.yahoo.com')
        );
        $this->assertFalse(
            $this->wasCurledRecentlyService->wasCurledRecently('https://www.yahoo.com')
        );
        $this->assertTrue(
            $this->wasCurledRecentlyService->wasCurledRecently('https://www.yahoo.com')
        );
    }
}
