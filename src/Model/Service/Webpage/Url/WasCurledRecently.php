<?php
namespace LeoGalleguillos\Webpage\Model\Service\Webpage\Url;

use LeoGalleguillos\Webpage\Model\Table as WebpageTable;

class WasCurledRecently
{
    public function __construct(
        WebpageTable\UrlHttpStatusCodeLog $urlHttpStatusCodeLogTable
    ) {
        $this->urlHttpStatusCodeLogTable = $urlHttpStatusCodeLogTable;
    }

    public function wasCurledRecently(
        string $url
    ) : bool {
        return (bool) $this->urlHttpStatusCodeLogTable->selectCountWhereUrl(
            $url
        );
    }
}
