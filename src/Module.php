<?php
namespace LeoGalleguillos\Webpage;

use LeoGalleguillos\String\Model\Service as StringService;
use LeoGalleguillos\Webpage\Model\Factory as WebpageFactory;
use LeoGalleguillos\Webpage\Model\Service as WebpageService;
use LeoGalleguillos\Webpage\Model\Table as WebpageTable;
use LeoGalleguillos\Webpage\View\Helper as WebpageHelper;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                ],
                'factories' => [
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                WebpageFactory\Webpage::class => function ($sm) {
                    return new WebpageFactory\Webpage(
                        $sm->get(WebpageTable\Webpage::class)
                    );
                },
                WebpageService\Webpage\Html::class => function ($sm) {
                    return new WebpageService\Webpage\Html();
                },
                WebpageService\Webpage\HttpStatusCode::class => function ($sm) {
                    return new WebpageService\Webpage\HttpStatusCode();
                },
                WebpageService\Webpage\Slug::class => function ($sm) {
                    return new WebpageService\Webpage\Slug(
                        $sm->get(StringService\UrlFriendly::class)
                    );
                },
                WebpageService\Webpage\Url\WasCurledRecently::class => function ($sm) {
                    return new WebpageService\Webpage\Url\WasCurledRecently(
                        $sm->get(WebpageTable\UrlHttpStatusCodeLog::class)
                    );
                },
                WebpageTable\UrlHttpStatusCodeLog::class => function ($sm) {
                    return new WebpageTable\UrlHttpStatusCodeLog(
                        $sm->get('webpage')
                    );
                },
                WebpageTable\Webpage::class => function ($sm) {
                    return new WebpageTable\Webpage(
                        $sm->get('webpage')
                    );
                },
            ],
        ];
    }
}
