<?php
/**
 * DateOperations. Операции с датой и временем
 * 
 * @package CMS
 * @category Other
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class DateOperations {
    
    /**
     * Перевод даты из формата д.м.Г в unix время
     * @param string $date - дата
     * @return int - unix время
     */
    public function dateToUnixTime($date)
    {
        $data = explode('.', $date);
        return mktime(0, 0, 0, $data[1], $data[0], $data[2]);
    }
    
    /**
     * Перевод время из формата ч:м в unix время
     * @param string $time - дата
     * @return int - unix время
     */
    public function timeToUnixTime($time)
    {
        $time = explode(':', $time);
        return mktime($time[0], $time[1], 0, 0, 0);
    } 
    public function checkDate($date)
    {
        $data = explode('.', $date);
        if (isset($data[0]) && isset($data[1]) && isset($data[2])) {
            $d[0] = (int)($data[0]);
            $d[1] = (int)($data[1]);
            $d[2] = (int)($data[2]);
        } else {
            return false;
        }
        if ($d[0] <= 0 || $d[1] <= 0 || $d[2] <= 0) {
            return false;
        } else {
            return true;
        }
    }
}