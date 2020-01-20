module.exports = {
    dev: {
        proxyTable: {
            '/api':{
                target: 'http://locahost:8000',
                changeOrigin: true
            }
        }
    }
}
