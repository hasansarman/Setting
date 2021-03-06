<?php

namespace Modules\Setting\Support;

use Modules\Setting\Contracts\Setting;
use Modules\Setting\Repositories\SettingRepository;

class Settings implements Setting
{
    /**
     * @var SettingRepository
     */
    private $setting;

    /**
     * @param SettingRepository $setting
     */
    public function __construct(SettingRepository $setting)
    {
        $this->setting = $setting;
    }

    /**
     * Getting the setting
     * @param  string $name
     * @param  string   $locale
     * @param  string   $default
     * @return mixed
     */
    public function get($name, $locale = null, $default = null)
    {
        $defaultFromConfig = $this->getDefaultFromConfigFor($name);

        $setting = $this->setting->findByName($name);
        if (! $setting) {
            return is_null($default) ? $defaultFromConfig : $default;
        }

        /*if ($setting->ISTRANSLATABLE) {
            if ($setting->hasTranslation($locale)) {
                return empty($setting->translate($locale)->VALUE) ? $defaultFromConfig : $setting->translate($locale)->VALUE;
            }
        } else {*/
            return empty($setting->PLAINVALUE) ? $defaultFromConfig : $setting->PLAINVALUE;
      //  }

        return $defaultFromConfig;
    }

    /**
     * Determine if the given configuration value exists.
     *
     * @param  string $name
     * @return bool
     */
    public function has($name)
    {
        $default = microtime(true);

        return $this->get($name, null, $default) !== $default;
    }

    /**
     * Set a given configuration value.
     *
     * @param  string $key
     * @param  mixed  $value
     * @return \Modules\Setting\Entities\Setting
     */
    public function set($key, $value)
    {
        return $this->setting->create([
            'NAME' => $key,
            'PLAINVALUE' => $value,
        ]);
    }

    /**
     * Get the default value from the settings configuration file,
     * for the given setting name.
     * @param string $name
     * @return string
     */
    private function getDefaultFromConfigFor($name)
    {
        list($module, $settingName) = explode('::', $name);

        return config("asgard.$module.settings.$settingName.default", '');
    }
}
