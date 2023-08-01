const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */
 const layoutCSS = [
    "resources/css/default/app.min.css",
    "resources/css/green.css",
    "resources/plugins/gritter/css/jquery.gritter.css",
    "resources/plugins/DataTables/DataTables-1.12.1/css/dataTables.bootstrap4.min.css",
    "resources/plugins/DataTables/Select-1.4.0/css/select.bootstrap4.min.css",
    "resources/plugins/DataTables/Buttons-2.2.3/css/buttons.bootstrap4.min.css",
    "resources/plugins/DataTables/FixedHeader-3.2.4/css/fixedHeader.bootstrap4.min.css",
    "resources/plugins/DataTables/FixedColumns-4.1.0/css/fixedColumns.bootstrap4.min.css",
    "resources/plugins/DataTables/RowGroup-1.2.0/css/rowGroup.bootstrap4.min.css",

];

const layoutJS = [
    "resources/js/app.min.js",
    "resources/plugins/moment/min/moment.min.js",
    "resources/plugins/slimscroll/jquery.slimscroll.min.js",
    "resources/js/theme/default.min.js",
    "resources/plugins/gritter/js/jquery.gritter.js",
    "resources/plugins/DataTables/DataTables-1.12.1/js/jquery.dataTables.min.js",
    "resources/plugins/DataTables/DataTables-1.12.1/js/dataTables.bootstrap4.min.js",
    "resources/plugins/DataTables/Select-1.4.0/js/dataTables.select.min.js",
    "resources/plugins/DataTables/Select-1.4.0/js/select.bootstrap4.min.js",
    "resources/plugins/DataTables/Buttons-2.2.3/js/dataTables.buttons.min.js",
    "resources/plugins/DataTables/Buttons-2.2.3/js/buttons.bootstrap4.min.js",
    "resources/plugins/DataTables/JSZip-2.5.0/jszip.min.js",
    "resources/plugins/DataTables/pdfmake-0.1.36/pdfmake.min.js",
    "resources/plugins/DataTables/pdfmake-0.1.36/vfs_fonts.js",
    "resources/plugins/DataTables/Buttons-2.2.3/js/buttons.html5.min.js",
    "resources/plugins/DataTables/Buttons-2.2.3/js/buttons.print.min.js",
    "resources/plugins/DataTables/Buttons-2.2.3/js/buttons.colVis.min.js",
    "resources/plugins/DataTables/FixedHeader-3.2.4/js/dataTables.fixedHeader.min.js",
    "resources/plugins/DataTables/FixedHeader-3.2.4/js/fixedHeader.bootstrap4.min.js",
    "resources/plugins/DataTables/FixedColumns-4.1.0/js/dataTables.fixedColumns.min.js",
    "resources/plugins/DataTables/FixedColumns-4.1.0/js/fixedColumns.bootstrap4.min.js",
    "resources/plugins/DataTables/dataTables.rowsGroup.js",
    "resources/plugins/DataTables/RowGroup-1.2.0/js/dataTables.rowGroup.min.js",
    "resources/plugins/DataTables/RowGroup-1.2.0/js/rowGroup.bootstrap4.min.js",
];

const TrxJS = [
    "resources/plugins/iziToast/dist/js/iziToast.min.js",
    "resources/plugins/iziModal/js/iziModal.js",
    "resources/plugins/Parsleyjs/dist/parsley.min.js",
    "resources/plugins/gritter/js/jquery.gritter.js",
    "resources/plugins/sweetalert2/dist/sweetalert2.all.min.js",
    "resources/plugins/select2/dist/js/select2.full.min.js",
    "resources/js/classes/Message.js",
    "resources/js/classes/Formatter.js",
    "resources/js/classes/CustomUI.js",
    "resources/js/classes/Data.js",
];

const TrxCSS = [
    "resources/plugins/iziToast/dist/css/iziToast.min.css",
    "resources/plugins/iziModal/css/iziModal.css",
    "resources/plugins/Parsleyjs/src/parsley.min.css",
    "resources/plugins/gritter/css/jquery.gritter.css",
    "resources/plugins/sweetalert2/dist/sweetalert2.min.css",
    "resources/plugins/select2/dist/css/select2.min.css",
    "resources/plugins/select2/dist/css/select2-bootstrap4.css",
    "resources/css/custom.css"
];

