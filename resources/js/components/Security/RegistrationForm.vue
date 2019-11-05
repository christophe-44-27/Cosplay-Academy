<template>
    <div class="card-body">
        <div class="alert alert-danger" v-if="errors.length">
            <b>Veuillez corriger les erreurs suivantes :</b>
            <ul>
                <li v-for="error in errors">{{ error }}</li>
            </ul>
        </div>
        <h3 class="mb-4">Je m'inscris !</h3>
        <form id="registrationForm" method="POST" action="/register" v-on:submit="checkForm()">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fe fe-user fs-16 lh-0 op-6"></i>
                    </div>
                </div>
                <input type="text" class="form-control" placeholder="Nom de cosplayeur" name="name" v-model="name">
            </div>
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fe fe-mail fs-16 lh-0 op-6"></i>
                    </div>
                </div>
                <input type="text" class="form-control" placeholder="Courriel" name="email" v-model="email">
            </div>
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fe fe-unlock fs-16 lh-0 op-6"></i>
                    </div>
                </div>
                <input type="password" class="form-control" placeholder="Mot de passe" name="password"
                       v-model="password">
            </div>
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <div class="input-group-text"><i class="fe fe-unlock fs-16 lh-0 op-6"></i>
                    </div>
                </div>
                <input type="password" class="form-control" placeholder="Confirmation du mot de passe" name="password_confirmation"
                       v-model="passwordConfirmation">
            </div>
            <!-- CSRF Field -->
            <input type="hidden" name="_token" :value="csrf">
            <input type="hidden" name="firstname" value="">
            <input type="hidden" name="lastname" value="">
            <button type="submit" class="btn btn-primary btn-lg btn-block">S'inscrire</button>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
                errors: [],
                name: '',
                email: '',
                password: '',
                passwordConfirmation: '',
            }
        },
        methods: {
            checkForm: function(e) {
                console.log("coucou");
                // if (this.name && this.email && this.password) {
                //     return true;
                // }

                this.errors = [];

                if (!this.name) {
                    this.errors.push('Name required.');
                }
                if (!this.email) {
                    this.errors.push('email required.');
                }
                if (!this.password) {
                    this.errors.push('Password required.');
                }
                if (this.password !== this.passwordConfirmation) {
                    this.errors.push("Les mots de passe ne correspondent pas.");
                }
                e.preventDefault();
            }
        }
    }
</script>

<style scoped>

</style>
