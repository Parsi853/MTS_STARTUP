<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m221009_135513_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function up() // safeUp
    {
//        $this->createTable('{{%user}}', [
//            'id' => $this->primaryKey(),
//        ]);
        $tableOption = null;

        if( $this->db->driverName == 'mysql') {
            $tableOption = 'CHARSET SET UTF-8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'deleted_at' => $this->integer()->notNull(),
        ]);
     }

    /**
     * {@inheritdoc}
     */
    public function down() // safeDown
    {
        $this->dropTable('{{%user}}');
    }
}
