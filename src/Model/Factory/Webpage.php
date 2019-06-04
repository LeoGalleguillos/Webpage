<?php
namespace LeoGalleguillos\Webpage\Model\Factory;

use LeoGalleguillos\Html\Model\Entity as HtmlEntity;
use LeoGalleguillos\Webpage\Model\Entity as WebpageEntity;
use LeoGalleguillos\Webpage\Model\Table as WebpageTable;
use TypeError;
use Zend\Db\Adapter\Adapter;

class Webpage
{
    public function __construct(
        WebpageTable\Webpage $webpageTable
    ) {
        $this->webpageTable = $webpageTable;
    }

    public function buildFromArray(
        array $array
    ) : WebpageEntity\Webpage {
        $htmlEntity = new HtmlEntity\Html();

        try {
            $htmlEntity->setString($array['html']);
        } catch (TypeError $typeError) {
            // Do nothing.
        }

        $webpageEntity = $this->buildInstance()
            ->setHtmlEntity($htmlEntity)
            ->setTitle($array['title'])
            ->setUrl($array['url'])
            ->setWebpageId($array['webpage_id']);

        return $webpageEntity;
    }

    public function buildFromWebpageId(int $webpageId) : WebpageEntity\Webpage
    {
        $array = $this->webpageTable->selectWhereWebpageId(
            $webpageId
        );
        return $this->buildFromArray($array);
    }

    protected function buildInstance() : WebpageEntity\Webpage
    {
        return new WebpageEntity\Webpage();
    }
}
