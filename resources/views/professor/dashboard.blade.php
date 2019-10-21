@extends('layout.layout_dashboard')

@section('content')
    @include('elements.blocs.listeo_notifications')
    <!-- Content -->
    <div class="row">

        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-1">
                <div class="dashboard-stat-content"><h4>{{ $nbCours }}</h4> <span>@lang("Mes cours")</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-File"></i></div>
            </div>
        </div>

        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-2">
                <div class="dashboard-stat-content"><h4>{{ $nbTutorials }}</h4> <span>@lang("Mes tutoriels")</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-File"></i></div>
            </div>
        </div>


        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-3">
                <div class="dashboard-stat-content"><h4>95</h4> <span>@lang("Avis reçus")</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Add-UserStar"></i></div>
            </div>
        </div>

        <!-- Item -->
        <div class="col-lg-3 col-md-6">
            <div class="dashboard-stat color-4">
                <div class="dashboard-stat-content"><h4>126</h4> <span>@lang("Mis en favoris")</span></div>
                <div class="dashboard-stat-icon"><i class="im im-icon-Heart"></i></div>
            </div>
        </div>
    </div>

    <div class="row">

        <!-- Recent Activity -->
        <div class="col-lg-6 col-md-12">
            <div class="dashboard-list-box with-icons margin-top-20">
                <h4>Recent Activities</h4>
                <ul>
                    <li>
                        <i class="list-box-icon sl sl-icon-layers"></i> Your listing <strong><a href="#">Hotel Govendor</a></strong> has been approved!
                        <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                    </li>

                    <li>
                        <i class="list-box-icon sl sl-icon-star"></i> Kathy Brown left a review <div class="numerical-rating" data-rating="5.0"></div> on <strong><a href="#">Burger House</a></strong>
                        <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                    </li>

                    <li>
                        <i class="list-box-icon sl sl-icon-heart"></i> Someone bookmarked your <strong><a href="#">Burger House</a></strong> listing!
                        <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                    </li>

                    <li>
                        <i class="list-box-icon sl sl-icon-star"></i> Kathy Brown left a review <div class="numerical-rating" data-rating="3.0"></div> on <strong><a href="#">Airport</a></strong>
                        <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                    </li>

                    <li>
                        <i class="list-box-icon sl sl-icon-heart"></i> Someone bookmarked your <strong><a href="#">Burger House</a></strong> listing!
                        <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                    </li>

                    <li>
                        <i class="list-box-icon sl sl-icon-star"></i> John Doe left a review <div class="numerical-rating" data-rating="4.0"></div> on <strong><a href="#">Burger House</a></strong>
                        <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                    </li>

                    <li>
                        <i class="list-box-icon sl sl-icon-star"></i> Jack Perry left a review <div class="numerical-rating" data-rating="2.5"></div> on <strong><a href="#">Tom's Restaurant</a></strong>
                        <a href="#" class="close-list-item"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Invoices -->
        <div class="col-lg-6 col-md-12">
            <div class="dashboard-list-box invoices with-icons margin-top-20">
                <h4>Invoices</h4>
                <ul>

                    <li><i class="list-box-icon sl sl-icon-doc"></i>
                        <strong>Professional Plan</strong>
                        <ul>
                            <li class="unpaid">Unpaid</li>
                            <li>Order: #00124</li>
                            <li>Date: 20/07/2019</li>
                        </ul>
                        <div class="buttons-to-right">
                            <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                        </div>
                    </li>

                    <li><i class="list-box-icon sl sl-icon-doc"></i>
                        <strong>Extended Plan</strong>
                        <ul>
                            <li class="paid">Paid</li>
                            <li>Order: #00108</li>
                            <li>Date: 14/07/2019</li>
                        </ul>
                        <div class="buttons-to-right">
                            <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                        </div>
                    </li>

                    <li><i class="list-box-icon sl sl-icon-doc"></i>
                        <strong>Extended Plan</strong>
                        <ul>
                            <li class="paid">Paid</li>
                            <li>Order: #00097</li>
                            <li>Date: 10/07/2019</li>
                        </ul>
                        <div class="buttons-to-right">
                            <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                        </div>
                    </li>

                    <li><i class="list-box-icon sl sl-icon-doc"></i>
                        <strong>Basic Plan</strong>
                        <ul>
                            <li class="paid">Paid</li>
                            <li>Order: #00091</li>
                            <li>Date: 30/06/2019</li>
                        </ul>
                        <div class="buttons-to-right">
                            <a href="dashboard-invoice.html" class="button gray">View Invoice</a>
                        </div>
                    </li>

                </ul>
            </div>
        </div>


        <!-- Copyrights -->
        <div class="col-md-12">
            <div class="copyrights">© 2019 Listeo. All Rights Reserved.</div>
        </div>
    </div>
@endsection
