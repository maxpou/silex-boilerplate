<?php

namespace Model\Navigation;

use Hateoas\Configuration\Annotation as Hateoas;

/**
 * Home.
 *
 * @Hateoas\Relation("self", href = @Hateoas\Route("home"))
 * @Hateoas\Relation("users", href = @Hateoas\Route("user_list"))
 */
class Home
{
    public $message = 'hello world!';
}
