<?php

namespace amintado\ticket\models;

use amintado\ticket\Mailer;
use amintado\ticket\Module;
use Yii;

/**
 * This is the model class for table "ticket_body".
 *
 * @property integer      $id
 * @property integer      $id_head
 * @property integer      $client
 * @property string       $name_user
 * @property string       $text
 * @property string       $date
 *
 * @property TicketFile   $file
 * @property TicketHead[] $ticketHeads
 */
class TicketBody extends \yii\db\ActiveRecord
{
    /** @var  Module */
    private $module;

    const ADMIN = 1;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ticket_body}}';
    }

    public function init()
    {
        $this->module = Module::getInstance();
        parent::init(); // TODO: Change the autogenerated stub
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'], 'string'],
            [['date', 'name_user', 'id_head'], 'safe'],
            [['name_user'], 'string', 'max' => 255],
            [['name_user', 'text'], 'filter', 'filter' => 'strip_tags'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id'        => 'ID',
            'name_user' => 'Name User',
            'text'      => 'Text',
            'date'      => 'Date',
        ];
    }

    /**
     * Перед сохранением указываем имя пользователя который делает ответ
     * Если ответ пишет администратор, делаем соответствующий статус
     *
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert)
    {
        $this->name_user = Yii::$app->user->identity['username'];
        if (in_array(Yii::$app->user->identity['username'], $this->module->admin)) {
            $this->client = self::ADMIN;
        }

        /** @var TicketHead $ticketHead */
        $ticketHead = TicketHead::find()->where("id = " . $this->id_head)->one();

        /**
         * Отправка уведомлений
         */
        if ($this->module->mailSend !== false && $ticketHead->status != TicketHead::CLOSED) {
            $userModel = User::$user;
            (new Mailer())
                ->sendMailDataTicket($ticketHead->topic, $ticketHead->status, $ticketHead->id,
                    $this->text)
                ->setDataFrom($this->client == null ? Yii::$app->params['adminEmail'] : $userModel::findOne([
                    'id' => $ticketHead->user_id,
                ])['email'],
                    $this->module->subjectAnswer
                )
                ->senda('mail');
        }

        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }

    public function getFile()
    {
        return $this->hasMany(TicketFile::class, ['id_body' => 'id']);
    }
}
