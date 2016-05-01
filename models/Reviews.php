<?php
/**
 * Created by PhpStorm.
 * User: vadim
 * Date: 25.04.16
 * Time: 0:52
 */

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

class Reviews extends ActiveRecord
{
    public function afterFind()
    {
        $this->video = $this->youtube("{youtube:}" . $this->video . "480, 295");
    }

    private function youtube($text)
    {
        $reg = "/youtube:([\w-_]*)?, (\d*)?, (\d*)?/i";
        $text = preg_replace($reg, str_replace(
            array("%name%", "%width%", "%height%"),
            array("\\1", "\\2", "\\3"),
            file_get_contents(Yii::$app->basePath .
                Yii::$app->params["dir_tmp1"] .
                "youtube.tpl")),
            $text);

        return $text;
    }

}