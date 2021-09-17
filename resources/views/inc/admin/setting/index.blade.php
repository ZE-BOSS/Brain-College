	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/admin/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="/admin/assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="/admin/assets/libs/css/style.css">
    <link rel="stylesheet" href="/admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <!-- normalize CSS -->
    <link rel="stylesheet" href="/admin/data-table/css/bootstrap-table.css">
    <link rel="stylesheet" href="/admin/data-table/css/bootstrap-editable.css">
    <!-- normalize CSS -->
    <!-- adminpro icon CSS -->
    <link rel="stylesheet" href="/admin/data-table/adminpro-custon-icon.css">
    <link rel="stylesheet" href="/admin/data-table/bootstrap.min.css">
    <link rel="stylesheet" href="/admin/assets/vendor/summernote/css/summernote-bs4.css">
    <!-- meanmenu icon CSS -->
    <title>Settings</title>
    <style type="text/css">
        .switch.switch-default .switch-input {
            position: absolute;
            top: 0;
            left: 0;
            opacity: 0;
        }
        .mr-2, .mx-2 {
            margin-right: .5rem!important;
        }
        .switch.switch-default .switch-input:checked ~ .switch-handle {
            left: 18px;
        }
        .switch.switch-default .switch-handle {
            position: absolute;
            top: 2px;
            left: 2px;
            width: 20px;
            height: 20px; 
            border: 1px solid;
            -webkit-transition: left .15s ease-out;
            -o-transition: left .15s ease-out;
            -moz-transition: left .15s ease-out;
            transition: left .15s ease-out;
        }
        .switch.switch-default {
            position: relative;
            display: inline-block;
            vertical-align: top;
            width: 40px;
            height: 24px;
            background-color: transparent;
            cursor: pointer;
        }
        .switch.switch-default .switch-label {
            position: relative;
            display: block;
            height: inherit;
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            border: 1px solid;
            -webkit-border-radius: 2px;
            -moz-border-radius: 2px;
            border-radius: 2px;
            -webkit-transition: opacity background .15s ease-out;
            -o-transition: opacity background .15s ease-out;
            -moz-transition: opacity background .15s ease-out;
            transition: opacity background .15s ease-out;
        }
        /*Handle Colors*/
        .switch-primary > .switch-input:checked ~ .switch-handle {
            border-color: blue;
            background: white;
        }
        .switch-primary > .switch-input ~ .switch-handle {
            border-color: blue !important;
            /*background: #4272d7;*/
        }
        .switch-primary > .switch-input ~ .curve-handle{
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .switch-danger > .switch-input:checked ~ .switch-handle {
            border-color: red;
            background: white;
        }
        .switch-danger > .switch-input ~ .switch-handle {
            border-color: red !important;
            /*background: #4272d7;*/
        }
        .switch-danger > .switch-input ~ .curve-handle{
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .switch-success > .switch-input:checked ~ .switch-handle {
            border-color: green;
            background: white;
        }
        .switch-success > .switch-input ~ .switch-handle {
            border-color: green !important;
            /*background: #4272d7;*/
        }
        .switch-success > .switch-input ~ .curve-handle{
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .switch-warning > .switch-input:checked ~ .switch-handle {
            border-color: orange;
            background: white;
        }
        .switch-warning > .switch-input ~ .switch-handle {
            border-color: orange !important;
            /*background: #4272d7;*/
        }
        .switch-warning > .switch-input ~ .curve-handle{
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .switch-info > .switch-input:checked ~ .switch-handle {
            border-color: skyblue;
            background: white;
        }
        .switch-info > .switch-input ~ .switch-handle {
            border-color: skyblue !important;
            /*background: #4272d7;*/
        }
        .switch-info > .switch-input ~ .curve-handle{
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .switch-light > .switch-input:checked ~ .switch-handle {
            border-color: gray;
            background: white;
        }
        .switch-light > .switch-input ~ .switch-handle {
            border-color: gray !important;
            /*background: #4272d7;*/
        }
        .switch-light > .switch-input ~ .curve-handle{
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        .switch-dark > .switch-input:checked ~ .switch-handle {
            border-color: black;
            background: white;
        }
        .switch-dark > .switch-input ~ .switch-handle {
            border-color: black !important;
            /*background: #4272d7;*/
        }
        .switch-dark > .switch-input ~ .curve-handle{
            -webkit-border-radius: 50%;
            -moz-border-radius: 50%;
            border-radius: 50%;
        }

        /*Label Colors*/
        .switch-primary > .switch-input ~ .curve-label {
            -webkit-border-radius: 40%;
            -moz-border-radius: 40%;
            border-radius: 40%;
        }
        .switch-primary > .switch-input:checked ~ .switch-label {
            background: blue !important;
            border-color: blue;
        }
        .switch-primary > .switch-input ~ .switch-label {
            background-color: white !important;
            border-color: blue !important;
        }

        .switch-danger > .switch-input ~ .curve-label {
            -webkit-border-radius: 40%;
            -moz-border-radius: 40%;
            border-radius: 40%;
        }
        .switch-danger > .switch-input:checked ~ .switch-label {
            background: red !important;
            border-color: red;
        }
        .switch-danger > .switch-input ~ .switch-label {
            background-color: white !important;
            border-color: red !important;
        }

        .switch-success > .switch-input ~ .curve-label {
            -webkit-border-radius: 40%;
            -moz-border-radius: 40%;
            border-radius: 40%;
        }
        .switch-success > .switch-input:checked ~ .switch-label {
            background: green !important;
            border-color: green;
        }
        .switch-success > .switch-input ~ .switch-label {
            background-color: white !important;
            border-color: green !important;
        }

        .switch-warning > .switch-input ~ .curve-label {
            -webkit-border-radius: 40%;
            -moz-border-radius: 40%;
            border-radius: 40%;
        }
        .switch-warning > .switch-input:checked ~ .switch-label {
            background: orange !important;
            border-color: orange;
        }
        .switch-warning > .switch-input ~ .switch-label {
            background-color: white !important;
            border-color: orange !important;
        }

        .switch-info > .switch-input ~ .curve-label {
            -webkit-border-radius: 40%;
            -moz-border-radius: 40%;
            border-radius: 40%;
        }
        .switch-info > .switch-input:checked ~ .switch-label {
            background: skyblue !important;
            border-color: skyblue;
        }
        .switch-info > .switch-input ~ .switch-label {
            background-color: white !important;
            border-color: skyblue !important;
        }

        .switch-light > .switch-input ~ .curve-label {
            -webkit-border-radius: 40%;
            -moz-border-radius: 40%;
            border-radius: 40%;
        }
        .switch-light > .switch-input:checked ~ .switch-label {
            background: gray !important;
            border-color: gray;
        }
        .switch-light > .switch-input ~ .switch-label {
            background-color: white !important;
            border-color: gray !important;
        }

        .switch-dark > .switch-input ~ .curve-label {
            -webkit-border-radius: 40%;
            -moz-border-radius: 40%;
            border-radius: 40%;
        }
        .switch-dark > .switch-input:checked ~ .switch-label {
            background: black !important;
            border-color: black;
        }
        .switch-dark > .switch-input ~ .switch-label {
            background-color: white !important;
            border-color: black !important;
        }
    </style>