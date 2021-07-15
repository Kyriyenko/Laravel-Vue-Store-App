export default {
    getSelectedCategoriesProducts(data) {
        return axios
            .get(`/getProducts/${data}`)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    sendComment(data) {
        return axios
            .post('/reviews/send', data)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    getOneProduct(data) {
        return axios
            .get(`/getOneProduct/${data}`)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    buyProduct(data) {
        return axios
            .post(`/buyProduct`, data)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    getAllProducts() {
        return axios
            .get(`/getAllProducts`)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    getMinPriceFirst() {
        return axios
            .get(`/getMin`)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    getMaxPriceFirst() {
        return axios
            .get(`/getMax`)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    getFeaturedProducts(){
        return axios
            .get(`/getFeaturedProducts`)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    }
}
