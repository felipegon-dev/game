import axios from 'axios'


const Methods = {
    GET: 'get',
}

const ajaxRequest = (config) => {
    return axios.request(config).then(response => {
        return response
    })
}

function parseUrl(endpoint, params) {
    const querystring = require('querystring')
    let url = endpoint
    if (Array.isArray(params) && params.length) {
        url += '?' + params.join('&')
    } else if (typeof params === 'object' && params !== null && Object.keys(params).length) {
        url += '?' + querystring.stringify(params)
    }
    return url;
}

const Axios = {
    get: (endpoint, params = null, config = {}) => {
        let url = parseUrl(endpoint, params);

        config = {
            ...config,
            ...{
                url: url,
                method: Methods.GET
            }
        }

        return ajaxRequest(config)
    }
}

export default Axios