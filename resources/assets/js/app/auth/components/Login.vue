<template>
    <div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Login</div>

                <div class="card-body">

                    <div class="alert alert-danger" role="alert" v-if="errors.root">
                        {{ errors.root }}
                    </div>

                    <form method="" action="" @submit.prevent="submit">
                        

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" autofocus v-model="email" v-bind:class="{ 'is-invalid': errors.email }">

                                
                                    <span class="invalid-feedback" v-if="errors.email">
                                        <strong>{{ errors.email[0] }}</strong>
                                    </span>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password"  v-model="password" v-bind:class="{ 'is-invalid': errors.password }">

                                
                                    <span class="invalid-feedback" v-if="errors.password">
                                        <strong>{{ errors.password[0] }}</strong>
                                    </span>
                                
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="">
                                    Forgot Your Password?
                                </a>
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
                email: null,
                password: null,
                errors: []
            }
        },
        methods: {
            ...mapActions({
                login: 'auth/login'
            }),
            submit () {
                this.login({
                    payload: {
                        email: this.email,
                        password: this.password
                    },
                    context: this
                }).then(() => {
                    this.$router.replace({ name: 'home' })
                })
            }
        }   
    }
</script>
