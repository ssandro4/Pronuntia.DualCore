<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "parola".
 *
 * @property string $idParola
 * @property string|null $tag
 * @property string|null $pathIMG
 * @property string|null $pathMP3
 *
 * @property Composizioneesercizio[] $composizioneesercizios
 * @property Coppiaminima[] $coppiaminimas
 * @property Coppiaminima[] $coppiaminimas0
 * @property Esercizio[] $esercizios
 */
class Parola extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'parola';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idParola', 'pathIMG'], 'required'],
            [['idParola'], 'string', 'max' => 24],
            [['tag'], 'string', 'max' => 52],
            [['pathIMG', 'pathMP3'], 'string', 'max' => 256],
            [['idParola'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idParola' => 'Id Parola',
            'tag' => 'Tag',
            'pathIMG' => 'Path Img',
            'pathMP3' => 'Path Mp 3',
        ];
    }



    /**
     * Gets query for [[Esercizios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEsercizios()
    {
        return $this->hasMany(Esercizio::className(), ['idEsercizio' => 'esercizio'])->viaTable('composizioneesercizio', ['parola' => 'idParola']);
    }
}
