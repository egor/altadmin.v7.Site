<?php

/**
 * ImagesBasicOperations. Базовые операции с изображениями
 * 
 * @package CMS
 * @category Image
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ImagesBasicOperations {
   
    public function upload($id, $folder, $modelName, $fieldName, $width = 0, $height = 0, $oldImg = null) {
        $img = $oldImg;
        Yii::import('application.extensions.upload.Upload');
        foreach ($_FILES[$modelName] as $key => $value) {
            $file[$key] = $value[$fieldName];
        }
        Yii::app()->setComponents(array('imagemod' => array('class' => 'application.extensions.imagemodifier.CImageModifier')));
        Yii::app()->imagemod->setLanguage('ru_RU');
        $handle = Yii::app()->imagemod->load($file);
        if ($handle->uploaded) {
            ImagesBasicOperations::delete($id, $folder, $modelName, $fieldName);
            //не заменять - на _
            $handle->file_safe_name = false;
            //не переименовывать
            $handle->file_auto_rename = false;
            $handle->jpeg_quality = 100;
            $handle->file_name_body_pre = $id . '-';

            $handle->image_resize = true;
            $handle->image_ratio = false;
            $handle->image_ratio_crop = true;

            if ($width != 0) {
                $handle->image_x = $width;
            }
            if ($height != 0) {
                $handle->image_y = $height;
            }

            $handle->process(Yii::getPathOfAlias('webroot') . $folder);
            if ($handle->processed) {
                $img = $handle->file_dst_name;
                $handle->clean();
            } else {
                Yii::app()->user->setFlash('error', $handle->error);
            }
        } else {
            $img = $oldImg;
        }
        return $img;
    }

    public function delete($id, $folder, $modelName, $fieldName) {
        $model = new $modelName;
        $fileName = $model->findByPk($id);
        $model->updateByPk($id, array($fieldName => ''));
        if (!empty($fileName->$fieldName) && file_exists(Yii::getPathOfAlias('webroot') . $folder . $fileName->$fieldName)) {
            unlink(Yii::getPathOfAlias('webroot') . $folder . $fileName->$fieldName);
            return true;
        } else {
            return false;
        }
    }
    
    /**
     * Сохранение порядка вывода картинок
     * 
     * @param string $model - название класса модели
     * @param json $array - массив с данными порядка сортировки
     * @return json - результат выполнения
     */
    public function changeOrder($model, $array) {
        $data = json_decode($array);
        if (null == $data) {
            return json_encode(array('status' => 0));
        }
        $currentModel = new $model;
        foreach ($data as $note) {
            $currentModel->updateByPk(substr($note->id, 5), array('position' => $note->order));
        }
        return json_encode(array('status' => 'OK'));
    }
    
    /**
     * Редактирование мета тегов картинки
     * 
     * @param string $model - название класса модели
     * @param array $data - содержит id записи и отредактированные данные
     * @return json - результат выполнения
     */
    public function editMetaImage($model, $data) {
        $imageModel = new $model;
        $img = $imageModel->findByPk($data['id']);
        $img->imageAlt = $data['alt'];
        $img->imageTitle = $data['title'];
        if ($img->save()) {
            return json_encode(array('error' => 0));
        } else {
            return json_encode(array('error' => 1));
        }
    }
}