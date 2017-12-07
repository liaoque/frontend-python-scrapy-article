import axios from 'axios'
import nav from '../const/nav'

export function getArticleList(params) {
    let url = nav.list[0].url;
    return axios.get(url, {
        params: params
    });
}


export function getDuanziList(params) {
    let url = nav.list[1].url;
    return axios.get(url, {
        params: params
    });
}

export function getViodeList(params) {
    let url = nav.list[2].url;
    return axios.get(url, {
        params: params
    });
}

export function getXiezhenList(params) {
    let url = nav.list[3].url;
    return axios.get(url, {
        params: params
    });
}



