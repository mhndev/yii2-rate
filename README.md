Yii2 Rate functionality implementation
======================================

## Table of Contents
- <a href="#installation">Installation</a>
    - <a href="#composer">Composer</a>
- <a href="#configuration">Configuration</a>
    - <a href="#createconfigfile">Create Config File</a>

- <a href="#usage">Usage</a>
	- <a href="#like">Like</a>
	- <a href="#rate">Rate</a>

	
### Yii2 Multi Purpose Rate System (Supports like, dislike, rate with other numbers or text) 


## Installation

### Composer
The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```php
composer require --prefer-dist mhndev/yii2-rate "0.0.*"
```

or add

```php
"mhndev/yii2-rate": "0.0.*"
```

### Configuration

### create config file
then of all you need to create a configuration file in your yii2 project config directory called rate.php and fill it like following :

```php

return [
    'userClass' => \app\models\User::class,
    'RateClass' => \mhndev\yii2Rate\Models\Rate::class,

    'items'=>[
        'post' => [
            'class'=> \app\models\Post::class,
            'rate_types' => ['rate','like'],
            'rate_values' => [
                'class' => \mhndev\rate\DiscreteNumberValue::class,
                'values' => ['1','2','3','4','5']
            ]
        ]
    ]
];

```

look at config array and check items field are entities which you want to rate them or like them.
for example above config array has an item called post.
and its fields are :

#### class 
which specify entity class which you want to rate

#### rate_types
you can have multiple kind of rates for an entity
for example a user can like a post entity and also rate it

#### rate_values
you can specify possible rate values for an entity


and after that your user class you should implement following interface
```php
mhndev\rate\Interfaces\iUser

```
and add the following method for rate functionality persistence.
you can change it as your project needs.

```php
    /**
     * @param $value
     * @param iRateableEntity $entity
     * @param $type
     * @return Rate
     */
    public function doRate($value, iRateableEntity $entity, $type)
    {
        $rate = new Rate;

        $rate->type = $type;
        $rate->entity = get_class($entity);
        $rate->entity_id  = $entity->_id->__toString();
        $rate->owner = static::class;
        $rate->owner_id = Yii::$app->user->identity->id;
        $rate->value = $value;

        $rate->save();

        return $rate;
    }
```


## Usage

### Like
This is a sample code which uses this package :

```php
    $post = Post::findOne(1);
    $user = Yii::$app->user->identity;
    $user->like($post);
```

### Rate

```php
    $post = Post::findOne(1);
    $user = Yii::$app->user->identity;
    $user->rate(+2, $post, 'rate');
```
