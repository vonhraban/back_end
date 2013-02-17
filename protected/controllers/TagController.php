<?php

class TagController extends GxController
{
 
    /**
     * A CJuiAutoComplete, ez adja vissza az ajánlatokat.
     * Szó elei egyezést figyel.
     * 
     * @param string $term A rész string amire keresni fog.
     */
    public function actionLookupAjax($term)
    {
        $criteria = new CDbCriteria();
        //$criteria->condition = 'name LIKE :name';
        $criteria->addSearchCondition('name', $term . '%', false);
        $tags = Tag::model()->findAll($criteria);
        $return = array();
        foreach ($tags as $tag) {
            $item = array(
                'label' => $tag->name,
                'value' => $tag->name,
                'tag_id' => $tag->tag_id
            );
            $return[] = $item;
        }
        echo CJSON::encode($return);
    }
    
}