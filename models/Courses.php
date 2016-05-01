<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 25.04.16
 * Time: 0:48
 */

namespace app\models;

use yii\db\ActiveRecord;

class Courses extends ActiveRecord
{
    public $img;
    public $order;

    public function afterFind()
    {
        $this->link = 'http://srs.myrusakov.ru/' . $this->alias;
        $this->img = '/web/images/courses' . $this->alias . '.png';
        $this->order = 'http://src.myrusakov.ru/order?product_ids=' . $this->srs_id;
    }

}