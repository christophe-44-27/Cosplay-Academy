@extends('layout.layout_dashboard')

@section('content')
    <div class="row">
        <!-- Listings -->
        <div class="col-lg-12 col-md-12">
            <div class="messages-container margin-top-0">
                <div class="messages-headline">
                    <h4>Inbox</h4>
                </div>
                <div class="messages-inbox">
                    @if(count($threads) > 0)
                    <ul>
                        @foreach($threads as $thread)
                            <li class="{{ ($thread->is_read == true) ? '' : 'unread' }}">
                            <a href="#">
                                <div class="message-avatar">
                                    @if(count($thread->messages) > 0)
                                        @foreach($thread->messages as $message)
                                            @if($loop->last)
                                                @if($message->sender->avatar)
                                                    <img src="{{ asset('storage/' . $message->sender->avatar) }}" alt="" />
                                                @else
                                                    <img src="{{ asset('themes/frontend/images/users/default.jpg') }}" />
                                                @endif
                                            @endif
                                        @endforeach
                                    @else
                                        @if($thread->sender->avatar)
                                            <img src="{{ asset('storage/' . $thread->sender->avatar) }}" alt="" />
                                        @else
                                            <img src="{{ asset('themes/frontend/images/users/default.jpg') }}" />
                                        @endif
                                    @endif
                                </div>
                                <div class="message-by">
                                    @if(count($thread->messages) > 0)
                                        @foreach($thread->messages as $message)
                                            @if($loop->last)
                                                <div class="message-by-headline">
                                                    <h5>{{ $message->sender->name }} <i>{{ ($message->is_read == true) ? '' : "Non lu" }}</i></h5>
                                                    <span>{{ $message->created_at->diffForHumans() }}</span>
                                                </div>
                                                <p>{{ \Illuminate\Support\Str::limit($message->body, 50) }}</p>
                                            @endif
                                        @endforeach
                                    @else
                                        <div class="message-by-headline">
                                            <h5>{{ $thread->sender->name }} <i>{{ ($thread->is_read == true) ? '' : "Non lu" }}</i></h5>
                                            <span>{{ $thread->created_at->diffForHumans() }}</span>
                                        </div>
                                        <p>{{ \Illuminate\Support\Str::limit($thread->body, 50) }}</p>
                                    @endif
                                </div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                    @else
                        <div class="row">
                            <div class="col-md-12">
                                <div class="notification notice closeable">
                                    <p>Votre boîte de réception est vide.</p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Pagination -->
            <div class="clearfix"></div>
            <div class="pagination-container margin-top-30 margin-bottom-0">
                <nav class="pagination">
                    <ul>
                        <li><a href="#" class="current-page">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#"><i class="sl sl-icon-arrow-right"></i></a></li>
                    </ul>
                </nav>
            </div>
            <!-- Pagination / End -->

        </div>

        <!-- Copyrights -->
        @include('elements.blocs.dashboard-footer')
    </div>
@endsection
