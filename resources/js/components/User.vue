<template>

</template>
<script>
export default {
    name: 'user',
    data() {
        return {
            user: null,
            loading: false,
            iniciated: false,
            req: axios.create({
                baseUrl: BASE_URL
            })
        }
    },
    methods: {
        init() {
            this.loading = true;
            this.req.get('auth/init').then(response => {
                this.user = response.data;
                this.loading = false;
                this.iniciated = true;
            })
        }
    }
}
</script>
