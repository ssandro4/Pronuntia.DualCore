<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "paziente".
 *
 * @property int $idPaziente
 * @property string|null $nome
 * @property string|null $cognome
 * @property int|null $caregiver
 * @property int|null $logopedista
 *
 * @property Caregiver $caregiver0
 * @property Logopedista $logopedista0
 */
class Paziente extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'paziente';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
          //  [['idPaziente'], 'required'],
            [['idPaziente', 'caregiver', 'logopedista'], 'integer'],
            [['nome', 'cognome'], 'string', 'max' => 24],
            [['idPaziente'], 'unique'],
            [['caregiver'], 'exist', 'skipOnError' => true, 'targetClass' => Caregiver::className(), 'targetAttribute' => ['caregiver' => 'idCaregiver']],
            [['logopedista'], 'exist', 'skipOnError' => true, 'targetClass' => Logopedista::className(), 'targetAttribute' => ['logopedista' => 'idLogopedista']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idPaziente' => 'Id Paziente',
            'nome' => 'Nome',
            'cognome' => 'Cognome',
            'caregiver' => 'Caregiver',
            'logopedista' => 'Logopedista',
        ];
    }

    /**
     * Gets query for [[Caregiver0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaregiver0()
    {
        
        return $this->hasOne(Caregiver::className(), ['idCaregiver' => 'caregiver']);
    }

    /**
     * Gets query for [[Logopedista0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLogopedista0()
    {
        return $this->hasOne(Logopedista::className(), ['idLogopedista' => 'logopedista']);
    }
}
