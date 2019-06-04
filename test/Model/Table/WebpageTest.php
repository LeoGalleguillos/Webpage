<?php
namespace LeoGalleguillos\WebpageTest\Model\Table;

use LeoGalleguillos\Test\TableTestCase;
use LeoGalleguillos\Webpage\Model\Table as WebpageTable;
use Zend\Db\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class WebpageTest extends TableTestCase
{
    protected function setUp()
    {
        $this->webpageTable = new WebpageTable\Webpage(
            $this->getAdapter()
        );

        $this->setForeignKeyChecks0();
        $this->dropTable('webpage');
        $this->createTable('webpage');
        $this->setForeignKeyChecks1();
    }

    public function testInsertIgnore()
    {
        $this->webpageTable->insertIgnore(
            1,
            'https://www.sotosummarize.com/pages/1',
            'This is the title.',
            '<html><body>this is the html</body></html>'
        );
        $this->assertSame(
            1,
            $this->webpageTable->selectCount()
        );
    }

    public function testSelectWhereWebpageId()
    {
        $this->webpageTable->insertIgnore(
            1,
            'url',
            'title',
            'html'
        );
        $array = [
            'webpage_id' => '1',
            'website_id' => '1',
            'url' => 'url',
            'title' => 'title',
            'html' => 'html',
        ];
        $this->assertSame(
            $array,
            $this->webpageTable->selectWhereWebpageId(1)
        );
    }
}
