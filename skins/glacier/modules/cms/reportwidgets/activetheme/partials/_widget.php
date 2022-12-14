<div class="report-widget widget-activetheme">
    <h3><?= e(trans($this->property('title'))) ?></h3>

    <?php if (!isset($error)): ?>
        <?= $this->makePartial('theme', ['theme' => $theme]) ?>
    <?php else: ?>
        <div class="callout callout-warning">
            <div class="content"><?= e($error) ?></div>
        </div>
    <?php endif ?>


    <?php /*
        <ul class="list-inline">
            <li>
            <?php if ($canManage): ?>
                <a href="<?= Backend::url('system/settings/update/winter/cms/maintenance_settings') ?>">
            <?php endif ?>
                <?php if ($inMaintenance): ?>
                    <i class="icon-circle warning"></i>
                    <span class="text-warning">
                        <?= e(trans('cms::lang.dashboard.active_theme.maintenance')) ?>
                    </span>
                <?php else: ?>
                    <i class="icon-circle success"></i>
                    <span class="text-success">
                        <?= e(trans('cms::lang.dashboard.active_theme.online')) ?>
                    </span>
                <?php endif ?>
            <?php if ($canManage): ?>
                </a>
            <?php endif ?>
            </li>
        <?php if ($canManage): ?>
            <li>
                <a href="<?= Backend::url('cms/themes') ?>">
                    <?= e(trans('cms::lang.dashboard.active_theme.manage_themes')) ?>
                </a>
            </li>
        <?php endif ?>
        <?php if ($canConfig && $theme->hasCustomData()): ?>
            <li>
                <a href="<?= Backend::url('cms/themeoptions/update/'.$theme->getDirName()) ?>">
                    <?= e(trans('cms::lang.dashboard.active_theme.customize_theme')) ?>
                </a>
            </li>
        <?php endif ?>
        </ul>

    */ ?>
</div>
