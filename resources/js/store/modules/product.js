const product = {
    state: {
        products: [],
        PaginationLinks: { first: '', last: '', next: '', prev: '' },
        IsLoaded: false
    },
    getters: {
        getAllProducts: state => state.products,
        getPaginationLinks: state => state.PaginationLinks,
        findProduct: state => id => state.products.find(p => p.id == id),
        productIsLoaded: state => state.IsLoaded,
    },
    mutations: {
        SET_PRODUCTS(state, products) {
            state.products = products.data
            state.PaginationLinks = products.links
            state.IsLoaded = true;
        },
        UPDATE_PRODUCT(state, product){state.products[state.products.indexOf(r => r.id == id)]=product.data},
        ADD_PRODUCT(state, product) { state.products.push(product.data);},
        DESTROY_PRODUCT(state, id) { state.products.slice(state.products.indexOf(r => r.id == id), 1) },
    },
    actions: {
        // get all  Products 
        // index type INTEGER
        async getProducts(context, index = '') {
            this.state.product.IsLoaded = false
            let url = ''
            let page = this.getters.getPaginationLinks
            switch (index) {
                case 1: url = page.first
                    break;
                case 2: url = page.prev
                    break;
                case 3: url = page.next
                    break;
                case 4: url = page.last
                    break;
                default: url = '/api/product'
                    break;
            }

            await axios.get(url).then(res => {
                context.commit('SET_PRODUCTS', res.data)
            }).catch(err => {
                context.dispatch('showError', err)
            })

        },
        // search Products
        // data type string
        async searchProduct(context, data) {
            await axios.get(`/api/product/search/${data}`).then(res => {
                context.commit('SET_PRODUCTS', res.data)
            }).catch(err => {
                context.dispatch('showError', err)
            })
        },
        //get Product By Category
        // data type INTEGER
        async getProductByCategory(context, data) {
            await axios.get(`/api/category/${data}`).then(res => {
                context.commit('SET_PRODUCTS', res.data)
            }).catch(err => {
                context.dispatch('showError', err)
            })
        },
        // create Product
        /* product type {  category_id;INTEGER,p_name;STRING,p_description;TEXT,p_color;STRING,p_price:FLOAT,
                        p_image_1;IMAGE,p_image_2;IMAGE,p_image_3;IMAGE,p_image_4;IMAGE,}
        */
        async createProduct(context, product) {
            let userToken = this.getters['userToken']
            await axios.post(`/api/product`,product,{headers:{
                'Authorization':`Bearer ${userToken}`
                 }}).then(res =>{
                context.commit('ADD_PRODUCT',res.data)
                }).catch(err=>{
                context.dispatch('showError',err.response.statusText)
                })
        },

        // Update Product
        /* product type {  category_id;INTEGER,p_name;STRING,p_description;TEXT,p_color;STRING,p_price:FLOAT,
                        p_image_1;IMAGE,p_image_2;IMAGE,p_image_3;IMAGE,p_image_4;IMAGE,}
        */
        async updateProduct(context, product,id) {

            let userToken = this.getters['userToken']
            await axios.put(`/api/product/${id}`,product,{headers:{
                'Authorization':`Bearer ${userToken}`
                 }}).then(res =>{
                context.commit('UPDATE_PRODUCT',res.data)
                }).catch(err=>{
                context.dispatch('showError',err.response.statusText)
                })
        },
        // Update Product
        // id type INTEGER
        async destroyProduct(context, id) {

            let userToken = this.getters['userToken']
            await axios.delete(`/api/product/${id}`,{},{headers:{
                'Authorization':`Bearer ${userToken}`
                 }}).then(res =>{
                context.commit('DESTROY_PRODUCT',id)
                }).catch(err=>{
                context.dispatch('showError',err.response.statusText)
                })
        },

    }

}

export default product;