@extends('base_layout')
@push('stylesheets')
    <style>
        .forum-post_avatar {
            position: absolute;
            padding: 3px;
            top: 10px;
            left: 10px;
            width: 54px;
            height: 54px;
            background-color: #fff;
            border-radius: 54px;
            -webkit-box-shadow: 0 1px 9px #e0e0e0, inset 0 0 2px hsla(0,0%,84%,.75);
            box-shadow: 0 1px 9px #e0e0e0, inset 0 0 2px hsla(0,0%,84%,.75);
        }
        .title-small {
            font-size: 21px;
        }
        .forum-post_body {
            border: 1px solid #ededed;
            background-color: #fff;
            padding: 20px 20px 0;
            margin: 0 10px 0 70px;
            border-radius: 3px;
            -webkit-box-shadow: 0 4px 4px hsla(0,0%,95%,.56);
            box-shadow: 0 4px 4px hsla(0,0%,95%,.56);
        }
        .forum-post {
            position: relative;
            margin-bottom: 1.875rem;
            font-size: 15px;
        }
        .forum-post_actions, .forum-post_date {
            color: #9e9e9e;
            font-size: .7rem;
        }
        .danger{
            color: #c0392b;
        }
        .forum-actions {
            margin: 30px 0;
            color: #9e9e9e;
            font-size: 12px;
            z-index: 60;
            text-align: right;
        }
        .forum-actions a:hover {
            color: #78ab4e;
        }
        .breadcrumb {
            color: #9e9e9e;
            font-size: 12px;
            margin: 30px auto;
            position: relative;
            z-index: 50;
        }
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

        .col-s-6 {
            width: 50%;
        }

        .row {
            margin-left: -15px;
            margin-right: -15px;
        }

        .col-s-6, .col-s-12, .col-m-9{
            float: left;
            position: relative;
            min-height: 1px;
            padding-left: 15px;
            padding-right: 15px;
        }

        .container-forum, .formation-header {
            width: 100%;
            position: relative;
            max-width: 1130px;
            padding-left: 15px;
            padding-right: 15px;
            margin: 0 auto;
        }

        .is-unread .topic_icon {
            color: #404852;
        }

        .tcenter {
            text-align: center;
        }

        .title {
            font-size: 42px;
            font-weight: 700;
            line-height: 1.2;
            margin-bottom: 1rem;
        }
        .title-small {
            font-size: 21px;
        }
        @media only screen and (min-width: 640px) {
            .m-left {
                text-align: left;
            }

            .col-m-9 {
                width: 75%;
            }
        }

    </style>
@endpush()
@section('content')
    <!-- Section: inner-header -->
    <div class="forum-header">
        <div class="container">
            <div class="col-s-12 col-m-9">
                <h1 class="title tcenter m-left">
                    {{ $forumTopic->title }}
                </h1>
            </div>
        </div>
    </div>
    <section>
        <div class="container-forum">
            <div class="row">
                <div class="col-s-6">
                    <div class="breadcrumb">
                        <a itemprop="url" title="Forum" href="{{ route('forums') }}">
                            <span itemprop="title">Forum /</span>
                        </a>
                        <a itemprop="url" title="Suggestion d'améliorations pour le site" href="{{ route('show_forum', $forumTopic->forum) }}">
                            <span itemprop="title">{{ $forumTopic->forum->title }} / </span>
                        </a>
                        <a itemprop="url" title="Site Web d'un artiste peintre" href="{{ route('show_forum_thread', $forumTopic->slug) }}">
                            <span itemprop="title">{{ $forumTopic->title }}</span>
                        </a>
                    </div>
                </div>
                <div class="col-s-6">
                    <div class="forum-actions">
                        <a data-remote="true" rel="nofollow" href="#">
                            <i class="icon icon-eye-slash"></i> M'alerter par email des nouveaux messages</a>
                    </div>
                </div>
            </div>
            <div class="forum-post js-forum-post">
                <a href="{{ route('community_show_member', $forumTopic->user->id ) }}">
                    <img class="forum-post_avatar" src="{{ asset('storage/' . $forumTopic->user->profile_picture ) }}" alt="Default">
                </a>
                <div class="forum-post_body">
                    <a class="forum-post_author" href="{{ route('community_show_member', $forumTopic->user->id ) }}">
                        {{ $forumTopic->user->name }}
                    </a>, <a href="#" class="forum-post_date js-vue"><span class="js-vue"><abbr class="timeago">Il y a environ un jour</abbr></span></a><span class="forum-post_actions">
                    <span v-if="isLogged &amp;&amp; !canEdit" class="danger">
                        - <a href="#" class="js-report">Signaler</a></span>
                    </span>
                    <div class="forum-post_text">
                        <div></div>
                        <div class="forum-post_edit">
                            {!! $forumTopic->content !!}
                        </div>
                    </div>
                </div>
            </div>
            @if (count($forumTopic->topicAnswers) > 0)
                <h2 class="title title-small">
                    {{ count($forumTopic->topicAnswers) }} Réponses
                </h2>
                @foreach($answers as $answer)
                    <div class="forum-post js-forum-post">
                        <a href="{{ route('community_show_member', $answer->user->id ) }}">
                            <img class="forum-post_avatar" src="{{ asset('storage/' . $answer->user->profile_picture ) }}" alt="Default">
                        </a>
                        <div class="forum-post_body">
                            <a class="forum-post_author" href="{{ route('community_show_member', $answer->user->id ) }}">
                                {{ $answer->user->name }}
                            </a>,
                            <a href="#" class="forum-post_date js-vue">
                                <span class="js-vue">
                                    <abbr class="timeago">
                                                {{ Carbon\Carbon::parse($answer->created_at)->diffForHumans()}}
                                    </abbr>
                                </span>
                            </a>
                            <span class="forum-post_actions">
                                <span v-if="isLogged &amp;&amp; !canEdit" class="danger">
                                    - <a href="#" class="js-report">Signaler</a>
                                </span>
                            </span>
                            <div class="forum-post_text">
                                <div></div>
                                <div class="forum-post_edit">
                                    {!! $answer->content !!}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <div class="container-forum">
            <h2 class="title title-small">
                Répondre
            </h2>
            {!! Form::open(['url' => route('forum_topic_add_answer', [$forumTopic->forum_id, $forumTopic->id]), 'enctype' => "multipart/form-data"]) !!}
                {{ Form::text('content', null, ['class' => 'tinymce']) }}
                <hr>
                <input type="submit" name="commit" value="Répondre" class="btn btn-primary" data-disable-with="Répondre">
            {!! Form::close() !!}
        </div>
    </section>
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
