<?php

namespace Josef;

use Illuminate\Database\Eloquent\Model as LaravelModel;
use Josef\FindInSet\FindInSetRelationTrait;

class Model extends LaravelModel {
    use FindInSetRelationTrait;
}
