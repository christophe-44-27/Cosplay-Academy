@extends('layout.layout_without_search_bar')

@section('content')
    <section class="sptb">
        <div class="container">
            <div class="row row-cards">
                <div class="col-lg-12">
                    <h2>Votre panier</h2>
                </div>
                <div class="col-lg-8">
                    @include('elements.blocs.notifications')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Payment Method</h3>
                        </div>
                        <div class="card-body">
                            <div class="card-pay">
                                <ul class="tabs-menu nav">
                                    <li class=""><a href="#tab1" class="active" data-toggle="tab"><i class="fa fa-credit-card"></i> @lang("Carte de crédit (Via Stripe)")</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active show" id="tab1">
                                        <form action="/charge" method="post" id="payment-form">
                                            <div class="form-row">
                                                <label for="card-element">
                                                    Credit or debit card
                                                </label>
                                                <div id="card-element">
                                                    <!-- A Stripe Element will be inserted here. -->
                                                </div>

                                                <!-- Used to display Element errors. -->
                                                <div id="card-errors" role="alert"></div>
                                            </div>

                                            <button>Submit Payment</button>
                                        </form>
                                        <form action="{{ route('stripe_charge') }}" method="POST">
                                            <h2 style="font-size: 24px; margin-bottom: 20px; color: #ec296b;">@lang('Information de facturation')</h2>
                                            <div class="form-group">
                                                <label class="form-label">@lang("Nom du porteur de la carte")</label>
                                                <input type="text" class="form-control" id="name" placeholder="John Doe">
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label">@lang("Adresse courriel")</label>
                                                <input type="text" class="form-control" id="email" placeholder="johndoe@doe.com">
                                            </div>
                                            <hr>
                                            <h2 style="font-size: 24px; margin-bottom: 20px; color: #ec296b;">@lang('Information de paiement')</h2>
                                            <div class="form-group">
                                                <label class="form-label">@lang("Numéro de la carte")</label>
                                                <input type="card_number" class="form-control" id="email" placeholder="0000 0000 0000 0000">
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-8">
                                                    <div class="form-group">
                                                        <label class="form-label">Expiration</label>
                                                        <div class="input-group">
                                                            <input type="number" class="form-control" placeholder="MM" name="expire-month">
                                                            <input type="number" class="form-control" placeholder="YY" name="expire-year">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-4">
                                                    <div class="form-group">
                                                        <label class="form-label">CVV <i class="fa fa-question-circle"></i></label>
                                                        <input name="cvc" type="number" class="form-control" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="btn btn-primary">Submit</a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card ">
                        <div class="card-header ">
                            <div class="card-title">@lang("Résumé du panier")</div>
                        </div>
                        <div class="card-body">
                            @if($items)
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr>
                                            <td>Cart Subtotal</td>
                                            <td class="text-right">$792.00</td>
                                        </tr>
                                        <tr>
                                            <td><span>Totals</span></td>
                                            <td class="text-right text-muted"><span>$792.00</span></td>
                                        </tr>
                                        <tr>
                                            <td><span>Order Total</span></td>
                                            <td><h2 class="price text-right mb-0">$792.00</h2></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <form class="text-center">
                                    <input class="btn btn-primary mt-2 m-b-20 " type="submit" value="Proceed To Checkout">
                                    <input class="btn btn-success mt-2" type="submit" value="Continue Shopping">
                                </form>
                            @else
                                <div class="alert alert-info">Votre panier est vide.</div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if($items)
        <section class="sptb">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body items-gallery">
                            <div class="items-blog-tab text-center">
                                <h2 style="text-align:  left">Autres cours qui pourraient aussi vous intéresser</h2>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab-1">
                                        <div class="row">
                                            <div class="col-xl-3 col-lg-6 col-md-12">
                                                <div class="card mb-xl-0">
                                                    <div class="item-card8-img  br-tr-7 br-tl-7">
                                                        <img src="../assets/images/media/7.jpg" alt="img" class="cover-image">
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="item-card8-desc">
                                                            <p class="text-muted">16 November 2018.</p>
                                                            <h4 class="font-weight-semibold">Security Hacking</h4>
                                                            <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-md-12">
                                                <div class="card mb-xl-0">
                                                    <div class="item-card8-img  br-tr-7 br-tl-7">
                                                        <img src="../assets/images/media/2.jpg" alt="img" class="cover-image">
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="item-card8-desc">
                                                            <p class="text-muted">16 November 2018.</p>
                                                            <h4 class="font-weight-semibold">Computer Networking</h4>
                                                            <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-md-12">
                                                <div class="card mb-lg-0">
                                                    <div class="item-card8-img  br-tr-7 br-tl-7">
                                                        <img src="../assets/images/media/11.jpg" alt="img" class="cover-image">
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="item-card8-desc">
                                                            <p class="text-muted">16 November 2018.</p>
                                                            <h4 class="font-weight-semibold">Business Manegement</h4>
                                                            <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-6 col-md-12">
                                                <div class="card mb-0">
                                                    <div class="item-card8-img  br-tr-7 br-tl-7">
                                                        <img src="../assets/images/media/1.jpg" alt="img" class="cover-image">
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="item-card8-desc">
                                                            <p class="text-muted">16 November 2018.</p>
                                                            <h4 class="font-weight-semibold">Java Courses</h4>
                                                            <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-2">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-12 col-md-12">
                                                <div class="card mb-xl-0">
                                                    <div class="item-card8-img  br-tr-7 br-tl-7">
                                                        <img src="../assets/images/media/15.jpg" alt="img" class="cover-image">
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="item-card8-desc">
                                                            <p class="text-muted">16 November 2018.</p>
                                                            <h4 class="font-weight-semibold">UNIX Classes</h4>
                                                            <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-12 col-md-12">
                                                <div class="card mb-xl-0">
                                                    <div class="item-card8-img">
                                                        <img src="../assets/images/media/13.jpg" alt="img" class="cover-image">
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="item-card8-desc">
                                                            <p class="text-muted">16 November 2018.</p>
                                                            <h4 class="font-weight-semibold">Frame Works Classes</h4>
                                                            <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-12 col-md-12">
                                                <div class="card mb-0">
                                                    <div class="item-card8-img">
                                                        <img src="../assets/images/media/18.jpg" alt="img" class="cover-image">
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="item-card8-desc">
                                                            <p class="text-muted">16 November 2018.</p>
                                                            <h4 class="font-weight-semibold">Digital Marketing</h4>
                                                            <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="tab-3">
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-12 col-md-12">
                                                <div class="card mb-xl-0">
                                                    <div class="item-card8-img  br-tr-7 br-tl-7">
                                                        <img src="../assets/images/media/4.jpg" alt="img" class="cover-image">
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="item-card8-desc">
                                                            <p class="text-muted">16 November 2018.</p>
                                                            <h4 class="font-weight-semibold"> Security Hacking</h4>
                                                            <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-lg-12 col-md-12">
                                                <div class="card mb-0">
                                                    <div class="item-card8-img">
                                                        <img src="../assets/images/media/7.jpg" alt="img" class="cover-image">
                                                    </div>
                                                    <div class="card-body">
                                                        <div class="item-card8-desc">
                                                            <p class="text-muted">16 November 2018.</p>
                                                            <h4 class="font-weight-semibold">Marketing Courses</h4>
                                                            <p class="mb-0">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium  laboriosam</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
@endsection

@push('javascripts')
    <!-- Stripe.js v3 for Elements -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var stripe = Stripe('pk_test_Dpa8kApSoONinwPYPvixA7k500imfy8unx');
        var elements = stripe.elements();
        // Custom styling can be passed to options when creating an Element.
        var style = {
            base: {
                // Add your base input styles here. For example:
                fontSize: '16px',
                color: "#32325d",
            }
        };

        // Create an instance of the card Element.
        var card = elements.create('card', {style: style});

        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
    </script>
@endpush
