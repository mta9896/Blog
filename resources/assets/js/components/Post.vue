<template>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">{{title}}</div>

            <div class="panel-body">
                {{text}}
            </div>
            <div v-if="editable" class="panel-heading">
                <a :href="'/edit_post/' + id">
                    <button class="btn">edit</button>
                </a>
                <a :href="'/delete_post/' + id">
                    <button class="btn">delete</button>
                </a>
            </div>

            <div v-for="comment in comments">
                <comment :text="comment.text" :authorID="comment.user_id"> </comment>
            </div>
            <!--<comment text="hii" :authorID="1">-->
            <!--</comment>-->
            <!--<comment title="post.title" :text="post.text"> </comment>-->
        </div>
    </div>
</template>

<script>

    export default {
        props: ['id', 'title', 'text', 'editable'],
        data() {
            return {
                comments:[],
                errors: []
            }
        },
        created() {
            axios.get('http://127.0.0.1:8000/commentsAPI')
                .then(response => {
//                    this.comments = response.data.comments;
                    let allComments = response.data.comments;
                    console.log(allComments);
                    for(let i=0; i<allComments.length; i++){
                        console.log(i);
                        if(allComments[i].post_id == 2){
                            this.comments.push(allComments[i]);
                        }
                    }
                    for(let j=0; j<this.comments.length; j++){
                        console.log(this.comments[j]);
                    }
                })
                .catch(e => {
                    this.errors.push(e)
                })


            console.log(this.id);
        },
        mounted() {
        },
    }
</script>
