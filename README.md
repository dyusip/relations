# findinset_relation
Set eloquent relationships with table that contains comma separated values as a foreign key

# Installation
Get package using composer  :

`composer require josef/postgre-comma-relations`

# 1.
You have to extends `Josef\Model` class instead of `Illuminate\Database\Eloquent\Model`

```
<?php

namespace App;

use Josef\Model;

class Test extends Model
{
    //
}
```
## You can also use traits instead of extend Model class 
Like in Laravel, `Users` model not extending `Model` class.
So you can use `trait`.
`Josef\FindInSet\FindInSetRelationTrait`

Example:
```
<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Josef\FindInSet\FindInSetRelationTrait;

class User extends Authenticatable
{
    use Notifiable, FindInSetRelationTrait;

    public function city ()
    {
        return $this->FindInSetOne( 'App\City', 'city_ids', 'id', 1);
    }

    public function state ()
    {
        return $this->FindInSetOne( 'App\State', 'city_ids', 'id', 2);
    }

    public function country ()
    {
        return $this->FindInSetOne( 'App\Country', 'city_ids', 'id', 3);
    }

    public function hobbies ()
    {
        return $this->FindInSetMany( 'App\Hobbies', 'hobbies_id', 'id');
    }

}
```

## To create `HasMany` Relation you have to write as :

```
public function order_product (){
    return $this->FindInSetMany( CLASS_NAME, FOREIGN_KEY, LOCAL_KEY);
}
```

## To create `HasOne` Relation you have to write as :

```
public function order_product (){
    return $this->FindInSetOne( CLASS_NAME, FOREIGN_KEY, LOCAL_KEY);
}
```

## You can also pass 4th argumaent to detect position in FIND_IN_SET :
If you have an `address` table schema and stored `city_ids` like `city_id,state_id,country_id`.


Now, you want to find only `city_id`, you will do as :
`select * from address where FIND_IN_CITY( 2, city_ids ) = 1;// Here $index = 1` 

Like, for `state_id`:
`select * from address where FIND_IN_CITY( 1, city_ids ) = 2;// Here $index = 2`

Like, for `country_id`:
`select * from address where FIND_IN_CITY( 5, city_ids ) = 3;// Here $index = 3`

## 4th argument is optional 
```
public function order_product (){
    return $this->FindInSetMany( CLASS_NAME, FOREIGN_KEY, LOCAL_KEY, Number);
}
```