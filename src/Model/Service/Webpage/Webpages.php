<?php
namespace LeoGalleguillos\Webpage\Model\Service\Webpage;

use Generator;
use LeoGalleguillos\Webpage\Model\Factory as WebpageFactory;
use LeoGalleguillos\Webpage\Model\Table as WebpageTable;

class Webpages
{
    public function __construct(
        WebpageFactory\Webpage $webpageFactory,
        WebpageTable\Webpage $webpageTable
    ) {
        $this->webpageFactory = $webpageFactory;
        $this->webpageTable   = $webpageTable;
    }

    public function getWebpages() : Generator
    {
        foreach ($this->webpageTable->select() as $array) {
            yield $this->webpageFactory->buildFromArray($array);
        }
    }
}
