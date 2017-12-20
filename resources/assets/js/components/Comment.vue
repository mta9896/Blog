<template>
    <div class="container">
        <div class="row">
            <div class="panel panel-default col-md-8">
                <div class="panel-heading">
                    {{authorID}}
                </div>

                <div class="panel-body">
                    {{text}}
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        props: ['text' , 'authorID'],
        mounted() {
        },
        created() {

        }
    }
</script>