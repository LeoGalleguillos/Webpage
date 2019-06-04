<?php
namespace LeoGalleguillos\Webpage\Model\Table;

use Zend\Db\Adapter\Adapter;

class UrlHttpStatusCodeLog
{
    public function __construct(Adapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @return int Primary key
     */
    public function insert(
        string $url,
        int $statusCode
    ) {
        $sql = '
            INSERT
              INTO `url_http_status_code_log`
                   (`url`, `http_status_code`)
            VALUES (?, ?)
                 ;
        ';
        $parameters = [
            $url,
            $statusCode,
        ];
        return $this->adapter
                    ->query($sql)
                    ->execute($parameters)
                    ->getGeneratedValue();
    }

    public function selectCount()
    {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `url_http_status_code_log`
                 ;
        ';
        $row = $this->adapter->query($sql)->execute()->current();
        return (int) $row['count'];
    }

    public function selectCountWhereUrl(
        string $url
    ) : int {
        $sql = '
            SELECT COUNT(*) AS `count`
              FROM `url_http_status_code_log`
             WHERE `url` = ?
                 ;
        ';
        $parameters = [
            $url,
        ];
        $row = $this->adapter->query($sql)->execute($parameters)->current();
        return (int) $row['count'];
    }
}
