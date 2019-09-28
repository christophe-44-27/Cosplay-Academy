@if(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 5)
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
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4.5 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4.3 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4.2 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4.1 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4.4)
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
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4)
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
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3.5 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3.3 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3.2 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3.1 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3.4)
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
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3)
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
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2.5 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2.3 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2.2 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2.1 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2.4)
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
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2)
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
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1.5 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1.3 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1.2 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1.1 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1.4)
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
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1)
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
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0.5 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0.3 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0.2 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0.1 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0.4)
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
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0)
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
