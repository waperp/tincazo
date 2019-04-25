<?php

namespace App\Observers;

use Webpatser\Uuid\Uuid;

class UuidObserver
{
    public function creating($model)
    {
        $this->uuid($model);
    }

    public function uuid($model)
    {
        if (empty($model->secconnuuid)) {
            $model->secconnuuid = Uuid::generate(4)->string;
        }
    }

}
