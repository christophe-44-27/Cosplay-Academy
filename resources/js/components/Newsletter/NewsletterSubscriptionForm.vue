<template>
    <div class="input-group w-100">
        <div class="alert alert-danger" v-if="errors.length">
            <b>Veuillez corriger les erreurs suivantes :</b>
            <ul>
                <li v-for="error in errors">{{ error }}</li>
            </ul>
        </div>
        <form id="newsletterSubscriptionForm" method="POST" action="/newsletter/subscribe" @submit="checkFormNewsletter">
            <input name="email" type="text" class="form-control br-tl-3  br-bl-3 " placeholder="Courriel" v-model="email">
            <input type="hidden" name="_token" :value="csrf">
            <div class="input-group-append ">
                <button type="submit" class="btn btn-primary br-tr-3  br-br-3"> S'inscrire </button>
            </div>
        </form>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                csrf: document.head.querySelector('meta[name="csrf-token"]').content,
                errors: [],
                email: '',
            }
        },
        methods: {
            checkFormNewsletter: function(e) {
                if (this.email) {
                    return true;
                }

                this.errors = [];

                if (!this.email) {
                    this.errors.push('email required.');
                }
                e.preventDefault();
            }
        }
    }
</script>
