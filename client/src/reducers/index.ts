import { combineReducers } from 'redux';
import services from './services.reducer';

const allReducers = combineReducers({
  services
});

export default allReducers;