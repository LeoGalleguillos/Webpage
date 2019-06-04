<?php
namespace LeoGalleguillos\Webpage\Model\Service\Webpage;

use LeoGalleguillos\String\Model\Service as StringService;
use LeoGalleguillos\Webpage\Model\Entity as WebpageEntity;

class Slug
{
    public function __construct(
        StringService\UrlFriendly $urlFriendlyService
    ) {
        $this->urlFriendlyService = $urlFriendlyService;
    }

    public function getSlug(WebpageEntity\Webpage $webpageEntity) : string
    {
        return $this->urlFriendlyService->getUrlFriendly(
            $webpageEntity->getTitle()
        );
    }
}
