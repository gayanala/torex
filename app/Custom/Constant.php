<?php
/**
 * Created by PhpStorm.
 * User: W
 * Date: 11/11/2017
 * Time: 13:56
 */

namespace App\Custom;


class Constant
{
    //////////  CONSTANTS USED IN CONTROLLER  //////////
    // APPROVAL STATUSES
    const SUBMITTED = 1;
    const PENDING_REJECTION = 2;
    const PENDING_APPROVAL = 3;
    const REJECTED = 4;
    const APPROVED = 5;

    // RULE TYPES
    const AUTO_REJECT_RULE = 1;
    const PRE_APPROVE_RULE = 2;

    // ACTIVE FLAGS
    const ACTIVE = 1;
    const INACTIVE = 0;
//////////  END OF CONSTANTS USED  //////////

}