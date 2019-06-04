<?php
namespace LeoGalleguillos\Webpage\Model\Service\Webpage;

class Html
{
    public function getHtmlFromUrl(string $url): string
    {
        return file_get_contents($url);
    }
}
