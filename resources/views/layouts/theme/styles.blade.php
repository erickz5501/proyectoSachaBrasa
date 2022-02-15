<link href=" {{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
<script src=" {{ asset('assets/js/loader.js') }}"></script>

<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
<link href=" {{ asset('bootstrap/css/bootstrap.min.css') }} " rel="stylesheet" type="text/css" />
<link href=" {{ asset('assets/css/plugins.css') }}" rel="stylesheet" type="text/css" />
<link href=" {{ asset('assets/css/structure.css') }}" rel="stylesheet" type="text/css" class="structure" />

<!-- END GLOBAL MANDATORY STYLES -->

<link rel="stylesheet" href=" {{ asset('plugins/font-icons/fontawesome/css/fontawesome.css') }}" type="text/css" />
<link rel="stylesheet" href=" {{ asset('/plugins/@fortawesome/fontawesome-free/css/all.min.css')}}" type="text/css">
<link rel="stylesheet" href=" {{ asset('css/fontawesome.css') }}" type="text/css" />
<link rel="stylesheet" href=" {{ asset('assets/css/elements/avatar.css') }}" type="text/css" />
<link rel="stylesheet" href=" {{ asset('plugins/sweetalerts/sweetalert.css') }} ">
<link rel="stylesheet" href=" {{ asset('plugins/notification/snackbar/snackbar.min.css') }} " type="text/css" />

<link rel="stylesheet" href=" {{ asset('css/custom.css') }}" type="text/css" />

<link rel="stylesheet" href=" {{ asset('assets/css/widgets/modules-widgets.css') }}" type="text/css" />
<link rel="stylesheet" href=" {{ asset('assets/css/forms/theme-checkbox-radio.css') }}" type="text/css" />

<link rel="stylesheet" href=" {{ asset('assets/css/apps/scrumboard.css') }} " type="text/css" />
<link rel="stylesheet" href=" {{ asset('assets/css/apps/notes.css') }} " type="text/css" />

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
<link href=" {{ asset('plugins/apex/apexcharts.css') }} " rel="stylesheet" type="text/css">
<link href=" {{ asset('assets/css/dashboard/dash_1.css') }}" rel="stylesheet" type="text/css" class="dashboard-analytics" />

<style>
    aside{
        display: none!important;
    }
    .page-item.active .page-link {
        z-index: 3;
        color: #fff;
        background-color: #e05f1a;
        border-color: #e05f1a;
    }

    @media(max-width:480px){
        .mtmobile {
            margin-bottom: 20px!important;
        }
        .mbmobile{
            margin-bottom: 10px!important;
        }
        .hideinsm{
            display: none!important;
        }
        .inblock{
            display: block;
        }
    }



</style>
@livewireStyles