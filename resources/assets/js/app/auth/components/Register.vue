<template>
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Register</div>

                <div class="card-body">
                    <form  action="" @submit.prevent="submit">
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="" autofocus v-model="name" v-bind:class="{ 'is-invalid': errors.name }">
                                    <span class="invalid-feedback" v-if="errors.name">
                                        <strong>{{ errors.name[0] }}</strong>
                                    </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="" v-model="email" v-bind:class="{ 'is-invalid': errors.email }">
                                    <span class="invalid-feedback"  v-if="errors.email">
                                        <strong>{{ errors.email[0] }}</strong>
                                    </span>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" v-model="password" v-bind:class="{ 'is-invalid': errors.password }">
                                    <span class="invalid-feedback"  v-if="errors.password">
                                        <strong>{{ errors.password[0] }}</strong>
                                    </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" v-model="password_confirmation">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</template>

<script>
    import { mapActions } from 'vuex'

    export default {
        data() {
            return {
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
                errors: []
            }
        },
        methods: {
            ...mapActions({
                register: 'auth/register'
            }),
            submit () {
                this.register({
                    payload: {
                        name: this.name,
                        email: this.email,
                        password: this.password,
                        password_confirmation: this.password_confirmation
                    },
                    context: this
                }).then(() => {
                    this.$router.replace({ name: 'home' })
                })
            }
        }
    }
</script>
