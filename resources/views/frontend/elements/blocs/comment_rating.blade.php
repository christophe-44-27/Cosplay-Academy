@if(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 5)
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star text-yellow"></i>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4.5 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4.3 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4.2 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4.1 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4.4)
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star-half-o text-yellow"></i>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4)
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3.5 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3.3 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3.2 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3.1 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3.4)
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star-half-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3)
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2.5 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2.3 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2.2 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2.1 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2.4)
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star-half-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2)
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1.5 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1.3 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1.2 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1.1 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1.4)
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star-half-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1)
    <i class="fa fa-star text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0.5 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0.3 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0.2 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0.1 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0.4)
    <i class="fa fa-star-half-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0)
    <i class="fa fa-star-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
    <i class="fa fa-star-o text-yellow"></i>
@endif
