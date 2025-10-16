<?php

namespace MyCompany\Pegawai;

use Backend\Facades\Backend;
use Backend\Models\UserRole;
use System\Classes\PluginBase;

/**
 * Pegawai Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     */
    public function pluginDetails(): array
    {
        return [
            'name'        => 'mycompany.pegawai::lang.plugin.name',
            'description' => 'mycompany.pegawai::lang.plugin.description',
            'author'      => 'MyCompany',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     */
    public function register(): void
    {

    }

    /**
     * Boot method, called right before the request route.
     */
    public function boot(): void
    {

    }

    /**
     * Registers any frontend components implemented in this plugin.
     */
    public function registerComponents(): array
    {
        return []; // Remove this line to activate

        return [
            \MyCompany\Pegawai\Components\MyComponent::class => 'myComponent',
        ];
    }

    /**
     * Registers any backend permissions used by this plugin.
     */
    public function registerPermissions(): array
    {
        return []; // Remove this line to activate

        return [
            'mycompany.pegawai.some_permission' => [
                'tab' => 'mycompany.pegawai::lang.plugin.name',
                'label' => 'mycompany.pegawai::lang.permissions.some_permission',
                'roles' => [UserRole::CODE_DEVELOPER, UserRole::CODE_PUBLISHER],
            ],
        ];
    }

    /**
     * Registers backend navigation items for this plugin.
     */
    public function registerNavigation(): array
    {
        return []; // Remove this line to activate

        return [
            'pegawai' => [
                'label'       => 'mycompany.pegawai::lang.plugin.name',
                'url'         => Backend::url('mycompany/pegawai/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['mycompany.pegawai.*'],
                'order'       => 500,
            ],
        ];
    }
}
