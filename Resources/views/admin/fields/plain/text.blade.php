<div class='form-group'>
    {!! Form::label($settingName, trans($moduleInfo['description'])) !!}
    <?php if (isset($dbSettings[$settingName]) && $dbSettings[$settingName]->PLAINVALUE !== null): ?>
        {!! Form::text($settingName, old($settingName, $dbSettings[$settingName]->PLAINVALUE), ['class' => 'form-control', 'placeholder' => trans($moduleInfo['description'])]) !!}
    <?php else: ?>
        {!! Form::text($settingName, old($settingName), ['class' => 'form-control', 'placeholder' => trans($moduleInfo['description'])]) !!}
    <?php endif; ?>
</div>
