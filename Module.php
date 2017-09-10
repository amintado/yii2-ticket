<?php

namespace amintado\ticket;

use amintado\ticket\models\User;
use Yii;

/**
 * ticket module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'amintado\ticket\controllers';

    /** @var bool Уведомление на почту о тикетах */
    public $mailSend = false;

    /** @var string Тема email сообщения когда пользователю приходит ответ */
    public $subjectAnswer = 'پاسخ درخواست پشتیبانی شما';

    /** @var  User */
    public $userModel = false;

    /**
     * Departments List
     * @var array
     */
    public $qq = [
        'support'=>'بخش پشتیبانی',
        'Technical'=>'بخش فنی'
    ];

    /** @var array Ники администраторав */
    public $admin = ['admin'];

    /** @var string  */
    public $uploadFilesDirectory = '@webroot/fileTicket';

    /** @var string  */
    public $uploadFilesExtensions = 'png, jpg';

    /** @var int  */
    public $uploadFilesMaxFiles = 5;

    /** @var null|int */
    public $uploadFilesMaxSize = null;

    /** @var bool|int */
    public $pageSize = false;

    /**
     * @inheritdoc
     */
    public function init()
    {
        User::$user = ($this->userModel !== false) ? $this->userModel : Yii::$app->user->identityClass;
        parent::init();
    }
}
