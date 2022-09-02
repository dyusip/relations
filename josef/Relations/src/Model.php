<?php

namespace Josef;

use Illuminate\Database\Eloquent\Model as LaravelModel;
use GhanuZ\FindInSet\FindInSetRelationTrait;

class Model extends LaravelModel {
    use FindInSetRelationTrait;
}
