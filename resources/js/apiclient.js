import axios from 'axios';

/**
 * Esta clase funcionaria como un adapter.
 */
export default class ApiFetch {
    constructor() {
        this.apiUrl = () => {
            return process.env.API_URL;
        };
    }

    get(endpoint, customHeaders = {}, params = null) {
        return new Promise(async (resolve, reject) => {
            const requestData = {
                method: 'get',
                endpoint,
                customHeaders,
                params,
            };
            try {
                resolve(await this.makeRequest(requestData));
            } catch (error) {
                reject(error);
            }
        });
    }

    post(endpoint, body, customHeaders = {}) {
        return new Promise(async (resolve, reject) => {
            const requestData = {
                method: 'post',
                endpoint,
                body,
                customHeaders,
            };
            try {
                resolve(await this.makeRequest(requestData));
            } catch (error) {
                reject(error);
            }
        });
    }

    put(endpoint, body, customHeaders = {}) {
        return new Promise(async (resolve, reject) => {
            const requestData = {
                method: 'put',
                endpoint,
                body,
                customHeaders,
            };
            try {
                resolve(await this.makeRequest(requestData));
            } catch (error) {
                reject(error);
            }
        });
    }

    delete(endpoint, customHeaders = {}) {
        return new Promise(async (resolve, reject) => {
            const requestData = {
                method: 'delete',
                endpoint,
                customHeaders,
            };
            try {
                resolve(await this.makeRequest(requestData));
            } catch (error) {
                reject(error);
            }
        });
    }

    makeRequest(requestData) {
        return new Promise(async (resolve, reject) => {
            const response = await axios({
                method: requestData.method,
                baseURL: this.apiUrl(),
                url: `${requestData.endpoint}`,
                data: requestData.body ? requestData.body : null,
                headers: {...requestData.customHeaders},
                params: requestData.params ? requestData.params : null,
            }).catch(error => {
                reject(error.response);
            });
            resolve(response);
        });
    }
}
