<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * This appears to be part of Djangp's models.py, managed by Eloquent.
 * However, each individual model seems to have it's own file, and is created with the command
 * 'php artisan make: model modelNameHere'
 *
 * The other half of models.py is actually specified in migrations, oddly enough. And thus used
 * directly as the literal migrations.
 * @package App
 */
class Address extends Model
{
    /**
     * Table associated with model.
     * The plural of the name is technically the default value.
     * Defining here though as it would likely typo and miss the second 'e'.
     */
    protected $table = 'addresses';

    /**
     * By default, these fields are automatically created and used as 'created_at' and 'updated_at'.
     * This is an example of how you would rename them, if desired.
     */
    const CREATED_AT = 'date_created';
    const UPDATED_AT = 'date_updated';
}
