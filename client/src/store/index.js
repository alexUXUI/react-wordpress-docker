import { createStore, applyMiddleware, compose } from 'redux'
import thunk from 'redux-thunk'
import allReducers from '../reducers'
const composeEnhancer = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

const enhancer = composeEnhancer(
  applyMiddleware(thunk),
);

const INITIAL_STATE = {};

const Store = createStore(allReducers, INITIAL_STATE, enhancer);

export default Store;