<template>
    <div>
        <button @click="get" class="btn btn-default btn-xs">DNS</button>
        <div v-if="records">
            <div class="records">
                <p><button @click="hide" class="btn btn-link pull-right"><span class="glyphicon glyphicon-remove"></span></button></p>
                <div class="clearfix"></div>
                <pre>{{ recordsText }}</pre></div>
        </div>
    </div>
</template>

<script>
    export default {
        props: ['url'],

        data() {
            return {
                records: false,
                recordsText: ''
            }
        },

        methods: {
            get() {
                let data = {
                    url: this.url
                };
                axios.post('/dns', data).then(({data}) => {
                    this.records = true;
                    this.recordsText = data;
                });
            },

            hide() {
                this.records = false;
            }
        }
    }
</script>

<style>
    .records {
        background: #414141;
        color: #ccc;
        margin: 10px 0;
        padding: 20px 10px;
    }
    .records .btn-link {
        color: #ccc;
    }
    pre {
        background-color: #414141;
        color: #ccc;
        border:1px solid #414141;
    }
</style>
