<?php
namespace LeoGalleguillos\Webpage\Model\Entity;

use LeoGalleguillos\Html\Model\Entity as HtmlEntity;

class Webpage
{
    /**
     * @var HtmlEntity\Html
     */
    protected $htmlEntity;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $url;

    /**
     * @var int
     */
    protected $webpageId;

    /**
     * @var int
     */
    protected $websiteId;

    public function getHtmlEntity() : HtmlEntity\Html
    {
        return $this->htmlEntity;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setHtmlEntity(HtmlEntity\Html $htmlEntity)
    {
        $this->htmlEntity = $htmlEntity;
        return $this;
    }

    public function setTitle(string $title)
    {
        $this->title = $title;
        return $this;
    }

    public function setUrl(string $url)
    {
        $this->url = $url;
        return $this;
    }

    public function setWebpageId(int $webpageId)
    {
        $this->webpageId = $webpageId;
        return $this;
    }
}
