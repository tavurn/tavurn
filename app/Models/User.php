<?php

namespace App\Models;

use Doctrine\ORM\Mapping as ORM;
use Tavurn\Database\Model;

#[ORM\Entity, ORM\Table(name: 'users')]
class User extends Model
{
    #[ORM\Id, ORM\Column(type: 'integer')]
    #[Orm\GeneratedValue]
    protected int $id;

    #[ORM\Column(type: 'string', unique: true)]
    protected string $name;
}