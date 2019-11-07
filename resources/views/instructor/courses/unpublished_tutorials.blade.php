@extends('layout.layout_dashboard')

@section('content')
    <div class="row">
        <!-- Listings -->
        <div class="col-lg-12 col-md-12">
            <div class="dashboard-list-box margin-top-0">
                <h4>Mes tutoriels non publiés</h4>
                @if(count($tutorials) > 0)
                    <ul>
                        @foreach($tutorials as $tutorial)
                        <li>
                            <div class="list-box-listing">
                                <div class="list-box-listing-img"><a href="#">
                                        <img src="images/listing-item-01.jpg"  alt=""></a>
                                </div>
                                <div class="list-box-listing-content">
                                    <div class="inner">
                                        <h3><a href="#">{{ $tutorial->title }}</a></h3>
                                        <span>{{ $tutorial->category->name }}</span>
                                        <div class="star-rating" data-rating="3.5">
                                            <div class="rating-counter">(12 reviews)</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="buttons-to-right">
                                <a href="{{ route('tutorial_edit', $tutorial) }}" class="button gray"><i class="sl sl-icon-note"></i> Edit</a>
                                <a href="#" class="button gray"><i class="sl sl-icon-close"></i> Delete</a>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                @else
                    <div class="notification closeable margin-bottom-30">
                        <p>Vous n'avez encore créé aucun tutoriel. <b><a href="#">Ajoutez un tutoriel !</a></b> </p>
                    </div>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <nav>
                        {{ $tutorials->links('vendor.pagination.default') }}
                    </nav>
                </div>
            </div>
        </div>


        <!-- Copyrights -->
        @include('elements.blocs.dashboard-footer')
    </div>
@endsection
