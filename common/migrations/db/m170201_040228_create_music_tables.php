<?php

use yii\db\Migration;

class m170201_040228_create_music_tables extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('music_album_genre', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer(),
            'genre_id' => $this->integer(),
        ], $tableOptions);

        $this->createTable('music_album_artist', [
            'id' => $this->primaryKey(),
            'album_id' => $this->integer(),
            'artist_id' => $this->integer(),
        ], $tableOptions);

    }

    public function down()
    {
        $this->dropTable('music_album_genre');
        $this->dropTable('music_album_artist');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
