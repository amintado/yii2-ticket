<?php

use ricco\ticket\Translation;
use yii\helpers\Html;

$this->title = 'پشتیبانی';

/** @var \amintado\ticket\models\TicketBody $newTicket */
/** @var \amintado\ticket\models\TicketBody $thisTicket */
/** @var \amintado\ticket\models\TicketFile $fileTicket */

?>
<style>
    .circle-btn {
        border-radius: 60%;
        overflow: hidden;
        position: fixed;
        line-height: normal;
        height: 60px;
        min-width: 60px;
        width: 60px !important;
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
        right: 198px;
        z-index: 99999;
    }
    .circle-btn:hover{
        box-shadow: 0 14px 26px -12px hsla(291.2, 63.7%, 42.2%, 0.4), 0 4px 23px 0px hsla(0, 0%, 0%, 0.1), 0 8px 10px -5px hsla(291.2, 63.7%, 42.2%, 0.2);
        color: white;
    }
</style>
<div class="panel page-block">
    <div class="container-fluid row">
        <div class="col-lg-12">
            <a class="btn btn-primary" href="<?= \yii\helpers\Url::to(['index']) ?>"
               style="margin-bottom: 10px; margin-left: 15px">بازگشت</a>
            <a class="circle-btn" style="width: 100%" role="button" data-toggle="collapse" href="#collapseExample"
               aria-expanded="false" aria-controls="collapseExample">
                <i class="glyphicon glyphicon-pencil pull-left"></i><span></span>
            </a>
            <?php if ($error = Yii::$app->session->getFlash('error')) : ?>
                <div class="alert alert-danger text-center" style="margin-top: 10px;"><?= $error ?></div>
            <?php endif; ?>
            <div class="collapse" id="collapseExample">
                <div class="well">
                    <?php $form = \yii\widgets\ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>
                    <?= $form->field($newTicket,
                        'text')->textarea(['style' => 'height: 150px; resize: none;'])->label('پیام شما')->error() ?>
                    <?= $form->field($fileTicket, 'fileName[]')->fileInput([
                        'multiple' => true,
                        'accept' => 'image/*',
                    ])->label(false); ?>
                    <div class="text-center">
                        <button class='btn btn-primary'>ارسال به</button>
                    </div>
                    <?= $form->errorSummary($newTicket) ?>
                    <?php $form->end() ?>
                </div>
            </div>
            <div class="clearfix" style="margin-bottom: 20px"></div>
            <?php foreach ($thisTicket as $ticket) : ?>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                <span><?= $ticket['name_user'] ?>&nbsp;<span
<<<<<<< HEAD:views/default/view.php
                        style="font-size: 12px">(<?= ($ticket['client'] == 1) ? 'کارمند' : 'مشتری' ?>)</span></span>
                        <span class="pull-right" style="margin: 0 15px"><?php
                            $function= new amintado\base\AmintadoFunctions();
                            echo $function->convertdatetime($ticket['date']);
                            ?></span>
=======
                            style="font-size: 12px"> (<?= ($ticket['client'] == 1) ? 'کارمند' : 'مشتری' ?>) </span> </span>

                        <span class="pull-right" style="margin-left: 5px">
                            <?php
                            if (!empty($ticket['date'])) {
                               echo Yii::$app->functions->convertdatetime($ticket['date']);
                            }

                            ?>
                        </span>
>>>>>>> 9ca692f2dcafeaa0b83d13fd8b9007a87d19a6c9:views/ticket/view.php
                    </div>
                    <div class="panel-body clearfix" style="word-wrap: break-word;">
                        <?= nl2br(Html::encode($ticket['text'])) ?>
                        <?php if (!empty($ticket->file)) : ?>
                            <hr>
                            <?php foreach ($ticket->file as $file) : ?>
                                <a href="/fileTicket/<?= $file->fileName ?>" target="_blank"><img
                                            src="/fileTicket/reduced/<?= $file->fileName ?> " alt="..."
                                            class="img-thumbnail"></a>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
