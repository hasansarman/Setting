<div class="checkbox">
    <?php foreach ($moduleInfo['options'] as $value => $optionName): ?>
        <label for="{{ $optionName }}">
                <input id="{{ $optionName }}"
                        name="{{ $settingName }}"
                        type="radio"
                        class="flat-blue"
                        {{ isset($dbSettings[$settingName]) && (bool)$dbSettings[$settingName]->PLAINVALUE == $value ? 'checked' : '' }}
                        value="{{ $value }}" />
                {{ trans($optionName) }}
        </label>
    <?php endforeach; ?>
</div>
