<?php

namespace shop\entities\User;

use Webmozart\Assert\Assert;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%user_networks}}".
 *
 * @property int $id
 * @property int $user_id
 * @property string $identity
 * @property string $network
 *
 * @property User $user
 */
class Network extends ActiveRecord
{

    public static function create($network, $identity): self
    {
        Assert::notEmpty($network);
        Assert::notEmpty($identity);

        $item = new static();
        $item->network = $network;
        $item->identity = $identity;

        return $item;
    }

    public function rules()
    {
        return [
            [['user_id', 'identity', 'network'], 'required'],
            [['user_id'], 'integer'],
            [['identity', 'network'], 'string', 'max' => 255],
            [['identity', 'network'], 'unique', 'targetAttribute' => ['identity', 'network']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'identity' => Yii::t('app', 'Identity'),
            'network' => Yii::t('app', 'Network'),
        ];
    }

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    public function isFor($network, $identity)
    {
        return $this->network === $this->network && $this->identity === $identity;
    }

    public static function tableName()
    {
        return '{{%user_networks}}';
    }
}