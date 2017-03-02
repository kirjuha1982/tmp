<?php

namespace frontend\modules\api\v1\resources;

/**
 * @author Eugene Terentev <eugene@terentev.net>
 */
class User extends \common\models\User
{
    public function fields()
    {
        return ['id', 'email', 'created_at'];
    }

}
