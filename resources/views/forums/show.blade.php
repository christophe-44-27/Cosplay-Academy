@extends('base_layout')
@push('stylesheets')
    <style>
        .forum-header {
            position: relative;
            padding: 25px 0;
            border-bottom: 1px solid #e5e5e5;
            background-color: #f9f9f9;
            background-position: 50%;
            background-size: cover;
            -webkit-transition-duration: .3s;
            transition-duration: .3s;
        }

        .col-s-12 {
            width: 100%;
        }

        .row {
            margin-left: -15px;
            margin-right: -15px;
        }

        .col-s-12, .col-m-9, .col-m-3 {
            float: left;
            position: relative;
            min-height: 1px;
            padding-left: 15px;
            padding-right: 15px;
        }

        .forum-bloc-mono{
            font-weight: 700;
            margin-bottom: 5px;
        }

        .forum-bloc-mono{
            height: 36px;
            padding: 0 5px;
            margin-bottom: 10px;
            color: #9e9e9e;
            line-height: 18px;
            overflow: hidden;
        }

        .forum-bloc-mono a:hover img {
            -webkit-transform: scale(1.1);
            -ms-transform: scale(1.1);
            transform: scale(1.1);
        }

        .forum-bloc-mono img {
            display: block;
            width: 75px;
            margin: 0 auto;
            -webkit-transition-duration: .3s;
            transition-duration: .3s;
        }

        .container {
            width: 100%;
            position: relative;
            max-width: 1130px;
            padding-left: 15px;
            padding-right: 15px;
            margin: 0 auto;
        }

        .is-unread {
            color: #404852;
        }

        .table {
            width: 100%;
            border: 1px solid #ededed;
            background-color: #fff;
            text-align: left;
            border-collapse: collapse;
            border-radius: 3px;
            background-clip: padding-box;
            -webkit-box-shadow: 0 4px 4px hsla(0, 0%, 95%, .56);
            box-shadow: 0 4px 4px hsla(0, 0%, 95%, .56);
        }

        table {
            border-spacing: 0;
        }

        .table td, .table th {
            padding: 7px 13px;
            border: 1px solid #f1f1f1;
            border-top: none;
            vertical-align: middle;
        }

        .tcenter {
            text-align: center;
        }

        a, tbody, td, tr {
            margin: 0;
            padding: 0;
            border: 0;
            font-size: 100%;
            font: inherit;
            vertical-align: baseline;
        }

        .forum-bloc-mono {
            text-align: center;
            margin-bottom: 20px;
            padding-top: 10px;
            height: 152px;
        }

        td {
            margin: 0;
            font-size: 100%;
            font: inherit;
        }
        .title {
            font-size: 42px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1rem;
        }
        @media only screen and (min-width: 640px) {
            .m-left {
                text-align: left;
            }

            .m-right {
                text-align: right;
            }

            .col-m-9 {
                width: 75%;
            }

            .col-m-3 {
                width: 25%;
            }
        }

        .btn {
            display: inline-block;
            min-height: 40px;
            padding: 0 15px;
            line-height: 36px;
            text-align: center;
            text-decoration: none!important;
            font-weight: 700;
            cursor: pointer;
            -webkit-transition: .3s;
            transition: .3s;
            border-radius: 3px;
            transition-duration: .3s;
            -webkit-appearance: none;
            background-color: #78ab4e;
        }

    </style>
