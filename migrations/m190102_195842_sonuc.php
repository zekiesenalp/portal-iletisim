<?php

use yii\db\Migration;

/**
 * Class m190102_195842_sonuc
 */
class m190102_195842_sonuc extends Migration
{
    
public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $TABLE_NAME = 'sonuc';
        $this->createTable($TABLE_NAME, [
            'id' => $this->primaryKey(),
            'phone_number' => $this->integer()->notNull(),
            'file_upload' => $this->string(120)->notNull()
        ], $tableOptions);

    }


public function down()

    {
        $TABLE_NAME = 'sonuc';
        $this->dropTable($TABLE_NAME);
    }


}
