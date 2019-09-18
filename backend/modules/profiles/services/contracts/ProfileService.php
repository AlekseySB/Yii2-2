<?php

namespace backend\modules\profiles\services\contracts;


use backend\modules\profiles\entities\Profile;
use backend\modules\profiles\models\ProfileCreateForm;

interface ProfileService
{
    public function createProfile(ProfileCreateForm &$model):?Profile;
//    public function editProfile(ProfileCreateForm &$model):bool;
}