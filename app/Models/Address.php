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


    /**
     * To define model fields which are form blacklisted/whitelisted...
     *
     * Whitelist.
     * This is prefered as it's better to be explicit when it comes to security.
     * protected $fillable = ['formFieldsToWhitelist, field2, etc']
     *
     * Blacklist.
     * Less prefered as anything not defined is automatically user-editable (if the user can get to it).
     * protected $guarded = ['formFieldstoBlacklist, field2, etc']
     */
    protected $fillable = ['street', 'city', 'region', 'zip', 'country'];


    /**
     * One to Many Relationships...
     *
     * In parent model, do:
     * public function childModelName() {
     *     return $this->hasMany(childModelNamespace::class);
     * }
     *
     * Or in child model, do:
     * public function parentModelName() {
     *     return $this->belongsTo(parentModelNamespace::class);
     * }
     *
     * Then, in the parent, you could create a method to create the child and simply do:
     * $this->childModelName()->create('field1Name' => field1Value, field2Name => field2Value);
     * After, you can also call this method in the child as if it were a standard method.
     *  IE: "$post->addComment(request(fieldValue))" inside the CommentController.
     */

    /**
     * Many to Many Relationships...
     *
     * You will want to first create both models involved in the relationship.
     * Then, create a "pivot table" that is often "<model1Name>_<model2Name>", arranged in alphabetical order.
     * In this new table, you will want the primary key to be the combined unique id's of both models.
     *
     * To call this, you will use
     * public function modelName() {
     *      return $this->belongsToMany(connectingTable::class);
     *  }
     *
     * Last, in the database, you connect them in the pivot table via getting an instance of each associated model >
     * $model1->functionNameAbove()->attach($model2);
     */

}
