<?php foreach ($settings as $settingName => $moduleInfo): ?>


    <?php $type =  'plain'; ?>
    <?php $fieldView = str_contains($moduleInfo['view'], '::') ? $moduleInfo['view'] : "setting::admin.fields.$type.{$moduleInfo['view']}" ?>
    <?php $locale =  ''; ?>
    @include($fieldView, [
        'lang' => $locale,
        'settings' => $settings,
        'setting' => $settingName,
        'moduleInfo' => $moduleInfo,
        'settingName' => strtolower($currentModule) . '::' . $settingName
    ])
<?php endforeach;?>
