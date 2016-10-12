<?php

namespace Model;

use Hateoas\Configuration\Annotation as Hateoas;

/**
 * User.
 *
 * @Hateoas\Relation("self", href = @Hateoas\Route("user_get", parameters = {"id" = "expr(object.getId())"}))
 */
class User
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * Constructor.
     *
     * @param int $id (default null)
     */
    public function __construct($id = null)
    {
        $this->id = $id;
    }

    /**
     * Fill an object from a data array.
     * @param  array  $data data about object (i.e. database)
     * @return User       curent object
     */
    public function fill(array $data)
    {
        $this->id = isset($data['id']) ? $data['id'] : null;
        $this->firstName = isset($data['firstName']) ? $data['firstName'] : null;
        $this->lastName = isset($data['lastName']) ? $data['lastName'] : null;

        return $this;
    }

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
