@if($course->reviews->avg('nb_stars') == 5)
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
@elseif($course->reviews->avg('nb_stars') == 4.5)
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star-half-full"></i>
    </div>
@elseif($course->reviews->avg('nb_stars') == 4)
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm">
        <i class="fa fa-star"></i>
    </div>
@elseif($course->reviews->avg('nb_stars') == 3.5)
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star-half-full"></i>
    </div>
    <div class="rating-star sm">
        <i class="fa fa-star"></i>
    </div>
@elseif($course->reviews->avg('nb_stars') == 3)
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm">
        <i class="fa fa-star"></i>
    </div>
@elseif($course->reviews->avg('nb_stars') == 2.5)
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star-half-full"></i>
    </div>
    <div class="rating-star sm">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm">
        <i class="fa fa-star"></i>
    </div>
@elseif($course->reviews->avg('nb_stars') == 2)
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
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
@elseif($course->reviews->avg('nb_stars') == 1.5)
    <div class="rating-star sm is--active">
        <i class="fa fa-star"></i>
    </div>
    <div class="rating-star sm is--active">
        <i class="fa fa-star-half-full"></i>
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
@elseif($course->reviews->avg('nb_stars') == 1)
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
@elseif($course->reviews->avg('nb_stars') == 0.5)
    <div class="rating-star sm is--active">
        <i class="fa fa-star-half-full"></i>
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
@elseif($course->reviews->avg('nb_stars') == 0)
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
@endif
