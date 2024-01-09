<?php

namespace App\Console\Commands;

use App\Models\Menus;
use Illuminate\Console\Command;

class GenerateRoute extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:generateRoute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '创建路由';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $routes = file_get_contents(app_path('Console/Commands/router.json'));
        $routes = json_decode($routes, true);
        $this->saveRoute($routes);
        return 0;
    }

    public function saveRoute($routes, $pid = 0)
    {
        foreach ($routes as $route){
            $menu = new Menus();
            $menu -> p_id = $pid;
            $menu -> name = $route['name'];
            $menu -> path = $route['path'];
            $menu -> title = $route['meta']['title']??'';
            $menu -> icon = $route['meta']['icon']??'';
            $menu -> sort = $route['meta']['sort']??0;
            $menu -> component = $route['component']??'';
            $menu -> hidden = !empty($route['meta']['hidden']) && $route['meta']['hidden']?1:0;
            unset($route['meta']['title'], $route['meta']['icon'], $route['meta']['sort'], $route['meta']['hidden']);
            $menu -> meta = !empty($route['meta'])?json_encode($route['meta']):'';
            $menu -> save();
            if (!empty($route['children'])){
                $this->saveRoute($route['children'], $menu->id);
            }
        }
    }
}
