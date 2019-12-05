@extends('layout.layout_dashboard')

@section('content')
    <div class="row">
        <!-- Listings -->
        <div class="col-lg-12 col-md-12">
            <div class="messages-container margin-top-0">
                <div class="messages-headline">
                    <h4>Conversation</h4>
                    <a href="{{ route('delete_conversation', $thread) }}" class="message-action"><i class="sl sl-icon-trash"></i> @lang("Supprimer la conversation")</a>
                </div>
                <div class="messages-container-inner">
                    <!-- Message Content -->
                    <div class="message-content">
                        <div id="conversation" style="max-height:450px; min-height:450px; overflow-y: scroll;">
                            @if(count($messages) > 0)
                                @foreach($messages as $message)
                                    <div class="message-bubble {{ ($message->sender_id == \Illuminate\Support\Facades\Auth::id()) ? 'me' : '' }}">
                                        <div class="message-avatar"><img src="http://www.gravatar.com/avatar/00000000000000000000000000000000?d=mm&amp;s=70" alt="" /></div>
                                        <div class="message-text">
                                            <p>
                                                {{ $message->body }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>

                        <!-- Reply Area -->
                        <div class="clearfix"></div>
                        <div class="message-reply">
                            {!! Form::open(['method' => 'post', 'url' => route('store_message', ['thread' => $thread, 'receiver' => $receiver])]) !!}
                                <textarea name="body" cols="40" rows="3" placeholder="Your Message"></textarea>
                                <button type="submit" class="button">Send Message</button>
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <!-- Message Content -->
                </div>
            </div>
        </div>

        <!-- Copyrights -->
        @include('elements.blocs.dashboard-footer')
    </div>
@endsection

@push('javascripts')
    <script>
        var objDiv = document.getElementById("conversation");
        objDiv.scrollTop = objDiv.scrollHeight;
    </script>
@endpush
