<?php

use yii\db\Migration;
use yii\db\Schema;

class m160327_130443_add_new_field_to_user extends Migration
{
    public function up()
    {
    	$this->addColumn('{{%user}}', 'phone_number', Schema::TYPE_STRING);
    }

    public function down()
    {
    	$this->dropColumn('{{%user}}', 'phone_number');
    }
}
