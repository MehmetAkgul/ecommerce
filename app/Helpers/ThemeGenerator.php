<?php


namespace App\Helpers;


use Illuminate\Support\Facades\File;

class ThemeGenerator
{
    public function makeThemeBaseDirectory($request)
    {
        // return $request->all();
        $data['type'] = $request->type;
        $data['category'] = $request->category;
        $data['name'] = $request->name;
        $data['admin_resources_path'] = config('theme.admins_path');
        $data['frontend_resources_path'] = config('theme.frontends_path');
        $data['assets_admins_path'] = config('theme.assets_admins_path');
        $data['assets_frontends_path'] = config('theme.assets_frontends_path');
        $data['partial_path'] = config('theme.partial_path');
        $path = $data['type'] . '_path';
        //Prepare files in Public Folder First
        $this->createPublicDir($path, $data);
        return $this->createResourcesDir($path, $data);
        $data;

    }

    protected function createPublicDir($path, $data)
    {
        // here we create our theme folders in Public Folder
        $dir = "";
        $chmod = 0777;
        $container = config('theme.assetContainerDir');
        $publicThemeDir = config('theme.' . 'assets_' . $path);
        $index = resource_path('templates/index.php');
        if (!file_exists($publicThemeDir . slugify($data['category']))) {
            File::makeDirectory($publicThemeDir . '/' . slugify($data['name']), $chmod, true, true);
        }
        //we added one index.php for security inside each folder
        foreach ($container as $item) {
            if (!file_exists($publicThemeDir . slugify($data['name']) . '/' . $item)) {
                File::makeDirectory($publicThemeDir . '/' . slugify($data['name']) . '/' . $item, $chmod, true, true);
                $dir = $publicThemeDir . '/' . slugify($data['name']) . '/' . $item;
                if (PHP_OS === "WINNT") {
                    $dir = $publicThemeDir . '/' . slugify($data['name']) . '/' . $item . '/index.php';
                    copy($index, $dir);
                } else {
                    shell_exec("cp -r $index $dir");
                }

            }
        }
        //  return $dir;
        //  return PHP_OS;
    }

    protected function createResourcesDir($path, $data)
    {
        // we prepere Resources Folder here
        $dir = "";
        $chmod = 0777;
        $container = config('theme.containerDir');
        $viewsContainer = config('theme.viewsContainerDir');
        $resourcesDir = config('theme.' . $path) . $data['category'] . '/' . slugify($data['name']);

        foreach ($container as $item) {
            if (!file_exists($resourcesDir . '/' . $item)) {
                File::makeDirectory($resourcesDir . '/' . $item, $chmod, true, true);
                if ($item === 'views') {
                    foreach ($viewsContainer as $value) {
                        File::makeDirectory($resourcesDir . '/' . $item . '/' . $value, $chmod, true, true);
                    }
                }
            }
        }

        // Step of preparing Themes Templates

        $master = resource_path('templates/master.blade.php');
        $layout = $resourcesDir . '/layout';
        if (!file_exists($layout)) {
            File::makeDirectory($layout, $chmod, true, true);
        }
        copy($master, $layout . '/master.blade.php');

        $header = resource_path('templates/header.blade.php');
        $partial = $resourcesDir . '/partials';
        if (!file_exists($partial)) {
            File::makeDirectory($master, $chmod, true, true);
        }
        copy($header, $partial . '/header.blade.php');


        $footer = resource_path('templates/footer.blade.php');
        $partial = $resourcesDir . '/partials';
        if (!file_exists($partial)) {
            File::makeDirectory($partial, $chmod, true, true);
        }
        copy($footer, $partial . '/footer.blade.php');

        $hello = resource_path('templates/hello.blade.php');
        $views = $resourcesDir . '/views/';
        if (!file_exists($views)) {
            File::makeDirectory($views, $chmod, true, true);
        }
        copy($hello, $views . '/hello.blade.php');

        $config = resource_path('templates/config.php');
        $theme = $resourcesDir . '/';
        copy($config, $theme . '/config.php');


        $conFile = $resourcesDir . '/config.php';
        $values['name'] = strtolower($data['name']);
        $values['inherit'] = null;
        File::put($conFile, var_export($values, true));
        File::prepend($conFile, '<?php return ');
        File::append($conFile, '; ');

        //return $data;
        //  return PHP_OS;
    }
}
