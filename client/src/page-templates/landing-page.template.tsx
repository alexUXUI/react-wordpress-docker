import * as React from 'react';
import NavComponent from '../components/nav.component'
import ServiceContainer from '../containers/services.conatiner'

class LandingPage extends React.Component {
  public render() {
    return (
      <div className="App">
        <NavComponent />
        Landing Page
        <ServiceContainer />
      </div>
    );
  }
}

export default LandingPage;