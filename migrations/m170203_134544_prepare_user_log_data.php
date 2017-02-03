<?php

use yii\db\Migration;

class m170203_134544_prepare_user_log_data extends Migration
{
    public function safeUp()
    {
        $this->batchInsert('{{%user_log}}',['user_id', 'sign_on', 'sign_off'],[
            [rand(), '2017-01-31 23:55:00', '2017-02-01 00:55:00'],
            [rand(), '2017-01-31 23:57:00', '2017-02-01 02:30:00'],
            [rand(), '2017-01-31 23:59:00', '2017-02-01 01:55:00'],
            [rand(), '2017-02-01 01:03:30', '2017-02-01 12:55:00'],
            [rand(), '2017-02-01 02:03:30', '2017-02-01 12:55:00'],
            [rand(), '2017-02-01 03:03:30', '2017-02-01 14:55:00'],
            [rand(), '2017-02-01 04:03:30', '2017-02-01 14:55:00'],
            [rand(), '2017-02-01 05:03:30', '2017-02-01 05:55:00'],
            [rand(), '2017-02-01 23:03:30', '2017-02-02 01:55:00'],
            [rand(), '2017-02-02 23:55:00', '2017-02-03 00:55:00'],
            [rand(), '2017-02-02 23:57:00', '2017-02-03 02:30:00'],
            [rand(), '2017-02-02 23:59:00', '2017-02-03 01:55:00'],
            [rand(), '2017-02-03 01:03:30', '2017-02-03 12:55:00'],
            [rand(), '2017-02-03 02:03:30', '2017-02-03 12:55:00'],
            [rand(), '2017-02-03 03:03:30', '2017-02-03 14:55:00'],
            [rand(), '2017-02-03 04:03:30', '2017-02-03 14:55:00'],
            [rand(), '2017-02-03 05:03:30', '2017-02-03 05:55:00'],
            [rand(), '2017-02-03 23:03:30', '2017-02-04 01:55:00'],
            [rand(), '2017-02-01 23:50:30', null],
            [rand(), '2017-02-03 23:53:30', null]
        ]);
    }

    public function safeDown()
    {
        echo "m170203_134544_prepare_user_log_data cannot be reverted.\n";

        return false;
    }
}
