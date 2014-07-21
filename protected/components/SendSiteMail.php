<?php

/**
 * SendSiteMail. Отправка простых писем.
 * 
 * @package Component
 * @category Mail
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class SendSiteMail {

    /**
     * Отправка простых уведомлений пользователю
     * 
     * @param string $message текст письма
     * @param string $subject тема письма
     * @param string $email email получателя
     * @return boolean
     */
    static public function sendSimpleMail($message, $subject, $email) {
        $mailFrom = 'no-reply@' . $_SERVER['HTTP_HOST'];
        $to = $email;
        $subject = '=?UTF-8?B?' . base64_encode($subject) . '?=';
        $message = '<html><head><title>' . $subject . '</title></head><body>' . $message . '</body></html>';
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=utf-8\r\n";
        $headers .= "From: " . $mailFrom . "\r\n";
        if (mail($to, $subject, $message, $headers)) {
            return true;
        } else {
            return false;
        }
    }
}