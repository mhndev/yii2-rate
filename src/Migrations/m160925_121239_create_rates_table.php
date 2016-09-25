<?php

use yii\db\Migration;

/**
 * Handles the creation for table `rates`.
 */
class m160925_121239_create_rates_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('rates', [
            'id' => $this->primaryKey(),
            'entity' => $this->string(),
            'entity_id' => $this->string(),
            'owner' => $this->string(),
            'owner_id' => $this->string(),
            'value' => $this->string(),
            'type' => $this->string(),
            'created_at'=> $this->dateTime(),
            'updated_at'=> $this->dateTime()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('rates');
    }
}
