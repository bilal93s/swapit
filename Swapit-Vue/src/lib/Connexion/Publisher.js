import axios from 'axios'

class Publisher {
    constructor (url, headers) {
        this.instance = axios.create({
            baseURL: url,
            timeout: 1000,
            headers: headers
        })
    }

    post (url,data) {
        this.instance.post(url, data).then(response => { return response.json() }).catch(error => { console.log(error) })
    }

    patch (url,data) {
        this.instance.post(url, data).then(response => { return response.json() }).catch(error => { console.log(error) })
    }

    get (url) {
        this.instance.post(url).then(response => { return response.json() }).catch(error => { console.log(error) })
    }

    delete (url) {
        this.instance.post(url).then(response => { return response.json() }).catch(error => { console.log(error) }) 
    }
}

export default Publisher;