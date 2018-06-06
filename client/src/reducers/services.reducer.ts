export default function (state = { services: [] }, action:any) {
  switch ( action.type ) {
    case 'GET_SERVICES': {
      return {
        ...state,
        services: action.payload
      }
    }
    default:
      return state;
  }
}