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

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700&family=Yantramanav:wght@500;700&display=swap" rel="stylesheet">

<?= $this->makeAssets() ?>
<?= Block::placeholder('head') ?>
<?= $this->makeLayoutPartial('custom_styles') ?>