@endpush()
@section('content')
    <!-- Section: inner-header -->
    <div class="forum-header">
        <div class="container">
            <div class="col-s-12 col-m-9">
                <h1 class="title tcenter m-left">
                    {{ $forum->title }}
                </h1>
                <p class="tcenter m-left">
                    {{ $forum->short_description }}
                </p>
            </div>
            <div class="col-s-12 col-m-3">
                <p class="tcenter m-right">
                    @auth()
                    <a class="btn btn-primary" href="#" data-toggle="modal"
                       data-target="#postTopic"><i class="icon icon-plus"></i> Nouveau sujet</a>
                    @endauth

                    @guest()
                        <a class="btn btn-primary" href="{{ route('login') }}"><i class="icon icon-plus"></i> Connectez-vous pour créer un nouveau sujet</a>
                    @endguest
                </p>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <table class="table">
                <thead>
                <tr>
                    <th></th>
                    <th>
                        Sujets
                    </th>
                    <th class="tcenter tdh">
                        Réponses
                    </th>
                    <th class="tdh">
                        Dernier message
                    </th>
                </tr>
                </thead>
                <tbody>
                @if(!empty($topics))
                    @foreach($topics as $topic)
                        <tr class="topic">
                            <td class="tcenter">
                                <i class="icon topic_icon"></i>
                            </td>
                            <td>
                                <div class="topic_name">
                                    <a href="{{ route('show_forum_thread', $topic->slug) }}">{{ $topic->title }}</a>
                                </div>
                                <div class="topic_meta">
                                    par {{ $topic->user->name }}, <span class="js-vue"><abbr
                                            class="timeago">{{ Carbon\Carbon::parse($topic->created_at)->diffForHumans()}}</abbr></span>
                                </div>
                            </td>
                            <td class="tcenter tdh">
                                {{ count($topic->topicAnswers) }}
                            </td>
                            <td class="topic_post tdh">
                                @if(count($topic->topicAnswers) > 0)
                                    <a class="topic_name" href="{{ route('show_forum_thread', $topic->slug) }}">Par {{ $topic->latestTopicAnswer->user->name }}</a>
                                    <div class="topic_meta">
                                        <span class="js-vue">
                                            <abbr class="timeago">
                                                {{ Carbon\Carbon::parse($topic->latestTopicAnswer->created_at)->diffForHumans()}}
                                            </abbr>
                                        </span>
                                    </div>
                                @else
                                    <p>Aucune réponse</p>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <div class="alert alert-info">Ce forum n'a encore aucun sujet.</div>
                @endif
                </tbody>
            </table>
            <div class="paginate">
            </div>
        </div>
    </section>
    <div class="modal fade" id="postTopic" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            {!! Form::open(['url' => route('forum_create_topic', $forum->id), 'enctype' => "multipart/form-data"]) !!}
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Créer un nouveau sujet</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label>Titre du sujet <small>*</small></label>
                                <input name="title" class="form-control required" type="text" required="required" placeholder="150$">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Votre message <small>*</small></label>
                        {{ Form::text('content', null, ['class' => 'tinymce']) }}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-block btn-dark btn-theme-colored btn-sm mt-20 pt-10 pb-10">Envoyer</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
@push('javascripts')
    <script src="{{ asset('themes/dashboard/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            height : "200",
            menubar: false,
            selector: '.tinymce',
            relative_urls : false,
            remove_script_host : false,
            document_base_url : "{{ env('APP_URL') }}",
            plugins: [
                'image advlist autolink lists link image charmap print preview anchor textcolor',
                'searchreplace visualblocks fullscreen',
                'insertdatetime media table contextmenu paste code help wordcount'
            ],
            toolbar: 'insert | undo redo | image | bold| bullist numlist outdent indent | ',
            content_css: [
                '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
                '//www.tinymce.com/css/codepen.min.css'],

            // without images_upload_url set, Upload tab won't show up
            images_upload_url: '{{ route('upload_from_wysiwyg') }}',

            // override default upload handler to simulate successful upload
            images_upload_handler: function(blobInfo, success, failure) {
                var xhr, formData;
                var token = $('input[name=_token]').val();

                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '{{ route('upload_from_wysiwyg') }}');
                xhr.setRequestHeader("X-CSRF-Token", token);
                xhr.onload = function() {
                    var json;

                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }

                    json = JSON.parse(xhr.responseText);

                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }

                    success(json.location);
                };

                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());

                xhr.send(formData);
            },
        });
    </script>
@endpush
