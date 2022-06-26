<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Composizionesessione".
 *
 * @property string $sessione
 * @property string $esercizio
 */
class Composizionesessione extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Composizionesessione';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sessione', 'esercizio'], 'required'],
            [['sessione'], 'string', 'max' => 24],
            [['esercizio'], 'string', 'max' => 52],
            [['sessione', 'esercizio'], 'unique', 'targetAttribute' => ['sessione', 'esercizio']],
            [['sessione'], 'exist', 'skipOnError' => true, 'targetClass' => Sessione::className(), 'targetAttribute' => ['sessione' => 'idSessione']],
            [['esercizio'], 'exist', 'skipOnError' => true, 'targetClass' => Esercizio::className(), 'targetAttribute' => ['esercizio' => 'idEsercizio']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'sessione' => 'Sessione',
            'esercizio' => 'Esercizio',
        ];
    }
}
