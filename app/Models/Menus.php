<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Menus
 *
 * @property int $id
 * @property int $p_id
 * @property string $name
 * @property string $path
 * @property string $title
 * @property string $icon
 * @property int $sort
 * @property string $component
 * @property string $meta
 * @property int $hidden
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Menus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menus query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menus whereComponent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menus whereHidden($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menus whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menus whereMeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menus whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menus wherePId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menus wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menus whereSort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menus whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menus whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menus whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Menus extends Model
{
    use HasFactory;
    protected $table = 'menus';


    public function menusTree()
    {
        $list = $this->where(['status'=>1])->get()->toArray();
        return $this->filterMenus($list);
    }

    public function filterMenus($menus, $pid = 0)
    {
        $tree = [];
        foreach ($menus as $menu){
            if ($menu['p_id'] == $pid){
                $child = $this->filterMenus($menus, $menu['id']);
                if (!empty($child)) {
                    $menu['children'] = $child;
                }

                $tree[] = $menu;
            }
        }
        return $tree;
    }
}
