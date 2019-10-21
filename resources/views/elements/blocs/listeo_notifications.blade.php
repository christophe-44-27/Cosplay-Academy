@if ($errors->any())
    <div class="notification error closeable">
        <p><span>@lang('Erreur') !</span> @lang("Merci de remplir les champs requis")</p>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Session::has('success'))
    <!-- Notice -->
    <div class="row">
        <div class="col-md-12">
            <div class="notification success closeable">
                <p>{{ Session::get('success') }}</p>
                <a class="close" href="#"></a>
            </div>
            <div class="alert alert-success"></div>
        </div>
    </div>
@endif
