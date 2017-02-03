<?php

namespace app\controllers;

use yii\db\Query;
use yii\web\Controller;

class SiteController extends Controller
{
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    public function actionIndex()
    {
        $query = new Query();

        $curDate = "2017-02-02";

        $data = $query->select(['sign_on', 'sign_off'])
            ->from('{{%user_log}}')
            ->orWhere(['and', ['<=', 'sign_on', $curDate . ' 23:59:59'], ['>=', 'sign_off', $curDate . ' 00:00:00']])
            ->orWhere(['and', ['<=', 'sign_on', $curDate . ' 23:59:59'], ['sign_off' => null]])
            ->all();

        $newStructure = [];

        foreach ($data as $val) {
            $newStructure[] = ['datetime' => $val['sign_on'], 'is_online' => true];
            if (!is_null($val['sign_off']))
                $newStructure[] = ['datetime' => $val['sign_off'], 'is_online' => false];
        }

        usort($newStructure, function ($a, $b) {
            if ($a['datetime'] === $b['datetime']) {
                return 0;
            }
            return ($a['datetime'] < $b['datetime']) ? -1 : 1;
        });

        $curUsers = 0;
        $start = '';
        $end = '';
        $maxUsers = 0;

        foreach ($newStructure as $val) {
            if ($val['is_online']) {
                $curUsers++;
            } else {
                $curUsers--;
            }

            if ($curUsers > $maxUsers) {
                $start = $val['datetime'];
                $maxUsers = $curUsers;
                $end = null;
            }

            if ($curUsers < $maxUsers) {
                if (is_null($end))
                    $end = $val['datetime'];
            }
        }

        echo "Дата: $curDate <br/>";
        echo "Начало: " . ($start < $curDate ? $curDate . ' 00:00:00' : $start) . " <br/>";
        echo "Конец : " . (is_null($end) ? $curDate . ' 23:59:59' : ($end > $curDate . ' 23:59:59' ? $curDate . ' 23:59:59' : $end)) . " <br/>";
        echo "Кол-во пользователей: $maxUsers <br/>";
    }
}