<?php

namespace BennoThommo\GlacierSkin;

use Backend\Classes\Controller as BaseBackendController;
use Backend\Classes\WidgetBase;
use BennoThommo\GlacierSkin\Skins\Glacier;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use System\Classes\PluginBase;
use Winter\Storm\Support\Facades\Event;
use Winter\Storm\Support\Facades\Url;

/**
 * Glacier Skin Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * {@inheritDoc}
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'bennothommo.glacierskin::lang.plugin.name',
            'description' => 'bennothommo.glacierskin::lang.plugin.description',
            'author'      => 'Ben Thomson',
            'icon'        => 'icon-snow'
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function boot()
    {
        if ($this->app->runningInBackend()) {
            $this->applySkin();
            $this->listenForAssets();
            $this->addSkinViews();
        }
    }

    /**
     * Applies the skin in the backend if the plugin is enabled.
     */
    protected function applySkin(): void
    {
        Config::set('cms.backendSkin', Glacier::class);
    }

    /**
     * Listen for assets to be added, and redirect them to the Glacier skin version if available.
     *
     * @return void
     */
    protected function listenForAssets(): void
    {
        Event::listen('system.assets.beforeAddAsset', function (&$type, &$path, &$attributes) {
            $url = false;

            if (preg_match('/^https?:\/\//i', $path)) {
                $url = true;
                $relativePath = str_after($path, Url::to('/'));
            } else {
                $relativePath = str_after($path, base_path());
            }

            if (File::exists(plugins_path('bennothommo/glacierskin/skins/glacier/' . $relativePath))) {
                if ($url) {
                    $path = Url::to('plugins/bennothommo/glacierskin/skins/glacier/' . $relativePath);
                } else {
                    $path = plugins_path('bennothommo/glacierskin/skins/glacier/' . $relativePath);
                }
            } else if (File::exists(plugins_path('bennothommo/glacierskin/skins/glacier/' . strtolower($relativePath)))) {
                if ($url) {
                    $path = Url::to('plugins/bennothommo/glacierskin/skins/glacier/' . strtolower($relativePath));
                } else {
                    $path = plugins_path('bennothommo/glacierskin/skins/glacier/' . strtolower($relativePath));
                }
            }
        });
    }

    /**
     * Adds Glacier overrides for backend controller views and widget partials.
     *
     * @return void
     */
    protected function addSkinViews()
    {
        BaseBackendController::extend(function ($controller) {
            $path = strtolower(get_class($controller));
            $cleanPath = str_replace("\\", "/", $path);
            $controller->addViewPath('$/bennothommo/glacierskin/skins/glacier/' . $cleanPath);
        });

        WidgetBase::extend(function ($widget) {
            $path = strtolower(get_class($widget));
            $cleanPath = str_replace("\\", "/", $path);
            if (
                str_starts_with($cleanPath, 'backend')
                || str_starts_with($cleanPath, 'cms')
                || str_starts_with($cleanPath, 'system')
            ) {
                $cleanPath = 'modules/' . $cleanPath;
            } else {
                $cleanPath = 'plugins/' . $cleanPath;
            }
            $widget->addViewPath('$/bennothommo/glacierskin/skins/glacier/' . $cleanPath . '/partials');
        });
    }
}
