<?php

namespace App\Models;

use App\Tenant\Traits\TenantTrait;

class NewUser extends User  
{
  protected $table = 'users';
  use TenantTrait;

}
