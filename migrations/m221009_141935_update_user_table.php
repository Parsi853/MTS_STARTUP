<?php

use yii\db\Migration;

/**
 * Class m221009_141935_update_user_table
 */
class m221009_141935_update_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'updated_at', $this->integer()->notNull()->after('created_at'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m221009_141935_update_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m221009_141935_update_user_table cannot be reverted.\n";

        return false;
    }
    */
}
