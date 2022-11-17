<div class="layout">
    <div class="layout-row gapped">
        <div class="layout-cell min-size">
            <div class="theme-thumbnail" style="background-image: url(<?= $theme->getPreviewImageUrl() ?>"></div>
        </div>
        <div class="layout-cell">
            <div class="layout gapped">
                <div class="layout-row">
                    <div class="layout-cell">
                        <?= trans('bennothommo.glacierskin::lang.widgets.activeTheme.theme', [
                            'theme' => '<strong>' . $theme->getConfig()['name'] . '</strong>',
                        ]) ?>
                    </div>
                </div>
                <div class="layout-row">
                    <div class="layout-cell">
                        <a href="<?= Backend::url('cms/themes') ?>" class="btn btn-primary">
                            <?= e(trans('cms::lang.dashboard.active_theme.manage_themes')) ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
