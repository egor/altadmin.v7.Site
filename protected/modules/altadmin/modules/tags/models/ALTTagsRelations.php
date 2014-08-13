<?php

/**
 * ALTTagsRelations. Модель для CMS таблицы TagsRelations
 * 
 * @package CMS
 * @category Tags
 * @author Egor Rihnov <egor.developer@gmail.com>
 * @version 1.0
 * @copyright Copyright (c) 2014, Egor Rihnov
 */
class ALTTagsRelations extends TagsRelations {

    /**
     * Возвращает статическую модель указанного класса AR
     * @param string $className active record имя класса
     * @return ALTTagsRelations статическая модель класса
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    static function saveRecordTags($recordId, $recordType, $tags) {
        ALTTagsRelations::deleteRecordTags($recordId, $recordType);
        foreach ($tags as $value) {
            $tagName = trim($value);
            $tag = ALTTags::model()->find(array('condition' => 'name="' . $tagName . '"'));
            if (!isset($tag)) {
                $tag = new ALTTags;
                $tag->name = $tagName;
                $tag->priority = 100;
                $tag->save();
            }
            $tagsRelations = new ALTTagsRelations;
            $tagsRelations->recordId = $recordId;
            $tagsRelations->tagsId = $tag->id;
            $tagsRelations->position = 0;
            $tagsRelations->type = $recordType;
            $tagsRelations->save();
        }
    }
    
    static function deleteRecordTags($recordId, $recordType) {
        return ALTTagsRelations::model()->deleteAll(array('condition' => 'recordId="' . $recordId . '" AND type="' . $recordType . '"'));
    }
    
    static function getRecordTags($recordId, $recordType) {
        $rArr = array();
        $model = ALTTagsRelations::model()->with('tags')->findAll(array('condition' => 't.recordId="' . $recordId . '" AND t.type = "' . $recordType . '"'));
        foreach ($model as $value) {
            $rArr[] = $value->tags->name;
        }
        return $rArr;
    }
}