mix.js(['resources/js/app.js','resources/js/iziToast/dist/js/iziToast.min.js'], 'public/js')
    .postCss('resources/css/app.css', 'public/css', [
        require("tailwindcss"),
    ])
    .js('resources/js/modules/AOS.js',"public/js/modules")
    .js('resources/js/modules/flowbite.js',"public/js/modules")
    .js('resources/js/modules/izitoast.js',"public/js/modules")
    .js('resources/js/modules/jquery.js',"public/js/modules")
    .js('resources/js/modules/jquery_validation.js',"public/js/modules")
    .js('resources/js/modules/moment.js',"public/js/modules")
    .js('resources/js/modules/quill.js',"public/js/modules")
    .js('resources/js/modules/swiper.js',"public/js/modules")
    .js('resources/js/modules/tw_elements.js',"public/js/modules")

    .styles("resources/js/iziToast/dist/css/iziToast.min.css","public/css/iziToast.min.css")
    .sass('resources/sass/app.scss', 'public/css')
    .sourceMaps()
    .scripts(layoutJS, "public/js/theme.js")
    .styles(layoutCSS, "public/css/theme.css")
    .scripts(TrxJS, "public/js/trx.js")
    .styles(TrxCSS, "public/css/trx.css")

    .scripts('resources/js/auth/auth.js','public/js/auth/auth.js')

    .scripts(['public/js/modules/swiper.js'
            ,'public/js/modules/AOS.js'
            ,'public/js/modules/izitoast.js'
            ,'resources/js/onepage.js'
        ],'public/js/onepage.js')

    .scripts(['public/js/modules/tw_elements.js'
            ,'public/js/modules/izitoast.js'
            ,'public/js/modules/flowbite.js'
            ,'resources/js/client/Biodata.js'
        ],"public/js/client/Biodata.js")

    .scripts('resources/js/client/jobcategory.js',"public/js/client/jobcategory.js")
    .scripts(['public/js/modules/flowbite.js'
              ,'public/js/modules/izitoast.js'
              ,'public/js/modules/quill.js'
              ,'resources/js/client/qualification.js'
        ],"public/js/client/qualification.js")

    .scripts(['public/js/modules/AOS.js'
            ,'public/js/modules/quill.js'
            ,'public/js/modules/izitoast.js'
            ,'public/js/modules/swiper.js'
            ,'resources/js/client/gallery.js'
        ],"public/js/client/gallery.js")

    .scripts([
        "public/js/theme.js",
        "public/js/trx.js",
        "resources/js/admin/ManagementRegistration.js"
    ], "public/js/admin/ManagementRegistration.js")
    .styles([
        "public/css/theme.css",
        "public/css/trx.css",
    ], "public/css/admin/ManagementRegistration.css")

    .scripts([
        "public/js/theme.js",
        "public/js/trx.js",
        "resources/js/admin/MasterMaintenance/JobInformation.js"
    ], "public/js/admin/MasterMaintenance/JobInformation.js")
    .styles([
        "public/css/theme.css",
        "public/css/trx.css",
    ], "public/css/admin/MasterMaintenance/JobInformation.css")

    .scripts([
        "public/js/theme.js",
        "public/js/trx.js",
        "resources/js/admin/MasterMaintenance/UserInformation.js"
    ], "public/js/admin/MasterMaintenance/UserInformation.js")
    .styles([
        "public/css/theme.css",
        "public/css/trx.css",
    ], "public/css/admin/MasterMaintenance/UserInformation.css")

    .scripts([
        "public/js/theme.js",
        "public/js/trx.js",
        "resources/js/admin/MasterMaintenance/PromJapLang.js"
    ], "public/js/admin/MasterMaintenance/PromJapLang.js")
    .styles([
        "public/css/theme.css",
        "public/css/trx.css",
    ], "public/css/admin/MasterMaintenance/PromJapLang.css");
    
    