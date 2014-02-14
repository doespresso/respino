<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jd
 * Date: 14.02.14
 * Time: 8:10
 * To change this template use File | Settings | File Templates.
 */

use Jenssegers\Mongodb\Model as Eloquent;

class MyModel extends Eloquent {

    protected $collection = 'menu';

}