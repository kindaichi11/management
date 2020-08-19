<?php
use Migrations\AbstractSeed;

/**
 * PositionName seed.
 * 役職名テーブルデータ
 */
class PositionNameSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $datetime = date('Y-m-d H:i:s');
        $data = [
            [
                'name' => '工場長',
                'created' => $datetime,
                'modified' => $datetime,
            ],
            [
                'name' => '製造リーダー',
                'created' => $datetime,
                'modified' => $datetime,
            ],
        ];
        $table = $this->table('position_name');
        $table->insert($data)->save();
    }
}
