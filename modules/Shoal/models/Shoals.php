<?php

class ShoalsModel extends Model {

    public function after_insert($result = false, $fields = false){
        model()->open('shoal_ranks');
        model()->insert(array('shoal' => $result, 'name' => 'owner', 'banned' => 0, 'admin' => 1, 'access_forum' => 1));
        // We've added the owner rank, so we can add people to it.
        model()->open('user_shoals');
        model()->insert(array('user' => session()->getInt('user_id'), 'shoal' => $result, 'rank' => 'owner'));
        return $result;
    }

    public function validate($fields = false, $primary_key = false){
        $clean = parent::pre_validate($fields, $primary_key);
        print("It works :-)");
        if($clean->isEmpty('name')){
            $this->addError('name', 'Your shoal must have a name.');
        }
        return $clean;
    }
}