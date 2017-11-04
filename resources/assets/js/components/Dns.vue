<template>
    <div>
        <button @click="get" class="btn btn-default btn-xs">DNS</button>
        <div v-if="records">
            <pre class="records">{{ recordsText }}</pre>
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
</style>
