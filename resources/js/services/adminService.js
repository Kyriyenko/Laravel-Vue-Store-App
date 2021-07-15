export default {
    createSubCategory(data) {
        return axios
            .post(`/createSubCategory`, data)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    getCategories() {
        return axios
            .get(`/getAllCategories`)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    getCollection() {
        return axios
            .get('/getCategories')
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    createProduct(data) {
        return axios
            .post(`/createProduct`, data)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    getAllMessages() {
        return axios
            .get('/reviews')
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    deleteMessage(data) {
        return axios
            .post('/reviews/delete', data)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    getNews() {
        return axios
            .get('/news')
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    deleteNews(data) {
        return axios
            .post('/news/delete', data)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    addNews(data) {
        return axios
            .post('/news/add', data)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    updateProductInfo(data) {
        return axios
            .post(`/updateProduct`, data)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    deleteProduct(data) {
        return axios
            .post(`/deleteProduct`, data)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    getAllProductsForUpdate() {
        return axios
            .get(`/getAllProducts`)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
}
