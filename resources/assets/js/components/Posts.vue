<template>
    <div class="container">
        <div class="row">
            <div>
                <div v-for="post in this.posts">
                    <post :title="post.title" :text="post.text"> </post>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import axios from 'axios';
    export default {
        props: ['posts'],
        data() {
            return {
//                posts:[],
//                errors: []
            }
        },
        created() {
//            axios.get('http://127.0.0.1:8000/postsAPI')
//                .then(response => {
//                    this.posts = response.data.posts;
//                    console.log("ppppppp");
//                })
//                .catch(e => {
//                    this.errors.push(e)
//                })
//            console.log("response " + this.posts.length);
        },

        methods: {
//            async loadPosts () {
//                let data = await axios.get('http://127.0.0.1:8000/postsAPI');
//                console.log('data' + data);
//            }

        },

        mounted() {
//            console.log('Component mounted.')
        }
    }
</script>
