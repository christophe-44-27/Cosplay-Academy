<template>
    <div>
        <div v-for="course in courses" class="card overflow-hidden">
            <div class="d-md-flex">
                <div class="item-card9-img">
                    <div class="item-card9-imgs">
                        <a href="#"></a>
                        <img
                            src="/"
                            alt="img"
                            class="cover-image">
                    </div>
                    <div class="item-card9-icons">
                        <a href="#" class="item-card9-icons1 bg-primary"> <i
                            class="fa fa fa-heart"></i></a>
                    </div>
                </div>
                <div class="card border-0 mb-0">
                    <div class="card-body ">
                        <div class="item-card9">
                            <a href="#"
                               class="text-dark"><h3
                                class="font-weight-semibold mt-1">{{ course.title }}</h3>
                            </a>
                            <div class="mt-2 mb-2">
                                <a href="#" class="mr-4"><span
                                    class="text-muted fs-13"><i
                                    class="fa fa-briefcase mr-1"></i> Catégorie</span></a>
                                <a href="#" class="mr-4"><span
                                    class="text-muted fs-13"><i
                                    class="fa fa-user text-muted mr-1"></i> Auteur</span></a>
                                <a href="#" class="mr-4"><span
                                    class="text-muted fs-13"><i
                                    class="fa fa-clock-o text-muted mr-1"></i> 20/12/2019</span></a>
                            </div>
                            <p class="mb-0 leading-tight">Lorem ipsum de ouf</p>
                        </div>
                    </div>
                    <div class="card-footer pt-4 pb-4">
                        <div class="item-card9-footer d-flex">
                            <div class="item-card9-cost">
                                <h4 class="text-dark font-weight-semibold mb-0 mt-0">
                                    Gratuit
                                </h4>
                            </div>
                            <div class="ml-auto">
                                <div class="rating-stars block">
                                    <input type="number" readonly="readonly"
                                           class="rating-value star"
                                           name="rating-stars-value"
                                           value="5">
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
    </div>
</template>

<script>
    export default {
        data() {
            return {
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
                links: [],
                meta: [],
            }
        },
        mounted(){
        },
        computed: {
            courses() {
                return this.$store.state.courses;
            }
        },
        methods: {}
    }
</script>
