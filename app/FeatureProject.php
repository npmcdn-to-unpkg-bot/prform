<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FeatureProject extends Model
{
    protected $table 		= 'feature_projects';	//Declare table name

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable =   [
                                'project_id',
                                'feature_id'
                            ];

    /**
    * Scope a query for a mass Assignment
    *
    * @return \Illuminate\Database\Eloquent\Builder
    */
   public function scopeInsertData($query,$project_id,$data)
   {
        $bulk_data = array();
        foreach ($data as $value)
        {
            array_push(
                            $bulk_data,
                            array(
                                    'project_id' => $project_id,
                                    'feature_id' => $value
                                )
                        );
        }

       return $query->insert($bulk_data);
   }
}
