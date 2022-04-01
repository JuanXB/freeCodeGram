<template>
    <div class="container">
         <button class="btn btn-primary ms-4" @click="followUser">Follow</button>
    </div>
</template>

<script>
    export default {
        props: ['user_id']
        ,
        mounted() {
            console.log('Component mounted.')
        },

        methods:{
            
        followUser() {
            axios.post('/follow/' + this.user_id).then(response => {
                console.log(response.data);
            }) ;
        }
        }

    }
</script>
