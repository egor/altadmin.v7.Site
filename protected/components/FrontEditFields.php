<?php

/**
 * Feedback. Форма обратной связи
 * 
 * @package FrontEnd
 * @category Other
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class FrontEditFields {

    /**
     * Данные из настроек по ключу
     * 
     * @param string $modelName - название модели
     * @param string $key - ключ
     * @return string - данные настроек
     */
    public function getSettings($modelName, $key) {
        $model = new $modelName;
        $model = $model->find('`key` = "' . $key . '"');
        if ($model) {
            return $model->value;
        } else {
            return '';
        }
    }

}