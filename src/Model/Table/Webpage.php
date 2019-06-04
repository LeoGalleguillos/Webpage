<?php
namespace LeoGalleguillos\Webpage\Model\Table;

use Exception;
use Generator;
use Zend\Db\Adapter\Adapter;

class Webpage
{
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return int Primary key
     */
    public function insertIgnore(
        int $websiteId = null,
        string $url,
        string $title,
        string $html = null
    ) {
        $sql = '
            INSERT IGNORE
              INTO `webpage` (`website_id`, `url`, `title`, `html`)
            VALUES (?, ?, ?, ?)
                 ;
        ';
        $parameters = [
            $websiteId,
            $url,
            $title,
            $html,
        ];
        $webpageId = $this->adapter
                          ->query($sql)
                          ->execute($parameters)
                          ->getGeneratedValue();

        if (empty($webpageId)) {
            throw new Exception('Unable to insert.');
        }

        return $webpageId;
    }

    /**
     * @yield array
     * @return Generator
     */
    public function select() : Generator
    {
        $sql = '
            SELECT `webpage`.`webpage_id`
                 , `webpage`.`website_id`
                 , `webpage`.`url`
                 , `webpage`.`title`
                 , `webpage`.`html`
              FROM `webpage`
                 ;
        ';
        foreach ($this->adapter->query($sql)->execute() as $array) {
            yield $array;
        }
    }

    public function selectCount()
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `webpage`
                 ;
        ';
        $row = $this->adapter->query($sql)->execute()->current();
        return (int) $row['count'];
    }

    /**
     * @return Generator
     * @yield array
     */
    public function selectWebpageIdWhereWebpageIdGreaterThan(
        int $webpageId
    ) : Generator {
        $sql = '
            SELECT `webpage`.`webpage_id`
              FROM `webpage`
             WHERE `webpage`.`webpage_id` > ?
                 ;
        ';
        $parameters = [
            $webpageId,
        ];
        foreach ($this->adapter->query($sql)->execute($parameters) as $array) {
            yield $array['webpage_id'];
        }
    }

    /**
     * @return array
     */
    public function selectWhereWebpageId(int $webpageId) : array
    {
        $sql = '
            SELECT `webpage`.`webpage_id`
                 , `webpage`.`website_id`
                 , `webpage`.`url`
                 , `webpage`.`title`
                 , `webpage`.`html`
              FROM `webpage`
             WHERE `webpage`.`webpage_id` = ?
                 ;
        ';
        $result = $this->adapter->query($sql)->execute([$webpageId])->current();

        return $result;
    }
}
