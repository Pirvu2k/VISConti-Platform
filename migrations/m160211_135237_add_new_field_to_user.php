<?php

use yii\db\Schema;
use yii\db\Migration;

class m160211_135237_add_new_field_to_user extends Migration
{
    public function up()
    {
        $this->addColumn('{{%user}}', 'field', Schema::TYPE_STRING);
    }

    public function down()
    {
        $this->dropColumn('{{%user}}', 'field');
    }
}
