@extends('layout.layout_without_search_bar')

@section('content')
    <!--Section-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-12">
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <div class="item-det mb-4">
                                <a href="#" class="text-dark"><h3>Online Training Classes Available For You</h3></a>
                                <div class=" d-flex">
                                    <ul class="d-flex mb-0">
                                        <li class="mr-5">
                                            <a href="#" class="icons">
                                                <i class="pe-7s-medal text-muted mr-1"></i>
                                                @switch($course->difficulty)
                                                    @case(1)
                                                        @lang("Novice")
                                                        @break
                                                    @case(2)
                                                        @lang("Intermédiaire")
                                                        @break
                                                    @case(3)
                                                        @lang("Expert")
                                                        @break
                                                    @default
                                                        @lang('Grand public')
                                                @endswitch
                                            </a>
                                        </li>
                                        <li class="mr-5"><a href="#" class="icons"><i class="icon icon-people text-muted mr-1"></i> 765 Enrolled</a></li>
                                    </ul>
                                    <div class="rating-stars d-flex mr-5">
                                        <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value" id="rating-stars-value" value="4">
                                        <div class="rating-stars-container mr-2">
                                            @include('frontend.elements.blocs.rating')
                                        </div> {{ round($course->reviews->avg('nb_stars')) }}
                                    </div>
                                    <div class="rating-stars d-flex">
                                        <div class="rating-stars-container mr-2">
                                            <div class="rating-star sm">
                                                <i class="fa fa-heart"></i>
                                            </div>
                                        </div> {{ $course->userFavorites->count() }}
                                    </div>
                                </div>
                            </div>
                            <div class="product-slider">
                                <ul class="list-unstyled video-list-thumbs">
                                    <li class="mb-0">
                                        <a data-toggle="modal" data-target="#homeVideo" class="class-video p-0">
                                            {{--<div class="arrow-ribbon bg-primary">20% off</div>--}}
                                            <img src="{{ asset('storage/' . $course->main_picture) }}" alt="img" class="img-responsive br-3">
                                            <span class="fe fe-play-circle text-white class-icon"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mb-3 font-weight-bold">Description</h3>
                        </div>
                        <div class="card-body">
                            {{--<div class="mb-4">--}}
                                {{--@if(!empty($course->sessions) and $course->sessions->count() > 0 and $course->sessions->count() > 1)--}}
                                    {{--@foreach($course->sessions as $session)--}}
                                        {{--{{ $session->title }}--}}
                                    {{--@endforeach--}}
                                {{--@else--}}
                                    {{--{{ $course->sessions->first()->name }}--}}
                                {{--@endif--}}
                            {{--</div>--}}
                        </div>
                        <div class="card-footer">
                            <div class="btn-list">
                                <a href="#" class="btn btn-primary"><i class="fe fe-credit-card mr-1"></i>Buy This Course</a>
                                <a href="#" class="btn btn-secondary icons"><i class="fe fe-share-2 mr-1"></i> Share</a>
                                <a href="#" class="btn btn-danger icons" data-toggle="modal" data-target="#report"><i class="icon icon-exclamation mr-1"></i> Report Abuse</a>
                                <a href="#" class="btn btn-success icons"><i class="icon icon-heart  mr-1"></i> 678</a>
                                <a href="#" class="btn btn-warning icons"><i class="icon icon-printer  mr-1"></i> Print</a>
                            </div>
                        </div>
                    </div>
                    <h3 class="mb-5 mt-4">Related Posts</h3>
                    <!--Related Posts-->
                    <div id="myCarousel5" class="owl-carousel owl-carousel-icons3">
                        <!-- Wrapper for carousel items -->
                        <div class="item">
                            <div class="card">
                                <div class="item-card7-imgs">
                                    <a href="page-details.html"></a>
                                    <img src="../assets/images/media/pictures/2.jpg" alt="img" class="cover-image">
                                </div>
                                <div class="item-card7-overlaytext">
                                    <a href="page-details.html" class="text-white">Offline</a>
                                    <h4  class="font-weight-semibold mb-0">$389</h4>
                                </div>
                                <div class="card-body">
                                    <div class="item-card7-desc mb-3">
                                        <a href="page-details.html" class="text-dark"><h3 class="font-weight-semibold">Coding Classes</h3></a>
                                    </div>
                                    <div class="item-card7-text">
                                        <ul class="icon-card mb-0">
                                            <li ><a href="#" class="icons"><i class="icon icon-location-pin  mr-1"></i>  Los Angles</a></li>
                                            <li><a href="#" class="icons"><i class="icon icon-event  mr-1"></i> 5 hours ago</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i class="icon icon-user mr-1"></i> Sally Peake</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i class="icon icon-phone mr-1"></i> 5-67987608</a></li>
                                        </ul>
                                        <p class="mb-0 mt-2 fs-16">Sed ut perspiciatis unde omnis iste natus error sit voluptatem....</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="item-card2-footer">
                                        <a class="btn btn-outline-light"><span class="font-weight-bold"><i class="fa fa-calendar"></i> :</span> 9 Months</a>
                                        <a class="btn btn-primary text-white float-right"><span class="font-weight-bold"><i class="fa fa-clock-o"></i> :</span> 4 Hours</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <div class="ribbon ribbon-top-left text-primary"><span class="bg-primary">featured</span></div>
                                <div class="item-card7-imgs">
                                    <a href="page-details.html"></a>
                                    <img src="../assets/images/media/pictures/12.jpg" alt="img" class="cover-image">
                                </div>
                                <div class="item-card7-overlaytext">
                                    <a href="page-details.html" class="text-white"> Online</a>
                                    <h4  class=" mb-0">$854</h4>
                                </div>
                                <div class="card-body">
                                    <div class="item-card7-desc mb-3">
                                        <a href="page-details.html" class="text-dark"><h3 class="font-weight-semibold">Digital Marketing</h3></a>
                                    </div>
                                    <div class="item-card7-text">
                                        <ul class="icon-card mb-0">
                                            <li ><a href="#" class="icons"><i class="icon icon-location-pin  mr-1"></i>  Los Angles</a></li>
                                            <li><a href="#" class="icons"><i class="icon icon-event  mr-1"></i> 5 hours ago</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i class="icon icon-user mr-1"></i> Sally Peake</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i class="icon icon-phone mr-1"></i> 5-67987608</a></li>
                                        </ul>
                                        <p class="mb-0 mt-2 fs-16">Sed ut perspiciatis unde omnis iste natus error sit voluptatem....</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="item-card2-footer">
                                        <a class="btn btn-outline-light"><span class="font-weight-bold"><i class="fa fa-calendar"></i> :</span> 9 Months</a>
                                        <a class="btn btn-primary text-white float-right"><span class="font-weight-bold"><i class="fa fa-clock-o"></i> :</span> 4 Hours</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <div class="item-card7-img">
                                    <div class="item-card7-imgs">
                                        <a href="page-details.html"></a>
                                        <img src="../assets/images/media/pictures/7.jpg" alt="img" class="cover-image">
                                    </div>
                                    <div class="item-card7-overlaytext">
                                        <a href="page-details.html" class="text-white">Online</a>
                                        <h4  class="font-weight-semibold mb-0">$786</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="item-card7-desc mb-3">
                                        <a href="page-details.html" class="text-dark"><h3 class="font-weight-semibold">Web Designing</h3></a>
                                    </div>
                                    <div class="item-card7-text">
                                        <ul class="icon-card mb-0">
                                            <li ><a href="#" class="icons"><i class="icon icon-location-pin  mr-1"></i>  Los Angles</a></li>
                                            <li><a href="#" class="icons"><i class="icon icon-event  mr-1"></i> 5 hours ago</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i class="icon icon-user mr-1"></i> Sally Peake</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i class="icon icon-phone mr-1"></i> 5-67987608</a></li>
                                        </ul>
                                        <p class="mb-0 mt-2 fs-16">Sed ut perspiciatis unde omnis iste natus error sit voluptatem....</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="item-card2-footer">
                                        <a class="btn btn-outline-light"><span class="font-weight-bold"><i class="fa fa-calendar"></i> :</span> 9 Months</a>
                                        <a class="btn btn-primary text-white float-right"><span class="font-weight-bold"><i class="fa fa-clock-o"></i> :</span> 4 Hours</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <div class="item-card7-img">
                                    <div class="item-card7-imgs">
                                        <a href="page-details.html"></a>
                                        <img src="../assets/images/media/pictures/11.jpg" alt="img" class="cover-image">
                                    </div>
                                    <div class="item-card7-overlaytext">
                                        <a href="page-details.html" class="text-white"> Online</a>
                                        <h4  class="font-weight-semibold mb-0">$539</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="item-card7-desc mb-3">
                                        <a href="rpage-details.html" class="text-dark"><h3 class="font-weight-semibold">Data Science</h3></a>
                                    </div>
                                    <div class="item-card7-text">
                                        <ul class="icon-card mb-0">
                                            <li ><a href="#" class="icons"><i class="icon icon-location-pin  mr-1"></i>  Los Angles</a></li>
                                            <li><a href="#" class="icons"><i class="icon icon-event  mr-1"></i> 5 hours ago</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i class="icon icon-user mr-1"></i> Sally Peake</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i class="icon icon-phone mr-1"></i> 5-67987608</a></li>
                                        </ul>
                                        <p class="mb-0 mt-2 fs-16">Sed ut perspiciatis unde omnis iste natus error sit voluptatem....</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="item-card2-footer">
                                        <a class="btn btn-outline-light"><span class="font-weight-bold"><i class="fa fa-calendar"></i> :</span> 9 Months</a>
                                        <a class="btn btn-primary text-white float-right"><span class="font-weight-bold"><i class="fa fa-clock-o"></i> :</span> 4 Hours</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <div class="item-card7-img">
                                    <div class="item-card7-imgs">
                                        <a href="page-details.html"></a>
                                        <img src="../assets/images/media/pictures/10.jpg" alt="img" class="cover-image">
                                    </div>
                                    <div class="item-card7-overlaytext">
                                        <a href="page-details.html" class="text-white">  Offline</a>
                                        <h4  class="font-weight-semibold mb-0">$925</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="item-card7-desc mb-3">
                                        <a href="page-details.html" class="text-dark"><h3 class="font-weight-semibold">Mobile Computing</h3></a>
                                    </div>
                                    <div class="item-card7-text">
                                        <ul class="icon-card mb-0">
                                            <li ><a href="#" class="icons"><i class="icon icon-location-pin  mr-1"></i>  Los Angles</a></li>
                                            <li><a href="#" class="icons"><i class="icon icon-event  mr-1"></i> 5 hours ago</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i class="icon icon-user mr-1"></i> Sally Peake</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i class="icon icon-phone mr-1"></i> 5-67987608</a></li>
                                        </ul>
                                        <p class="mb-0 mt-2 fs-16">Sed ut perspiciatis unde omnis iste natus error sit voluptatem....</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="item-card2-footer">
                                        <a class="btn btn-outline-light"><span class="font-weight-bold"><i class="fa fa-calendar"></i> :</span> 9 Months</a>
                                        <a class="btn btn-primary text-white float-right"><span class="font-weight-bold"><i class="fa fa-clock-o"></i> :</span> 4 Hours</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <div class="item-card7-img">
                                    <div class="item-card7-imgs">
                                        <a href="page-details.html"></a>
                                        <img src="../assets/images/media/pictures/5.jpg" alt="img" class="cover-image">
                                    </div>
                                    <div class="item-card7-overlaytext">
                                        <a href="page-details.html" class="text-white">Offline</a>
                                        <h4  class="font-weight-semibold mb-0">$925</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="item-card7-desc mb-3">
                                        <a href="page-details.html" class="text-dark"><h3 class="font-weight-semibold"> Guitar Classes</h3></a>
                                    </div>
                                    <div class="item-card7-text">
                                        <ul class="icon-card mb-0">
                                            <li ><a href="#" class="icons"><i class="icon icon-location-pin  mr-1"></i>  Los Angles</a></li>
                                            <li><a href="#" class="icons"><i class="icon icon-event  mr-1"></i> 5 hours ago</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i class="icon icon-user mr-1"></i> Sally Peake</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i class="icon icon-phone mr-1"></i> 5-67987608</a></li>
                                        </ul>
                                        <p class="mb-0 mt-2 fs-16">Sed ut perspiciatis unde omnis iste natus error sit voluptatem....</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="item-card2-footer">
                                        <a class="btn btn-outline-light"><span class="font-weight-bold"><i class="fa fa-calendar"></i> :</span> 9 Months</a>
                                        <a class="btn btn-primary text-white float-right"><span class="font-weight-bold"><i class="fa fa-clock-o"></i> :</span> 4 Hours</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <div class="item-card7-img">
                                    <div class="item-card7-imgs">
                                        <a href="page-details.html"></a>
                                        <img src="../assets/images/media/pictures/18.jpg" alt="img" class="cover-image">
                                    </div>
                                    <div class="item-card7-overlaytext">
                                        <a href="page-details.html" class="text-white"> Online</a>
                                        <h4  class="font-weight-semibold mb-0">$378</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="item-card7-desc mb-3">
                                        <a href="page-details.html" class="text-dark"><h3 class="font-weight-semibold">3D Animation Classes </h3></a>
                                    </div>
                                    <div class="item-card7-text">
                                        <ul class="icon-card mb-0">
                                            <li ><a href="#" class="icons"><i class="icon icon-location-pin  mr-1"></i>  Los Angles</a></li>
                                            <li><a href="#" class="icons"><i class="icon icon-event  mr-1"></i> 5 hours ago</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i class="icon icon-user mr-1"></i> Sally Peake</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i class="icon icon-phone mr-1"></i> 5-67987608</a></li>
                                        </ul>
                                        <p class="mb-0 mt-2 fs-16">Sed ut perspiciatis unde omnis iste natus error sit voluptatem....</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="item-card2-footer">
                                        <a class="btn btn-outline-light"><span class="font-weight-bold"><i class="fa fa-calendar"></i> :</span> 9 Months</a>
                                        <a class="btn btn-primary text-white float-right"><span class="font-weight-bold"><i class="fa fa-clock-o"></i> :</span> 4 Hours</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card">
                                <div class="ribbon ribbon-top-left text-primary"><span class="bg-primary">featured</span></div>
                                <div class="item-card7-img">
                                    <div class="item-card7-imgs">
                                        <a href="page-details.html"></a>
                                        <img src="../assets/images/media/pictures/9.jpg" alt="img" class="cover-image">
                                    </div>
                                    <div class="item-card7-overlaytext">
                                        <a href="page-details.html" class="text-white">Online</a>
                                        <h4  class="font-weight-semibold mb-0">$836</h4>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="item-card7-desc mb-3">
                                        <a href="page-details.html" class="text-dark"><h3 class="font-weight-semibold">Networking Courses</h3></a>
                                    </div>
                                    <div class="item-card7-text">
                                        <ul class="icon-card mb-0">
                                            <li ><a href="#" class="icons"><i class="icon icon-location-pin  mr-1"></i>  Los Angles</a></li>
                                            <li><a href="#" class="icons"><i class="icon icon-event mr-1"></i> 5 hours ago</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i class="icon icon-user mr-1"></i> Sally Peake</a></li>
                                            <li class="mb-0"><a href="#" class="icons"><i class="icon icon-phone mr-1"></i> 5-67987608</a></li>
                                        </ul>
                                        <p class="mb-0 mt-2 fs-16">Sed ut perspiciatis unde omnis iste natus error sit voluptatem....</p>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="item-card2-footer">
                                        <a class="btn btn-outline-light"><span class="font-weight-bold"><i class="fa fa-calendar"></i> :</span> 9 Months</a>
                                        <a class="btn btn-primary text-white float-right"><span class="font-weight-bold"><i class="fa fa-clock-o"></i> :</span> 4 Hours</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/Related Posts-->

                    <!--Comments-->
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Comments</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="media mt-0 p-5">
                                <div class="d-flex mr-3">
                                    <a href="#"><img class="media-object brround" alt="64x64" src="../assets/images/users/male/1.jpg"> </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-weight-bold">Joanne Scott
                                        <span class="fs-14 ml-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span>
                                        <span class="fs-14 ml-2"> 4.5
												<i class="fa fa-star text-yellow"></i>
												<i class="fa fa-star text-yellow"></i>
												<i class="fa fa-star text-yellow"></i>
												<i class="fa fa-star text-yellow"></i>
												<i class="fa fa-star-half-o text-yellow"></i>
											</span>
                                    </h4>
                                    <small class="text-muted"><i class="fa fa-calendar"></i> Dec 21st  <i class=" ml-3 fa fa-clock-o"></i> 13.00  <i class=" ml-3 fa fa-map-marker"></i> Brezil</small>
                                    <p class="fs-15  mb-2 mt-2">
                                        Ut enim ad minim veniam, quis Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et  nostrud exercitation ullamco laboris   commodo consequat.
                                    </p>
                                    <a href="#" class="mr-2"><span class="badge badge-primary">Helpful</span></a>
                                    <a href="" class="mr-2 text-muted" data-toggle="modal" data-target="#Comment"><span class="badge badge-default">Comment</span></a>
                                    <a href="" class="mr-2 text-muted" data-toggle="modal" data-target="#report"><span class="badge badge-default">Report</span></a>
                                    <div class="media mt-5">
                                        <div class="d-flex mr-3">
                                            <a href="#"> <img class="media-object brround" alt="64x64" src="../assets/images/users/female/2.jpg"> </a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="mt-0 mb-1 font-weight-bold">Rose Slater <span class="fs-14 ml-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span></h4>
                                            <small class="text-muted"><i class="fa fa-calendar"></i> Dec 22st  <i class=" ml-3 fa fa-clock-o"></i> 6.00  <i class=" ml-3 fa fa-map-marker"></i> Brezil</small>
                                            <p class="fs-15  mb-2 mt-2">
                                                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris   commodo Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam, nisi ut aliquid ex ea commodi consequatur consequat.
                                            </p>
                                            <a href="" data-toggle="modal" data-target="#Comment"><span class="badge badge-default">Comment</span></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="media p-5 border-top mt-0">
                                <div class="d-flex mr-3">
                                    <a href="#"> <img class="media-object brround" alt="64x64" src="../assets/images/users/male/3.jpg"> </a>
                                </div>
                                <div class="media-body">
                                    <h4 class="mt-0 mb-1 font-weight-bold">Edward
                                        <span class="fs-14 ml-0" data-toggle="tooltip" data-placement="top" title="" data-original-title="verified"><i class="fa fa-check-circle-o text-success"></i></span>
                                        <span class="fs-14 ml-2"> 4
											<i class="fa fa-star text-yellow"></i>
											<i class="fa fa-star text-yellow"></i>
											<i class="fa fa-star text-yellow"></i>
											<i class="fa fa-star text-yellow"></i>
											<i class="fa fa-star-o text-yellow"></i>
										</span>
                                    </h4>
                                    <small class="text-muted"><i class="fa fa-calendar"></i> Dec 21st  <i class=" ml-3 fa fa-clock-o"></i> 16.35  <i class=" ml-3 fa fa-map-marker"></i> UK</small>
                                    <p class="fs-15  mb-2 mt-2">
                                        Ut enim ad minim veniam, quis Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et  nostrud exercitation ullamco laboris   commodo consequat.
                                    </p>
                                    <a href="#" class="mr-2"><span class="badge badge-primary">Helpful</span></a>
                                    <a href="" class="mr-2 text-muted" data-toggle="modal" data-target="#Comment"><span class="badge badge-default">Comment</span></a>
                                    <a href="" class="mr-2 text-muted" data-toggle="modal" data-target="#report"><span class="badge badge-default">Report</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/Comments-->
                    <div class="card mb-lg-0">
                        <div class="card-header">
                            <h3 class="card-title">Leave a reply</h3>
                        </div>
                        <div class="card-body">
                            <div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="name1" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" id="email" placeholder="Email Coursedress">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="example-textarea-input" rows="6" placeholder="Comment"></textarea>
                                </div>
                                <a href="#" class="btn btn-primary">Send Reply</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Right Side Content-->
                <div class="col-xl-4 col-lg-4 col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-5">
                                <div class="text-dark mb-2">
                                    <span class="text-dark font-weight-semibold h1">
                                        @if($course->price > 0)
                                            <small>Prix :</small>
                                            @if($course->reduced_price)
                                                {{ $course->new_price }} $
                                            @else
                                                {{ $course->price }} $
                                            @endif
                                        @else
                                            Cours gratuit
                                        @endif
                                    </span>
                                    @if($course->reduced_price)
                                        <span class="text-muted h3 font-weight-normal ml-1"><span class="strike-text">{{ $course->price }}</span></span>
                                    @endif
                                </div>
                                @if($course->reduced_price)
                                    <p class="text-danger">
                                        <i class="fe fe-clock mr-1"></i>
                                        {{ Carbon::now()->diffInDays($course->reduce_price_ending, false) }}
                                        @lang(" jours avant la fin de cette offre !")
                                    </p>
                                @endif
                            </div>
                            <div class="">
                                <a href="{{ route('course_add_to_favorites', $course )}}" class="btn btn-primary btn-lg btn-block">@lang("Ajouter au favoris")</a>
                                @if($course->price > 0)
                                    <a href="{{ route('cart_item_add', $course) }}" class="btn btn-secondary btn-lg btn-block">@lang("Acheter")</a>
                                @else
                                    <a href="#" class="btn btn-azure btn-lg btn-block">@lang("S'inscrire")</a>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">@lang("Formateur")</h3>
                        </div>
                        <div class="card-body  item-user">
                            <div class="profile-pic mb-0">
                                <img src="{{ asset('storage/' . $course->user->avatar) }}" class="brround avatar-xxl" alt="user">
                                <div >
                                    <a href="userprofile.html" class="text-dark"><h4 class="mt-3 mb-1 font-weight-semibold">{{ $course->user->name }}</h4></a>
                                    <span class="text-muted">@lang("Membre depuis ") {{ \Illuminate\Support\Carbon::createFromTimeString($course->user->created_at)->format('M Y') }}</span>
                                </div>
                                <h6 class="mt-2 mb-0">
                                    <a href="#" class="btn btn-primary btn-sm">@lang("Voir ses cours")</a>
                                    <a href="#" class="btn btn-secondary btn-sm">1245 Views</a>
                                    <a href="#" class="btn btn-info btn-sm">850 Courses</a>
                                </h6>
                            </div>
                        </div>
                        <div class="card-body item-user">
                            <h4 class="mb-4">@lang("Informations")</h4>
                            @if($course->user->website)
                                <div>
                                    <h6><span class="font-weight-semibold"><i class="fa fa-link mr-2 "></i></span><a href="#" class="text-body">{{ $course->user->website }}</a></h6>
                                </div>
                            @endif
                            <div class=" item-user-icons mt-4">
                                @if(!empty($course->user->facebook_profile))
                                    <a href="{{ $course->user->facebook_profile }}" target="_blank" class="facebook-bg mt-0"><i class="fa fa-facebook"></i></a>
                                @endif
                                @if(!empty($course->user->youtube_profile))
                                    <a href="{{ $course->user->youtube_profile }}" target="_blank" class="youtube-bg mt-0"><i class="fa fa-youtube"></i></a>
                                @endif
                                @if(!empty($course->user->instagram_profile))
                                    <a href="{{ $course->user->youtube_profile }}" target="_blank" class="instagram-bg mt-0"><i class="fa fa-instagram"></i></a>
                                @endif
                                @if(!empty($course->user->pinterest_profile))
                                    <a href="{{ $course->user->pinterest_profile }}" target="_blank" class="pinterest-bg mt-0"><i class="fa fa-pinterest"></i></a>
                                @endif
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-left">
                                <a href="#" class="btn  btn-primary"><i class="fa fa-envelope"></i> Chat</a>
                                <a href="#" class="btn btn-secondary" data-toggle="modal" data-target="#contact"><i class="fa fa-user"></i> Contact Me</a>
                                <a href="#" class="btn  btn-danger"><i class="fa fa-share"></i> Share</a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">@lang("Partager sur les réseaux sociaux")</h3>
                        </div>
                        <div class="card-body product-filter-desc">
                            <div class="product-filter-icons text-center">
                                <a href="#" class="facebook-bg"><i class="fa fa-facebook"></i></a>
                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                                <a href="#" class="pinterest-bg"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Feature Classes </h3>
                        </div>
                        <div class="card-body">
                            <div class="rated-products">
                                <ul class="vertical-scroll">
                                    <li class="item">
                                        <div class="media m-0 mt-0 p-5">
                                            <img class="mr-4" src="../assets/images/png/11.png" alt="img">
                                            <div class="media-body">
                                                <h4 class="mt-2 mb-1">AutoCAD</h4>
                                                <span class="rated-products-ratings">
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
													</span>
                                                <div class="h5 mb-0 font-weight-semibold mt-1">$17 - $29</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="media p-5 mt-0">
                                            <img class="mr-4" src="../assets/images/png/1.png" alt="img">
                                            <div class="media-body">
                                                <h4 class="mt-2 mb-1">Digital Marketing</h4>
                                                <span class="rated-products-ratings">
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star-o text-warning"> </i>
													</span>
                                                <div class="h5 mb-0 font-weight-semibold mt-1">$22 - $45</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="media p-5 mt-0">
                                            <img class=" mr-4" src="../assets/images/png/4.png" alt="img">
                                            <div class="media-body">
                                                <h4 class="mt-2 mb-1">Mobile Computing</h4>
                                                <span class="rated-products-ratings">
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star-half-o text-warning"> </i>
													</span>
                                                <div class="h5 mb-0 font-weight-semibold mt-1">$35 - $72</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="media p-5 mt-0">
                                            <img class=" mr-4" src="../assets/images/png/6.png" alt="img">
                                            <div class="media-body">
                                                <h4 class="mt-2 mb-1"> Data Science</h4>
                                                <span class="rated-products-ratings">
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star-half-o text-warning"> </i>
														<i class="fa fa-star-o text-warning"> </i>
													</span>
                                                <div class="h5 mb-0 font-weight-semibold mt-1">$12 - $21</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="item">
                                        <div class="media  mb-0 p-5 mt-0">
                                            <img class=" mr-4" src="../assets/images/png/8.png" alt="img">
                                            <div class="media-body">
                                                <h4 class="mt-2 mb-1"> UNIX</h4>
                                                <span class="rated-products-ratings">
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star text-warning"> </i>
														<i class="fa fa-star-o text-warning"> </i>
														<i class="fa fa-star-o text-warning"> </i>
													</span>
                                                <div class="h5 mb-0 font-weight-semibold mt-1">$89 - $97</div>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Right Side Content-->
            </div>
        </div>
    </section><!--/Section-->

    <!-- Onlinesletter-->
    <section class="sptb bg-white border-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-xl-6 col-md-12">
                    <div class="sub-newsletter">
                        <h3 class="mb-2"><i class="fa fa-paper-plane-o mr-2"></i> Subscribe To Our Onlinesletter</h3>
                        <p class="mb-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor</p>
                    </div>
                </div>
                <div class="col-lg-5 col-xl-6 col-md-12">
                    <div class="input-group sub-input mt-1">
                        <input type="text" class="form-control input-lg " placeholder="Enter your Email">
                        <div class="input-group-append ">
                            <button type="button" class="btn btn-primary btn-lg br-tr-3  br-br-3">
                                Subscribe
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/Onlinesletter-->
@endsection
