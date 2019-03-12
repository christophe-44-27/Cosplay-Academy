@extends('base_layout')
@push('stylesheets')
    <style>
        h3{
             margin-top: unset !important;
        }
        table{
            line-height: 1.8;
        }
        .forum-category-title {
            margin: 20px 0 10px;
            font-size: 1.2em;
            color: #2a2f35;
            font-weight: 700;
        }
        .danger{
            color: #c0392b !important;
        }
        .col-s-12 {
            width: 100%;
        }
        .col-l-4 {
            width: 33.33333% !important;
        }
        .col-m-6 {
            width: 50%;
        }
        .row {
            margin-left: -15px;
            margin-right: -15px;
        }
        .forum_title {
            color: #2a2f35;
            font-weight: 700;
            font-size: 14px;
        }
        .col-l-4, .col-m-6, .col-s-12{
            float: left;
            position: relative;
            min-height: 1px;
            padding-left: 15px;
            padding-right: 15px;
        }
        .forum-bloc-mono {
            text-align: center;
            margin-bottom: 20px;
            padding-top: 10px;
            height: 152px;
            background-color: #fff;
            border-radius: 3px;
            box-shadow: 0 1px 4px hsla(0,0%,73%,.5);
        }
        .forum_count {
            text-align: center;
            color: #9e9e9e;
        }
        .forum {
            font-size: 14px !important;
        }
        .forum-bloc-mono .forum_name {
            font-weight: 700;
            margin-bottom: 5px;
        }
        .forum_name{
            font-size: 14px;
        }
        .forum-bloc-mono .forum_last {
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
            font-size: 23px;
        }

        .fa-dot-circle{
            font-size: 23px;
            color: #404852;
            line-height: 1.8em;
        }
        .table {
            width: 100%;
            border: 1px solid #ededed;
            background-color: #fff;
            text-align: left;
            border-collapse: collapse;
            border-radius: 3px;
            background-clip: padding-box;
            -webkit-box-shadow: 0 4px 4px hsla(0,0%,95%,.56);
            box-shadow: 0 4px 4px hsla(0,0%,95%,.56);
        }
        table {
            border-spacing: 0;
        }
        .table td, .table th {
            padding: 7px 13px;
            border: 1px solid #f1f1f1;
            border-top: none;
            vertical-align: middle !important;
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

        @media only screen and (min-width: 640px) {
            .s-hidden {
                display: block;
            }
        }

    </style>
@endpush()
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
            </div>
        </div>
        <div class="row">
            <div class="col-s-12 col-m-6">
                <h2 class="forum-category-title">
                    Les catégories
                </h2>
                <div class="row">
                    @foreach($forumCategories as $category)
                        <div class="col-s-12 col-m-6 col-l-4">
                            <div class="forum forum-bloc-mono is-unread">
                                <div class="forum_icon"><a href="{{ route('show_forum_channel', $category->slug ) }}">
                                    <img height="60" src="{{ asset('images/flaticon-png/forum/' . $category->icon) }}" alt="4"></a>
                                </div>
                                <h3 class="forum_name">
                                    <a href="{{ route('show_forum', $category->slug ) }}">{{ $category->title }}</a>
                                </h3>
                                <div class="forum_last">
                                    @if($category->lastThread)
                                    <a href="{{ route('show_forum_thread', $category->lastThread->slug) }}">
                                        {{ $category->lastThread->title }}
                                    </a>
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col-s-12 col-m-6">
                <h2 class="forum-category-title">
                    Les matériaux
                </h2>
                <div class="row">
                    @foreach($forumMaterials as $categoryMat)
                        <div class="col-s-12 col-m-6 col-l-4">
                            <div class="forum forum-bloc-mono is-unread">
                                <div class="forum_icon"><a href="{{ route('show_forum_channel', $categoryMat->slug ) }}">
                                    <img height="60" src="{{ asset('images/flaticon-png/forum/' . $categoryMat->icon) }}" alt="4"></a>
                                </div>
                                <h3 class="forum_name">
                                    <a href="{{ route('show_forum_channel', $categoryMat->slug ) }}">{{ $categoryMat->title }}</a>
                                </h3>
                                <div class="forum_last">
                                    @if($categoryMat->lastThread)
                                        <a href="{{ route('show_forum_thread', $categoryMat->lastThread->slug) }}">
                                            {{ $categoryMat->lastThread->title }}
                                        </a>
                                    @else
                                        -
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            @if($allChannels)
                @foreach($allChannels as $channel)
                <div class="col-s-12">
                    <h2 class="forum-category-title">
                        {{ $channel->name }}
                    </h2>
                    <table class="table">
                        <tbody>
                        @if($forums)
                            @foreach($forums as $forum)
                                @if($channel->id == $forum->channel_id)
                                <tr class="forum is-unread">
                                    <td class="tcenter" width="50">
                                        <i class="far fa-dot-circle"></i>
                                    </td>
                                    <td>
                                        <a href="{{ route('show_forum', $forum->slug ) }}">
                                            <h3 class="forum_title">
                                                {{ $forum->title }}
                                            </h3>
                                            <div class="">
                                                {{ $forum->short_description }}
                                            </div>
                                        </a>
                                    </td>
                                    <td class="forum_count" width="100">
                                        {{ count($forum->threads) }} <small>(sujet{{ (count($forum->threads) > 1) ? 's' : '' }})</small>
                                    </td>
                                    <td class="forum_last" width="300">
                                        @if($forum->lastThread)
                                            <a href="#">
                                                {{ $forum->lastThread->title }} par <span class="danger">{{ $forum->lastThread->creator->name }}</span>
                                                <br>
                                                {{ Carbon\Carbon::parse($forum->lastThread->created_at)->diffForHumans()}}
                                            </a>
                                        @else
                                            -
                                        @endif
                                    </td>
                                </tr>
                                @endif
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
                @endforeach
            @endif
        </div>
    </div>
@endsection
