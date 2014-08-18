<?php

/**
 * ViewSettings Вывод уведомлений
 * 
 * @package CMS
 * @category Other
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class DevInfo extends CWidget {

    public $allTime = true;
    public $memory = true;
    public $dbTime = true;
    public $dbQuery = true;

    public function run() {
        if (Yii::app()->params['devInfo']) {
            if ($this->allTime) {
                echo sprintf('Скорость загрузки: %0.5f', Yii::getLogger()->getExecutionTime()), ' сек. | ';
            }
            if ($this->memory) {
                echo 'память: ', round(memory_get_peak_usage() / (1024 * 1024), 2), ' MB | ';
            }
            $sql_stats = YII::app()->db->getStats();
            if ($this->dbQuery) {
                echo 'запросов к БД: ', $sql_stats[0];
            }
            if ($this->dbTime) {
                echo sprintf(' | выполнение: %0.5f', $sql_stats[1]), ' сек.';
            }
        }
    }

}

