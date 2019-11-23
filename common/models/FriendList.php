<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "friend_list".
 *
 * @property int $id
 * @property int $user_id
 * @property int $friend_id
 *
 * @property User $user
 * @property User $friend
 */
class FriendList extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'friend_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'friend_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['friend_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['friend_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'friend_id' => '用户名',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFriend()
    {
        return $this->hasOne(User::className(), ['id' => 'friend_id']);
    }

    /**
     * @return array
     * 用来获取某个用户的所有好友数组
     */
    public static function getFriendList()
    {
        //更新，此处使用联合查询
        $queryFriendId=(new \yii\db\Query())
            ->select('friend_id')
            ->from('friend_list')
            ->where('user_id=:user_id')
            ->addParams([':user_id'=>Yii::$app->user->identity->id]);

        $queryUserId=(new \yii\db\Query())
            ->select('user_id')
            ->from('friend_list')
            ->where('friend_id=:friend_id')
            ->addParams([':friend_id'=>Yii::$app->user->identity->id]);

        $queryResult=$queryFriendId->union($queryUserId,true)->all();
        $queryResult=array_column($queryResult,'friend_id');

        //如果新用户没有好友，也可以发布朋友圈，所以需要加上作者自己
        $queryResult[]=Yii::$app->user->identity->id;
        return $queryResult;
    }

}

