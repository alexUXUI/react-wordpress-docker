import axios from 'axios';

interface IRequest {
  headers: object
  method: string
  mode: string
}

export const getServices = () => {
  return (dispatch: any) => {
    const REQUEST_URL = `http://localhost:8080/?rest_route=/wp/v2/posts`;

    const REQUEST: IRequest = {
      headers: new Headers({
        'content-type': 'application/json',
      }),
      method: 'GET',
      mode: 'cors',
    };

    return axios(REQUEST_URL, REQUEST).then((response: any) => {
      if (response.status >= 200 && response.status < 300) {
        dispatch({
          payload: response,
          type: 'GET_SERVICES',
        });
      } else {
        dispatch({
          payload: 'no response',
            type: 'GET_SERVICES',
        });
      }
    }).catch((error: object) => {
      dispatch({
        payload: error,
        type: 'GET_SERVICES',
      });
    });
  }
}