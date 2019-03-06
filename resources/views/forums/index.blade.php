@extends('base_layout')
@push('stylesheets')
    <style>
        .forum-category-title {
            margin: 20px 0 10px;
            font-size: 1.2em;
            color: #2a2f35;
            font-weight: 700;
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
            font-size: 14px;
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
        .container, .formation-header {
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
    </style>
@endpush()
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-s-12 col-m-6">
                <h2 class="forum-category-title">
                    Les catégories
                </h2>
                <div class="row">
                    @foreach($channelCategories as $category)
                        <div class="col-s-12 col-m-6 col-l-4">
                            <div class="forum forum-bloc-mono is-unread">
                                <div class="forum_icon"><a href="{{ route('show_forum', $category->id ) }}">
                                    <img height="60" src="{{ asset('images/flaticon-png/forum/' . $category->icon) }}" alt="4"></a>
                                </div>
                                <h3 class="forum_name">
                                    <a href="{{ route('show_forum', $category->id ) }}">{{ $category->name }}</a>
                                </h3>
                                <div class="forum_last">
                                    <a href="#">position sticky</a>
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
                    @foreach($channelMaterials as $categoryMat)
                        <div class="col-s-12 col-m-6 col-l-4">
                            <div class="forum forum-bloc-mono is-unread">
                                <div class="forum_icon"><a href="{{ route('show_forum', $categoryMat->id ) }}">
                                        <img height="60" src="{{ asset('images/flaticon-png/forum/' . $categoryMat->icon) }}" alt="4"></a>
                                </div>
                                <h3 class="forum_name">
                                    <a href="{{ route('show_forum', $categoryMat->id ) }}">{{ $categoryMat->name }}</a>
                                </h3>
                                <div class="forum_last">
                                    <a href="#">position sticky</a>
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
                                        <i class="icon topic_icon"></i>
                                    </td>
                                    <td>
                                        <a href="{{ route('show_forum', $forum->id ) }}">
                                            <h3 class="forum_title">
                                                {{ $forum->title }}
                                            </h3>
                                            <div class="s-hidden">
                                                {{ $forum->short_description }}
                                            </div></a>
                                    </td>
                                    <td class="forum_count" width="40">
                                        0
                                    </td>
                                    <td class="forum_last" width="300">
                                        <a href="#">Améliorer un site web</a><em><span class="js-vue"><abbr class="timeago">Il y a 2 mois</abbr></span></em>
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
