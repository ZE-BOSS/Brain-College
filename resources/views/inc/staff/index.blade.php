    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>
        {{Request::is('staff_portal/staff_index') ? 'Dashboard' : ''}}

        {{Request::is('staff_portal/staff_news') ? 'News' : ''}} 
        {{Request::is('staff_portal/staff_news/create') ? 'Create News' : ''}} 
        {{Request::is('staff_portal/staff_news/'.$id) ? 'Show News' : ''}} 
        {{Request::is('staff_portal/staff_news/'.$id.'/edit') ? 'News' : ''}}

        {{Request::is('staff_portal/staff_event') ? 'Event' : ''}} 
        {{Request::is('staff_portal/staff_event/create') ? 'Create Event' : ''}} 
        {{Request::is('staff_portal/staff_event/'.$id) ? 'Show Event' : ''}} 
        {{Request::is('staff_portal/staff_event/'.$id.'/edit') ? 'Edit Event' : ''}}

        {{Request::is('staff_portal/staff_gallery') ? 'Gallery' : ''}} 
        {{Request::is('staff_portal/staff_gallery/create') ? 'Create Gallery' : ''}} 
        {{Request::is('staff_portal/staff_gallery/'.$id) ? 'Show Gallery' : ''}} 
        {{Request::is('staff_portal/staff_gallery/'.$id.'/edit') ? 'Edit Gallery' : ''}}

        {{Request::is('staff_portal/staff_subject') ? 'Subject' : ''}} 
        {{Request::is('staff_portal/staff_subject/create') ? 'Create Subject' : ''}} 
        {{Request::is('staff_portal/staff_subject/'.$id) ? 'Show Subject' : ''}} 
        {{Request::is('staff_portal/staff_subject/'.$id.'/edit') ? 'Edit Subject' : ''}}

        {{Request::is('staff_portal/staff_class') ? 'Class' : ''}} 
        {{Request::is('staff_portal/staff_class/create') ? 'Create Class' : ''}} 
        {{Request::is('staff_portal/staff_class/'.$id) ? 'Show Class' : ''}} 
        {{Request::is('staff_portal/staff_class/'.$id.'/edit') ? 'Edit Class' : ''}}

        {{Request::is('staff_portal/staff_student') ? 'Students' : ''}} 
        {{Request::is('staff_portal/staff_student/create') ? 'Create Student' : ''}} 
        {{Request::is('staff_portal/staff_student/'.$id) ? 'Show Student' : ''}} 
        {{Request::is('staff_portal/staff_student/'.$id.'/edit') ? 'Edit Student' : ''}}

        {{Request::is('staff_portal/staff_staff') ? 'Staff' : ''}} 
        {{Request::is('staff_portal/staff_staff/create') ? 'Create Staff' : ''}} 
        {{Request::is('staff_portal/staff_staff/'.$id) ? 'Show Staff' : ''}} 
        {{Request::is('staff_portal/staff_staff/'.$id.'/edit') ? 'Edit Staff' : ''}}

        {{Request::is('staff_portal/staff_book') ? 'Books' : ''}} 
        {{Request::is('staff_portal/staff_book/create') ? 'Create Book' : ''}} 
        {{Request::is('staff_portal/staff_book/'.$id) ? 'Show Book' : ''}} 
        {{Request::is('staff_portal/staff_book/'.$id.'/edit') ? 'Edit Book' : ''}}

        {{Request::is('staff_portal/staff_attendance') ? 'Attendance' : ''}}
        {{Request::is('staff_portal/staff_attendance/create') ? 'Create Attendance' : ''}} 
        {{Request::is('staff_portal/staff_attendance/'.$id) ? 'Show Attendance' : ''}} 
        {{Request::is('staff_portal/staff_attendance/'.$id.'/edit') ? 'Edit Attendance' : ''}}

        {{Request::is('staff_portal/staff_syllabus') ? 'Syllabus' : ''}} 
        {{Request::is('staff_portal/staff_syllabus/create') ? 'Create Syllabus' : ''}} 
        {{Request::is('staff_portal/staff_syllabus/'.$id) ? 'Show Syllabus' : ''}} 
        {{Request::is('staff_portal/staff_syllabus/'.$id.'/edit') ? 'Edit Syllabus' : ''}}

        {{Request::is('staff_portal/staff_hostel') ? 'Hostel' : ''}} 
        {{Request::is('staff_portal/staff_hostel/create') ? 'Create Hostel' : ''}} 
        {{Request::is('staff_portal/staff_hostel/'.$id) ? 'Show Hostel' : ''}} 
        {{Request::is('staff_portal/staff_hostel/'.$id.'/edit') ? 'Edit Hostel' : ''}}

        {{Request::is('staff_portal/staff_library') ? 'Library' : ''}} 
        {{Request::is('staff_portal/staff_library/create') ? 'Create Library' : ''}} 
        {{Request::is('staff_portal/staff_library/'.$id) ? 'Show Library' : ''}} 
        {{Request::is('staff_portal/staff_library/'.$id.'/edit') ? 'Edit Library' : ''}}
    </title>

    <!-- Fontfaces CSS-->
    <link href="/staff/css/font-face.css" rel="stylesheet" media="all">
    <link href="/staff/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/staff/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/staff/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/staff/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="/staff/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/staff/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/staff/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/staff/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/staff/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/staff/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/staff/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="/staff/vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/staff/css/theme.css" rel="stylesheet" media="all">

    <link href="/staff/css/theme.css" rel="stylesheet" media="all">
    <!-- normalize CSS -->
    <link rel="stylesheet" href="/staff/data-table/css/bootstrap-table.css">
    <link rel="stylesheet" href="/staff/data-table/css/bootstrap-editable.css">
    <!-- normalize CSS -->
    <!-- staffpro icon CSS -->
    <link rel="stylesheet" href="/staff/data-table/adminpro-custon-icon.css">
    <link rel="stylesheet" href="/staff/data-table/bootstrap.min.css">
    <link rel="stylesheet" href="/staff/vendor/inputmask/css/inputmask.css">

    <link rel="stylesheet" href="/admin/assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="/admin/assets/vendor/player/style.css">
    <style type="text/css">
        .card {
            margin-bottom: 30px;
            border: none;
            -webkit-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            -moz-box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
            box-shadow: 0px 1px 2px 1px rgba(154, 154, 204, 0.22);
        }

        .card-header {
            background-color: #fff;
            border-bottom: 1px solid #e6e6f2;
        }

        .card-title {}

        .card-subtitle {
            font-size: 14px;
        }

        .card-body {}

        .card-text {}

        .card-footer {
            border-top: 1px solid #e6e6f2;
            background: #f6f6ff;
        }

        .card-link {}

        .toolbar {
            font-size: 18px;
        }

        .card-header-title {
            margin: 0;
            line-height: 2;
        }

        .card-toolbar-tabs {}

        .card-toolbar-tabs .nav.nav-pills {}

        .card-toolbar-tabs .nav.nav-pills .nav-item {}

        .card-toolbar-tabs .nav.nav-pills .nav-item .nav-link {
            font-size: 14px;
            padding: 6px 10px;
        }

        .card-toolbar-tabs .nav-pills .nav-link.active,
        .nav-pills .show>.nav-link {
            color: #5969ff;
            background-color: transparent;
        }


        /*------------------------- Card Varience --------------------------*/

        .card-figure {
            position: relative;
            padding: 10px;
            border-radius: 2px;
        }

        .card-figure .figure {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            margin-bottom: 0;
        }

        .card-figure .figure-caption {
            display: block;
            margin-top: 10px;
            font-size: .75rem;
            color: inherit;
        }

        .figure-title {
            margin: 0 0 .125rem;
            text-transform: capitalize;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .card-figure.has-hoverable {
            -webkit-transition: -webkit-transform .2s, -webkit-box-shadow .2s;
            transition: -webkit-transform .2s, -webkit-box-shadow .2s;
            transition: transform .2s, box-shadow .2s;
            transition: transform .2s, box-shadow .2s, -webkit-transform .2s, -webkit-box-shadow .2s;
        }

        .card-figure.has-hoverable:focus,
        .card-figure.has-hoverable:hover {
            -webkit-transform: translate3d(0, -.25rem, 0);
            transform: translate3d(0, -.25rem, 0);
            -webkit-box-shadow: 0 5px 15px 0 rgba(61, 70, 79, .15);
            box-shadow: 0 5px 15px 0 rgba(61, 70, 79, .15);
        }

        .figure-img {
            position: relative;
            margin-bottom: 0;
            overflow: hidden;
        }

        .figure-img .img-link {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background-color: ;
            opacity: 0;
            z-index: 2;
            -webkit-transition: opacity .1s ease;
            transition: opacity .2s ease;
        }

        .card-figure:hover .img-link {
            opacity: 1;
        }

        .figure-img .img-link .tile {
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -1rem;
            margin-left: -1rem;
        }

        .tile.bg-danger {
            color: #fff;
        }

        .tile-circle {
            border-radius: 4rem;
        }

        .figure-action {
            position: absolute;
            left: 0;
            right: 0;
            bottom: 0;
            display: block;
            opacity: 0;
            -webkit-transform: translate3d(0, 100%, 0);
            transform: translate3d(0, 100%, 0);
            -webkit-transition: all .3s ease;
            transition: all .3s ease;
        }

        .card-figure:hover .figure-action {
            opacity: 1;
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            z-index: 2;
        }

        .figure-tools {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            padding: .5rem;
            opacity: 0;
            z-index: 2;
            -webkit-transition: opacity .3s ease;
            transition: opacity .3s ease;
        }

        .card-figure:hover .figure-tools {
            opacity: 1;
        }

        .figure-description {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            padding: 2.25rem .5rem;
            background-color: hsla(0, 0%, 100%, .96);
            opacity: 0;
            -webkit-transition: all .3s ease;
            transition: all .3s ease;
            z-index: 1;
        }

        .card-figure:hover .figure-description {
            opacity: 1;
        }

        .figure-attachment {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            min-height: 200px;
            background-color: #f5f5f5;
            overflow: hidden;
        }

        .btn-reset {
            padding: 0 2px;
            font-size: inherit;
            line-height: inherit;
            color: inherit;
            background-color: transparent;
            border: 0;
            cursor: pointer;
        }</style>

    <style type="text/css">
        .ellipsis{
            position: relative;
        }
        .linka:hover{
            color: blue;
            cursor: pointer;
        }
    </style>

    <style type="text/css">
        .lead{
            font-size: 20px;
            font-weight: 20px;
        }
        .nav-tabs{
            background-color: white;
        }
        .simple-card{
            background-color: white;
        }
        .tab-content{
            background-color: white; padding: 20px;
        }
    </style>