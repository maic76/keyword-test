<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="">
                            <div class="form-group">
                                <input class="form-control-lg" type="text" name="domain" id="domain" aria-describedby="domainHelp" placeholder="Enter a Domain Name" v-model="search">
                                <small id="domainHelp" class="form-text text-muted">Enter a domain URL to get results based on the database records.</small>
                            </div>
                            <button type="submit" class="btn btn-primary" @click.prevent="getResult()">Submit</button>
                        </form>
                        <div class="results" >{{result}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    /**
     * @TODO: Write front-end code here so you can hit the /api/websites/search
     * endpoint with a domain name or URL and retrieve a single results.
     *
     * You can use axios.post in here, just display the result in the .results div.
     */
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        data(){
            return {
                search: '',
                result: '',
            }
        },
         methods: {
            getResult(){
                var data = this.search;
                var _this = this;
                axios.post('/api/websites/search', {domain: data}).then(function(response){
                    _this.result = response.data;
                }).catch(error=>{
                    _this.result = error.response.data.error;
                    console.log("Search: "+error);
                });
            }
        }
    }
</script>

