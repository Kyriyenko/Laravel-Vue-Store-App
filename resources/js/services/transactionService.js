export default {
    getOrderId() {
        return axios
            .get('/getUserOrderId')
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    getProducts() {
        return axios
            .get('/getUserCart')
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    deleteProduct(data) {
        return axios
            .post('/deleteCartItem', data)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    },
    makePayment(data) {
        return axios
            .post('/transaction', data)
            .then(response => {
                return response
            })
            .catch(error => console.log(error))
            .finally()
    }


}
