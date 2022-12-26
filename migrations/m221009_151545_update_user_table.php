<?php

use yii\db\Migration;

/**
 * Class m221009_151545_update_user_table
 */
class m221009_151545_update_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'user_type', $this->smallInteger()->notNull()->defaultValue(10)->after('email'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221009_151545_update_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221009_151545_update_user_table cannot be reverted.\n";

        return false;
    }
    */
}
