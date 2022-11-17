<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0, minimal-ui">
<meta name="robots" content="noindex">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="app-timezone" content="<?= e(Config::get('app.timezone')) ?>">
<meta name="backend-base-path" content="<?= Backend::baseUrl() ?>">
<meta name="backend-timezone" content="<?= e(Backend\Models\Preference::get('timezone')) ?>">
<meta name="backend-locale" content="<?= e(Backend\Models\Preference::get('locale')) ?>">
<meta name="csrf-token" content="<?= csrf_token() ?>">
<link rel="icon" type="image/png" href="<?= e(Backend\Models\BrandSetting::getFavicon()) ?>">
<title data-title-template="<?= empty($this->pageTitleTemplate) ? '%s' : e($this->pageTitleTemplate) ?> | <?= e(Backend\Models\BrandSetting::get('app_name')) ?>">
    <?= e(trans($this->pageTitle)) ?> | <?= e(Backend\Models\BrandSetting::get('app_name')) ?>
</title>
<?php
$coreBuild = System\Models\Parameter::get('system::core.build', 1);

// Styles
$styles = [
    Url::asset('plugins/bennothommo/glacierskin/assets/css/storm.css'),
    Url::asset('plugins/bennothommo/glacierskin/assets/css/icons.css'),
    Url::asset('plugins/bennothommo/glacierskin/assets/css/winter.css'),
];

// Scripts
$scripts = [
    Backend::skinAsset('assets/js/vendor/jquery.min.js'),
    Backend::skinAsset('assets/js/vendor/jquery-migrate.min.js'),
    Url::asset('modules/system/assets/js/framework.js'),
    Url::asset('modules/system/assets/js/build/manifest.js'),
    Url::asset('modules/system/assets/js/snowboard/build/snowboard.vendor.js'),
    Url::asset(
        (Config::get('develop.debugSnowboard', Config::get('app.debug', false)) === true)
            ? 'modules/system/assets/js/build/system.debug.js'
            : 'modules/system/assets/js/build/system.js'
    ),
    Url::asset('modules/backend/assets/ui/js/build/backend.js'),
];
if (Config::get('develop.decompileBackendAssets', false)) {
    $scripts = array_merge($scripts, Backend::decompileAsset('modules/system/assets/ui/storm.js'));
    $scripts = array_merge($scripts, Backend::decompileAsset('assets/js/winter.js', true));
} else {
    $scripts = array_merge($scripts, [Url::asset('modules/system/assets/ui/storm-min.js')]);
    $scripts = array_merge($scripts, [Backend::skinAsset('assets/js/winter-min.js')]);
}
$scripts = array_merge($scripts, [
    Url::asset('modules/system/assets/js/lang/lang.'.App::getLocale().'.js'),
    Backend::skinAsset('assets/js/winter.flyout.js'),
    Backend::skinAsset('assets/js/winter.tabformexpandcontrols.js'),
]);
?>

<?php foreach ($styles as $style): ?>
    <link href="<?= $style . '?v=' . $coreBuild; ?>" rel="stylesheet">
<?php endforeach; ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&family=Yantramanav:wght@500;700&display=swap" rel="stylesheet">

<?php foreach ($scripts as $script): ?>
    <script data-cfasync="false" src="<?= $script . '?v=' . $coreBuild; ?>"></script>
<?php endforeach; ?>

<?= $this->makeAssets() ?>
<?= Block::placeholder('head') ?>
<?= $this->makeLayoutPartial('custom_styles') ?>
