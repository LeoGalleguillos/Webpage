<?php
namespace LeoGalleguillos\WebpageTest\Model\Table;

use LeoGalleguillos\Webpage\Model\Table as WebpageTable;
use LeoGalleguillos\Test\TableTestCase;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class UrlHttpStatusCodeLogTest extends TableTestCase
{
    protected function setUp()
    {
        $this->urlHttpStatusCodeLogTable  = new WebpageTable\UrlHttpStatusCodeLog(
            $this->getAdapter()
        );

        $this->dropTable('url_http_status_code_log');
        $this->createTable('url_http_status_code_log');
    }

    public function testInsertAndSelectCount()
    {
        $this->assertSame(
            0,
            $this->urlHttpStatusCodeLogTable->selectCount()
        );

        $this->urlHttpStatusCodeLogTable->insert(
            'https://www.yahoo.com/does-not-exist',
            404
        );

        $this->assertSame(
            1,
            $this->urlHttpStatusCodeLogTable->selectCount()
        );
    }

    public function testSelectCountWhereUrl()
    {
        $url = 'https://www.yahoo.com/does-not-exist';
        $this->assertSame(
            0,
            $this->urlHttpStatusCodeLogTable->selectCountWhereUrl($url)
        );

        $this->urlHttpStatusCodeLogTable->insert(
            'https://www.yahoo.com/does-not-exist',
            404
        );
        $this->assertSame(
            1,
            $this->urlHttpStatusCodeLogTable->selectCountWhereUrl($url)
        );

        $url = 'https://www.reddit.com/';
        $this->assertSame(
            0,
            $this->urlHttpStatusCodeLogTable->selectCountWhereUrl($url)
        );
    }
}
