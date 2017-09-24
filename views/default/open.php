<?php
$this->title = 'پشتیبانی';

/** @var \amintado\ticket\models\TicketHead $ticketHead */
/** @var \amintado\ticket\models\TicketBody $ticketBody */
?>
<style>
    .circle-btn {
        border-radius: 60%;
        overflow: hidden;
        position: fixed;
        line-height: normal;
        height: 60px;
        min-width: 60px;
        width: 60px;
        background-color: hsl(291.2, 63.7%, 42.2%);
        color: HSL(0, 0%, 100%);
        box-shadow: 0 2px 2px 0 hsla(291.2, 63.7%, 42.2%, 0.1), 0 3px 1px -2px hsla(291.2, 63.7%, 42.2%, 0.2), 0 1px 5px 0 hsla(291.2, 63.7%, 42.2%, 0.1);
        font-weight: 400;
        text-transform: uppercase;
        letter-spacing: 0;
        will-change: box-shadow, transform;
        transition: box-shadow 0.2s cubic-bezier(0.4, 0, 1, 1), background-color 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        display: inline-block;
        vertical-align: middle;
        cursor: pointer;
        background-image: none;
        white-space: nowrap;
        text-indent: 0;
        text-shadow: none;
        -moz-appearance: button;
        -moz-binding: none;
        font-size: 19px;
        padding: 19px 20px;
        bottom: 56px;
        right: 200px;
        z-index: 99999;
        border: none;
    }
    .circle-btn:hover{
        box-shadow: 0 14px 26px -12px hsla(291.2, 63.7%, 42.2%, 0.4), 0 4px 23px 0px hsla(0, 0%, 0%, 0.1), 0 8px 10px -5px hsla(291.2, 63.7%, 42.2%, 0.2);
        color: white;
    }
    .panel{
        height: 70vh;
    }
</style>
<div class="panel page-block">
    <div class="col-sx-12">

        <?php $form = \yii\widgets\ActiveForm::begin([]) ?>
        <div class="col-xs-12">
            <?= $form->field($ticketBody, 'name_user')->textInput([
                'readonly' => '',
                'value'    => Yii::$app->user->identity['username'],
            ]) ?>
        </div>
        <div class="col-xs-12">
            <?= $form->field($ticketHead, 'topic')->textInput()->label('پیام شما')->error() ?>
        </div>
        <div class="col-xs-12">
            <?= $form->field($ticketHead, 'department')->dropDownList($qq) ?>
        </div>
        <div class="col-xs-12">
            <?= $form->field($ticketBody, 'text')->textarea([
                'style' => 'height: 150px; resize: none;',
            ]) ?>
        </div>
        <div class="col-xs-12">
            <?= $form->field($fileTicket, 'fileName[]')->fileInput([
                'multiple' => true,
                'accept'   => 'image/*',
            ])->label(false); ?>
        </div>
        <div class="text-center">
            <button class='circle-btn'><span class="glyphicon glyphicon-ok"></span></button>
        </div>
        <?php $form->end() ?>
    </div>
</div>
