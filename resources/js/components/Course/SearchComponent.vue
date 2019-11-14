<template>
    <div class="col-xl-3 col-lg-4 col-md-12">
        <form action="/search" method="get">
            <div class="card">
                <div class="card-body">
                    <div class="input-group">
                        <input  type="text"
                               name="keywords" v-model="keywords" class="form-control br-tl-4 br-bl-4"
                               placeholder="Mots clés">
                        <div class="input-group-append"></div>
                    </div>
                </div>
            </div>
            <div class="card mb-lg-0">
                <div class="card-header">
                    <h3 class="card-title">Catégories</h3>
                </div>
                <div class="card-body">
                    <div class="" id="container">
                        <div class="filter-product-checkboxs">
                            <div v-if="categories && categories.length">
                                <li v-for="category of categories" style="list-style-type: none">
                                    <label class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" name="checkbox1"
                                               :value="category.id" v-model="selectedCategories">
                                        <span class="custom-control-label">
                                                <a href="#" class="text-dark">{{ category.name}} <span
                                                    class="label label-secondary float-right">14</span></a>
                                        </span>
                                    </label>
                                </li>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-header border-top">
                    <h3 class="card-title">Niveau</h3>
                </div>
                <div class="card-body">
                    <div class="filter-product-checkboxs">
                        <label class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" name="checkbox11"
                                   value="1" v-model="selectedDifficulties">
                            <span class="custom-control-label">Débutant</span>
                        </label>
                        <label class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" name="checkbox12"
                                   value="2" v-model="selectedDifficulties">
                            <span class="custom-control-label">Intermédiaire</span>
                        </label>
                        <label class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" name="checkbox14"
                                   value="3" v-model="selectedDifficulties">
                            <span class="custom-control-label">Expert</span>
                        </label>
                    </div>
                </div>
                <div class="card-header border-top">
                    <h3 class="card-title">Type</h3>
                </div>
                <div class="card-body">
                    <div class="filter-product-checkboxs">
                        <label class="custom-control custom-checkbox mb-2">
                            <input type="checkbox" class="custom-control-input" name="checkbox1"
                                   value="gratuit" v-model="selectedTypes">
                            <span class="custom-control-label">
                                            Gratuit
                                        </span>
                        </label>
                        <label class="custom-control custom-checkbox mb-0">
                            <input type="checkbox" class="custom-control-input" name="checkbox2"
                                   value="premium" v-model="selectedTypes">
                            <span class="custom-control-label">
                                            Payant
                                        </span>
                        </label>
                    </div>
                </div>
                <div class="card-footer">
                    <button @click.prevent="submitted" class="btn btn-primary btn-block">Apply Filter</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';

    export default {
        data () {
            return {
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
                categories: [],
                selectedCategories: [],
                selectedTypes: [],
                selectedDifficulties: [],
                isSubmitted: false,
                keywords: null,
            }
        },
        mounted() {
            axios.get(`http://cosplayschool.test/api/categories`)
                .then(response => {
                    // JSON responses are automatically parsed.
                    this.categories = response.data.data;
                })
                .catch(e => {
                    this.errors.push(e)
                });

            axios.get('http://cosplayschool.test/api/courses')
                .then(response => {
                    this.$store.state.courses = response.data.data;
                    this.links = response.data.links;
                })
                .catch(e => {
                    this.errors.push(e)
                })
        },
        methods: {
            submitted(){
                this.isSubmitted = true;
                axios.get('http://cosplayschool.test/api/courses/search', {
                    params: {
                        categories: this.selectedCategories,
                        type: this.selectedTypes,
                        keywords: this.keywords,
                        difficulties: this.selectedDifficulties
                    }
                })
                    .then(response => {
                        this.$store.state.courses = response.data.data;
                        this.links = response.data.links;
                    })
                    .catch(e => {
                        this.errors.push(e)
                    })
            }
        }
    }
</script>
