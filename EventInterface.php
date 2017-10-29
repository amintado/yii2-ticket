<?php
/*******************************************************************************
 * Copyright (c) 2017.
 * this file created in printing-office project
 * framework: Yii2
 * license: GPL V3 2017 - 2025
 * Author:amintado@gmail.com
 * Company:shahrmap.ir
 * Official GitHub Page: https://github.com/amintado/printing-office
 * All rights reserved.
 ******************************************************************************/

namespace amintado\ticket;
use amintado\ticket\models\TicketHead;

interface EventInterface{

    /**
     * this function runs when a ticket is created
     * @param $model TicketHead
     * @return mixed
     */
    public static function afterCreate($model);

    /**
     * this function runs when a ticket viewed by admin
     * @param $model TicketHead
     * @return mixed
     */
    public static function afterView($model);

    /**
     * this function runs when a ticket answered
     * @param $model TicketHead
     * @return mixed
     */
    public static function afterAnswer($model);

    /**
     * this function runs when an error occur in create ticket process
     * @param $model TicketHead
     * @return mixed
     */
    public static function CreateError($model);

    /**
     * this function runs when an error occur in ticket answer process
     * @param $model TicketHead
     * @return mixed
     */
    public static function AnswerError($model);

    /**
     *
     * this function runs before delete a ticket
     * @param $model TicketHead
     * @return mixed
     */
    public static function BeforeDelete($model);

    /**
     * this function runs after close a ticket
     * @param $model TicketHead
     * @return mixed
     */
    public static function AfterClose($model);


}