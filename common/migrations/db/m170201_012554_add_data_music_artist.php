<?php

use yii\db\Migration;

class m170201_012554_add_data_music_artist extends Migration
{
    public  $artistes = [
        [
            'id'=>'1',
            'name'=>'ABBA',
        ],
        [
            'id'=>'1',
            'name'=>'AC/DC',
        ],
        [
            'id'=>'2',
            'name'=>'The Beatles',
        ],
        [
            'id'=>'3',
            'name'=>'Celine Dion',
        ],
        [
            'id'=>'5',
            'name'=>'Elton John',
        ],
        [
            'id'=>'5',
            'name'=>'Elvis Presley',
        ],
        [
            'id'=>'10',
            'name'=>'Michael Jackson',
        ],
        [
            'id'=>'12',
            'name'=>'Led Zeppelin',
        ],
        [
            'id'=>'13',
            'name'=>'Madonna',
        ],
        [
            'id'=>'13',
            'name'=>'Mariah Carey',
        ],
        [
            'id'=>'16',
            'name'=>'Pink Floyd',
        ],
        [
            'id'=>'17',
            'name'=>'The Rolling Stones',
        ],
        [
            'id'=>'8',
            'name'=>'Whitney Houston',
        ]
    ];
    public function up()
    {
        foreach ($this->artistes as $item){
            $this->insert('music_artist', [
                'letter'=>$item['id'],
                'name' => $item['name']
            ]);
        }
    }

    public function down()
    {
        foreach ($this->artistes as $item){
            $this->delete('music_artist', ['name' => $item]);
        }
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
