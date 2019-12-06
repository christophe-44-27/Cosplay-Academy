@if(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 5)
w<span class="rated-products-ratings">
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star text-warning"> </i>
</span>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4.5 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4.3 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4.2 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4.1 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4.4)
<span class="rated-products-ratings">
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star-half-o text-warning"> </i>
</span>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 4)
<span class="rated-products-ratings">
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
</span>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3.5 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3.3 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3.2 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3.1 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3.4)
<span class="rated-products-ratings">
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa fa-star-half-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
</span>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 3)
<span class="rated-products-ratings">
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
</span>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2.5 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2.3 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2.2 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2.1 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2.4)
<span class="rated-products-ratings">
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star-half-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
</span>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 2)
<span class="rated-products-ratings">
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
</span>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1.5 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1.3 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1.2 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1.1 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1.4)
<span class="rated-products-ratings">
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star-half-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
</span>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 1)
<span class="rated-products-ratings">
    <i class="fa fa-star text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
</span>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0.5 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0.3 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0.2 or round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0.1 or
round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0.4)
<span class="rated-products-ratings">
    <i class="fa fa-star-half-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
</span>
@elseif(round($course->reviews->avg('nb_stars'), PHP_ROUND_HALF_UP) == 0)
<span class="rated-products-ratings">
    <i class="fa fa-star-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
    <i class="fa fa-star-o text-warning"> </i>
</span>
@endif
