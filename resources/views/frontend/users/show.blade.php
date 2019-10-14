@extends('layout.layout_without_search_bar')

@section('content')
    <!--User Profile-->
    <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body pattern-1">
                            <div class="wideget-user">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="wideget-user-desc text-center">
                                            <div class="wideget-user-img">
                                                <img class="brround" src="{{ asset('storage/' . $user->avatar) }}" alt="img">
                                            </div>
                                            <div class="user-wrap wideget-user-info">
                                                <a href="#" class="text-white"><h4 class="font-weight-semibold">{{ $user->name }}</h4></a>
                                                <span class="text-white">@lang("Membre depuis ") {{ \Illuminate\Support\Carbon::createFromTimeString($user->created_at)->format('M Y') }}</span>
                                                <div class="wideget-user-rating">
                                                    <a href="#"><i class="fa fa-star text-warning"></i></a>
                                                    <a href="#"><i class="fa fa-star text-warning"></i></a>
                                                    <a href="#"><i class="fa fa-star text-warning"></i></a>
                                                    <a href="#"><i class="fa fa-star text-warning"></i></a>
                                                    <a href="#"><i class="fa fa-star-o text-warning mr-1"></i></a> <span class="text-white">5 (3876 Reviews)</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 text-center">
                                        <div class="wideget-user-info ">
                                            <div class="wideget-user-icons mt-2">
                                                <a href="#" class="facebook-bg mt-0"><i class="fa fa-facebook"></i></a>
                                                <a href="#" class="twitter-bg"><i class="fa fa-twitter"></i></a>
                                                <a href="#" class="google-bg"><i class="fa fa-google"></i></a>
                                                <a href="#" class="dribbble-bg"><i class="fa fa-dribbble"></i></a>
                                                <a href="#" class="bg-info"><i class="fa fa-share text-white"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="wideget-user-tab">
                                <div class="tab-menu-heading">
                                    <div class="tabs-menu1">
                                        <ul class="nav">
                                            <li class=""><a href="#tab-5" class="active" data-toggle="tab">Profile</a></li>
                                            <li><a href="#tab-7" data-toggle="tab" class="">My Courses List</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="border-0">
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab-5">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div class="profile-log-switch">
                                            <div class="media-heading">
                                                <h3 class="card-title mb-3 font-weight-bold">Personal Details</h3>
                                            </div>
                                            <ul class="usertab-list mb-0">
                                                <li><a href="#" class="text-dark"><span class="font-weight-semibold">@lang("Nom d'artiste") :</span> <span class="text-muted"> {{ $user->name }}</span></a></li>
                                                <li>
                                                    <a href="#" class="text-dark">
                                                        <span class="font-weight-semibold">@lang("Pays") :</span>
                                                        <span class="text-muted">
                                                            @if($user->country)
                                                                {{ $user->country->name }}
                                                            @else
                                                                @lang("Non renseigné")
                                                            @endif
                                                        </span>
                                                    </a>
                                                </li>
                                                <li><a href="#" class="text-dark"><span class="font-weight-semibold">Languages :</span> <span class="text-muted">English, German,Vehiclenish</span>.</a></li>
                                                <li><a href="#" class="text-dark"><span class="font-weight-semibold">Website :</span><span class="text-muted">smithabgd.com</span></a></li>
                                                <li><a href="#" class="text-dark"><span class="font-weight-semibold">Email :</span> <span class="text-muted">georgemestayer@gmail.com</span></a></li>
                                                <li><a href="#" class="text-dark"><span class="font-weight-semibold">Phone :</span> <span class="text-muted">+125 254 3562 </span></a></li>
                                            </ul>
                                            <div class="row profie-img">
                                                <div class="col-md-12">
                                                    <div class="media-heading">
                                                        <h3 class="card-title mb-3 font-weight-bold">Biography</h3>
                                                    </div>
                                                    <p>Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus how to pursue pleasure rationally encounter but because those who do not know how to pursue consequences that are extremely</p>
                                                    <p class="mb-0">because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter but because those who do not know how to pursue consequences the extre painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane userprof-tab" id="tab-7">

                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                        <!--Coursed lists-->
                                        <div class=" mb-lg-0">
                                            <div class="">
                                                <div class="item2-gl ">
                                                    <div class=" mb-0">
                                                        <div class="">
                                                            <div class="p-5 bg-white item2-gl-nav d-flex">
                                                                <h6 class="mb-0 mt-2">Showing 1 to 10 of 30 entries</h6>
                                                                <ul class="nav item2-gl-menu ml-auto">
                                                                    <li class=""><a href="#tab-11" class="active show" data-toggle="tab" title="List style"><i class="fa fa-list"></i></a></li>
                                                                    <li><a href="#tab-12" data-toggle="tab" class="" title="Grid"><i class="fa fa-th"></i></a></li>
                                                                </ul>
                                                                <div class="d-flex">
                                                                    <label class="mr-2 mt-1 mb-sm-1">Sort By:</label>
                                                                    <select name="item" class="form-control select-sm w-70">
                                                                        <option value="1">Latest</option>
                                                                        <option value="2">Oldest</option>
                                                                        <option value="3">Fees:Low-to-High</option>
                                                                        <option value="5">Fees:Hight-to-Low</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="tab-content">
                                                        <div class="tab-pane active" id="tab-11">
                                                            <div class="card overflow-hidden">
                                                                <div class="d-md-flex">
                                                                    <div class="item-card9-img">
                                                                        <div class="item-card9-imgs">
                                                                            <a href="page-details.html"></a>
                                                                            <img src="../assets/images/media/11.jpg" alt="img" class="cover-image">
                                                                        </div>
                                                                        <div class="item-card9-icons">
                                                                            <a href="#" class="item-card9-icons1 bg-primary"> <i class="fa fa fa-heart"></i></a>
                                                                            <a href="#" class="item-card9-icons1 bg-black-trasparant"> <i class="fa fa fa-share-alt"></i></a>
                                                                        </div>
                                                                        <div class="item-overly-trans">
                                                                            <a href="page-details.html" class="bg-primary">Online</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card border-0 mb-0">
                                                                        <div class="card-body ">
                                                                            <div class="item-card9">
                                                                                <a href="page-details.html" class="text-dark"><h3 class="font-weight-semibold mt-1">Business Management Classes</h3></a>
                                                                                <div class="mt-2 mb-2">
                                                                                    <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-briefcase mr-1"></i> Business</span></a>
                                                                                    <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-user text-muted mr-1"></i> Stephanie</span></a>
                                                                                    <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-clock-o text-muted mr-1"></i> Aug 5, 2019</span></a>
                                                                                </div>
                                                                                <p class="mb-0 leading-tight">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer pt-4 pb-4">
                                                                            <div class="item-card9-footer d-flex">
                                                                                <div class="item-card9-cost">
                                                                                    <h4 class="text-dark font-weight-semibold mb-0 mt-0">$263.99</h4>
                                                                                </div>
                                                                                <div class="ml-auto">
                                                                                    <div class="rating-stars block">
                                                                                        <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="3">
                                                                                        <div class="rating-stars-container">
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card overflow-hidden">
                                                                <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">Offer</span></div>
                                                                <div class="d-md-flex">
                                                                    <div class="item-card9-img">
                                                                        <div class="item-card9-imgs">
                                                                            <a href="page-details.html"></a>
                                                                            <img src="../assets/images/media/9.jpg" alt="img" class="cover-image">
                                                                        </div>
                                                                        <div class="item-card9-icons">
                                                                            <a href="#" class="item-card9-icons1 bg-primary"> <i class="fa fa fa-heart-o"></i></a>
                                                                            <a href="#" class="item-card9-icons1 bg-black-trasparant"> <i class="fa fa fa-share-alt"></i></a>
                                                                        </div>
                                                                        <div class="item-overly-trans">
                                                                            <a href="page-details.html" class="bg-blue">Offline</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card mb-0 border-0">
                                                                        <div class="card-body ">
                                                                            <div class="item-card9">
                                                                                <a href="page-details.html" class="text-dark"><h3 class="font-weight-semibold mt-1">Networking Classes</h3></a>
                                                                                <div class="mt-2 mb-2">
                                                                                    <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-cube mr-1"></i> Networking</span></a>
                                                                                    <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-user text-muted mr-1"></i> Lauren</span></a>
                                                                                    <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-clock-o text-muted mr-1"></i> May 11, 2019</span></a>
                                                                                </div>
                                                                                <p class="mb-0 leading-tight">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer pt-4 pb-4">
                                                                            <div class="item-card9-footer d-flex">
                                                                                <div class="item-card9-cost">
                                                                                    <h4 class="text-dark font-weight-semibold mb-0 mt-0">$745.00<span class="strike-text ml-1 text-muted fs-16">$896.00</span></h4>
                                                                                </div>
                                                                                <div class="ml-auto">
                                                                                    <div class="rating-stars block">
                                                                                        <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="3">
                                                                                        <div class="rating-stars-container">
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card overflow-hidden">
                                                                <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">Offer</span></div>
                                                                <div class="d-md-flex">
                                                                    <div class="item-card9-img">
                                                                        <div class="item-card9-imgs">
                                                                            <a href="page-details.html"></a>
                                                                            <img src="../assets/images/media/8.jpg" alt="img" class="cover-image">
                                                                        </div>
                                                                        <div class="item-card9-icons">
                                                                            <a href="#" class="item-card9-icons1 bg-primary"> <i class="fa fa fa-heart-o"></i></a>
                                                                            <a href="#" class="item-card9-icons1 bg-black-trasparant"> <i class="fa fa fa-share-alt"></i></a>
                                                                        </div>
                                                                        <div class="item-overly-trans">
                                                                            <a href="page-details.html" class="bg-primary">Online</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card border-0 mb-0">
                                                                        <div class="card-body ">
                                                                            <div class="item-card9">
                                                                                <a href="page-details.html" class="text-dark"><h3 class="font-weight-semibold mt-1">Beautician Classes</h3></a>
                                                                                <div class="mt-2 mb-2">
                                                                                    <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-paint-brush text-muted mr-1"></i> Beautician</span></a>
                                                                                    <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-user text-muted mr-1"></i> Kimberly</span></a>
                                                                                    <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-clock-o text-muted mr-1"></i> Aug 11, 2019</span></a>
                                                                                </div>
                                                                                <p class="mb-0 leading-tight">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer pt-4 pb-4">
                                                                            <div class="item-card9-footer d-flex">
                                                                                <div class="item-card9-cost">
                                                                                    <h4 class="text-dark font-weight-semibold mb-0 mt-0">$149.00<span class="strike-text ml-1 text-muted fs-16">$296.00</span></h4>
                                                                                </div>
                                                                                <div class="ml-auto">
                                                                                    <div class="rating-stars block">
                                                                                        <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="3">
                                                                                        <div class="rating-stars-container">
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card overflow-hidden">
                                                                <div class="d-md-flex">
                                                                    <div class="item-card9-img">
                                                                        <div class="item-card2-img ">
                                                                            <div class="arrow-ribbon bg-warning">$13</div>
                                                                            <a href="page-details.html"></a>
                                                                            <img src="../assets/images/media/3.jpg" alt="img" class="cover-image">
                                                                        </div>
                                                                        <div class="item-card9-icons">
                                                                            <a href="#" class="item-card9-icons1 bg-primary"> <i class="fa fa fa-heart-o"></i></a>
                                                                            <a href="#" class="item-card9-icons1 bg-black-trasparant"> <i class="fa fa fa-share-alt"></i></a>
                                                                        </div>
                                                                        <div class="item-overly-trans">
                                                                            <a href="page-details.html" class="bg-blue">Offline</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card border-0 mb-0">
                                                                        <div class="card-body ">
                                                                            <div class="item-card2">
                                                                                <div class="item-card2-desc">
                                                                                    <a href="page-details.html" class="text-dark mt-2"><h3 class="font-weight-semibold mt-1">Guitar Classes</h3></a>
                                                                                    <div class="mt-2 mb-2">
                                                                                        <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-music mr-1"></i> Music</span></a>
                                                                                        <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-user text-muted mr-1"></i> Jennifer</span></a>
                                                                                        <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-clock-o text-muted mr-1"></i> May 11, 2019</span></a>
                                                                                    </div>
                                                                                    <p class="mb-0 leading-tight">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer pt-4 pb-4">
                                                                            <div class="item-card2-footer d-sm-flex">
                                                                                <div class="rating-stars d-inline-flex">
                                                                                    <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="3">
                                                                                    <div class="rating-stars-container">
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                    </div> (145reviews)
                                                                                </div>
                                                                                <div class="ml-auto">
                                                                                    <a href="#" class="location"><i class="fa fa-map-marker text-muted mr-1"></i> Los Angles</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card overflow-hidden">
                                                                <div class="d-md-flex">
                                                                    <div class="item-card9-img">
                                                                        <div class="item-card2-img ">
                                                                            <div class="arrow-ribbon bg-warning">$42</div>
                                                                            <a href="page-details.html"></a>
                                                                            <img src="../assets/images/media/16.jpg" alt="img" class="cover-image">
                                                                        </div>
                                                                        <div class="item-card9-icons">
                                                                            <a href="#" class="item-card9-icons1 bg-primary"> <i class="fa fa fa-heart-o"></i></a>
                                                                            <a href="#" class="item-card9-icons1 bg-black-trasparant"> <i class="fa fa fa-share-alt"></i></a>
                                                                        </div>
                                                                        <div class="item-overly-trans">
                                                                            <a href="page-details.html" class="bg-blue">Offline</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card border-0 mb-0">
                                                                        <div class="card-body ">
                                                                            <div class="item-card2">
                                                                                <div class="item-card2-desc">
                                                                                    <a href="page-details.html" class="text-dark mt-2"><h3 class="font-weight-semibold mt-1">Photoshop Designing Classes</h3></a>
                                                                                    <div class="mt-2 mb-2">
                                                                                        <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-camera text-muted mr-1"></i> PhotoShop</span></a>
                                                                                        <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-user text-muted mr-1"></i> Bernadette</span></a>
                                                                                        <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-clock-o text-muted mr-1"></i> Aug 9 ,2019</span></a>
                                                                                    </div>
                                                                                    <p class="mb-0 leading-tight">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer pt-4 pb-4">
                                                                            <div class="item-card2-footer d-sm-flex">
                                                                                <div class="rating-stars d-inline-flex">
                                                                                    <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="3">
                                                                                    <div class="rating-stars-container">
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                    </div> (145reviews)
                                                                                </div>
                                                                                <div class="ml-auto">
                                                                                    <a href="#" class="location"><i class="fa fa-map-marker text-muted mr-1"></i> Los Angles</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card overflow-hidden">
                                                                <div class="d-md-flex">
                                                                    <div class="item-card9-img">
                                                                        <div class="item-card2-img ">
                                                                            <div class="arrow-ribbon bg-warning">$50</div>
                                                                            <a href="page-details.html"></a>
                                                                            <img src="../assets/images/media/7.jpg" alt="img" class="cover-image">
                                                                        </div>
                                                                        <div class="item-card9-icons">
                                                                            <a href="#" class="item-card9-icons1 bg-primary"> <i class="fa fa fa-heart-o"></i></a>
                                                                            <a href="#" class="item-card9-icons1 bg-black-trasparant"> <i class="fa fa fa-share-alt"></i></a>
                                                                        </div>
                                                                        <div class="item-overly-trans">
                                                                            <a href="page-details.html" class="bg-blue">Offline</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="card border-0 mb-0">
                                                                        <div class="card-body ">
                                                                            <div class="item-card2">
                                                                                <div class="item-card2-desc">
                                                                                    <a href="page-details.html" class="text-dark mt-2"><h3 class="font-weight-semibold mt-1">DataScience Classes</h3></a>
                                                                                    <div class="mt-2 mb-2">
                                                                                        <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-flask text-muted mr-1"></i> DataScience</span></a>
                                                                                        <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-user text-muted mr-1"></i> Alexandra</span></a>
                                                                                        <a href="#" class="mr-4"><span class="text-muted fs-13"><i class="fa fa-clock-o text-muted mr-1"></i> july18 ,2019</span></a>
                                                                                    </div>
                                                                                    <p class="mb-0 leading-tight">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer pt-4 pb-4">
                                                                            <div class="item-card2-footer d-sm-flex">
                                                                                <div class="item-card2-rating">
                                                                                    <div class="rating-stars d-inline-flex">
                                                                                        <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="3">
                                                                                        <div class="rating-stars-container">
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                        </div> (46 reviews)
                                                                                    </div>
                                                                                </div>
                                                                                <div class="ml-auto">
                                                                                    <a href="#" class="location"><i class="fa fa-map-marker text-muted mr-1"></i> San Francisco</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane" id="tab-12">
                                                            <div class="row">
                                                                <div class="col-lg-6 col-md-12 col-xl-4">
                                                                    <div class="card overflow-hidden">
                                                                        <div class="item-card9-img">
                                                                            <div class="item-card9-imgs">
                                                                                <a href="page-details.html"></a>
                                                                                <img src="../assets/images/media/11.jpg" alt="img" class="cover-image">
                                                                            </div>
                                                                            <div class="item-card9-icons">
                                                                                <a href="#" class="item-card9-icons1 bg-primary"> <i class="fa fa fa-heart-o"></i></a>
                                                                                <a href="#" class="item-card9-icons1 bg-black-trasparant"> <i class="fa fa fa-share-alt"></i></a>
                                                                            </div>
                                                                            <div class="item-overly-trans">
                                                                                <a href="page-details.html" class="bg-primary">Online</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="item-card9">
                                                                                <span class="item-card-badge"><i class="fa fa-briefcase mr-1"></i> Business</span>
                                                                                <a href="page-details.html" class="text-dark mt-2"><h3 class="font-weight-semibold mt-2 mb-2">Business Manegment</h3></a>
                                                                                <div class="item-card9-desc mb-2">
                                                                                    <a href="#" class="mr-4"><span class="text-muted"><i class="fa fa-user text-muted mr-1"></i> Stephanie</span></a>
                                                                                    <a href="#" class="mr-4"><span class="text-muted"><i class="fa fa-clock-o text-muted mr-1"></i> Aug 5, 2019</span></a>
                                                                                </div>
                                                                                <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <div class="item-card9-footer d-flex">
                                                                                <div class="item-card9-cost">
                                                                                    <h4 class="text-dark font-weight-semibold mb-0 mt-0">$263.99</h4>
                                                                                </div>
                                                                                <div class="ml-auto">
                                                                                    <div class="rating-stars block">
                                                                                        <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="3">
                                                                                        <div class="rating-stars-container">
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-12 col-xl-4">
                                                                    <div class="card overflow-hidden">
                                                                        <div class="ribbon ribbon-top-left text-danger"><span class="bg-danger">Offer</span></div>
                                                                        <div class="item-card9-img">
                                                                            <div class="item-card9-imgs">
                                                                                <a href="page-details.html"></a>
                                                                                <img src="../assets/images/media/9.jpg" alt="img" class="cover-image">
                                                                            </div>
                                                                            <div class="item-card9-icons">
                                                                                <a href="#" class="item-card9-icons1 bg-primary"> <i class="fa fa fa-heart-o"></i></a>
                                                                                <a href="#" class="item-card9-icons1 bg-black-trasparant"> <i class="fa fa fa-share-alt"></i></a>
                                                                            </div>
                                                                            <div class="item-overly-trans">
                                                                                <a href="page-details.html" class="bg-primary">Online</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="item-card9">
                                                                                <span class="item-card-badge"><i class="fa fa-cube mr-1"></i> Networking</span>
                                                                                <a href="page-details.html" class="text-dark mt-2"><h3 class="font-weight-semibold mt-2 mb-2">Networking Classes</h3></a>
                                                                                <div class="item-card9-desc mb-2">
                                                                                    <a href="#" class="mr-4"><span class="text-muted"><i class="fa fa-user text-muted mr-1"></i>  Lauren</span></a>
                                                                                    <a href="#" class="mr-4"><span class="text-muted"><i class="fa fa-clock-o text-muted mr-1"></i>  May 11, 2019</span></a>
                                                                                </div>
                                                                                <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <div class="item-card9-footer d-flex">
                                                                                <div class="item-card9-cost">
                                                                                    <h4 class="text-dark font-weight-semibold mb-0 mt-0">$745.00</h4>
                                                                                </div>
                                                                                <div class="ml-auto">
                                                                                    <div class="rating-stars block">
                                                                                        <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="2">
                                                                                        <div class="rating-stars-container">
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-12 col-xl-4">
                                                                    <div class="card overflow-hidden">
                                                                        <div class="ribbon ribbon-top-left text-primary"><span class="bg-danger">Offer</span></div>
                                                                        <div class="item-card9-img">
                                                                            <div class="item-card9-imgs">
                                                                                <a href="page-details.html"></a>
                                                                                <img src="../assets/images/media/8.jpg" alt="img" class="cover-image">
                                                                            </div>
                                                                            <div class="item-card9-icons">
                                                                                <a href="#" class="item-card9-icons1 bg-primary"> <i class="fa fa fa-heart-o"></i></a>
                                                                                <a href="#" class="item-card9-icons1 bg-black-trasparant"> <i class="fa fa fa-share-alt"></i></a>
                                                                            </div>
                                                                            <div class="item-overly-trans">
                                                                                <a href="page-details.html" class="bg-blue">Offline</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="item-card9">
                                                                                <span class="item-card-badge"><i class="fa fa-paint-brush text-muted mr-1"></i> Beautician</span>
                                                                                <a href="page-details.html" class="text-dark mt-2"><h3 class="font-weight-semibold mt-2 mb-2">Beautician Classes</h3></a>
                                                                                <div class="item-card9-desc mb-2">
                                                                                    <a href="#" class="mr-4"><span class="text-muted"><i class="fa fa-user text-muted mr-1"></i>   Kimberly</span></a>
                                                                                    <a href="#" class="mr-4"><span class="text-muted"><i class="fa fa-clock-o text-muted mr-1"></i>   Aug 11, 2019</span></a>
                                                                                </div>
                                                                                <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <div class="item-card9-footer d-flex">
                                                                                <div class="item-card9-cost">
                                                                                    <h4 class="text-dark font-weight-semibold mb-0 mt-0">$149.00</h4>
                                                                                </div>
                                                                                <div class="ml-auto">
                                                                                    <div class="rating-stars block">
                                                                                        <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="3">
                                                                                        <div class="rating-stars-container">
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                            <div class="rating-star sm">
                                                                                                <i class="fa fa-star"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-12 col-xl-4">
                                                                    <div class="card overflow-hidden">
                                                                        <div class="item-card9-img">
                                                                            <div class="arrow-ribbon bg-warning">$50</div>
                                                                            <div class="item-card9-imgs">
                                                                                <a href="page-details.html"></a>
                                                                                <img src="../assets/images/media/3.jpg" alt="img" class="cover-image">
                                                                            </div>
                                                                            <div class="item-card9-icons">
                                                                                <a href="#" class="item-card9-icons1 bg-primary"> <i class="fa fa fa-heart-o"></i></a>
                                                                                <a href="#" class="item-card9-icons1 bg-black-trasparant"> <i class="fa fa fa-share-alt"></i></a>
                                                                            </div>
                                                                            <div class="item-overly-trans">
                                                                                <a href="page-details.html" class="bg-primary">Online</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="item-card2">
                                                                                <div class="item-card2-desc">
                                                                                    <span class="item-card-badge"><i class="fa fa-music mr-1"></i> Music</span>
                                                                                    <a href="page-details.html" class="text-dark mt-2"><h3 class="font-weight-semibold mt-2 mb-2">Guitar Classes</h3></a>
                                                                                    <div class="item-card9-desc mb-2">
                                                                                        <a href="#" class="mr-4"><span class="text-muted"><i class="fa fa-user text-muted mr-1"></i>    Jennifer</span></a>
                                                                                        <a href="#" class="mr-4"><span class="text-muted"><i class="fa fa-clock-o text-muted mr-1"></i>   May 11, 2019</span></a>
                                                                                    </div>
                                                                                    <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <div class="item-card2-footer">
                                                                                <a href="#" class="location"><i class="fa fa-map-marker text-muted mr-1"></i> Los Angles</a>
                                                                                <div class="rating-stars item-card2-rating d-inline-flex">
                                                                                    <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="3">
                                                                                    <div class="rating-stars-container">
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                    </div>(145 reviews)
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-12 col-xl-4">
                                                                    <div class="card overflow-hidden">
                                                                        <div class="item-card9-img">
                                                                            <div class="arrow-ribbon bg-warning">$13</div>
                                                                            <div class="item-card9-imgs">
                                                                                <a href="page-details.html"></a>
                                                                                <img src="../assets/images/media/16.jpg" alt="img" class="cover-image">
                                                                            </div>
                                                                            <div class="item-card9-icons">
                                                                                <a href="#" class="item-card9-icons1 bg-primary"> <i class="fa fa fa-heart-o"></i></a>
                                                                                <a href="#" class="item-card9-icons1 bg-black-trasparant"> <i class="fa fa fa-share-alt"></i></a>
                                                                            </div>
                                                                            <div class="item-overly-trans">
                                                                                <a href="page-details.html" class="bg-blue">Offline</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="item-card2">
                                                                                <div class="item-card2-desc">
                                                                                    <span class="item-card-badge"><i class="fa fa-camera text-muted mr-1"></i> PhotoShop</span>
                                                                                    <a href="page-details.html" class="text-dark mt-2"><h3 class="font-weight-semibold mt-2 mb-2">PhotoShop Designing</h3></a>
                                                                                    <div class="item-card9-desc mb-2">
                                                                                        <a href="#" class="mr-4"><span class="text-muted"><i class="fa fa-user text-muted mr-1"></i>  Bernadette</span></a>
                                                                                        <a href="#" class="mr-4"><span class="text-muted"><i class="fa fa-clock-o text-muted mr-1"></i>  Aug 9 ,2019</span></a>
                                                                                    </div>
                                                                                    <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <div class="item-card2-footer">
                                                                                <a href="#" class="location"><i class="fa fa-map-marker text-muted mr-1"></i> Los Angles</a>
                                                                                <div class="rating-stars item-card2-rating d-inline-flex">
                                                                                    <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="3">
                                                                                    <div class="rating-stars-container">
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                    </div>(145 reviews)
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-6 col-md-12 col-xl-4">
                                                                    <div class="card overflow-hidden">
                                                                        <div class="item-card9-img">
                                                                            <div class="arrow-ribbon bg-warning">$32</div>
                                                                            <div class="item-card9-imgs">
                                                                                <a href="page-details.html"></a>
                                                                                <img src="../assets/images/media/7.jpg" alt="img" class="cover-image">
                                                                            </div>
                                                                            <div class="item-card9-icons">
                                                                                <a href="#" class="item-card9-icons1 bg-primary"> <i class="fa fa fa-heart-o"></i></a>
                                                                                <a href="#" class="item-card9-icons1 bg-black-trasparant"> <i class="fa fa fa-share-alt"></i></a>
                                                                            </div>
                                                                            <div class="item-overly-trans">
                                                                                <a href="page-details.html" class="bg-primary">Online</a>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-body">
                                                                            <div class="item-card2">
                                                                                <div class="item-card2-desc">
                                                                                    <span class="item-card-badge"><i class="fa fa-flask text-muted mr-1"></i> DataScience</span>
                                                                                    <a href="page-details.html" class="text-dark mt-2"><h3 class="font-weight-semibold mt-2 mb-2">Data Science</h3></a>
                                                                                    <div class="item-card9-desc mb-2">
                                                                                        <a href="#" class="mr-4"><span class="text-muted"><i class="fa fa-user text-muted mr-1"></i>   Alexandra</span></a>
                                                                                        <a href="#" class="mr-4"><span class="text-muted"><i class="fa fa-clock-o text-muted mr-1"></i>  july18 ,2019</span></a>
                                                                                    </div>
                                                                                    <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium </p>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-footer">
                                                                            <div class="item-card2-footer">
                                                                                <a href="#" class="location"><i class="fa fa-map-marker text-muted mr-1"></i> San Francisco</a>
                                                                                <div class="rating-stars item-card2-rating d-inline-flex">
                                                                                    <input type="number" readonly="readonly" class="rating-value star" name="rating-stars-value"  value="3">
                                                                                    <div class="rating-stars-container">
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                        <div class="rating-star sm">
                                                                                            <i class="fa fa-star"></i>
                                                                                        </div>
                                                                                    </div>(46 reviews)
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="center-block text-center">
                                                    <ul class="pagination mb-5">
                                                        <li class="page-item page-prev disabled">
                                                            <a class="page-link" href="#" tabindex="-1">Prev</a>
                                                        </li>
                                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                        <li class="page-item page-next">
                                                            <a class="page-link" href="#">Next</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <!--/Coursed lists-->
                                    </div>
                                </div>
                                <!--Coursed Listing-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
