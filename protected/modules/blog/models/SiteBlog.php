<?php

class SiteBlog extends Blog {
    
    static function model($className = __CLASS__) {
        return parent::model($className);
    }
    /*
    public function relations() {
        return array_merge(parent::relations(), 
                array(
                    
                    'tagsRelationsById'=>array(self::BELONGS_TO, 'TagsRelations', 'recordId')//, 'condition' => 'type="blog" AND tagsId="' . $this->tagId . '"')
                    )
                );
    }
     * 
     */
}