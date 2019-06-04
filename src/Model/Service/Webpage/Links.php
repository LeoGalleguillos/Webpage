<?php
namespace LeoGalleguillos\Webpage\Model\Service\Webpage;

use LeoGalleguillos\Webpage\Model\Entity as WebpageEntity;

class Links
{
    public function getLinks(WebpageEntity\Webpage $webpageEntity) : array
    {
        $links = [];

        preg_match_all(
            '/<a[^>]* href="([^"]+)"/',
            $webpageEntity->getHtmlEntity()->getString(),
            $matches
        );

        foreach ($matches[1] as $match) {
            if (!preg_match('/^https?:\/\//', $match)) {
                continue;
            }
            $links[] = $match;
        }

        return $links;
    }
}
