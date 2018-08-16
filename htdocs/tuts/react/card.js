
// get from api, no auth key

const Card = (props) => {
    return (
        <div style={{ background: '#DFE7FF', border: '4px solid #A09AFF', width: '400px', height: '200px', padding: '8px', margin: '5px' }}>
            <div>
            <h3> userName: {props.name} </h3>
                <img style={{ float: 'right', width: '100px', height: '100px', }} src={props.avatar_url}/>
                    <ul>
                        <li> Account date: {props.created_at}</li>
                        <li> Repos: {props.public_repos}</li>
                        <li> Location: {props.location}</li>
                    </ul>
            </div>
        </div>
    );
};

const CardList = (props) => {
    return (
        <div>
            {props.cards.map(acc => <Card key={acc.id} {...acc} />)}
        </div>
    );
}

class Form extends React.Component {
    state = { userName: "" }
    handleSubmit = (event) => {
        event.preventDefault();
        //axios library
        axios.get(`https://api.github.com/users/${this.state.userName}`)
             .then(resp => {
                            this.props.onSubmit(resp.data)
                            this.setState({ userName: "" })// reset back to clean
                            });
    };
    render() {
        return (
            <form onSubmit={this.handleSubmit}>
                <input
                    type="text"
                    placeholder="search for name "
                    value={this.state.userName}
                    onChange={(e) => this.setState({ userName: e.target.value })}

                />
                <button type="submit"> Add </button>
            </form>

        );
    }
}

class App extends React.Component {
    state = {
        accounts: []
    };
    addNewAccount = (accountInfo) => {
        this.setState(prevState => ({
            accounts: prevState.accounts.concat(accountInfo)
        }))
    };
    render() {
        return (
            <div>
                <Form onSubmit={this.addNewAccount} />
                <hr />
                <CardList cards={this.state.accounts} />
            </div>
        );
    }
}


ReactDOM.render(<App />, /*container*/ )