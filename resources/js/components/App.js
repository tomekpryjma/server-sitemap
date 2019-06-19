import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import AddServerForm from './forms/AddServerForm';

export default class Example extends Component {
    render() {
        return (
            <AddServerForm/>
        );
    }
}

if (document.getElementById('root')) {
    ReactDOM.render(<Example />, document.getElementById('root'));
}
