<?php

use yii\db\Migration;

/**
 * Class m190102_193427_tablo
 */
class m190102_193427_tablo extends Migration
{
    
public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $TABLE_NAME = 'tablo';
        $this->createTable($TABLE_NAME, [
            'ad' => $this->string(50)->notNull(),
            'soyad' => $this->string(50)->notNull(),
            'date' => $this->timestamp()->->defaultExpression('CURRENT_TIMESTAMP'),
            'email' => $this->string(100)->notNull(),
            'konu' => $this->string(100)->notNull(),
            'mesaj' => $this->text()->notNull(),
            'phone_number' => $this->integer()->notNull(),
            'file_upload' => $this->string(120)->notNull()
        ], $tableOptions);

    }

public function down()
    {
        $TABLE_NAME = 'tablo';
        $this->dropTable($TABLE_NAME);
    }

}
