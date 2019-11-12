<template>
    <div>
    <button class="btn btn-primary ml-4" @click="followUser" v-text="followText">Follow</button>
    </div>
</template>

<script>
    export default {
        props : ['userId','follow'],
        mounted() {
            console.log('Component mounted.')
        },
        data : function (){
            return {
                status :this.follow,
            }
        },
        methods : {
           followUser(){
               axios.post('/follow/'+this.userId)
                .then(response => {
                    console.log(response.data);
                }) ;
           }
        },
        computed : {
            followText(){
                return (this.follow)? 'Unfollow' : 'Follow';
            }
        }
    }
</script>
