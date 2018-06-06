import * as React from 'react';
import { connect } from 'react-redux';
import { getServices } from '../actions/services.action'

interface IState {
  services: any[]
}

interface IProps { 
  services: any[]
  getServices(): void
}

class ServiceContainer extends React.Component<IProps, IState> {

  public state: IState
  public props: IProps

  constructor(props: IProps) {
    super(props)
    this.state = {
      services: []
    }
  }

  public componentDidMount() {
    this.props.getServices()
  }

  public renderPosts(postData: any) {
    if(postData) {
      return postData.map((post: any, index: number) => {
        return (<div key={index}>{post.date}</div>)
      })
    }
    return (<div>No data</div>)
  }

  public render() {
    return (
      <div>
        Service Container
        { this.renderPosts(this.props.services)}
      </div>
    );
  }
}

const mapStateToProps = (state: any) => ({
  services: state.services.services.data
});

const mapDispatchToProps = (dispatch: any) => ({
  getServices: () => dispatch(getServices()),
});

export default connect(mapStateToProps, mapDispatchToProps)(ServiceContainer);