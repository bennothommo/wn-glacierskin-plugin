const mix = require('laravel-mix');
mix.setPublicPath(__dirname);

mix
    // Base LESS files
    .less('assets/less/storm.less', 'skins/glacier/modules/backend/assets/css/storm.css')
    .less('assets/less/icons.less', 'skins/glacier/modules/backend/assets/css/icons.css')
    .less('assets/less/winter.less', 'skins/glacier/modules/backend/assets/css/winter.css')

    // Backend widgets
    .less(
        'skins/glacier/modules/backend/widgets/reportcontainer/assets/less/reportcontainer.less',
        'skins/glacier/modules/backend/widgets/reportcontainer/assets/css/reportcontainer.css',
    )
    .less(
        'skins/glacier/modules/cms/reportwidgets/activetheme/assets/less/activetheme.less',
        'skins/glacier/modules/cms/reportwidgets/activetheme/assets/css/activetheme.css',
    )
;
